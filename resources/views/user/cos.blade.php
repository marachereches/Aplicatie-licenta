@extends('layouts.nav')
@section('content')
<h3>Cos</h3>
@if($produse->count()>0)
<table class="table my-3 ">
    <thead>
        <tr>
            <th class="col"></th>
            <th class="col">Produs</th>
            <th class="col">Cantitate</th>
            <th class="col">Preț</th>
            <th class="col">Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @php $i=1;$sub=0;$total=0; @endphp
        @foreach($produse as $produs)
        <tr class="date_prod">
            <td>{{$i++}}</td>
            <td><img src="{{ asset('storage/produse/'.$produs->produsecos->image) }}" alt="" width="150" height="150">
                <span>{{$produs->produsecos->nume}}</span>
            </td>
            <td>
                <div class="buttons d-flex flex-row mt-5 gap-3" style="font-size: small;">
                    <input type="hidden" value="{{$produs->prod_id}}" class="prod_id">
                    @if($produs->produsecos->stoc >= $produs->cant)
                    @php $sub=$produs->produsecos->pret * $produs->cant;$total+=$sub; @endphp
                    @if($produs->cant==1)
                    @if($produs->produsecos->stoc == $produs->cant)
                    @if($produs->produsecos->stoc ==1)
                    <input readonly type="text" name="cantitate" class="form-control cant text-center" value="{{$produs->cant}}" style="width:40px;font-size: small;">
                    <span>Ultima bucată</span>
                    @else
                    <span class="input-group-text " style="width:30px;font-size: small;" >-</span>
                    <input readonly type="text" name="cantitate" class="form-control cant text-center" value="{{$produs->cant}}" style="width:40px;font-size: small;">
                    <span>Ultimele bucăți</span>
                    @endif
                    @else
                    <span class="input-group-text " style="width:30px;font-size: small;">-</span>
                    <input readonly type="text" name="cantitate" class="form-control cant text-center" value="{{$produs->cant}}" style="width:40px;font-size: small;">
                    <span class="input-group-text  schimba increment-btn" style="width:30px;font-size: small;">+</span>
                    @endif
                    @elseif($produs->cant==10)
                    @if($produs->produsecos->stoc == $produs->cant)
                    @if($produs->produsecos->stoc ==1)

                    <input readonly type="text" name="cantitate" class="form-control cant text-center" value="{{$produs->cant}}" style="width:40px;font-size: small;">
                    <span>Ultima bucată</span>
                    @else
                    <span class="input-group-text schimba decrement-btn" style="width:30px;font-size: small;">-</span>
                    <input readonly type="text" name="cantitate" class="form-control cant text-center" value="{{$produs->cant}}" style="width:40px;font-size: small;">
                    <span>Ultimele bucăți</span>
                    @endif
                    @else
                    <span class="input-group-text schimba decrement-btn" style="width:30px;font-size: small;">-</span>
                    <input readonly type="text" name="cantitate" class="form-control cant text-center" value="{{$produs->cant}}" style="width:40px;font-size: small;">
                    <span class="input-group-text " style="width:30px;font-size: small;">+</span>
                    <small style="color:red">*Maximul cantității a fost atins</small>
                    @endif
                    @else
                    @if($produs->produsecos->stoc == $produs->cant)
                    @if($produs->produsecos->stoc ==1)
                    <input readonly type="text" name="cantitate" class="form-control cant text-center" value="{{$produs->cant}}" style="width:40px;font-size: small;">
                    <span>Ultima bucată</span>
                    @else
                    <span class="input-group-text schimba decrement-btn" style="width:30px;font-size: small;">-</span>
                    <input readonly type="text" name="cantitate" class="form-control cant text-center" value="{{$produs->cant}}" style="width:40px;font-size: small;">
                    <span>Ultimele bucăți</span>
                    @endif
                    @else
                    <span class="input-group-text schimba decrement-btn" style="width:30px;font-size: small;">-</span>
                    <input readonly type="text" name="cantitate" class="form-control cant text-center" value="{{$produs->cant}}" style="width:40px;font-size: small;">
                    <span class="input-group-text  schimba increment-btn" style="width:30px;font-size: small;">+</span>
                    @endif
                    @endif
                    @else

                    <span>Produsul nu mai este disponibil</span>
                    @endif
                </div>


            </td>
            <td>{{$produs->produsecos->pret}} lei</td>
            <td>{{$sub}} lei</td>
            <td><button class="btn sterge "><i class="fa-solid fa-trash"></i></button></td>
        </tr>
        @endforeach
        <tr>
            <p style="text-align: right;"><strong>Total:</strong> {{$total}} lei</p>
        </tr>
    </tbody>
</table>
<div class="d-grid gap-8 d-md-block">
    <button class="btn btn-outline-secondary "><a style="text-decoration:none;color:black" href="{{ url()->previous() }}">Înapoi</a></button>
    <button style="float: right;" class="btn  btn-outline-success"><a style="text-decoration: none;color:black" href="{{ route('checkout') }}">Checkout</a></button>
</div>
@else<h5>Coșul este gol</h5>
@endif
@endsection