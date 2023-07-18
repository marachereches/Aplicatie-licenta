@extends('layouts.admin')
@section('content')
<br>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h4> Detalii</h4>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('produs.edit',$produs->id) }}"><i class="fa fa-pencil"></i></a>
            <a class="btn btn-primary" href="{{ route('produs.index') }}"> Înapoi</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nume:</strong>
            {{ $produs->nume }}
        </div>
    </br>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Descriere:</strong>
            {{ $produs->descriere }}
        </div></br>
        <div class="form-group">
            <strong>Cod:</strong>
            {{ $produs->cod }}
        </div></br>

        <div class="form-group">
            <strong>Preț:</strong>
            {{ $produs->pret }} lei
        </div></br>
        <div class="form-group">
            <strong>Stoc:</strong>
            {{ $produs->stoc }}
        </div>
        <div class="form-group">
            <strong>Cod categorie:</strong>
            {{ $produs->cat }}
        </div>
    </div>
</div></br>
<div class="row">
    <div class="col">
        <strong>Imagine:</strong>
    </div>
    <div class="col" style="padding-right: 60%;">

        <image style="width:400px;height:360px" src="{{ asset('storage/produse/'.$produs->image) }}">
    </div>
</div>
@endsection