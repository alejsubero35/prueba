
        <li class="nav-item ">
            <a href="{{ url('/home') }}" class="nav-link nav-toggle">
                <i class="icon-home"></i>
                <span  style="text-transform: uppercase" class="title">Inicio</span>
               <!--  <span class="selected"></span>
               -->
            </a>
        </li>
        <li class="nav-item">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-users"></i>
                    <span style="text-transform: uppercase" class="title">Admininistrar Usuarios</span>
                  <!--   <span class="selected"></span> -->
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="{{ url('/roles') }}" class="nav-link nav-toggle">
                            <i class="fa fa-cogs"></i>
                            <span class="title">Roles</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/user') }}" class="nav-link nav-toggle">
                            <i class="fa fa-user"></i>
                            <span class="title">Usuarios</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
            </li>
 
            <li class="nav-item">
                <a href="{{ url('/hotel') }}" class="nav-link nav-toggle">
                    <i class="fa fa-building"></i>
                    <span  style="text-transform: uppercase" class="title">{{ trans('hotel.title') }}</span>
                    <!--   <span class="selected"></span> -->
                    <span class="arrow open"></span>
                </a>
            </li>
            <li class="nav-item">
                <a id="pedido" href="{{ url('/room') }}" class="nav-link nav-toggle">
                    <i class="fa fa-bed"></i>
                    <span  style="text-transform: uppercase" class="title">{{ trans('room.room') }}</span>
                    <!-- <span class="selected"></span> -->
                    <span class="arrow open"></span>
                </a>
            </li>
            <li class="nav-item">
                <a id="pedido" href="{{ url('/typeroom') }}" class="nav-link nav-toggle">
                    <i class="fa fa-cog"></i>
                    <span  style="text-transform: uppercase" class="title">{{ trans('typeroom.room') }}</span>
                    <!-- <span class="selected"></span> -->
                    <span class="arrow open"></span>
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
         
         
           