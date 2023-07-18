<?php
namespace App\Http\Controllers;
use App\Models\Produs;
use App\Models\Favorit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function favorit(Request $request)
    {
        if (Auth::check()) {
            $produs_id = $request->input('produs_id');
            if (Favorit::where('prod_id', $produs_id)->where('user_id', Auth::id())->exists()) {
                $cosProd = Favorit::where('prod_id', $produs_id)->where('user_id', Auth::id())->first();
                $cosProd->delete();
                return response()->json(['action'=>'sterge','status' => "Produsul a fost șters din wishlist"]);
            } else {
                if (Produs::find($produs_id)) {
                    $fav = new Favorit();
                    $fav->prod_id = $produs_id;
                    $fav->user_id = Auth::id();
                    $fav->save();
                    return response()->json(['action'=>'adauga','status' => "Produsul a fost adăugat în wishlist!"]);
                }
            }
        } else {
            return response()->json(['status' => "Autentificați-vă pentru a putea adăuga produse în wishlist!"]);
        }
    }
    public function nrFav()
    {
        $cantitate = Favorit::where('user_id', Auth::id())->count();
        return response()->json(['count' => $cantitate]);
    }
}
