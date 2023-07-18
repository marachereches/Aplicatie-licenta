<?php

namespace App\Http\Controllers;

use App\Models\Comanda;
use App\Models\Cos;
use App\Models\ProdusComanda;
use App\Models\User;
use App\Models\Produs;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    public function plaseaza(Request $request)
    {
        $nr = rand(11111, 99999);
        while (Comanda::where('nr', $nr)->exists()) {
            $nr = rand(11111, 99999);
        }
        $comanda = new Comanda();
        $comanda->user_id = Auth::id();
        $comanda->total = $request->input('total');
        $comanda->nume = $request->input('nume');
        $comanda->prenume = $request->input('prenume');
        $comanda->email = $request->input('email');
        $comanda->adresa = $request->input('adresa');
        $comanda->tara = $request->input('tara');
        $comanda->oras = $request->input('oras');
        $comanda->codp = $request->input('codpostal');
        $comanda->telefon = $request->input('telefon');
        $comanda->plata = $request->input('plata');
        if ($request->input('plata') == 'card') {
            $comanda->numecard = $request->input('numec');
            $comanda->nrcard = $request->input('nr');
            $comanda->datacard = $request->input('data');
            $comanda->cvv = $request->input('cvv');
        }
        $comanda->nr = $nr;
        $comanda->save();
        $produsecomanda = Cos::where('user_id', Auth::id())->get();
        foreach ($produsecomanda as $prod) {
            ProdusComanda::create([
                'comanda_id' => $comanda->id,
                'prod_id' => $prod->prod_id,
                'cant' => $prod->cant,
                'pret' => $prod->produseCos->pret,
            ]);
            $stocprodus = Produs::where('id', $prod->prod_id)->first();
            $stocprodus->stoc = $stocprodus->stoc - $prod->cant;
            $stocprodus->update();
        }
        if (Auth::user()->adresa == NULL) {
            $client = User::where('id', Auth::id())->first();
            $client->adresa = $request->input('adresa');
            $client->tara = $request->input('tara');
            $client->oras = $request->input('oras');
            $client->codp = $request->input('codpostal');
            $client->telefon = $request->input('telefon');
            $client->nrcard = $request->input('nr');
            $client->datacard = $request->input('data');
            $client->update();
        }
        $produsecomanda = Cos::where('user_id', Auth::id())->get();
        Cos::destroy($produsecomanda);
        return redirect()->route('comanda', array('comanda' => $comanda))
        ->with('message', 'Comanda a fost plasată cu succes!');
    }
}
