@extends('layouts.admin')

@section('content')
<br>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h4>Editează produs</h4>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('produs.index') }}"> Înapoi</a>
        </div>
    </div>
</div>
@if(session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
A apărut o eroare la intoducerea datelor
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('produs.update',$produs->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nume:</strong>
                <input type="text" name="nume" value="{{ $produs->nume }}" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descriere:</strong>
                <textarea class="form-control" style="height:150px" name="descriere">{{ $produs->descriere }}</textarea>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Cod:</strong>
                    <input type="number" name="cod" class="form-control" value="{{ $produs->cod }}">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Preț:</strong>
                            <input type="decimal" name="pret" class="form-control" value="{{ $produs->pret }}">
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Stoc:</strong>
                                <input type="number" name="stoc" class="form-control" value="{{ $produs->stoc }}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Cod categorie:</strong>
                                <input type="number" name="cat" class="form-control" value="{{ $produs->cat }}" placeholder="1-BUCHETE, 2-ARANJAMENTE, 3-PLANTE">
                            </div>
                        </div>
                        <div class="form-group">
                            <strong>Imagine:</strong>
                            <div class="row">
                                <input type="file" class="form-control" name="image" style="width:20%;height:10%">
                                @if($produs->image)
                                <img src="{{ asset('storage/produse/'.$produs->image) }}" style="height: 200px;width:230px;">

                                <a href="{{ route('img.sterge',$produs->id) }}" style="width:40px;height:35px" class="btn btn-danger"><span class="fa fa-remove"></span></a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                        <button type="submit" class="btn btn-primary">Salvează</button>
                    </div>
                </div>

</form>
@endsection