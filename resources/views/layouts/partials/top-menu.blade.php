<ul class="nav navbar-nav pull-right">
    @if(Auth::user()->rol_name->slug == 'restaurant')
        @include('layouts.partials.notificaciones_restaurant')
    @elseif(Auth::user()->rol_name->slug == 'mantenimiento' )
        @include('layouts.partials.notificaciones_services')
    @endif
    {{-- <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
            <i class="icon-bell"></i>
            <span id="notificacion" class="badge badge-default"> 0 </span>
        </a>
       <ul class="dropdown-menu">
            <li class="external">
            <h3 class="dropdown-toolbar-title">Notifications (<span class="notif-count">0</span>)</h3>
                <a href="#">Ver Todos</a>
            </li>
        <!-- <li>
            <ul class="dropdown-menu-list scroller" style="height: 100px;" data-handle-color="#637283">
         
                <li>
                    <a href="#" style="background-color: antiquewhite;">
                 <!--         <span class="photo">
                            <img src="{{ asset('images/logo_lidotel_boutque.svg') }}" class="img-circle" alt="">
                        </span> -->
                     
                       <!--  <span id="tesorero"  class="subject"></span>
                        <span id="cliente" class="message">  </span>
                    </a>
                </li> 
         
            </ul>
        </li> -->
        </ul>
    </li> --}}
     <li class="dropdown dropdown-user">
        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
            <img alt="" class="img-circle" src="{{ asset('assets/img/avatar.png') }}" />
            <span class="username username-hide-on-mobile" style="text-transform: uppercase">
            @if(Auth::check()) 

                {{ Auth::user()->full_name }} 
                    |
                {{ Auth::user()->rol_name->slug }}
                    
            @endif
            </span>
            <i class="fa fa-angle-down"></i>
            </br>
        </a>
       
      
        <ul class="dropdown-menu dropdown-menu-default">
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="icon-power"></i>{{trans('auth.logout')}}

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </a>
            </li>
        </ul>
    </li>
    <!-- END USER LOGIN DROPDOWN -->

</ul>
<style>
    .page-header.navbar .top-menu .navbar-nav>li.dropdown .dropdown-toggle .badge.badge-default {
    background-color: #a2770b;
    color: #ffffff;
}
</style>