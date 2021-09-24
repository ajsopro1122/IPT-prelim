<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Nexmo\Laravel\Facade\Nexmo;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function registrationForm() {
        return view('register');
    }

    public function loginForm() {
        return view('login');
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            
        ]);

        $token = Str::random(24);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'remember_token' => $token
        ]);

        Mail::send('verification-email', ['user'=>$user], function($mail) use ($user) {
            $mail->to($user->email);
            $mail->subject('Account Verification');
            $mail->from('ajsoproo@gmail.com', 'IPT Systems');
        });


        return redirect('/login')->with('Message', 'Your account has been created. Please check your email for the verification. ');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'email|required',
            'password' => 'string|required',
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user || $user->email_verified_at==null) {
            return redirect('/login')->with('Error', 'Sorry you are not yet verified');
        }

        $login = auth()->attempt([
           'email' => $request->email,
           'password' => $request->password 
        ]);

        if(!$login) {
            return back()->with('Error', 'Invalid credentials');
        }

        return redirect('/dashboard');
    }

    public function verification(User $user, $token) {
        if($user->remember_token!=$token) {
            return redirect('/login')-with('Error', 'The token is invalid.');
        }

        $user->email_verified_at = now();
        $user->save();

        Nexmo::message()->send([
            'to' => $user->phone,
            'from' => 'sender',
            'text' => 'ajsoproo@gmail.com. You successfully verify your account. You may now login'
        ]);

        echo "Message Sent!";

        return redirect('/login')->with('Message', 'Your account has been verified. You may now login.');
    }

    public function logout() {
        auth()->logout();
        return redirect('/login')->with('Message', 'Logged out successfully');
    }
}
