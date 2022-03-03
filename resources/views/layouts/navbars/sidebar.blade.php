<div class="sidebar" data-image="{{ asset('light-bootstrap/img/sidebar-5.jpg') }}">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text">
                {{ __("Nombre Empresa") }}
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item @if($activePage == 'Productos') active @endif">
                <a class="nav-link" href="{{route('page.index', 'Productos')}}">
                    <i class="nc-icon nc-settings-90"></i>
                    <p>{{ __("Productos") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'Compras') active @endif">
                <a class="nav-link" href="{{route('page.index', 'Compras')}}">
                    <i class="nc-icon nc-cart-simple"></i>
                    <p>{{ __("Compras") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'Facturas') active @endif">
                <a class="nav-link" href="{{route('page.index', 'Facturas')}}">
                    <i class="nc-icon nc-notes"></i>
                    <p>{{ __("Facturas") }}</p>
                </a>
            </li>
            {{-- <li class="nav-item @if($activePage == 'icons') active @endif">
                <a class="nav-link" href="{{route('page.index', 'icons')}}">
                    <i class="nc-icon nc-atom"></i>
                    <p>{{ __("Icons") }}</p>
                </a>
            </li> --}}
        
        </ul>
    </div>
</div>
