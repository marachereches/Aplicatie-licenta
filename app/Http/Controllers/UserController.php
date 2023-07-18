<?php

namespace App\Http\Controllers;

use App\Models\Favorit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cos;
use Illuminate\Support\Facades\Mail;
use App\Mail\Sters;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function index()
    {
        return view('user.home');
    }

    public function login()
    {
        return view('user.login');
    }

    public function handleLogin(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $req->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }

        return redirect()->back()->withErrors(
            [

                'password' => 'Email sau parola greșită!'
            ]
        );
    }
    public function inreg(Request $request)
    {
        $validator = $request->validate(
            [
                'fname' => 'required|string',
                'lname' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:10|max:15|confirmed'
            ],
            [

                'password.min' => 'Parola trebuie sa contina minim 10 caractere!',
                'password.max' => 'Parola mx 15',
                'email.email' => 'Email invalid',
                'email.unique' => 'emailul ese folosit',
                'password.confirmed' => 'Parolele nu corespund',
                'fname.string' => 'Numele trebuie sa contina doar litere',
                'lname.string' => 'Numele trebuie sa contia doar litere!'
            ]
        );
        $data = $request->all();
        $check = $this->create($data);
        $check->sendEmailVerificationNotification();
        if (Auth::attempt($validator)) {
            return view('auth.verify');
        } else {
            return redirect()->back();
        }
    }
    public function edit()
    {
        $client = User::where('id', Auth::user()->id);
        return view('user.editinfo', compact('client'));
    }
    public function update(Request $request)
    {
        $client = User::find(Auth::user()->id);
        $client->fname = $request->input('fname');
        $client->lname = $request->input('lname');
        $client->email = $request->input('email');
        $client->telefon = $request->input('telefon');
        $client->adresa = $request->input('adresa');
        $client->tara = $request->input('tara');
        $client->oras = $request->input('oras');
        $client->codp = $request->input('codp');
        $client->nrcard = $request->input('nrcard');
        $client->datacard = $request->input('datacard');
        if ($request->input('password')) {
            $parola = Hash::make($request->input('password'));
            $client->password = $parola;
        }

        $client->save();
        return redirect()->route('cont')
            ->withSuccess(__('Datele au fost actualizate!'));
    }

    public function create(array $data)
    {
        return User::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
    public function logout()
    {
        Auth::logout();
        Session::remove('password_hash');

        return redirect()
            ->route('user.home');
    }
    public function stergecont($client)
    {
        $cont =  User::find($client->id);
        Mail::to(Auth::user()->email)->send(new Sters());
        $cont->delete();
        $cos = Cos::where('user_id', $client->id)->get();
        Cos::destroy($cos);
        $fav = Favorit::where('user_id', $client->id)->get();
        Favorit::destroy($fav);
        return redirect()->route('user.home');
    }
}
