@vite(['resources/scss/app.scss', 'resources/js/app.js'])
<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div  style="background-color: rgb(51, 51, 51);padding-left:45%">
                    <img src="{{$message->embed('imagini/logo/bloom2.png')}}" width="100" >
                </div>
                <div class="invoice p-5">
                    <h1>Mulțumim pentru comandă!</h1>
                    <span class="font-weight-bold d-block mt-4">Bună {{Auth::user()->fname}} {{Auth::user()->lname}}, </span>
                    <p>Detaliile comenzii:</p>
                    <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>
                                            <span class="d-block"><strong>Data</strong></span>
                                            <span>{{$comanda->created_at->toDateString()}}</span>
                                    </td>
                                    <td>
                                            <span class="d-block"><strong>Nr comanda</strong></span>
                                            <span>{{$comanda->nr}}</span>
                                    </td>
                                    <td>
                                            <span class="d-block"><strong>Metodă de plată</strong></span>
                                            <span>{{$comanda->plata}}</span>
                                    </td>
                                </tr>
                                <td>
                                    <div>
                                        <p><strong>Nume destinatar: </strong>{{$comanda->nume.' '.$comanda->prenume}}</p>
                                        <p><strong>Email: </strong>{{$comanda->email}}</p>
                                        <p><strong>Număr de telefon: </strong>0{{$comanda->telefon}}</p>
                                        <p><strong>Adresă livrare: </strong>{{$comanda->adresa.', '.$comanda->oras.", ".$comanda->tara}}</p>
                                        <p><strong>Cod poștal: </strong>{{$comanda->codp}}</p>
                                    </div>
                                </td>

                            </tbody>
                        </table>
                    </div>
                    <div class="product border-bottom table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                @foreach($comanda->produseComanda as $prod)
                                <tr>
                                    <td width="20%">
                                        <img src="{{  $message->embed('storage/produse/'.$prod->produseCom->image)}}" width="90">
                                    </td>
                                    <td width="60%">
                                        <span class="font-weight-bold">{{$prod->produseCom->nume}}</span>
                                        <div class="product-qty">
                                            <span class="d-block">Cantitate: {{$prod->cant}}</span>
                                            <span class="d-block">Preț: {{$prod->produseCom->pret}} lei</span>
                                        </div>
                                    </td>
                                    <td width="20%">
                                        <div class="text-right">
                                            <span class="font-weight-bold">Subtotal: {{$prod->pret}} lei</span>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row d-flex justify-content-end">
                        <div class="col-md-5">
                            <table class="table table-borderless">
                                <tbody class="totals">
                                    <tr class="border-top border-bottom">
                                        <td>
                                            <div class="text-right">
                                                <h3>Total</h3>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-right">
                                                <h4>{{$comanda->total}} lei</h4>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <p>În momentul livrarii veți fi notificat printr-un email!</p>
                </div>
            </div>
        </div>
    </div>