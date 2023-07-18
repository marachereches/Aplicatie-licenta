@extends('layouts.admin')
@section('content')
<div class="center">
    @if(session('error'))
    <p>{{ session('error') }}</p>
    @endif
    <form action="{{ route('admin.login')}}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <input type="text" placeholder="Email" id="email" class="form-control" name="email" spellcheck="false" required autofocus>
            @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="form-group mb-3">

            <input type="password" placeholder="Parola" id="password" class="form-control" name="password" spellcheck="false" required>
            @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
        </div>
        <div class="d-grid mx-auto">
            <button id="form" type="submit" class="btn btn-dark btn-block">Autentificare</button>
        </div>

    </form>
</div>

@endsection