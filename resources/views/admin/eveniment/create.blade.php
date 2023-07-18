@extends('layouts.admin')
@section('content')
<br>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h4>Adaugă eveniment</h4>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('eveniment.index') }}"> Înapoi</a>
        </div>
    </div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
A apărut o eroare la intoducerea datelor<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ route('eveniment.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nume:</strong>
                <input type="text" name="nume" class="form-control" placeholder="Nume">
            </div>
        </div>
        <strong>Imagini:</strong>
        <input type="file" name="imagine[]" class="form-control" accept="image/*" multiple>
        </br>
        <div class="col-xs-12 col-sm-12 col-md-12 text-left">
            <button type="submit" class="btn btn-primary">Salvează</button>
        </div>

</form>
@endsection