<div style="background-color: rgb(51, 51, 51);padding-left:45%">
    <img src="{{$message->embed('imagini/logo/bloom2.png')}}" width="100">
</div>


<h1>Email pentru resetarea parolei</h1>

Pentru a vă reseta parola, accesați următorul link:
<a href="{{ route('resetare.parola', $token) }}"><button style ="background: #d4af7a;color:white"class="btn ">Resetare parolă</button></a>