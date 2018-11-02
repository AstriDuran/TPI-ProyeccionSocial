@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading" style="color:white; border-color:black; background:black;" >¡Hola, bienvenido!</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Para finalizar con el registro se le ha enviado un email. ¡Por favor, verifique su bandeja de mensajes!   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection