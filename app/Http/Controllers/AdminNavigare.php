<?php

namespace App\Http\Controllers;

use App\Models\Comanda;
use App\Models\Eveniment;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Produs;

class AdminNavigare extends Controller
{
    public function evenimente()
    {
        $ev = Eveniment::latest()->paginate(10);
        return view('admin.eveniment.index', compact('ev'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function produse()
    {
        $products = Produs::latest()->paginate(10);
        return view('admin.produs.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function clienti()
    {
        $users = User::oldest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }
    public function buchete()
    {
        $products = Produs::latest()->where('cat', 1)->paginate(10);
        return view('admin.produs.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function aranjamente()
    {
        $products = Produs::latest()->where('cat', 2)->paginate(10);
        return view('admin.produs.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function plante()
    {
        $products = Produs::latest()->where('cat', 3)->paginate(10);
        return view('admin.produs.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function index()
    {
        $comenzi = Comanda::latest()->where('status', 0)->paginate(10);
        $clienti = User::latest()->where('sterge', 1)->paginate(10);
        $eveniment = User::latest()->where('eveniment', 1)->paginate(10);
        $anulare = Comanda::latest()->where('status', 2)->paginate(10);
        return view('admin.home', compact('comenzi', 'clienti', 'eveniment', 'anulare'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function comenzi()
    {
        $comenzi = Comanda::latest()->paginate(10);
        return view('admin.comenzi.index', compact('comenzi'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function livrate()
    {
        $comenzi = Comanda::latest()->where('status', 1)->paginate(10);
        return view('admin.comenzi.index', compact('comenzi'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function procesate()
    {
        $comenzi = Comanda::latest()->where('status', 0)->orWhere('status', 2)->paginate(10);
        return view('admin.comenzi.index', compact('comenzi'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function anulate()
    {
        $comenzi = Comanda::latest()->where('status', 3)->paginate(10);
        return view('admin.comenzi.index', compact('comenzi'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
