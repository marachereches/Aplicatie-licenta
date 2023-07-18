<?php

namespace App\Http\Controllers;

use App\Models\Produs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProduseController extends Controller
{

    public function create()
    {
        return view('admin.produs.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nume' => 'required',
            'descriere',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pret' => 'required',
            'stoc' => 'required',
            'cod' => 'required',
            'cat',
        ]);
        $fileName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/produse', $fileName);
        $produs = new Produs;
        $produs->nume = $request->input('nume');
        $produs->descriere = $request->input('descriere');
        $produs->pret = $request->input('pret');
        $produs->stoc = $request->input('stoc');
        $produs->cod = $request->input('cod');
        $produs->cat = $request->input('cat');
        $produs->image = $fileName;
        $produs->save();
        return redirect()->route('produs.index')
            ->with('success', 'Produsul a fost adăugat!');
    }
    public function show(Produs $produs)
    {
        return view('admin.produs.show', compact('produs'));
    }
    public function edit(Produs $produs)
    {
        return view('admin.produs.edit', compact('produs'));
    }

    public function update(Request $request, $id)
    {
        $produs = Produs::find($id);
        $produs->nume = $request->input('nume');
        $produs->descriere = $request->input('descriere');
        $produs->pret = $request->input('pret');
        $produs->stoc = $request->input('stoc');
        $produs->cod = $request->input('cod');
        $produs->cat = $request->input('cat');
        if ($request->has('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->storeAs('/public/produse', $fileName);
            $produs->image = $fileName;
        }

        $produs->save();

        return redirect()->route('produs.index')
            ->with('success', 'Produsul a fost actualizat!');
    }

    public function destroy(Produs $produs)
    {
        $produs->delete();

        return redirect()->route('produs.index')
            ->with('success', 'Produs șters!');
    }
    public function deleteimg($id)
    {
     $img = Produs::find($id);
     unlink(storage_path('app/public/produse/' . $img->image));
     $img->image = 0;
     $img->save();
     return redirect()->back()
                 ->with('success', 'Imaginea a fost ștearsă!');
    }
}
