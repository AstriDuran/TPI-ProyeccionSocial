@extends('layouts.store') 

@section('title', 'Carrito de Compras')

@section('content')

    <div class="breadcrumbs">
        <div class="container">
            <a href="#">Inicio</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <span>Carrito de Compras</span>
        </div>
    </div> <!-- end breadcrumbs -->

    <div class="cart-section container">
        <div>
            @if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (Cart::count() > 0)

            <h2>{{ Cart::count() }} Articulo(s) en el Carrito</h2>

            <div class="cart-table">
                @foreach (Cart::content() as $item)
                <div class="cart-table-row">
                    
                    <div class="cart-table-row-left">
                        <a href="{{ route('shop.show', $item->model->idproducto) }}"><img src="{{ asset('img/productos/'.$item->model->foto) }}" alt="item" class="cart-table-img"></a>
                        <div class="cart-item-details">
                            <div class="cart-table-item"><a href="{{ route('shop.show', $item->model->idproducto) }}">{{ $item->model->nombre }}</a></div>
                            <div class="cart-table-item">Precio: $ {{ $item->model->precio }}</div>
                            <div class="cart-table-description">{{ $item->model->detalles }}</div> 
                        </div>
                    </div>

                    <div class="cart-table-row-right"> 
                        <div class="cart-table-actions" >
                            <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="cart-options"><a style="color:red;">Remover</a></button>
                            </form>

                            <form action="{{ route('cart.switchToSaveForLater', $item->rowId) }}" method="POST">
                                {{ csrf_field() }}

                                <button type="submit" class="cart-options"><a style="color:#239B56";>Guardar para más adelante</a></button>
                            </form>
                        </div>

                        <div>
                            <select class="quantity" data-id="{{ $item->rowId }}">
                                @for ($i = 1; $i < 15 + 1 ; $i++)
                                    <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                                {{-- <option {{ $item->qty == 1 ? 'selected' : '' }}>1</option>
                                <option {{ $item->qty == 2 ? 'selected' : '' }}>2</option>
                                <option {{ $item->qty == 3 ? 'selected' : '' }}>3</option>
                                <option {{ $item->qty == 4 ? 'selected' : '' }}>4</option>
                                <option {{ $item->qty == 5 ? 'selected' : '' }}>5</option> 
                                <option {{ $item->qty == 6 ? 'selected' : '' }}>6</option> 
                                <option {{ $item->qty == 7 ? 'selected' : '' }}>7</option> 
                                <option {{ $item->qty == 8 ? 'selected' : '' }}>8</option> 
                                <option {{ $item->qty == 9 ? 'selected' : '' }}>9</option> 
                                <option {{ $item->qty == 10 ? 'selected' : '' }}>10</option> 
                                <option {{ $item->qty == 11 ? 'selected' : '' }}>11</option>
                                <option {{ $item->qty == 12 ? 'selected' : '' }}>12</option> 
                                <option {{ $item->qty == 13 ? 'selected' : '' }}>13</option> 
                                <option {{ $item->qty == 14 ? 'selected' : '' }}>14</option> 
                                <option {{ $item->qty == 15 ? 'selected' : '' }}>15</option> --}}
                            </select>
                        </div>

                        <div> <p>$ {{ $item->subtotal }}</p> </div>
                    </div>
                </div> <!-- end cart-table-row -->
                @endforeach

            </div> <!-- end cart-table -->

            

            <div class="cart-totals">
                <div class="cart-totals-left">
                    Gracias :)
                </div>

                <div class="cart-totals-right">
                    <div>
                        Subtotal: <br>
                        IVA:(13%) <br>
                        <span class="cart-totals-total">Total: </span>
                    </div>
                    <div class="cart-totals-subtotal">
                        {{ Cart::subtotal() }} <br>
                        {{ Cart::tax() }} <br>
                        <span class="cart-totals-total">{{ Cart::total() }}</span>
                    </div>
                </div>
            </div> <!-- end cart-totals -->

            <div class="cart-buttons">
                <a href="{{ route('shop.index') }}" class="button">Continuar Pedido</a>
                <a href="{{ route('checkout.index') }}" class="button-primary">Finalizar Pedido</a> 
            </div>

            @else

                <h3>No hay articulos...!</h3>
                <div class="spacer"></div>
                <a href="{{ route('shop.index') }}" class="button">Ver más articulos</a>
                <div class="spacer"></div>

            @endif

            @if (Cart::instance('saveForLater')->count() > 0)

            <h2>{{ Cart::instance('saveForLater')->count() }} Articulo(s) Guardados</h2>

            <div class="saved-for-later cart-table">
                @foreach (Cart::instance('saveForLater')->content() as $item)
                <div class="cart-table-row">
                    <div class="cart-table-row-left">
                        <a href="{{ route('shop.show', $item->model->idproducto) }}"><img src="{{ asset('img/productos/'.$item->model->foto) }}" alt="item" class="cart-table-img"></a>
                        <div class="cart-item-details">
                            <div class="cart-table-item"><a href="{{ route('shop.show', $item->model->idproducto) }}">{{ $item->model->nombre }}</a></div>
                            <div class="cart-table-description">{{ $item->model->detalles }}</div>
                        </div>
                    </div>
                    <div class="cart-table-row-right">
                        <div class="cart-table-actions">
                            <form action="{{ route('saveForLater.destroy', $item->rowId) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="cart-options"><a style="color:red;">Remover</a></button>
                            </form>

                            <form action="{{ route('saveForLater.switchToCart', $item->rowId) }}" method="POST">
                                {{ csrf_field() }}

                                <button type="submit" class="cart-options"><a style="color:green";>Mover al Carrito</a></button>
                            </form>
                        </div>

                        <div>{{ $item->model->price  }}</div>
                    </div>
                </div> <!-- end cart-table-row -->
                @endforeach

            </div> <!-- end saved-for-later -->

            @else

            <h4>No tiene artículos guardados para después.</h4>

            @endif

        </div>

    </div> <!-- end cart-section -->

@endsection

@section('extra-js')
    <script src="{{ asset('store/js/app.js') }}"></script> 
    
    <script>
        (function(){
            const classname = document.querySelectorAll('.quantity')

            Array.from(classname).forEach(function(element) {
                element.addEventListener('change', function() {
                    const id = element.getAttribute('data-id')
                    axios.patch(`/cart/${id}`, {
                        quantity: this.value
                    })
                    .then(function (response) {
                        // console.log(response);
                        window.location.href = '{{ route('cart.index') }}'
                    })
                    .catch(function (error) {
                        // console.log(error);
                        window.location.href = '{{ route('cart.index') }}'
                    });
                })
            })
        })();
    </script>
@endsection
