<div class="might-like-section">
    <div class="container">
        <h3>También podría gustarte...</h3>
        <div class="might-like-grid">
            @foreach ($mightAlsoLike as $pro)

                <a href="{{ route('shop.show', $pro->idproducto) }}" class="might-like-product">
                    <img class="card-img-top" src="{{asset('img/productos/'.$pro->foto)}}" alt="{{$pro->nombre}}" height="160px" width="160px">
                    <div class="might-like-product-name">{{ $pro->nombre }}</div>
                    <div class="might-like-product-price">$ {{ $pro->precio }}</div>
                </a>
            @endforeach

        </div>
    </div>
</div>
