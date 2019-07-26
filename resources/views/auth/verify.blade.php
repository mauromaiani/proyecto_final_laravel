@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="">
                <div class="__tituloPosteo">{{ __('Verificar correo electronico') }}</div>

                <div class="card-body __textoFollow">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Te enviamos un email con un link para volver a ingresar tu contraseña.') }}
                        </div>
                    @endif

                    {{ __('Revisa tu casilla de correo.') }}
                    {{ __('Si no recibiste ningun email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
