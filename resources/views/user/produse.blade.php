@extends('layouts.nav')
@section('content')
<div class="row">
    @foreach($produse as $produs)
    <div class="col-md-3" style="padding-top: 15px;">
        <div class="card date_prod">
            <div class="card-body" style=" text-align:center;  ">
                <h5 class="card-title" style="height:45px;">{{ $produs->nume }}</h5><hr>
                <p class="card-text"><a href="{{route('det', $produs->id)}}">
                        <img src="{{ asset('storage/produse/'.$produs->image) }}" alt="" width="250" height="290"></a></p>
                <p> <span style="padding-left: 70px;"><strong>Preț: </strong> {{ $produs->pret }} lei</span>
                    <input type="hidden" value="{{$produs->id}}" class="prod_id">
                    @php $cant=0; @endphp
                    @if(Auth::check())
                    @php
                    $cant= \App\Models\Favorit::nrfavorite($produs->id);
                    @endphp
                    @endif
                    @if($cant==0)
                    <a href="#" class="btn fav" data-produsid="{{$produs->id}}"><i class="fa-regular fa-heart"></i></a>
                    @else
                    <a href="#" class="btn fav" data-produsid="{{$produs->id}}"><i class="fa-solid fa-heart" style="color:#ff1a1a"></i></a>
                    @endif
                    <span style="padding-left:30px"></span>
                </p>
                <input type="hidden" class="cant" value="1">
                @if($produs->stoc>0)
                <button class="btn btn-outline-dark addCos" style="width: 100%;">Adaugă în coș</button>
                @else
                <span>Produsul nu mai există în stoc</span>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div></br>
<div style="padding-left: 50%;">
{!! $produse->links() !!}
</div>
@endsection
