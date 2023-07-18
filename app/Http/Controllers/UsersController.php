<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cos;
use App\Models\Favorit;
use Illuminate\Support\Facades\Mail;
use App\Mail\Sters;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;
class UsersController extends Controller
{
  
    public function show(User $user)
    {
        return view('admin.users.show', [
            'user' => $user
        ]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validator = $request->validate(
            [
                'fname' => 'required|string',
                'lname' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:10|max:15|confirmed',
                'telefon' => 'required',
                'adresa' => 'required|string',
                'tara' => 'required|string',
                'oras' => 'required|string',
                'codp' => 'required|string',
                'nrcard',
                'datacard',
            ],
            [

                'password.min' => 'Parola trebuie să conțină minim 10 caractere!',
                'password.max' => 'Parola poate avea maxim 15 caractere!',
                'email.email' => 'Email invalid!',
                'email.unique' => 'Emailul este deja utilizat!',
                'password.confirmed' => 'Parolele nu corespund!',
                'fname.string' => 'Numele trebuie să conțină doar litere!',
                'lname.string' => 'Numele trebuie să conțină doar litere!'
            ]
        );
       $client=new User();
       $client->fname=$request->input('fname');
       $client->lname=$request->input('lname');
       $client->email =$request->input('email');
       $client->telefon=$request->input('telefon');
       $client->adresa =$request->input('adresa');
       $client->tara=$request->input('tara');
       $client->oras =$request->input('oras');
       $client->codp =$request->input('codp');
       $client->nrcard =$request->input('nrcard');
       $client->datacard =$request->input('datacard');
       $parola=Hash::make($request->input('password'));
       $client->password =$parola;
$client->save();

        return redirect()->route('users.index')
            ->with('success', 'Clientul a fost adăugat!');
    }
    public function edit(User $user)
    {
        return view('admin.users.edit',compact('user'));
    }

    public function update(Request $request,$id)
    {
        $client=User::find($id);
        $client->fname = $request->input('fname');
        $client->lname=$request->input('lname');
        $client->email =$request->input('email');
        $client->telefon=$request->input('telefon');
        $client->adresa =$request->input('adresa');
        $client->tara=$request->input('tara');
        $client->oras =$request->input('oras');
        $client->codp =$request->input('codp');
        $client->nrcard =$request->input('nrcard');
        $client->datacard =$request->input('datacard');
        $parola=Hash::make($request->input('password'));
        $client->password =$parola;
        $client->save();
        return redirect()->route('users.index')
            ->withSuccess(__('Datele au fost actualizate!'));
    }

    public function destroy(User $user)
    {
        Mail::to($user->email)->send(new Sters());
        $cos = Cos::where('user_id', $user->id)->get();
        Cos::destroy($cos);
        $fav= Favorit::where('user_id', $user->id)->get();
        Favorit::destroy($fav);
        $user->delete();
        return redirect()->route('users.index')
            ->withSuccess(__('Client șters!'));
    }
}
