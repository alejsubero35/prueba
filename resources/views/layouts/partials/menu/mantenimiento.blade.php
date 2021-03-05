
        <li class="nav-item ">
            <a href="{{ url('/home') }}" class="nav-link nav-toggle">
                <i class="icon-home"></i>
                <span  style="text-transform: uppercase" class="title">Inicio</span>
               <!--  <span class="selected"></span>
               -->
            </a>
        </li>
        <li class="nav-item">
            <a id="pedido" href="{{ url('/roomservice') }}" class="nav-link nav-toggle">
                <i class="fa fa-cogs"></i>
                <span  style="text-transform: uppercase" class="title">{{ trans('roomservice.service_room') }}</span>
                <!-- <span class="selected"></span> -->
                <span class="arrow open"></span>
            </a>
        </li>
         
         
           