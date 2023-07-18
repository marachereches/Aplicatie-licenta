@extends('layouts.admin')

@section('content')
<br>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h4>Editează comanda nr. {{$comanda->nr}}</h4>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('comanda.index') }}"> Înapoi</a>
        </div>
    </div>
</div>
@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
    <p>A apărut o eroare la intoducerea datelor</p>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif</br>

<form action="{{ route('comanda.update',$comanda->id) }}" method="POST">
    @csrf

    <div class="row">
        <div class="mb-3">
            <h6>Număr comandă</h6>
            <input value="{{$comanda->nr}}" type="text" class="form-control" name="nr" placeholder="Nume" required>
            @if ($errors->has('nr'))
            <span class="text-danger text-left">{{ $errors->first('nr') }}</span>
            @endif
        </div>
        <div class="col">
            <h4>Adresă de livrare</h4>
            <div class="mb-3">
                <label class="form-label">Nume</label>
                <input value="{{ $comanda->nume }}" type="text" class="form-control" name="nume" placeholder="Nume" required>
                @if ($errors->has('nume'))
                <span class="text-danger text-left">{{ $errors->first('nume') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Prenume</label>
                <input value="{{ $comanda->prenume }}" type="text" class="form-control" name="prenume" placeholder="Prenume" required>
                @if ($errors->has('prenume'))
                <span class="text-danger text-left">{{ $errors->first('prenume') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input value="{{ $comanda->email }}" type="email" class="form-control" name="email" placeholder="Email address" required>
                @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Telefon</label>
                <input value="0{{ $comanda->telefon }}" type="number" class="form-control" name="telefon" required>
                @if ($errors->has('telefon'))
                <span class="text-danger text-left">{{ $errors->first('telefon') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Adresă</label>
                <input value="{{ $comanda->adresa }}" type="text" class="form-control" name="adresa" required>
                @if ($errors->has('adresa'))
                <span class="text-danger text-left">{{ $errors->first('adresa') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Țară</label>
                <input value="{{ $comanda->tara }}" type="text" class="form-control" name="tara" required>
                @if ($errors->has('tara'))
                <span class="text-danger text-left">{{ $errors->first('tara') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Oraș</label>
                <input value="{{ $comanda->oras }}" type="text" class="form-control" name="oras" required>
                @if ($errors->has('oras'))
                <span class="text-danger text-left">{{ $errors->first('oras') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Cod poștal</label>
                <input value="{{ $comanda->codp }}" type="text" class="form-control" name="codp" required>
                @if ($errors->has('codp'))
                <span class="text-danger text-left">{{ $errors->first('codp') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <input value="{{$comanda->status}}" type="text" class="form-control" name="status" placeholder="0-PROCESATA, 1-LIVRATA, 2-ASTEPTARE ANULARE, 3-ANULATA" required>
                @if ($errors->has('codp'))
                <span class="text-danger text-left">{{ $errors->first('codp') }}</span>
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label">Metodă de plată</label>
                <input value="{{ $comanda->plata }}" type="text" class="form-control" name="plata" required>
                @if ($errors->has('plata'))
                <span class="text-danger text-left">{{ $errors->first('plata') }}</span>
                @endif
            </div>
            @if($comanda->plata=='card')
            <div class="mb-3">
                <label class="form-label">Număr card</label>
                <input value="{{ $comanda->nrcard }}" type="text" class="form-control" name="nrcard">
                @if ($errors->has('nrcard'))
                <span class="text-danger text-left">{{ $errors->first('nrcard') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Dată expirare card</label>
                <input value="{{ $comanda->datacard }}" type="text" class="form-control" name="datacard">
                @if ($errors->has('datacard'))
                <span class="text-danger text-left">{{ $errors->first('datacard') }}</span>
                @endif
            </div>
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-left">
        <button type="submit" class="btn btn-primary">Salvează</button>
    </div>
</form>
@endsection