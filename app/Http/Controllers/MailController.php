<?php

namespace App\Http\Controllers;

use App\Mail\Anuleaza;
use App\Mail\ComandaLivrata;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\ComandaPlasata;
use App\Mail\Evenimente;
use App\Models\Comanda;
use App\Mail\Sterge;
use Illuminate\Support\Facades\Auth;
use App\Models\Eveniment;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function comanda(Comanda $comanda)
    {
        Mail::to($comanda->email)->send(new ComandaPlasata($comanda));
        return redirect()->route('user.home')->with('message', 'Comanda a fost plasată cu succes!');
    }
    public function livrata(Comanda $comanda)
    {
        Mail::to($comanda->email)->send(new ComandaLivrata($comanda));
        return redirect()->back();
    }
    public function planifica($id)
    {
        $client = User::find(Auth::user()->id);
        $client->eveniment = 1;
        $client->save();
        $eveniment= Eveniment::find($id);
        $eveniment -> user_id = Auth::user()->id;
        $eveniment->save();
        Mail::to(Auth::user()->email)->send(new Evenimente());
        return redirect()->route('user.home')->with('message', 'Cererea a fost înregistrată!');
    }
    public function sterge()
    {
        $client = User::find(Auth::user()->id);
        $client->sterge = 1;
        $client->save();
        Mail::to($client->email)->send(new Sterge());
        return redirect()->route('user.home')->with('message', "Cererea dumneavoastra a fost trimisă!");
    }
    public function anuleazaadmin(Comanda $comanda){
        $comanda->status= 3 ;
        $comanda->save();
        Mail::to($comanda->email)->send(new Anuleaza($comanda));
       return redirect()->route('admin.home');
    }
}
