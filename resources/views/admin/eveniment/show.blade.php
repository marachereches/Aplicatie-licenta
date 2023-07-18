@extends('layouts.admin')
@section('content')
<br>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h4> Detalii</h4>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('eveniment.edit',$eveniment->id) }}"><i class="fa fa-pencil"></i></a>
            <a class="btn btn-primary" href="{{ route('eveniment.index') }}"> Înapoi</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nume:</strong>
            {{ $eveniment->nume }}
        </div>
    </div>
</div></br>
<div class="row">
    <div class="col">
        <strong>Imagini:</strong>
    </div>
    <div class="row" >
        @foreach ($images as $image)
        <image style="width:300px;height:260px;padding-bottom:2%" src="{{ asset('storage/evenimente/'.$image->imagine)}}">
            @endforeach

    </div>
</div>
@endsection