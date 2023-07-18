@extends('layouts.nav')
@section('content')
<div class="container mt-5 mb-4">
    <div class="card date_prod">
        <div class="row g-0">
            <div class="col-md-5 border-end">

                <div class="main_image" style="margin-left: 15%;"><img src="{{ asset('storage/produse/'.$produs->image) }}" id="main_product_image" width="350"> </div>

            </div>
            <div class="col-md-6">
                <div class="p-3 right-side">
                    </br>
                    <div class="d-flex justify-content-between align-items-center">
                        <h3>{{$produs->nume}}</h3> <span class="heart"><i class='bx bx-heart'></i></span>
                    </div></br></br></br>
                    <div class="mt-2 pr-3 content">
                        <p>{{$produs->descriere}}</p>
                    </div></br>
                    @if($produs->stoc>0)
                    <div style="color:green">Disponibil în stoc</div>

                    <div class="buttons d-flex flex-row mt-5 gap-3">
                        <input type="hidden" value="{{$produs->id}}" class="prod_id">
                        <input type="hidden" class="cant" value="1">
                        <button class="btn btn-outline-dark addCos">Adaugă în coș</button>
                        @else
                        <div style="color:red">Produsul nu mai există în stoc</div></br>
                        @endif
                        @php $cant=0; @endphp
                        @if(Auth::check())
                        @php
                        $cant= \App\Models\Favorit::nrfavorite($produs->id);
                        @endphp
                        @endif
                        @if($cant==0)
                        <a href="#" class="fav" det-produsid="{{$produs->id}}"><button class="btn btn-outline-danger ">Adaugă la favorite</button></a>
                        @else
                        <a href="#" class="fav" det-produsid="{{$produs->id}}"><button class="btn btn-outline-danger ">Șterge produsul de la favorite</button></a>
                        @endif


                    </div>

                    <div style="padding-top: 17%;"> <small style="color:red">*Se pot achiziționa maxim 10 produse de același fel într-o comandă</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="padding-top: 0.5%;">
    <button class="btn"><a style="text-decoration: none;color: black;" href="javascript:history.back()">Înapoi</a></button>
</div>
@endsection