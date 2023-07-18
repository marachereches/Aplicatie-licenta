@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Verificare adresă de email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un link de verificare a fost trimis .') }}
                        </div>
                    @endif

                    {{ __('Adresa dvs de email nu a fost verificată.') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
