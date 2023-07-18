@extends('layouts.admin')
@section('content')
<div class="bg-light p-4 rounded">
    <div class="lead">

    </div>

    <div class="container mt-4">
        <div>
            <strong>Nume: </strong> {{ $user->fname }}
        </div>
        <div>
            <strong>Prenume: </strong> {{ $user->lname }}
        </div>
        <div>
            <strong>Email: </strong> {{ $user->email }}
        </div>
        <div>
            <strong>Telefon: </strong> 0{{ $user->telefon }}
        </div>
        <div>
            <strong>Adresă: </strong> {{ $user->adresa }}, {{ $user->oras }}, {{ $user->tara }}
        </div>
        <div>
            <strong>Cod poțtal: </strong>{{ $user->codp }}
        </div>
        <div>
            <strong>Informații card:</strong> @if($user->nrcard!=0)<strong>număr: </strong> {{ $user->nrcard }}, <strong>dată expirare: </strong>{{ $user->datacard }}@else Nu a fost înregistrat niciun card!@endif
        </div>

    </div>
</div>
<div class="mt-4">
    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">Editează</a>
    <a href="{{ route('users.index') }}" class="btn btn-default">Înapoi</a>
</div>
@endsection