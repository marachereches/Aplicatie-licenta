@extends('layouts.nav')
@section('content')

<div class="d-flex align-items-start">
    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <button class="btn active" id="v-pills-comenzi-tab" data-bs-toggle="pill" data-bs-target="#v-pills-comenzi" role="tab" aria-controls="v-pills-comenzi" aria-selected="true">Comenzi</button>
        <button class="btn " id="v-pills-cont-tab" data-bs-toggle="pill" data-bs-target="#v-pills-cont" role="tab" aria-controls="v-pills-cont" aria-selected="false">Profil</button>

    </div>
    <div class="tab-content" id="v-pills-tabContent" style="width: 100%;">
        <div class="tab-pane fade " id="v-pills-cont" role="tabpanel" aria-labelledby="v-pills-cont-tab">
            <div class="row">
                <div class="col">
                    <h5 style="text-align: center;">Informații cont</h5>
                </div>
                <div class="col-sm-1"><button class="btn btn-dark"><a style="text-decoration: none;color:white" href="{{route('info')}}">Editează</a></button>
                </div>
            </div>

            <div>
                </br></br>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Nume</label>
                        <input type="text" class="form-control" value="{{Auth::user()->fname}}" name="nume" placeholder="">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Prenume</label>
                        <input type="text" class="form-control" value="{{Auth::user()->lname}}" name="prenume" placeholder="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="email">Email <span class="text-muted"></span></label>
                        <input type="email" class="form-control" value="{{Auth::user()->email}}" name="email">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="zip">Telefon</label>
                        <input type="number" class="form-control" maxlength="10" value="{{Auth::user()->telefon}}" size="10" name="telefon" placeholder="0712345678" required>

                    </div>
                </div></br>
                <h6 class="mb-3">Adresă de livrare</h6>
                </br>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="address">Țară</label>
                        <input type="text" class="form-control" value="{{Auth::user()->tara}}" name="tara" placeholder="" required>

                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="address">Oraș</label>
                        <input type="text" class="form-control" value="{{Auth::user()->oras}}" name="oras" placeholder="" required>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9 mb-3">
                        <label for="address">Adresă</label>
                        <input type="text" class="form-control" name="adresa" value="{{Auth::user()->adresa}}" placeholder="strada, numar, etaj, apartanemt" required>

                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="zip">Cod poștal</label>
                        <input type="number" maxlength="6" size="6" value="{{Auth::user()->codp}}" class="form-control" name="codpostal" placeholder="123456" required>

                    </div>

                </div></br>
                <h6 class="mb-3">Informații card</h6></br>
                <div class="row">
                    <div class="row" id="datecard1">
                        <div class="col-md-6 mb-3">
                            <label for="cc-name">Nume</label>
                            <input type="text" class="form-control" name="numec" value="{{Auth::user()->fname.' '.Auth::user()->lname}}">
                            <div class="invalid-feedback">
                                Câmp obligatoriu
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cc-number">Numărul de pe card</label>
                            <input type="text" class="form-control" name="nr" value="{{Auth::user()->nrcard}}" placeholder="">
                            <div class="invalid-feedback">
                                Câmp obligatoriu
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cc-number">Dată expirare card</label>
                            <input type="text" class="form-control" name="data" value="{{Auth::user()->datacard}}" placeholder="">
                            <div class="invalid-feedback">
                                Câmp obligatoriu
                            </div>
                        </div>
                    </div>

                </div>


            </div>
            <a href="{{ route('cont.sterge',Auth::user()->id) }}" class="btn btn-outline-danger" onclick="return confirm('Sunteti sigur ca doriti sa stergeti acest cont?');">ȘTERGE CONTUL</a>
        </div>
        <div class="tab-pane fade show active" id="v-pills-comenzi" role="tabpanel" aria-labelledby="v-pills-comenzi-tab">
            <h5 style="text-align: center;">Comenzile mele</h5></br>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Nr</th>
                        <th scope="col">Total</th>
                        <th scope="col">Status</th>
                        <th scope="col">Dată plasare comandă</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @php $i=1;@endphp
                    @foreach($comenzi as $comanda)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$comanda->nr}}</td>
                        <td>{{$comanda->total}}</td>
                        <td>@if($comanda->status ==0 || $comanda->status==2)procesată @elseif($comanda->status==1) livrată @else anulată @endif</td>
                        <td>{{$comanda->created_at}}</td>

                        <td><a href="{{route('detaliicomanda', $comanda->id)}}">Detalii</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


        </div>

    </div>
</div>
@endsection
@section('scripts')
<script type="module">
    $(function() {
        $('input').attr('disabled', 'disabled');

    });
</script>
@endsection