<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NavigareController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProduseController;
use App\Http\Controllers\ComenziController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AdminNavigare;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CosController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\EvenimentController;
use App\Http\Controllers\MailController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes(['verify' => true]);


Route::get('/', [NavigareController::class, 'home'])->name('user.home');
Route::get('/login', [UserController::class, 'login'])->name('user.login');
Route::post('/login', [UserController::class, 'handleLogin'])->name('user.handleLogin');
Route::post('inregistrare', [UserController::class, 'inreg'])->name('user.inregistrare');
Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
Route::get('/{produs}/detaliu',  [NavigareController::class, 'detaliu'])->name("det");
Route::get('/produs', [NavigareController::class, 'produs'])->name('produs');
Route::get('/buchete',  [NavigareController::class, 'buchete'])->name('buchete');
Route::get('/aranjamente-florale',  [NavigareController::class, 'aranjamente'])->name('aranjamente');
Route::get('/plante-de-interior',  [NavigareController::class, 'plante'])->name('plante'); 

Route::post('add-cos', [CosController::class, 'addProdus'])->name('add-cos');
Route::post('sterge-produs', [CosController::class, 'stergeProdus'])->name('sterge-produs');
Route::post('actualizeaza-produs', [CosController::class, 'actProdus'])->name('actualizeaza-produs');
Route::get('nr-cos', [CosController::class, 'nrCos'])->name('nr-cos');

Route::post('fav', [FavoriteController::class, 'favorit'])->name('fav');
Route::get('nr-favorite', [FavoriteController::class, 'nrFav'])->name('nr-favorite');
Route::get('evenimente', [NavigareController::class, 'evenimente'])->name('ev');
Route::get('parola', [ForgotPasswordController::class, 'parolaformular'])->name('parola.uitata');
Route::post('parola', [ForgotPasswordController::class, 'trimiteformular'])->name('parolauitata');
Route::get('resetare-parola/{token}', [ForgotPasswordController::class, 'resetareformular'])->name('resetare.parola');
Route::post('resetare-parola', [ForgotPasswordController::class, 'trimiteresetare'])->name('resetareparola');

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('cos', [NavigareController::class, 'cos'])->name('cos');
    Route::get('checkout', [NavigareController::class, 'checkout'])->name('checkout');
    Route::get('favorite', [NavigareController::class, 'fav'])->name('favorite');
    Route::post('plaseaza-comanda', [CheckController::class, 'plaseaza'])->name('plaseaza.comanda');
    Route::get('cont', [NavigareController::class, 'cont'])->name('cont');
    Route::get('informatii-cont', [UserController::class, 'edit'])->name('info');
    Route::post('informatii-cont-update', [UserController::class, 'update'])->name('info.update');
    Route::get('sterge', [MailController::class, 'sterge'])->name('cont.sterge');
    Route::get('{id}/detalii-comanda', [NavigareController::class, 'detcom'])->name('detaliicomanda');
    Route::get('comanda/{comanda}', [MailController::class, 'comanda'])->name('comanda');
    Route::get('/eveniment/planifica/{id}', [MailController::class, 'planifica'])->name('planifica.eveniment');
    Route::post('anuleaza/{id}', [ComenziController::class, 'anuleaza'])->name('anuleaza');
    Route::post('an/{comanda}', [MailController::class, 'anuleazaadmin'])->name('anuleaza.admin');
});


Route::prefix('/admin')->namespace('Admin')->group(function () {

    Route::get('login', [AdminController::class, 'login'])->name('admin.log');
    Route::post('login', [AdminController::class, 'loginAdmin'])->name('admin.login');
    Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/', [AdminNavigare::class, 'index'])->name('admin.home');
        Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');

        Route::group(['prefix' => 'produse'], function () {
            Route::get('/produse',  [AdminNavigare::class, 'produse'])->name('produs.index');
            Route::get('/buchete',  [AdminNavigare::class, 'buchete'])->name('produs.buchete');
            Route::get('/aranjamente-florale',  [AdminNavigare::class, 'aranjamente'])->name('produs.aranjamente');
            Route::get('/plante-de-interior',  [AdminNavigare::class, 'plante'])->name('produs.plante');
            Route::get('/create', [ProduseController::class, 'create'])->name('produs.create');
            Route::post('/create', [ProduseController::class, 'store'])->name('produs.store');
            Route::get('/{produs}/show', [ProduseController::class, 'show'])->name('produs.show');
            Route::get('/{produs}/edit', [ProduseController::class, 'edit'])->name('produs.edit');
            Route::post('/{produs}/update', [ProduseController::class, 'update'])->name('produs.update');
            Route::delete('/{produs}/delete',[ProduseController::class,'destroy'])->name('produs.destroy');
            Route::get('/{id}/delete',[ProduseController::class,'deleteimg'])->name('img.sterge');
        });

        Route::group(['prefix' => 'clienti'], function () {
            Route::get('/',  [AdminNavigare::class, 'clienti'])->name('users.index');
            Route::get('/create',  [UsersController::class, 'create'])->name('users.create');
            Route::post('/create', [UsersController::class, 'store'])->name('users.store');
            Route::get('/clienti/{user}/show', [UsersController::class, 'show'])->name('users.show');
            Route::get('/clienti/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
            Route::post('/clienti/{id}/update',  [UsersController::class, 'update'])->name('users.update');
            Route::delete('/clienti/{user}/delete', [UsersController::class, 'destroy'])->name('users.destroy');
        });
        Route::group(['prefix' => 'evenimente'], function () {
            Route::get('/',  [AdminNavigare::class, 'evenimente'])->name('eveniment.index');
            Route::get('/create', [EvenimentController::class, 'create'])->name('eveniment.create');
            Route::post('/create', [EvenimentController::class, 'store'])->name('eveniment.store');
            Route::get('/{eveniment}/show', [EvenimentController::class, 'show'])->name('eveniment.show');
            Route::get('/{eveniment}/edit', [EvenimentController::class, 'edit'])->name('eveniment.edit');
            Route::post('/{eveniment}/update', [EvenimentController::class, 'update'])->name('eveniment.update');
            Route::delete('/{eveniment}/delete', [EvenimentController::class, 'destroy'])->name('eveniment.destroy');
            Route::get('/{id}/delete', [EvenimentController::class, 'deleteimg'])->name('imagine.sterge');
            Route::post('/{id}/adauga', [EvenimentController::class, 'adaugaimg'])->name('imagine.adauga');
        });
        Route::group(['prefix' => 'comenzi'], function () {
            Route::get('/',  [AdminNavigare::class, 'comenzi'])->name('comanda.index');
            Route::get('/livrat',  [AdminNavigare::class, 'livrate'])->name('comanda.livrate');
            Route::get('/procesat',  [AdminNavigare::class, 'procesate'])->name('comanda.procesate');
            Route::get('/anulat',  [AdminNavigare::class, 'anulate'])->name('comanda.anulate');
            Route::get('/{comanda}/show', [ComenziController::class, 'show'])->name('comanda.show');
            Route::get('/{comanda}/edit', [ComenziController::class, 'edit'])->name('comanda.edit');
            Route::post('/{comanda}/update', [ComenziController::class, 'update'])->name('comanda.update');
            Route::delete('/{comanda}/delete', [ComenziController::class, 'destroy'])->name('comanda.destroy');
            Route::post('livreaza', [ComenziController::class, 'livreaza'])->name('livreaza');
            Route::get('comanda/{comanda}', [MailController::class, 'livrata'])->name('comanda.livrata');
            Route::post('contactat', [EvenimentController::class, 'contacteaza'])->name('contactat');
        });
    });
});
