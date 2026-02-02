<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class ResetPasswordController extends Controller
{
    public function showResetForm()
    {
        if (!session('otp_verified') || !session('password_reset_admin_id')) {
            return redirect()->route('admin.forget.password');
        }

        return view('admin.auth.reset_password');
    }

    public function resetPassword(Request $request)
    {
        if (!session('otp_verified') || !session('password_reset_admin_id')) {
            return redirect()->route('admin.forget.password');
        }

        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        $admin = Admin::find(session('password_reset_admin_id'));

        if (!$admin) {
            return redirect()->route('admin.forget.password');
        }

        $admin->update([
            'password' => Hash::make($request->password)
        ]);

        // 🔐 Clear all reset-related session
        session()->forget([
            'otp_verified',
            'password_reset_admin_id'
        ]);

        return redirect()->route('admin.login')
            ->with('success', 'Password reset successfully');
    }
}
