<?php

namespace App\Http\Controllers;

use App\Models\Comanda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComenziController extends Controller
{   
    public function show(Comanda $comanda)
    {
        return view('admin.comenzi.show', compact('comanda'));
    }
    public function edit(Comanda $comanda)
    {
        return view('admin.comenzi.edit', compact('comanda'));
    }

    public function update(Request $request,  $id)
    {
        $comanda = Comanda::find($id);
        $comanda->nr = $request->input('nr');
        $comanda->nume = $request->input('nume');
        $comanda->status = $request->input('status');
        $comanda->prenume = $request->input('prenume');
        $comanda->email = $request->input('email');
        $comanda->telefon = $request->input('telefon');
        $comanda->oras = $request->input('oras');
        $comanda->tara = $request->input('tara');
        $comanda->adresa = $request->input('adresa');
        $comanda->save();

        return redirect()->route('comanda.index')
            ->with('success', 'Comanda a fost actualizată!');
    }

    public function destroy(Comanda $comanda)
    {
        $comanda->delete();

        return redirect()->route('comanda.index')
            ->with('success', 'Comandă ștearsă!');
    }
    public function livreaza(Request $request){
        $comanda=Comanda::find($request->input('id'));
        $comanda->status=$request->input('status');
        $comanda->save();
        return redirect()->route("comanda.livrata",array ('comanda' => $comanda));
    }
    public function anuleaza($id){
        $comanda = Comanda::where('id', $id)->where('user_id', Auth::id())->first();
        $comanda->status= 2 ;
        $comanda->save();
       return redirect()->route('cont');
    }
    
}
