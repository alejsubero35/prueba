
        <li class="nav-item ">
            <a href="{{ url('/home') }}" class="nav-link nav-toggle">
                <i class="icon-home"></i>
                <span  style="text-transform: uppercase" class="title">Inicio</span>
               <!--  <span class="selected"></span>
               -->
            </a>
        </li>
        
        <li class="nav-item">
            <a id="pedido" href="{{ url('/foodmenu') }}" class="nav-link nav-toggle">
                <i class="fa fa-cutlery"></i>
                <span  style="text-transform: uppercase" class="title">{{ trans('food.food_menu') }}</span>
                <!-- <span class="selected"></span> -->
                <span class="arrow open"></span>
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
        <li class="nav-item">
            <a id="pedido" href="{{ url('/foodorder') }}" class="nav-link nav-toggle">
               <img class="" src="{{ url('images').'/menu.png' }}" alt="empeño" style="width: 30px; padding-bottom: 5px;color:white;"/>
                <span  style="text-transform: uppercase" class="title">{{ trans('foodorder.food_order') }}</span>
                <!-- <span class="selected"></span> -->
                <span class="arrow open"></span>
            </a>
        </li>
         
         
           