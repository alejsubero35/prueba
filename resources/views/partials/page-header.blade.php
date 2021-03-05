@if(Auth::check())
        @if(Auth::user()->hasRole('super-admin'))
            @include ('partials.home.super-admin')

        @elseif(Auth::user()->hasRole('admin'))
            @include ('partials.home.admin')

        @elseif((Auth::user()->hasRole('gerencia')))
            @include ('partials.home.gerencia')

        @elseif((Auth::user()->hasRole('recepcion')))
            @include ('partials.home.recepcion')

        @elseif((Auth::user()->hasRole('restaurant')))
            @include ('partials.home.restaurant')

        @elseif((Auth::user()->hasRole('mantenimiento')))
            @include ('partials.home.mantenimiento')

        @elseif((Auth::user()->hasRole('housekeeper')))
            @include ('partials.home.housekipin')

        @elseif((Auth::user()->hasRole('sistema')))
            @include ('partials.home.sistema')

        @elseif((Auth::user()->hasRole('jefe')))
            @include ('partials.home.jefe')

        @endif
    @endif
 