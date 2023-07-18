@extends('layouts.nav')
@section('content')
@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif
<div id="eveniment" class="carousel slide carousel-fade carousel-dark" data-bs-ride="carousel" style="width:100%;height: 80%;">
    <div class="carousel-inner">

        @foreach ($imagini as $image)
        @if ($loop->first)
        <div class="carousel-item active ">
            <image class="d-block " style="height: 100%;margin: 0 auto;" src="{{ asset('storage/evenimente/'.$image->imagine)}}">
        </div>
        @else
        <div class="carousel-item  ">
            <image class="d-block " style="height: 100%;margin: 0 auto;" src="{{ asset('storage/evenimente/'.$image->imagine)}}">
        </div>
        @endif
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#eveniment" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#eveniment" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
    </br>
    <h5><a href="{{route('ev')}}" style="text-decoration: none; color:black">Planifică un eveniment!</a></h5>
</div><br><br>
<div class="container" style="margin-top:5%">
    <div class="row">
        <h3 style="text-align: center;margin-bottom:10px">Buchete</h3>
        <h6 style="text-align: center;margin-bottom:20px"><a href="{{route('buchete')}}" style="text-decoration:none;color:black">-vezi toate-</a></h6>
        @foreach($buchete as $buchet)
        <br>
        <div class="col-md-3">
            <div class="card date_prod">
                <div class="card-body" style="padding-top: 15px; text-align:center;">
                    <h5 class="card-title"  style="height:45px;">{{ $buchet->nume }}</h5>
                    <p class="card-text"><a href="{{ route('det', $buchet->id) }}"><img src="{{ asset('storage/produse/'.$buchet->image) }}" alt="" width="250" height="250"></a></p>
                    <p> <span style="padding-left: 70px;"><strong>Preț: </strong> {{ $buchet->pret }} lei</span>
                        @php $cant=0; @endphp
                        @if(Auth::check())
                        @php
                        $cant= \App\Models\Favorit::nrfavorite($buchet->id);
                        @endphp
                        @endif
                        @if($cant==0)
                        <a href="#" class="btn fav" data-produsid="{{$buchet->id}}"><i class="fa-regular fa-heart"></i></a>
                        @else
                        <a href="#" class="btn fav" data-produsid="{{$buchet->id}}"><i class="fa-solid fa-heart" style="color:#ff1a1a"></i></a>
                        @endif
                        <span style="padding-left:30px"></span>
                    </p>
                    <input type="hidden" value="{{$buchet->id}}" class="prod_id">
                    <input type="hidden" class="cant" value="1">
                    @if($buchet->stoc>0)
                    <button class="btn btn-outline-dark addCos" style="width: 100%;">Adaugă în coș</button>
                    @else
                    <span>Produsul nu mai există în stoc</span>
                    @endif

                </div>
            </div>
        </div>
        @endforeach

    </div>
    <div class="row">
        <h3 style="text-align: center;margin-bottom:10px;margin-top:10px">Aranjamente florale</h3>
        <h6 style="text-align: center;margin-bottom:20px"><a href="{{route('aranjamente')}}" style="text-decoration:none;color:black">-vezi toate-</a></h6>

        @foreach($aranjamente as $aranjament)
        <div class="col-md-3">
            <div class="card date_prod">
                <div class="card-body" style="padding-top: 15px;text-align:center;">
                    <h5 class="card-title"  style="height:45px;">{{ $aranjament->nume }}</h5>
                    <p class="card-text"><a href="{{ route('det', $aranjament->id) }}"><img src="{{ asset('storage/produse/'.$aranjament->image) }}" alt="" width="250" height="250"></a></p>
                    <p> <span style="padding-left: 70px;"><strong>Preț: </strong> {{ $aranjament->pret }} lei</span>
                        @php $cant=0; @endphp
                        @if(Auth::check())
                        @php
                        $cant= \App\Models\Favorit::nrfavorite($aranjament->id);
                        @endphp
                        @endif
                        @if($cant==0)
                        <a href="#" class="btn fav" data-produsid="{{$aranjament->id}}"><i class="fa-regular fa-heart"></i></a>
                        @else
                        <a href="#" class="btn fav" data-produsid="{{$aranjament->id}}"><i class="fa-solid fa-heart" style="color:#ff1a1a"></i></a>
                        @endif
                        <span style="padding-left:30px"></span>
                    </p>
                    <input type="hidden" value="{{$aranjament->id}}" class="prod_id">
                    <input type="hidden" class="cant" value="1">
                    @if($aranjament->stoc>0)
                    <button class="btn btn-outline-dark addCos" style="width: 100%;">Adaugă în coș</button>
                    @else
                    <span>Produsul nu mai există în stoc</span>
                    @endif

                </div>
            </div>
        </div>
        @endforeach
    </div></br>
    <div class="row">
        <h3 style="text-align: center;margin-bottom:10px;">Plante de interior</h3>
        <h6 style="text-align: center;margin-bottom:20px"><a href="{{route('plante')}}" style="text-decoration:none;color:black">-vezi toate-</a></h6>

        @foreach($plante as $planta)
        <div class="col-md-3">
            <div class="card date_prod">
                <div class="card-body" style="padding-top: 15px; text-align:center;">
                    <h5 class="card-title"  style="height:45px;">{{ $planta->nume }}</h5>
                    <p class="card-text"><a href="{{ route('det', $planta->id) }}"><img src="{{ asset('storage/produse/'.$planta->image) }}" alt="" width="250" height="250"></a></p>
                    <p> <span style="padding-left: 70px;"><strong>Preț: </strong> {{ $planta->pret }} lei</span>
                        @php $cant=0; @endphp
                        @if(Auth::check())
                        @php
                        $cant= \App\Models\Favorit::nrfavorite($planta->id);
                        @endphp
                        @endif
                        @if($cant==0)
                        <a href="#" class="btn fav" data-produsid="{{$planta->id}}"><i class="fa-regular fa-heart"></i></a>
                        @else
                        <a href="#" class="btn fav" data-produsid="{{$planta->id}}"><i class="fa-solid fa-heart" style="color:#ff1a1a"></i></a>
                        @endif
                        <span style="padding-left:30px"></span>
                    </p>
                    <input type="hidden" value="{{$planta->id}}" class="prod_id">
                    <input type="hidden" class="cant" value="1">
                    @if($planta->stoc>0)
                    <button class="btn btn-outline-dark addCos" style="width: 100%;">Adaugă în coș</button>
                    @else
                    <span>Produsul nu mai există în stoc</span>
                    @endif

                </div>
            </div>
        </div>
        @endforeach
    </div></br>
</div>
@endsection