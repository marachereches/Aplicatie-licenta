@extends('layouts.admin')
@section('content')
<br>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h4> Detalii</h4>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('comanda.edit',$comanda->id) }}"><i class="fa fa-pencil"></i></a>
            <a class="btn btn-primary" href="{{ route('comanda.index') }}"> Înapoi</a>
        </div>
    </div>
</div>

<h5>Detalii comandă nr. {{$comanda->nr}} - {{$comanda->status ==0 ? 'procesata':'livrata'}} </h5></br>
<div class="row">
    <div class="col-sm-5">
        <h6>Informații livrare</h6></br>
        <p><strong>Nume destinatar: </strong>{{$comanda->nume.' '.$comanda->prenume}}</p>
        <p><strong>Email: </strong>{{$comanda->email}}</p>
        <p><strong>Număr de telefon: </strong>0{{$comanda->telefon}}</p>
        <p><strong>Adresă livrare: </strong>{{$comanda->adresa.', '.$comanda->oras.", ".$comanda->tara}}</p>
        <p><strong>Cod poțtal: </strong>{{$comanda->codp}}</p>
        <p><strong>Tip plată: </strong>{{$comanda->plata}}</p>
        <p><strong>Total plată: </strong>{{$comanda->total}} lei</p>

    </div>
    <div class="col-sm">
        <h6>Conținut comandă</h6></br>
        <li class="list-group-item d-flex justify-content-between">
            <span></span>
            <strong>Produs</strong>
            <strong>Cantitate</strong>
            <strong>Preț</strong>
            <strong>Subtotal</strong>
        </li></br>
        @foreach($comanda->produseComanda as $prod)
        <li class="list-group-item d-flex justify-content-between border-bottom">
            <span><img src="{{ asset('storage/produse/'.$prod->produseCom->image) }}" alt="" width="80" height="80"></span>
            <span style="width: 10%;">{{$prod->produseCom->nume}}</span>
            <span>{{$prod->cant}}</span>
            <span>{{$prod->produseCom->pret}} lei</span>
            <span>{{$prod->pret}} lei</span>
        </li>
        @endforeach

    </div>

</div>
@endsection