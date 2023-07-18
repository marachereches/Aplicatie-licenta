@extends('layouts.nav')
@section('content')

<div>
    </br></br>
    <form method="POST" action="{{ route('info.update') }}">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="firstName">Nume</label>
                <input type="text" class="form-control" value="{{Auth::user()->fname}}" name="fname" placeholder="">
            </div>
            <div class="col-md-6 mb-3">
                <label for="lastName">Prenume</label>
                <input type="text" class="form-control" value="{{Auth::user()->lname}}" name="lname" placeholder="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="email">Email <span class="text-muted"></span></label>
                <input type="email" class="form-control" value="{{Auth::user()->email}}" name="email">
            </div>
            
            <div class="col-md-6 mb-3">
                <label for="zip">Telefon</label>
                <input type="number" class="form-control" maxlength="10" value="{{Auth::user()->telefon}}" size="10" name="telefon" placeholder="0712345678" required>

            </div>
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
                <div class="col-md-9 mb-3">
                    <label for="address">Adresă</label>
                    <input type="text" class="form-control" name="adresa" value="{{Auth::user()->adresa}}" placeholder="strada, numar, etaj, apartanemt" required>

                </div>
                <div class="col-md-3 mb-3">
                    <label for="zip">Cod poțtal</label>
                    <input type="number" maxlength="6" size="6" value="{{Auth::user()->codp}}" class="form-control" name="codp" placeholder="123456" required>

                </div>

            </div></br>
            <h5 class="mb-3">Informații card</h5></br>
            <div class="row">
                <div class="row" id="datecard1">
                    <div class="col-md-6 mb-3">
                        <label for="cc-name">Dată expirare card</label>
                        <input type="text" class="form-control" name="datacard" value="{{Auth::user()->datacard}}">

                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cc-number">Numărul de pe card</label>
                        <input type="text" class="form-control" name="nrcard" value="{{Auth::user()->nrcard}}" placeholder="">
                    </div>
                </div>

            </div></br>
            <div class="row">
            <h5 class="mb-3">Schimbă parola</h5></br></br>
                    <div class="col-md-6 mb-3">
                        <label>Parolă:</label>
                        <input type="password" name="password" class="form-control">
                        @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif

                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Confirmă parola:</label>
                        <input type="password" id="password_confirmation" spellcheck="false" class="form-control" name="password_confirmation" >
                        @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif

                    </div>
                </div>
            <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                <button type="submit" class="btn btn-dark">Salvează</button>
            </div>
    </form>
</div>
@endsection