<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\Resetare;
use App\Mail\Resetareda;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function parolaformular() {
        return view('auth.passwords.reset');
    }

    public function trimiteformular(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users',
        ],[
            'email.exists'=>'Nu exista un cont pentru aceasata adresa de email!'
        ]);

        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        Mail::to($request->email)->send(new Resetare($token));
        return back()->with('message', 'Linkul pentru resetarea parolei a fost trimis!');
    }

    public function resetareformular($token) {
        return view('auth.passwords.confirm', ['token' => $token]);
    }
    
    public function trimiteresetare(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required'
        ],[
            'email.exists'=>'Nu exista un cont pentru aceasata adresa de email!'
        ]);

        $update = DB::table('password_resets')->where(['email' => $request->email, 'token' => $request->token])->first();

        if(!$update){
            return back()->withInput()->with('error', 'Token invalid!');
        }

        $user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

        // Delete password_resets record
        DB::table('password_resets')->where(['email'=> $request->email])->delete();
        Mail::to($request->email)->send(new Resetareda());
        return redirect()->route('user.login')->with('message', 'Parola a fost resetata cu succes!');
    }
}