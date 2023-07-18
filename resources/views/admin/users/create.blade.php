@extends('layouts.admin')
@section('content')
<br>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h4>Adaugă client</h4>
        </div>
    </div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Atentie!</strong> Eroare la introducere.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="right">
    <a class="btn btn-primary" href="{{ route('users.index') }}"> Înapoi</a>
    <span style="padding-left:85%;"> <button type="submit" class="btn btn-primary">Salvează</button></span>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nume</strong>
                <input type="text" name="fname" class="form-control" placeholder="Nume">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Prenume</strong>
                <input type="text" name="lname" class="form-control" placeholder="Prenume">
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email</strong>
                    <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Parolă</strong>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <strong>Confirmă parola</strong>
                        <input type="password" id="password_confirmation" spellcheck="false" class="form-control" name="password_confirmation" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <strong>Telefon</strong>
                    <input  type="number" class="form-control" name="telefon" required>
                    @if ($errors->has('telefon'))
                    <span class="text-danger text-left">{{ $errors->first('telefon') }}</span>
                    @endif
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                   <strong>Adresă</strong>
                    <input  type="text" class="form-control" name="adresa" required>
                    @if ($errors->has('adresa'))
                    <span class="text-danger text-left">{{ $errors->first('adresa') }}</span>
                    @endif
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                   <strong>Țară</strong>
                    <input  type="text" class="form-control" name="tara" required>
                    @if ($errors->has('tara'))
                    <span class="text-danger text-left">{{ $errors->first('tara') }}</span>
                    @endif
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                   <strong>Oraș</strong>
                    <input  type="text" class="form-control" name="oras" required>
                    @if ($errors->has('oras'))
                    <span class="text-danger text-left">{{ $errors->first('oras') }}</span>
                    @endif
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                   <strong>Cod poștal</strong>
                    <input  type="text" class="form-control" name="codp" required>
                    @if ($errors->has('codp'))
                    <span class="text-danger text-left">{{ $errors->first('codp') }}</span>
                    @endif
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                   <strong>Număr card</strong>
                    <input  type="text" class="form-control" name="nrcard">
                    @if ($errors->has('nrcard'))
                    <span class="text-danger text-left">{{ $errors->first('nrcard') }}</span>
                    @endif
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                   <strong>Dată expirare card</strong>
                    <input type="text" class="form-control" name="datacard">
                    @if ($errors->has('datacard'))
                    <span class="text-danger text-left">{{ $errors->first('datacard') }}</span>
                    @endif
                </div>
            </div>

        </div>
</form>
@endsection