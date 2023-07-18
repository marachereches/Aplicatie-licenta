@extends('layouts.nav')
@section('content')
@if($produse->count()>0)
<div class="row">
    @foreach($produse as $produs)
    <div class="col-md-3" style="padding-top: 10px;">
        <div class="card date_prod" >
            <div class="card-body" style="padding-top: 15px; text-align:center;">
            <span style="padding-left:90%"><button class="btn Fav "><i class="fa-solid fa-x"></i></button></span>
                <h5 class="card-title" style="height: 43px;" >{{ $produs->produseFav->nume }}</h5>
                <p class="card-text"><a href="{{ route('det', $produs->produseFav->id) }}"><img src="{{ asset('storage/produse/'.$produs->produseFav->image) }}" alt="" width="250" height="250"></a></p>
                <p> <strong>Preț: </strong> {{ $produs->produseFav->pret }}lei</p>
                <input type="hidden" value="{{$produs->produseFav->id}}" class="prod_id">
                <input type="hidden" class="cant" value="1">
                @if($produs->produseFav->stoc>0)
                <button class="btn btn-outline-dark addCos" style="width: 100%;">Adauga in cos</button>
                @else
                <span>Produsul nu mai există în stoc</span>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>
@else
<h5 style="text-align: center;">Nu aveți produse în lista de favorite.</h5>
@endif
@endsection