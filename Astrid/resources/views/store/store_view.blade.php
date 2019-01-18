@extends('layouts.store')

@section('title', 'Productos')

@section('extra-css')


@endsection

@section('content')

    <div class="breadcrumbs">
        <div class="container">
            <a href="/inicio">Inicio</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <span>Tienda</span>
        </div>
    </div> <!-- end breadcrumbs -->

    <div class="products-section container">

        <div class="sidebar">
            <h3>Categorias</h3>
            <ul>
                @foreach ($categorias as $cat)
                   <!-- <li><a href="{{url('/categoria/'.$cat->idcategoria)}}" class="list-group-item"> {{$cat->nombre}}</a></li>-->
                    <li><a href="{{url('/mostrar/categoria/'.$cat->idcategoria)}}" class="list-group-item"> {{$cat->nombre}}</a></li>
                @endforeach
            </ul>
        </div> <!-- end sidebar -->
        <div>
            <div class="products-header">
                <h1 class="stylish-heading">{{$nombreCategoria}}</h1>
                <div>
                    <strong>Precio: </strong>
                    <a href="{{ route('shop.index', ['ordenar' => 'low_high']) }}">Bajo a Alto</a> 
                    |<a href="{{ route('shop.index', ['ordenar' => 'high_low']) }}">Alto a Bajo</a>

                </div>
            </div>   

            <div class="products text-center">
                @forelse ($productos as $pro)
                    <div class="product">
                        <a href="{{ route('shop.show', $pro->idproducto) }}"><img src="{{asset('img/productos/'.$pro->foto)}}" alt="{{$pro->nombre}}" height="170px" width="170px"> </a>

                        <a href="{{ route('shop.show', $pro->idproducto) }}"><div class="product-name">{{$pro->nombre}}</div></a>
                        <div class="product-price">${{$pro->precio}}</div>
                    </div>
                @empty
                    <div style="text-align: left">No se encontraron artículos</div>
                @endforelse
            </div> <!-- end products -->

            <div class="spacer"></div>
            {{ $productos->appends(request()->input())->links() }}
        </div>
    </div>


@endsection
