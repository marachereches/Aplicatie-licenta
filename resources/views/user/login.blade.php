<!DOCTYPE html>
<html>

<head>
@vite(['resources/js/app.js'])
    <link href="{{asset('assets/css/stylelog.css')}}" rel="stylesheet" />
</head>
@if(Session::has('error'))
<p class="alert alert-info">{{ Session::get('error') }}</p>
@endif

<body>

    <div class="cont">
        <div class="form sign-in">
            <form method="POST" action="{{ route('user.handleLogin') }}">
                @csrf
                <h2>Autentificare</h2>
                <label>
                    <span>Email</span>
                    <input type="text" id="email" class="form-control" name="email" spellcheck="false" required autofocus>
                    @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </label>
                <label>
                    <span>Parolă</span>
                    <input type="password" id="password" class="form-control" name="password" spellcheck="false" required>
                    @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </label>

                <button type="submit" class="submit">Autentificare</button>
                <h6 class="forgot-pass"><a style=" color:black" href="{{route('parola.uitata')}}">Am uitat parola</a></h6>
            </form>
        </div>
        <div class="sub-cont">
            <div class="img">
                <div class="img__text m--up">

                    <a href="{{ route('user.home') }}" class="navbar-brand d-lg-block"><img src="{{asset('imagini/logo/bloom2.png')}}" style="width:210px;height:150px"></a>
                </div>
                <div class="img__text m--in">

                    <a href="{{ route('user.home') }}" class="navbar-brand d-lg-block"><img src="{{asset('imagini/logo/bloom2.png')}}" style="width:210px;height:150px"></a>

                </div>
                <div class="img__btn">
                    <span class="m--up">Cont nou</span>
                    <span class="m--in">Log in</span>
                </div>
            </div>
            <div class="form sign-up">
                <form action="{{ route('user.inregistrare') }}" method="POST">
                    @csrf
                    <h2>Înregistrare</h2>
                    <label>
                        <span>Nume</span>
                        <input type="text" id="fname" class="form-control" name="fname" spellcheck="false" required autofocus>
                        @if ($errors->has('fname'))
                        <span class="text-danger">{{ $errors->first('fname') }}</span>
                        @endif
                    </label>
                    <label>
                        <span>Prenume</span>
                        <input type="text" id="lname" class="form-control" name="lname" spellcheck="false" required autofocus>
                        @if ($errors->has('lname'))
                        <span class="text-danger">{{ $errors->first('lname') }}</span>
                        @endif
                    </label>
                    <label>
                        <span>Email</span>
                        <input type="email" id="email_address" class="form-control" name="email" spellcheck="false" required autofocus>
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </label>
                    <label>
                        <span>Parolă</span>
                        <input type="password" id="password" class="form-control" name="password" spellcheck="false" required>
                        @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </label>
                    <label>
                        <span>Confirmă parola</span>
                        <input type="password" id="password_confirmation" spellcheck="false" class="form-control" name="password_confirmation" required>
                        @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif

                    </label>
                    <button type="submit" class="submit">Înregistrare</button>
                </form>
            </div>
        </div>
    </div>

    <script src="{{asset('assets/js/scripturi.js')}}" type="module" crossorigin="anonymous"></script>

</body>

</html>