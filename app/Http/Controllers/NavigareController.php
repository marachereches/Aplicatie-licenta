<?php

namespace App\Http\Controllers;

use App\Models\Comanda;
use App\Models\Cos;
use App\Models\Eveniment;
use App\Models\Favorit;
use App\Models\ImaginiEv;
use App\Models\Produs;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NavigareController extends Controller
{
    public function home()
    {
        $buchete = Produs::where('cat',1)->paginate(4);
        $aranjamente= Produs::where('cat',2)->paginate(4);
        $plante= Produs::where('cat',3)->paginate(4);
        $imagini=ImaginiEv::inRandomOrder()->get();
        return view('user.home', compact('buchete','aranjamente','plante','imagini'));
    }
    public function detaliu(Produs $produs)
    {
        return view('user.detalii', compact('produs'));
    }
    public function produs()
    {
        $produse = Produs::all();
        $produse = Produs::paginate(12);
        return view('user.produse', compact('produse'));
    }
    public function checkout()
    {

        $produseInainte = Cos::where('user_id', Auth::id())->get();
        foreach ($produseInainte as $prodcos) {
            if (!Produs::where('id', $prodcos->prod_id)->where('stoc', '>=', $prodcos->cant)->exists()) {
                $sterge = Cos::where('user_id', Auth::id())->where('prod_id', $prodcos->prod_id)->first();
                $sterge->delete();
                return redirect()->back()->with('success', "Anumite produse nu se mai afla in stoc!");
            }
        }
        $produse = Cos::where('user_id', Auth::id())->get();

        return view('user.checkout', compact('produse'));
    }
    public function buchete()
    {
        $produse = Produs::latest()->where('cat', 1)->paginate(12);
        return view('user.produse', compact('produse'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function aranjamente()
    {
        $produse = Produs::latest()->where('cat', 2)->paginate(12);
        return view('user.produse', compact('produse'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function plante()
    {
        $produse = Produs::latest()->where('cat', 3)->paginate(12);
        return view('user.produse', compact('produse'));
    }
    public function cos()
    {
        $produse = Cos::where('user_id', Auth::id())->get();
        return view('user.cos', compact('produse'));
    }
    public function fav()
    {

        $produse = Favorit::where('user_id', Auth::id())->get();
        return view('user.favorite', compact('produse'));
    }
    public function cont()
    {
        $user=User::where('id', Auth::id())->latest()->get();
        $comenzi = Comanda::where('user_id', Auth::id())->latest()->get();
        return view('user.profil', compact('comenzi','user'));
    }
    public function detcom($id)
    {
        $comanda = Comanda::where('id', $id)->where('user_id', Auth::id())->first();

        return view('user.detaliicomanda', compact('comanda'));
    }

    public function evenimente(){
        $eveniment=Eveniment::all();
        return view('user.evenimente',compact('eveniment'));
    }
  
}
