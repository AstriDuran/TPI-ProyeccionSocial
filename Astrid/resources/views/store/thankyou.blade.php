@extends('layouts.store')

@section('title', '¡Gracias!')

@section('extra-css')

@endsection

@section('body-class', 'sticky-footer')

@section('content')

   <div class="thank-you-section">
       <h1>¡Gracias por realizar<br> Su orden!</h1>
       <p>Se envió un correo electrónico de confirmación. </p>
       <div class="spacer"></div>
       <div>
           <a href="{{ url('/') }}" class="button">Pagina de Inicio</a>
       </div>
   </div>


@endsection
