@extends('layouts.nav')
@section('content')
<form action="{{route('plaseaza.comanda')}}" method="post">
    <div class="row" style="width: 100%;">

        @csrf
        <div style="width: 56%;">
            <h4 class="mb-3">Adresă de livrare</h4>


            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="firstName">Nume</label>
                    <input type="text" class="form-control" value="{{Auth::user()->fname}}" name="nume" placeholder="">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="lastName">Prenume</label>
                    <input type="text" class="form-control" value="{{Auth::user()->lname}}" name="prenume" placeholder="">
                </div>
            </div>
            <div class="mb-3">
                <label for="email">Email <span class="text-muted"></span></label>
                <input type="email" class="form-control" value="{{Auth::user()->email}}" name="email">
            </div>

            <div class="mb-3">
                <label for="address">Adresă</label>
                <input type="text" class="form-control" name="adresa" value="{{Auth::user()->adresa}}" placeholder="strada, numar, etaj, apartanemt" required>

            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="address">Țară</label>
                    <input type="text" class="form-control" value="{{Auth::user()->tara}}" name="tara" placeholder="" required>

                </div>
                <div class="col-md-6 mb-3">
                    <label for="address">Oraș</label>
                    <input type="text" class="form-control" value="{{Auth::user()->oras}}" name="oras" placeholder="" required>

                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="zip">Cod poștal</label>
                    <input type="number" maxlength="6" size="6" value="{{Auth::user()->codp}}" class="form-control" name="codpostal" placeholder="123456" required>

                </div>
                <div class="col-md-3 mb-3">
                    <label for="zip">Telefon</label>
                    <input type="number" class="form-control" maxlength="10" value="{{Auth::user()->telefon}}" size="10" name="telefon" placeholder="0712345678" required>

                </div>
            </div>
            <div class="row">
                <span style="display: inline;">Metoda de plata</span>
                <div class="d-block my-3" style="padding-left: 20px;">
                    <div class="custom-control custom-radio">
                        <input id="ramburs" name="plata" type="radio" value="ramburs" class="custom-control-input" onclick="ascundeCard()" checked required>
                        <label class="custom-control-label" for="debit">Ramburs</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="credit" name="plata" type="radio" value="card" class="custom-control-input" onclick="showCard()" required>
                        <label class="custom-control-label" for="credit">Credit card</label>
                    </div>
                </div>
            </div>
            <div class="row" id="datecard" style="display: none;">
                <div class="col-md-6 mb-3">
                    <label for="cc-name">Nume</label>
                    <input type="text" class="form-control" name="numec" value="{{Auth::user()->fname}} {{Auth::user()->lname}}">
                    <small class="text-muted">Numele întreg de pe card</small>
                    <div class="invalid-feedback">
                        Câmp obligatoriu
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="cc-number">Numărul de pe card</label>
                    <input type="text" class="form-control" name="nr" value="{{Auth::user()->nrcard}}" placeholder="">
                    <div class="invalid-feedback">
                        Câmp obligatoriu
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <label for="cc-expiration">Dată expirare</label>
                    <input type="text" value="{{Auth::user()->datacard}}"class="form-control" name="data" placeholder="">
                    <div class="invalid-feedback">
                    Câmp obligatoriu
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="cc-cvv">CVV</label>
                    <input type="number" length="3" size="3" class="form-control" name="cvv" placeholder="123">
                    <div class="invalid-feedback">
                    Câmp obligatoriu
                    </div>
                </div>
            </div>
        </div>
        <div class="col border-start">
            <h4 class="d-flex justify-content-between align-items-center ">
                <span class="text-muted">Cos</span>
                <span class="badge badge-secondary badge-pill"></span>
            </h4>
            @if(session('success'))
            <p>{{ session('success') }}</p>
            @endif
            <li class="list-group-item d-flex justify-content-between">
                <span></span> <span></span><span></span>
                <strong>Produs</strong>
                <strong>Cantitate</strong>
                <strong>Preț</strong>
                <strong>Subtotal</strong>
            </li></br>
            @php $i=1;$sub=0;$total=0 @endphp
            @foreach($produse as $produs)
            @php $sub=$produs->produsecos->pret * $produs->cant;$total+=$sub; @endphp
            <li class="list-group-item d-flex justify-content-between border-bottom">
                <span><img src="{{ asset('storage/produse/'.$produs->produsecos->image) }}" alt="" width="80" height="80"></span>
                <span style="width: 10%;">{{$produs->produsecos->nume}}</span>
                <span>{{$produs->cant}}</span>
                <span>{{$produs->produsecos->pret}}</span>
                <span>{{$sub}}</span>
            </li>
            </br>
            @endforeach
            <input hidden name="total" value="{{$total}}">
            <p style="text-align: right;"><strong>Total:</strong> {{$total}} lei</p>
        </div>

        <hr class="mb-4">
        <div class="d-grid gap-8 d-md-block">
            <button class="btn btn-outline-secondary "><a style="text-decoration:none;color:black" href="{{ route('cos') }}">Înapoi</a></button>
            @if($produse->count()>0)
            <button type="submit" style="float: right;" class="btn  btn-outline-success"><a style="text-decoration: none;color:black">Plasează comanda</a></button>
       @endif
        </div>

    </div>
</form>
@endsection