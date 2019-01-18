@extends('layouts.store')

@section('title', 'Pedidos')

@section('extra-css')

<!-- Estilo de calendarios -->
<link rel="stylesheet" href="{{asset('admin/css/tcal.css')}}"></script>

@endsection

@section('content')

    <div class="container">

        @if (session()->has('success_message'))
            <div class="spacer"></div>
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="spacer"></div>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <br><h2 class="checkout-heading stylish-heading">Solicitud de Pedido</h2>
        <div class="checkout-section">

            <div>
                <form action="{{ route('checkout.store') }}" method="POST" id="payment-form">
                    {{ csrf_field() }}
                    <h4>Detalles de Entrega</h4><br>

            
                    <div class="form-group">
                       <label for="direccion" class="col-md-4 control-label">Dirección</label>
                       <input type="text" name="direccion" required value="{{old('direccion')}}" class="form-control" placeholder="Dirección...">
                    </div>

                    <div class="half-form">
                        <div class="form-group">
                          <label for="fechaentrega">Fecha de entrega:</label>
                          <input type="text" name="fechaentrega" class="tcal form-control" id="fechaentrega" required value="{{old('fechaentrega')}}" class="form-control" placeholder="00/00/0000" >
                        </div>

                        <div class="form-group">
                            <label for="province">Hora de entrega:</label>
                            <input type="time" id="horaentrega" name="horaentrega" required value="{{old('horaentrega')}}">
                        </div>
                    </div> <!-- end half-form -->

                    @foreach (Cart::content() as $item)
                    <div class="row">
                        <div>
                            <div class="form-group">
                            <input type="hidden" name="idproducto[]" id="idproducto"  value="{{$item->id}}" >
                            <input type="hidden" name="nombreproducto[]" id="nombreproducto"  value="{{$item->model->nombre}}" >
                            <input type="hidden" name="cantidad[]" id="cantidad"  value="{{$item->qty}}" >
                            <input type="hidden" name="precio[]" id="precio"  value="{{$item->model->precio}}" >
                        </div> <!-- edn inputs -->
                        </div>
                    </div> <!-- end checkout-table-row -->
                    @endforeach

                    <button type="submit" id="complete-order" class="button-primary full-width">Completar Pedido</button>

                </form>
            </div>

           



            <div class="checkout-table-container">
                <h3>Su Orden:</h3> 

                <div class="checkout-table">
                    @foreach (Cart::content() as $item)
                    <div class="checkout-table-row">
                        <div class="checkout-table-row-left">
                            <img src="{{ asset('img/productos/'.$item->model->foto) }}" alt="item" class="checkout-table-img">
                            <div class="checkout-item-details">
                                <div class="checkout-table-item">{{ $item->model->nombre }}</div>
                                <div class="checkout-table-description">{{ $item->model->detalles }}</div>
                                <div class="checkout-table-price">{{ $item->model->precio }}</div>
                            </div>
                        </div> <!-- end checkout-table -->

                        <div class="checkout-table-row-right">
                            <div class="checkout-table-quantity">{{ $item->qty }}</div>
                        </div>
                    </div> <!-- end checkout-table-row -->
                    @endforeach



                </div> <!-- end checkout-table -->

                <div class="checkout-totals">
                    <div class="checkout-totals-left">
                        Subtotal <br>
                        {{-- Descuento (10OFF - 10%) <br> --}}
                        IVA (13 %) <br>
                        <span class="checkout-totals-total">Total</span>

                    </div>

                    <div class="checkout-totals-right">
                        {{ Cart::subtotal() }} <br>
                        {{-- -$750.00 <br> --}}
                        {{ Cart::tax() }} <br>
                        <span class="checkout-totals-total">{{ Cart::total() }}</span>

                    </div>
                </div> <!-- end checkout-totals -->

            </div>

        </div> <!-- end checkout-section -->
    </div>

@endsection

@section('extra-js')

<script type="text/javascript" src="{{asset('admin/js/tcal.js')}}"></script>
<script src="https://js.stripe.com/v3/"></script>

@endsection
