<?php

namespace App\Http\Controllers\Portal\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function login(): View{
        return view('portal.auth.login');
    }

    public function loginPost(Request $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard()->attempt($credentials)) {
            $request->session()->regenerate();

            return response()->json([
                'redirectUrl' => redirect()->route('portal.dashboard.index')->getTargetUrl()
//                'redirectUrl' => redirect()->intended('dashboard')->getTargetUrl()
            ]);
        }

        return response()->json([
            "message" => __("invalid_email_or_password")
        ], 401);
    }

    public function logoutPost(): RedirectResponse
    {
        auth()->logout();

        return redirect()->route('portal.auth.login');
    }
}
