@extends('layouts.admin')
@section('content')
<br>
@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
    @endif
<div class="bg-light p-4 rounded">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('produs.create') }}"> Adaugă produs</a>
            </div>
        </div>
    </div>
    <br>
    <table class="table table-bordered">
        <tr>
            <th>Nr</th>
            <th>Produs</th>
            <th>Descriere</th>
            <th>Cod</th>
            <th>Imagine</th>
            <th>Preț</th>
            <th>Stoc</th>
            <th>Cod categorie</th>
            <th>Creat</th>
            <th width="150px">Acțiune</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->nume }}</td>
            <td>{{ $product->descriere }}</td>
            <td>{{$product->cod}}</td>
            <td>
                @if($product->image)
                <img src="{{ asset('storage/produse/'.$product->image) }}" style="height: 100px;width:110px;">
                @else
                <span>Nu există imagine </span>
                @endif
            </td>
            <td>{{ $product->pret }}</td>
            <td>{{ $product->stoc }}</td>
            <td>{{$product->cat}}</td>
            <td>{{ $product->created_at }}</td>
            <td>
                <form action="{{route('produs.destroy',$product->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn-info" href="{{ route('produs.show',$product->id) }}"><span class="fa fa-info-circle"></span></a>
                    <a class="btn btn-primary" href="{{ route('produs.edit',$product->id) }}"><i class="fa fa-pencil"></i></a>
                    <button type="submit" class="btn btn-danger"><span class="fa fa-remove"></span></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div></br>
<div style="padding-left: 50%;">
    {{ $products->links() }}
</div>
@endsection