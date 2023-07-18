@extends('layouts.admin')
@section('content')
<br>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h4>Adauga produs</h4>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('produs.index') }}"> Inapoi</a>
        </div>
    </div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
    Eroare la introducere.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ route('produs.store') }}" method="POST"  enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nume:</strong>
                <input type="text" name="nume" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descriere:</strong>
                <textarea class="form-control" style="height:150px" name="descriere" placeholder="Descriere"></textarea>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Cod:</strong>
                    <input type="number" name="cod" class="form-control" placeholder="Cod">
                </div>
                <div class="form-group">
                    <strong>Preț:</strong>
                    <input type="decimal" name="pret" class="form-control" placeholder="Pret">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Stoc:</strong>
                        <input type="number" name="stoc" class="form-control" placeholder="Stoc">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Cod categorie:</strong>
                        <input type="number" name="cat" class="form-control" placeholder="1-BUCHETE, 2-ARANJAMENTE, 3-PLANTE">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Imagine:</strong>
                        <input type="file" class="form-control" name="image" @error('image') is-invalid @enderror>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                <button type="submit" class="btn btn-primary">Salvează</button>
            </div>
        </div>
</form>
@endsection