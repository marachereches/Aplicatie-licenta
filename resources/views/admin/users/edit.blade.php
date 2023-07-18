@extends('layouts.admin')
@section('content')
<br>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h4>Editează client</h4>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Înapoi</a>
        </div>
    </div>
</div>

    <div class="container mt-4">
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>ATENTIE</strong> Datele introduse nu sunt corecte<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nume</label>
                <input value="{{ $user->fname }}" type="text" class="form-control" name="fname" placeholder="Nume" required>
                @if ($errors->has('fname'))
                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">Prenume</label>
                <input value="{{ $user->lname }}" type="text" class="form-control" name="lname" placeholder="Prenume" required>
                @if ($errors->has('lname'))
                <span class="text-danger text-left">{{ $errors->first('lname') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input value="{{ $user->email }}" type="email" class="form-control" name="email" placeholder="Email address" required>
                @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="telefon" class="form-label">Telefon</label>
                <input value="0{{ $user->telefon }}" type="number" class="form-control" name="telefon"  required>
                @if ($errors->has('telefon'))
                <span class="text-danger text-left">{{ $errors->first('telefon') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">Adresă</label>
                <input value="{{ $user->adresa }}" type="text" class="form-control" name="adresa"  required>
                @if ($errors->has('adresa'))
                <span class="text-danger text-left">{{ $errors->first('adresa') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">Țară</label>
                <input value="{{ $user->tara }}" type="text" class="form-control" name="tara"  required>
                @if ($errors->has('tara'))
                <span class="text-danger text-left">{{ $errors->first('tara') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">Oraș</label>
                <input value="{{ $user->oras }}" type="text" class="form-control" name="oras"  required>
                @if ($errors->has('oras'))
                <span class="text-danger text-left">{{ $errors->first('oras') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">Cod poștal</label>
                <input value="{{ $user->codp }}" type="text" class="form-control" name="codp"  required>
                @if ($errors->has('codp'))
                <span class="text-danger text-left">{{ $errors->first('codp') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">Număr card</label>
                <input value="{{ $user->nrcard }}" type="text" class="form-control" name="nrcard"  >
                @if ($errors->has('nrcard'))
                <span class="text-danger text-left">{{ $errors->first('nrcard') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">Dată expirare card</label>
                <input value="{{ $user->datacard }}" type="text" class="form-control" name="datacard"  >
                @if ($errors->has('datacard'))
                <span class="text-danger text-left">{{ $errors->first('datacard') }}</span>
                @endif
            </div>
            </br>
            <div class="col-xs-12 col-sm-12 col-md-12 text-left">
              <button type="submit" class="btn btn-primary">Salvează</button>
            </div>
        </form>
    </div>
</div>
@endsection