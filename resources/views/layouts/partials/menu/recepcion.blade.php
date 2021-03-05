
        <li class="nav-item ">
            <a href="{{ url('/home') }}" class="nav-link nav-toggle">
                <i class="icon-home"></i>
                <span  style="text-transform: uppercase" class="title">Inicio</span>
               <!--  <span class="selected"></span>
               -->
            </a>
        </li>
          <!--  <li class="nav-item">
                <a id="pedido" href="{{ url('/foodmenu') }}" class="nav-link nav-toggle">
                    <i class="fa fa-cutlery"></i>
                    <span  style="text-transform: uppercase" class="title">{{ trans('food.food_menu') }}</span>
                    
                    <span class="arrow open"></span>
                </a>
            </li>
             <li class="nav-item">
                <a id="pedido" href="{{ url('/checking') }}" class="nav-link nav-toggle">
                    <i class="fa fa-file"></i>
                    <span  style="text-transform: uppercase" class="title">{{ trans('checking.checking') }}</span>
                    
                    <span class="arrow open"></span>
                </a>
            </li> -->
            <li class="nav-item">
                <a id="reservation" href="{{ url('/reservation') }}" class="nav-link nav-toggle">
                    <i class="fa fa-h-square" ></i>
                    <span  style="text-transform: uppercase" class="title">{{ trans('reservation.item_menu') }}</span>
                </a>
            </li>
            <li class="nav-item">
            <a id="pedido" href="{{ url('/recepcionista') }}" class="nav-link nav-toggle">
                    <i class="fa fa-list"></i>
                    <span  style="text-transform: uppercase" class="title">{{ trans('recepcion.recepcion') }}</span>
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
       
         
         
           