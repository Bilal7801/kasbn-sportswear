<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Models\Admin;
use App\Mail\OtpMail;

class ForgotPasswordController extends Controller
{
    public function showForgetPasswordForm()
    {
        return view('admin.auth.forget-password');
    }

    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if (!$admin) {
            return back()->withErrors([
                'email' => 'Email not found in our records.'
            ]);
        }

        // call OTP logic here (recommended: move OTP logic to service)
        $otp = rand(100000, 999999);

        $admin->otp = $otp;
        $admin->otp_expires_at = now()->addMinutes(10);
        $admin->save();

        // after saving otp
        session([
            'password_reset_admin_id' => $admin->id
        ]);


        Mail::to($admin->email)->send(new OtpMail($otp));

        return redirect()
            ->route('admin.otp.form')
            ->with('status', 'OTP sent successfully');
    }
}
