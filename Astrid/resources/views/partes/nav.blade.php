<header>
    
    <div class="top-nav container" >
        <div class="logo"><a href="{{ route('inicio') }}">{{ config('app.name','Laravel') }}</a></div> 

        @if (! request()->is('checkout'))
            <ul>
                <li><a href="{{ route('shop.index') }}">Productos &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>

                <li>
                    <a href="{{ route('cart.index') }}" >&nbsp;&nbsp;&nbsp;&nbsp;Carrito <span  class="cart-count"> 
                        @if (Cart::instance('default')->count() > 0)  
                        <span>{{ Cart::instance('default')->count() }}</span></span>
                        @endif&nbsp;&nbsp;
                    </a>
                </li>
         
                @if (Auth::guest())

                    <li><a href="{{ route('login') }}">&nbsp;&nbsp;&nbsp;&nbsp;Iniciar &nbsp;&nbsp;&nbsp;Sesión</a></li>
                    <li><a href="{{ route('register') }}">&nbsp;&nbsp;&nbsp;&nbsp;Registrar</a></li>
                
                @else

                    <li><a href="{{ url('/usuario/perfil/'.Auth::user()->id) }}">{{ Auth::user()->username }}</a></li>
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                             <i class="fa fa-btn fa-sign-out"></i> Salir
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endif
                
            </ul>
        @endif
    </div> <!-- end top-nav -->

</header>
