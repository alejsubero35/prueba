
<div class="page-sidebar navbar-collapse collapse">

    <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu page-sidebar-menu-closed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
    
    @if(Auth::check())
        @if(Auth::user()->hasRole('super-admin'))
            @include ('layouts.partials.menu.super-admin')

        @elseif(Auth::user()->hasRole('admin'))
            @include ('layouts.partials.menu.admin')

        @elseif((Auth::user()->hasRole('gerencia')))
            @include ('layouts.partials.menu.gerencia')

        @elseif((Auth::user()->hasRole('recepcion')))
            @include ('layouts.partials.menu.recepcion')

        @elseif((Auth::user()->hasRole('huesped')))
            @include ('layouts.partials.menu.huesped')

        @elseif((Auth::user()->hasRole('restaurant')))
            @include ('layouts.partials.menu.restaurant')

        @elseif((Auth::user()->hasRole('mantenimiento')))
            @include ('layouts.partials.menu.mantenimiento')

        @elseif((Auth::user()->hasRole('housekeeper')))
            @include ('layouts.partials.menu.housekipin')

        @elseif((Auth::user()->hasRole('sistema')))
            @include ('layouts.partials.menu.sistema')

        @elseif((Auth::user()->hasRole('jefe')))
            @include ('layouts.partials.menu.jefe')

        @endif
    @endif
      


    </ul>
    <!-- END SIDEBAR MENU -->
    <!-- END SIDEBAR MENU -->
</div>
<!-- END SIDEBAR -->
