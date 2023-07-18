<?php

namespace App\Http\Controllers;

use App\Models\Cos;
use App\Models\Produs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CosController extends Controller
{
    public function addProdus(Request $request)
    {
        $produs_id = $request->input('produs_id');
        $produs_cant = $request->input('produs_cant');

        if (Auth::check()) {
            $prod_check = Produs::where('id', $produs_id)->first();
            if ($prod_check) {
                if (Cos::where('prod_id', $produs_id)->where('user_id', Auth::id())->exists()) {
                    $cos = Cos::where('prod_id', $produs_id)->where('user_id', Auth::id())->first();
                    if ($cos->cant < 9) {
                        $cos->cant = $cos->cant + 1;
                        $cos->save();
                        return response()->json(['status' => $prod_check->nume . " este adăugat în coș"]);
                    } else {
                        return response()->json(['status' => "Nr maxim de 10 produse atins!"]);
                    }
                } else {
                    $cosProd = new Cos();
                    $cosProd->prod_id = $produs_id;
                    $cosProd->user_id = Auth::id();
                    $cosProd->cant = $produs_cant;
                    $cosProd->save();
                    return response()->json(['status' => $prod_check->nume . " este adăugat în coș"]);
                }
            }
        } else {
            return response()->json(['status' => "Autentificați-vă pentru a putea adăuga produse în coș!"]);
        }
    }
    public function stergeProdus(Request $request)
    {
        if (Auth::check()) {
            $produs_id = $request->input('produs_id');
            if (Cos::where('prod_id', $produs_id)->where('user_id', Auth::id())->exists()) {
                $cosProd = Cos::where('prod_id', $produs_id)->where('user_id', Auth::id())->first();
                $cosProd->delete();
                return response()->json(['status' => "Produsul" . $cosProd->nume . " a fost țters din coș!"]);
            }
        } else {
            return view('user.login');
        }
    }
    public function actProdus(Request $request)
    {
        $produs_id = $request->input('produs_id');
        $produs_cant = $request->input('cantitate');
        if (Auth::check()) {
            if (Cos::where('prod_id', $produs_id)->where('user_id', Auth::id())->exists()) {
                $cos = Cos::where('prod_id', $produs_id)->where('user_id', Auth::id())->first();
                if ($cos->cant < 11) {
                    $cos->cant = $produs_cant;
                    $cos->save();
                    return response()->json(['status' => "Cantitate actualizată!"]);
                }
            } else {
                return response()->json(['status' => "Nr maxim de 10 produse atins!"]);
            }
        }
    }
    public function nrCos()
    {
        $cantitate = Cos::where('user_id', Auth::id())->sum('cant');
        return response()->json(['count' => $cantitate]);
    }
}
