<?php

namespace App\Http\Controllers;

use App\Models\Eveniment;
use App\Models\ImaginiEv;
use App\Models\User;
use Illuminate\Http\Request;

class EvenimentController extends Controller
{
    public function show(Eveniment $eveniment)
    {
        $images = $eveniment->imagini;
        return view('admin.eveniment.show', compact('eveniment', 'images'));
    }
    public function create()
    {
        return view('admin.eveniment.create');
    }
    public function store(Request $req)
    {
        $data = $req->validate([
            'nume' => 'required'
        ]);
        $eveniment = Eveniment::create($data);
        if ($req->has('imagine')) {
            foreach ($req->file('imagine') as $image) {
                $imageName = $data['nume'] . time() . rand(1, 1000) . '.' . $image->extension();
                $image->storeAs('public/evenimente', $imageName);
                ImaginiEv::create([
                    'eveniment_id' => $eveniment->id,
                    'imagine' => $imageName
                ]);
            }
        }
        return redirect()->route('eveniment.index')
            ->with('success', 'Evenimentul a fost adăugat!');
    }
    public function edit(Eveniment $eveniment)
    {
        $images = $eveniment->imagini;
        return view('admin.eveniment.edit', compact('eveniment', 'images'));
    }
    public function update(Request $request,  $id)
    {
        $eveniment = Eveniment::find($id);
        $eveniment->nume = $request->input('nume');
        $eveniment->save();
        return redirect()->route('eveniment.index')
            ->with('success', 'Evenimentul a fost actualizat!');
    }

    public function destroy(Eveniment $eveniment)
    {
        $eveniment->delete();

        return redirect()->route('eveniment.index')
            ->with('success', 'Produs șters!');
    }
    public function deleteimg($id)
    {
        $img = ImaginiEv::find($id);
        unlink(public_path('/storage/evenimente/' . $img->imagine));
        $img->delete();
        return redirect()->back()->with('success', 'Imaginea a fost ștearsă!');
    }
    public function adaugaimg(Request $request, $id)
    {
        $eveniment = Eveniment::find($id);
        if ($request->has('imagini')) {
            foreach ($request->file('imagini') as $image) {
                $imageName = $eveniment['nume'] . time() . rand(1, 1000) . '.' . $image->extension();
                $image->storeAs('public/evenimente', $imageName);
                ImaginiEv::create([
                    'eveniment_id' => $eveniment->id,
                    'imagine' => $imageName
                ]);
            }
        }
        return redirect()->back()->with('success', 'Imaginea a fost adaugată!');
    }
    public function contacteaza(Request $request)
    {
        $client = User::find($request->input('id'));
        $client->eveniment = 0;
        $client->save();
        return redirect()->route("admin.home");
    }
}
