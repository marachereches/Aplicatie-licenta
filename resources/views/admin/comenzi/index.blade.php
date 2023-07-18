@extends('layouts.admin')
@section('content')
<br>
@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
    @endif
@if($comenzi->count()==0)
<h3>Nu există comenzi de acest tip!</h3>
@else
<div class="bg-light p-4 rounded">
    <div class="row">
        <table class="table table-bordered">
            <tr>
                <th>Nr</th>
                <th>Nume client</th>
                <th>Total</th>
                <th>Plată</th>
                <th>Status</th>
                <th>Creat</th>
                <th width="150px">Acțiune</th>
            </tr>
            @foreach ($comenzi as $comanda)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $comanda->nume }} {{ $comanda->prenume }}</td>
                <td>{{ $comanda->total }}</td>
                <td>{{$comanda->plata}}</td>
                <td>@if($comanda->status==1)<strong style="color:green">livrata</strong>@elseif($comanda->status==0)
                    <form action="{{ route('livreaza') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <strong style="color:red"> nelivrată</strong>
                            </div>
                            <input type="hidden" class="status" name="status" value="1">
                            <input type="hidden" class="id" name="id" value="{{$comanda->id}}">
                            <div class="col"> <button type="submit" class="btn btn-outline-success" style="width:40px;height:35px"><i class="fa-solid fa-check"></i></button></div>
                        </div>
                    </form>
                    @elseif($comanda->status==3)
                    <strong style="color:gray">anulată</strong>
                    @else
                    <form action="{{ route('anuleaza.admin',$comanda->id) }}" method="POST">
                        @csrf

                        <div class="col" style="display:inline">
                            <strong style="color:black;">cerere pentru anulare</strong>
                        </div>
                        <div class="col" style="display:inline;margin-left:20px">
                            <button type="submit" class="btn btn-outline-danger" ><i class="fa fa-remove"></i></button>
                        </div>
                    </form>

                    @endif
                </td>
                <td>{{ $comanda->created_at }}</td>
                <td>
                    <form action="{{ route('comanda.destroy',$comanda->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('comanda.show',$comanda->id) }}"><span class="fa fa-info-circle"></span></a>
                        <a class="btn btn-primary" href="{{ route('comanda.edit',$comanda->id) }}"><i class="fa fa-pencil"></i></a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><span class="fa fa-remove"></span></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    @endif
</div></br>
<div style="padding-left: 50%;">
{{$comenzi ->links()}}
</div>
@endsection