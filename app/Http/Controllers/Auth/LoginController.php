<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.signin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $rememberMe = $request->rememberMe ? true : false;
        
        if (Auth::attempt($credentials, $rememberMe)) {
            $user = Auth::user();
            
            if (!$user->hasVerifiedEmail()) {
                // Envoi de l'email de vérification
                $user->sendEmailVerificationNotification();
                
                // Déconnexion de l'utilisateur et redirection vers la page de vérification de l'email
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                
                return redirect()->route('verification.notice')->with('message', 'You need to verify your email address.');
            }

            // Si l'email est vérifié, rediriger en fonction du rôle de l'utilisateur
            if ($user->role == 'admin') {
                return redirect()->intended('/account-pages/users-management');
            } else {
                return redirect()->intended('/dashboard');
            }
        }

        return back()->withErrors([
            'message' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/sign-in');
    }
}
