 @extends('layouts.nav')
 @section('content')
 <h1 style="text-align: center;">Evenimente disponibile</h1></br></br>
 <h6>Evenimentele se planifică telefonic. <h6><br>
 @foreach($eveniment as $evenimente)
 <div class="row" style="height:80%;">
     <div class="col-9">
         <div  id="{{$evenimente->nume}}" class="carousel slide  carousel-dark">
             <div class="carousel-inner">
                 @foreach ($evenimente->imagini as $image)
                 @if ($loop->first)
                 <div class="carousel-item active ">
                     <image style="height:500px;margin: 0 auto;" src="{{ asset('storage/evenimente/'.$image->imagine)}}" class="d-block">
                 </div>
                 @else
                 <div class="carousel-item  " >
                     <image style="height:500px;margin: 0 auto;" src="{{ asset('storage/evenimente/'.$image->imagine)}}" class="d-block">
                 </div>
                 @endif
                 @endforeach
             </div>
             <button class="carousel-control-prev" type="button" data-bs-target="#{{$evenimente->nume}}" data-bs-slide="prev">
                 <span class="carousel-control-prev-icon" aria-hidden="true"></span>
             </button>
             <button class="carousel-control-next" type="button" data-bs-target="#{{$evenimente->nume}}" data-bs-slide="next">
                 <span class="carousel-control-next-icon" aria-hidden="true"></span>
             </button>
         </div>
     </div>
     <div class="col-3">
         <h5 style="padding-top:75%; padding-left:20%">Aranjamente pentru {{$evenimente->nume}}</h5>
         <h6 style="padding-left:50%"><a href="{{route('planifica.eveniment', $evenimente->id)}}" style="color:black;"><button class="btn btn-outline-warning" type="submit" onclick="return confirm('Sunteți sigur că doriți să fiți contactat în legătură cu planificarea unui eveniment?');"  >Planifică</button></a></h6>
     </div>
     <hr>
     </br>
 </div>

 @endforeach
 @endsection