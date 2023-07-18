@extends('layouts.admin')
@section('content')
<br>
<div class="bg-light p-4 rounded">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('eveniment.create') }}"> Adaugă eveniment</a>
        </div>
    </div>
</div>
<br>
<table class="table table-bordered">
    <tr>
        <th>Nr</th>
        <th>Eveniment</th>
        <th>Imagini</th>
        <th>Creat</th>
        <th width="150px">Acțiune</th>
    </tr>
    @foreach ($ev as $eveniment)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $eveniment->nume }}</td>
        <td>@if($eveniment->imagini->count()==1)
            o imagine
            @else
            {{$eveniment->imagini->count()}} imagini
            @endif
        </td>
        <td>{{ $eveniment->created_at }}</td>
        <td>
            <form action="{{ route('eveniment.destroy',$eveniment->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('eveniment.show',$eveniment->id) }}"><span class="fa fa-info-circle"></span></a>
                <a class="btn btn-primary" href="{{ route('eveniment.edit',$eveniment->id) }}"><i class="fa fa-pencil"></i></a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><span class="fa fa-remove"></span></button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
</div></br>
<div style="padding-left: 50%;">
    {{ $ev->links() }}
</div>
@endsection