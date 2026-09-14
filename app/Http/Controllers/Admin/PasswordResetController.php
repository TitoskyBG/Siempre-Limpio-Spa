<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class PasswordResetController extends Controller
{
    public function showForgotForm()
    {
        return view('admin.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink($request->only('email'));

        $messages = [
            Password::RESET_LINK_SENT => 'Te enviamos un enlace para restablecer tu contraseña. Revisa tu correo.',
            Password::INVALID_USER => 'No encontramos una cuenta con ese correo.',
            Password::RESET_THROTTLED => 'Espera un momento antes de solicitar otro enlace.',
        ];

        return $status === Password::RESET_LINK_SENT
            ? back()->with('success', $messages[$status])
            : back()->withErrors(['email' => $messages[$status] ?? 'No pudimos enviar el enlace. Intenta nuevamente.']);
    }

    public function showResetForm(Request $request, string $token)
    {
        return view('admin.reset-password', [
            'token' => $token,
            'email' => $request->query('email'),
        ]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                ])->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('success', 'Tu contraseña fue actualizada. Ya puedes iniciar sesión.');
        }

        $messages = [
            Password::INVALID_TOKEN => 'El enlace no es válido o ya expiró. Solicita uno nuevo.',
            Password::INVALID_USER => 'No encontramos una cuenta con ese correo.',
        ];

        return back()->withErrors(['email' => $messages[$status] ?? 'No pudimos restablecer tu contraseña.']);
    }
}
