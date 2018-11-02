<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name','Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('store/css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('store/css/responsive.css') }}">

    </head>
    <body>
        <header class="with-background">
            <div class="top-nav container">
                <div class="logo">Lo Mejor en Artículos Diversos.</div>
                
                @if (! request()->is('checkout'))
                <ul>
                    <li><a href="{{ route('shop.index') }}">Store</a></li>

                    <li>
                        <a href="{{ route('cart.index') }}">Cart <span class="cart-count">
                            @if (Cart::instance('default')->count() > 0)
                            <span>{{ Cart::instance('default')->count() }}</span></span>
                            @endif
                        </a>
                    </li>
                
                    @if (Auth::guest())
                    
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                    
                    @else

                            <li><a href="{{ url('/usuario/perfil/'.Auth::user()->id) }}">{{ Auth::user()->username }}</a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                     <i class="fa fa-btn fa-sign-out"></i> Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                    @endif
                    
                </ul>
                @endif
                
            </div> <!-- end top-nav -->
            <div class="hero container">
                <div class="hero-copy">
                    <h1>Productos Diversos.</h1>
                    <p>Empresa dedicada a la elaboración de productos promocionales para tu empresa con la mejor calidad, personalizados segun tus necesidades.</p>
                </div> <!-- end hero-copy -->

                <div class="hero-image">
                    <img src="img/logo.png" alt="hero image">
                </div> <!-- end hero-image -->
            </div> <!-- end hero -->
        </header>
        

        <div class="blog-section">
            <div class="container">

            <!--    <div class="text-center button-container">
                    <a href="#" class="button">Featured</a>
                    <a href="#" class="button">On Sale</a>
                </div>
            -->
                 <h2 class="text-center">Nuestros Productos</h2>

                {{-- <div class="tabs">
                    <div class="tab">
                        Featured
                    </div>
                    <div class="tab">
                        On Sale
                    </div>
                </div> --}}

                <div class="might-like-section">
                    <div class="container">
                        <div class="might-like-grid">
                             @forelse ($productos as $pro)

                                <a href="{{ route('shop.show', $pro->idproducto) }}" class="might-like-product">
                                    <img class="card-img-top" src="{{asset('img/productos/'.$pro->foto)}}" alt="{{$pro->nombreproducto}}" height="160px" width="160px">
                                    <div class="might-like-product-name">{{ $pro->nombreproducto }}</div>
                                    <div class="might-like-product-price">$ {{ $pro->precio }}</div>
                                </a>
                            @empty
                                <div style="text-align: left">No se encontraron artículos</div>
                            @endforelse

                        </div>
                    </div>
                </div>

                <div class="text-center button-container">
                    <a href="{{ route('shop.index') }}" class="button">Ver más productos</a>
                </div>
            <!--
                <h1 class="text-center">From Our Blog</h1>

                <p class="section-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore vitae nisi, consequuntur illum dolores cumque pariatur quis provident deleniti nesciunt officia est reprehenderit sunt aliquid possimus temporibus enim eum hic.</p>

                <div class="blog-posts">
                    <div class="blog-post" id="blog1">
                        <a href="#"><img src="/img/blog1.png" alt="Blog Image"></a>
                        <a href="#"><h2 class="blog-title">Blog Post Title 1</h2></a>
                        <div class="blog-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, tenetur numquam ipsam reiciendis.</div>
                    </div>
                    <div class="blog-post" id="blog2">
                        <a href="#"><img src="/img/blog2.png" alt="Blog Image"></a>
                        <a href="#"><h2 class="blog-title">Blog Post Title 2</h2></a>
                        <div class="blog-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, tenetur numquam ipsam reiciendis.</div>
                    </div>
                    <div class="blog-post" id="blog3">
                        <a href="#"><img src="/img/blog3.png" alt="Blog Image"></a>
                        <a href="#"><h2 class="blog-title">Blog Post Title 3</h2></a>
                        <div class="blog-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, tenetur numquam ipsam reiciendis.</div>
                    </div>
                </div>-->
            </div> <!-- end container -->
        </div> <!-- end blog-section -->

        @include('partes.footer')


    </body>
</html>
