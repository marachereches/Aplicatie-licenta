@extends('layouts.admin')

@section('content')
<br>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h4>Editează eveniment</h4>
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
A apărut o eroare la intoducerea datelor
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('eveniment.update',$eveniment->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="right">
        <a class="btn btn-primary" href="{{ route('eveniment.index') }}"> Înapoi</a>
        <span style="padding-left:85%;"> <button type="submit" class="btn btn-primary">Salvează</button></span>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nume:</strong>
                <input type="text" name="nume" value="{{ $eveniment->nume }}" class="form-control">
            </div>
        </div>
    </div>
</form>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Imagini:</strong>

        <form action="{{ route('imagine.adauga',$eveniment->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <input style="width:500px" type="file" name="imagini[]" class="form-control" accept="image/*" multiple>&nbsp
                <button type="submit" class="btn btn-success" style="width:40px;height:35px"><i class="fa-solid fa-plus"></i></button>
            </div>
        </form>

    </div>
</div>
<div>
    </br>
</div>
<div class="row">
    @foreach ($images as $image)

    <image style="width:350px;height:260px;padding-bottom:2%" src="{{ asset('storage/evenimente/'.$image->imagine)}}">

        <a href="{{ route('imagine.sterge',$image->id) }}" style="width:40px;height:35px" class="btn btn-danger"><span class="fa fa-remove"></span></a>
  
        @endforeach
</div>


@endsection