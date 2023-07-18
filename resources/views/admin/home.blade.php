@extends('layouts.admin')
@section('content')
@if($clienti->count()==0 && $eveniment->count()==0 &&$comenzi->count()==0 &&$anulare->count()==0)
</br>
<h2>Nu există cereri din partea clienților! </h2>
@else
@if($anulare->count()>0)
<div class="container">
    <h2>Cereri pentru anularea comenzii</h2>
</div>
<div class="bg-light p-4 rounded">
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
        @foreach ($anulare as $comanda)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $comanda->nume }} {{ $comanda->prenume }}</td>
            <td>{{ $comanda->total }}</td>
            <td>{{$comanda->plata}}</td>
            <td style="width:250px">
                <form action="{{ route('anuleaza.admin',$comanda->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col"> <button type="submit" class="btn btn-danger">Anulează comanda</button></div>
                    </div>
                </form>

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
    <hr>
</div>
@endif
@if($clienti->count()>0)
<div class="container">
    <h2>Cereri pentru ștergerea contului</h2>
</div>
<div class="bg-light p-4 rounded">
    <table class="table table-striped">
        <thead>
            <tr>
                <table class="table table-bordered">
                    <tr>
                        <th>Nr</th>
                        <th>Nume client</th>
                        <th>Email</th>
                        <th>Creat</th>
                        <th width="150px">Șterge</th>
                    </tr>
                    @php $i=1; @endphp
                    @foreach($clienti as $user)
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $user->fname }} {{ $user->lname }}</td>
                        <td>{{ $user->email }}</td>

                        <td>{{$user -> created_at}}</td>
                        <td>
                            <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('users.show',$user->id) }}"><span class="fa fa-info-circle"></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><span class="fa fa-remove"></span></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>


            </tr>
        </thead>
    </table>
</div>
<hr>
@endif
@if($eveniment->count()>0)
<div class="container">
    <h2>Cereri pentru planificări evenimente</h2>
</div>
<div class="bg-light p-4 rounded">
    <table class="table table-striped">
        <thead>
            <tr>
                <table class="table table-bordered">
                    <tr>
                        <th>Nr</th>
                        <th>Nume client</th>
                        <th>Email</th>
                        <th>Creat</th>
                        <th></th>
                    </tr>
                    @php $i=1; @endphp
                    @foreach($eveniment as $user)
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $user->fname }} {{ $user->lname }}</td>
                        <td>{{ $user->email }}</td>

                        <td>{{$user -> created_at}}</td>
                        <td>
                            <form action="{{ route('contactat') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <strong style="color:red"> client necontactat</strong>
                                    </div>
                                    <input type="hidden" class="status" name="status" value="1">
                                    <input type="hidden" class="id" name="id" value="{{$user->id}}">
                                    <div class="col"> <button type="submit" class="btn btn-success" style="width:40px;height:35px"><i class="fa-solid fa-check"></i></button></div>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>


            </tr>
        </thead>
    </table>
</div>
<hr>
@endif
@if($comenzi->count()>0)
<div class="container">
    <br>
    <h2>Comenzi nelivrate</h2>
    </br>
</div>
<div class="bg-light p-4 rounded">
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
            <td style="width:250px">
                <form action="{{ route('livreaza') }}" method="POST">
                    @csrf
                    <div class="row">
                        <input type="hidden" class="status" name="status" value="1">
                        <input type="hidden" class="id" name="id" value="{{$comanda->id}}">
                        <div class="col"> <button type="submit" class="btn btn-success">Livrează comanda</button></div>
                    </div>
                </form>

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
    <hr>
    @endif
</div>
@endif
@endsection