@extends('layouts.nav')
@section('content')
<div class="row">
    <div class="col-md-5">
        <h5>Detalii comanda nr. {{$comanda->nr}} - @if($comanda->status ==0 || $comanda->status==2)procesată @elseif($comanda->status==1) livrată @else anulată @endif </h5>
    </div>
    <div class="col-md-5"> @if($comanda->status==0 )
        <form action="{{ route('anuleaza',$comanda->id) }}" method="POST">
            @csrf
            <button type="submit" class='btn btn-outline-danger'>Anulează comanda</button></span></button>
        </form>
        @elseif($comanda->status==1) <button class='btn btn-danger' disabled>Comanda este deja livrată, nu se poate anula</button>
        @elseif($comanda->status==2)  <button class='btn btn-secondary' disabled>Cererea pentru anulare a fost înregistrată</button>
        @else  <button class='btn btn-secondary' disabled>Comanda a fost anulata</button>
        @endif
    </div>
</div>
</br></br>
<div class="row">
    <div class="col-sm-5">
        <h6>Informații livrare</h6>
        <p><strong>Nume destinatar: </strong>{{$comanda->nume.' '.$comanda->prenume}}</p>
        <p><strong>Email: </strong>{{$comanda->email}}</p>
        <p><strong>Număr de telefon: </strong>0{{$comanda->telefon}}</p>
        <p><strong>Adresă livrare: </strong>{{$comanda->adresa.', '.$comanda->oras.", ".$comanda->tara}}</p>
        <p><strong>Cod poștal: </strong>{{$comanda->codp}}</p>
        <p><strong>Tip plată: </strong>{{$comanda->plata}}</p>
        <p><strong>Total plată: </strong>{{$comanda->total}} lei</p>

    </div>
    <div class="col-sm">
        <h6>Conținut comandă</h6></br>
        <li class="list-group-item d-flex justify-content-between">
            <strong>Produs</strong><span></span>
            <strong>Cantitate</strong>
            <strong>Preț</strong>
            <strong>Subtotal</strong>
        </li></br>
        @foreach($comanda->produseComanda as $prod)
        <li class="list-group-item d-flex justify-content-between border-bottom">
            <span><img src="{{ asset('storage/produse/'.$prod->produseCom->image) }}" alt="" width="80" height="80"></span>
            <span style="width: 15%;">{{$prod->produseCom->nume}}</span>
            <span>{{$prod->cant}}</span>
            <span>{{$prod->produseCom->pret}} lei</span>
            <span>{{$prod->pret}} lei</span>
        </li>
        @endforeach

    </div>

</div>
<button class="btn btn-outline-secondary "><a style="text-decoration:none;color:black" href="{{ route('cont') }}">Înapoi</a></button>

@endsection