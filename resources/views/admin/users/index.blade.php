@extends('layouts.admin')
@section('content')
@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
    @endif
<div class="bg-light p-4 rounded">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.create') }}"> Adaugă client</a>
            </div>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <table class="table table-bordered">
                    <tr>
                        <th>Nr</th>
                        <th>Nume</th>
                        <th>Prenume</th>
                        <th>Email</th>
                        <th>Creat</th>
                        <th width="150px">Acțiune</th>
                    </tr>
                    @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->fname }}</td>
                        <td>{{ $user->lname }}</td>
                        <td>{{ $user->email }}</td>

                        <td>{{$user -> created_at}}</td>
                        <td>
                            <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('users.show',$user->id) }}"><span class="fa fa-info-circle"></a>
                                <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-pencil"></i></a>
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
</div></br>
<div style="padding-left: 50%;">
{!! $users->links() !!}
</div>
@endsection