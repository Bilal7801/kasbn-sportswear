<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Mail\OtpMail;
use App\Models\Admin;

class OtpController extends Controller
{
    // Step 1: Show the OTP verification form

    public function showOtpForm()
    {
        $adminId = session('password_reset_admin_id');

        if (!$adminId) {
            return redirect()->route('admin.forget.password')
                ->withErrors(['email' => 'Session expired. Please try again.']);
        }

        $admin = Admin::find($adminId);

        if (!$admin) {
            return redirect()->route('admin.forget.password')
                ->withErrors(['email' => 'Admin not found']);
        }

        return view('admin.auth.otp_verify', compact('admin'));
    }


    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6'
        ]);

        $adminId = session('password_reset_admin_id');

        if (!$adminId) {
            return back()->withErrors(['otp' => 'Session expired']);
        }

        $admin = Admin::find($adminId);

        if (!$admin || !$admin->otp) {
            return back()->withErrors(['otp' => 'Invalid request']);
        }

        if (now()->gt($admin->otp_expires_at)) {
            return back()->withErrors(['otp' => 'OTP expired']);
        }

        if ($request->otp != $admin->otp) {
            return back()->withErrors(['otp' => 'Invalid OTP']);
        }

        // clear otp
        $admin->update([
            'otp' => null,
            'otp_expires_at' => null
        ]);

        session(['otp_verified' => true]);

        return redirect()->route('admin.password.reset.form')
            ->with('success', 'OTP verified successfully');
    }


    public function resendOtp()
    {
        $adminId = session('password_reset_admin_id');

        if (!$adminId) {
            return response()->json(['message' => 'Session expired'], 400);
        }

        $admin = Admin::find($adminId);

        $otp = rand(100000, 999999);

        $admin->update([
            'otp' => $otp,
            'otp_expires_at' => now()->addMinutes(10)
        ]);

        Mail::to($admin->email)->send(new OtpMail($otp));

        return response()->json(['message' => 'OTP resent successfully']);
    }
}
