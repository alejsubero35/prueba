<div class="page-bar">
    <!-- END PAGE HEADER-->
    <div class="row">
        <div style="transform: translate(10px, 10px);" class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                <div class="visual">
                    <i class="fa fa-windows"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="@if(!empty($atendidosprograma['Tecnofuturos'])){{$atendidosprograma['Tecnofuturos'] }} @else {{0}} @endif">0</span>
                    </div>
                    <div class="desc">ATENDIDOS TECNOFUTUROS</div>
                </div>
            </a>
        </div>
        <div style="top:10px;" class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                <div class="visual">
                    <i class="fa fa-edit"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="@if(!empty($alimentes)){{ $alimentes }}@else {{0}} @endif">0</span></div>
                    <div class="desc">ATENDIDOS ALIMENTES</div>
                </div>
            </a>
        </div>
        <div style="top:10px;" class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                <div class="visual">
                    <i class="fa fa-users"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="@if(!empty($atendidosprograma['Quiero Saber'])){{$atendidosprograma['Quiero Saber']}}@else {{0}} @endif">0</span>
                    </div>
                    <div class="desc">ATENDIDOS QUIERO SABER</div>
                </div>
            </a>
        </div>
        <div style="top:10px;right:1%;" class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                <div class="visual">
                    <i class="fa fa-transgender"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="@if(!empty($atendidosprograma['CIE'])){{$atendidosprograma['CIE'] }}@else {{0}} @endif"></span></div>
                    <div class="desc">CIE</div>
                </div>
            </a>
        </div>
    </div>
    <div style="transform: translate(10px, 10px);" class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                <div class="visual">
                    <i class="fa fa-home"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="@if(!empty($atendidosprograma['Voluntariado'])){{$atendidosprograma['Voluntariado'] }}@else {{0}} @endif">0</span>
                    </div>
                    <div class="desc">VOLUNTARIOS</div>
                </div>
            </a>
        </div>
        <div style="right:1%;" class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 yellow" href="#">
                <div class="visual">
                    <i class="fa fa-trophy"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="@if(!empty($atendidosprograma['Punto y Seguimos'])){{$atendidosprograma['Punto y Seguimos'] }}@else {{0}} @endif">0</span></div>
                    <div class="desc">PUNTO Y SEGUIMOS</div>
                </div>
            </a>
        </div>
        <div style="right:1%;" class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                <div class="visual">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="22">0</span>
                    </div>
                    <div class="desc">CONSTRUCCIÓN Y RECONSTRUCCIÓN</div>
                </div>
            </a>
        </div>
        <div style="right:1.5%;" class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                <div class="visual">
                    <i class="fa fa-equals"></i>
                </div>
                <div class="details">
                    <div class="number"> +
                        <span data-counter="counterup" data-value="60.000"></span> 
                    </div>
                        <div class="desc">TOTAL GENERAL ATENDIDOS</div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="portlet light bordered" style="transform: translate(10px, 10px); height:50%">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">Calendario Mensual de Actividades</span>  
                    </div><br><br><br>
                    <div id="calendario">

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="portlet light bordered" style="transform: translate(10px, 10px); height:50%">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">Reporte de Conexiones al Sistema por Usuario</span>  
                    </div><br><br>
                </div> 
                <div class="portlet-body">
                    <table id="example" class="table table-striped table-bordered" style="width:100%; background-color:  #5DC4BC">
                        <thead>
                            <tr>
                                <th class="th">Nombre</th>
                                <th class="th">Apellido</th>
                                <th class="th">Rol</th>
                                <th class="th">Conexiones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user_login as $usrLogin)
                                <tr>
                                    <td class="th">{{ $usrLogin->nombre}}</td> 
                                    <td class="th">{{ $usrLogin->apellido}}</td> 
                                    <td class="th">{{ $usrLogin->rol}}</td>               
                                    <td class="th">{{ $usrLogin->visitas}}</td> 
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="portlet light bordered" style="transform: translate(-10px, 10px); display: none;">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">Cantidad de Actividades por Usuarios</span>  
                    </div><br><br>
                    <table id="actividades" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th class="th" style="background-color: #5DC4BC">Nombre y Apellido</th>
                                <th class="th" style="background-color: #5DC4BC">Cantidad de Actividades</th>    
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($actividadesusuario as $act)
                                <tr>
                                    <td class="th">{{ $act->full_name}}</td> 
                                    <td class="th">{{ $act->actividades}}</td>  
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- tabla de Cantidad de actividades por users --}}
    <div class="row">
        <div class="col-lg-12 col-xs-12 col-sm-12">
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject bold uppercase font-dark">Gráfica Conexiones al Sistema por Usuarios</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div id="charConexUser" style="width: 100%; height: 600px; background-color: #FFFFFF;" ></div>
                </div>
            </div>
        </div>
    </div>
            {{-- CURSOS POR SEDE --}}
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="transform: translate(10px, 10px);">               
                    <ul class="nav nav-tabs sede">
                        @foreach($sedes as $sede)
                            <li class="@if($sede->id == 1) ? active : '' @endif"><a data-toggle="tab" data="{{$sede->id}}" id="{{$sede->id}}"  href="#tab_{{ $sede->id }}"><b>{{ $sede->nombre_sede }}</b></a></li>
                        @endforeach
                    </ul> 
                    <div class="tab-content">
                        @foreach($sedes as $sede)
                            <div id="tab_{{$sede->id}}" class="tab-pane  @if($sede->id == 1) ? active : '' @endif">
                                <div class="portlet light ">
                                    <div class="portlet box ">
                                        <div class="portlet-body">
                                            <table id="actividades_usu" class="table table-striped table-bordered" style="width:100%; ">
                                                <thead>
                                                    <tr>
                                                        <th class="th" style="background-color: #5dc4bc; color:white">Cursos</th>
                                                        <th class="th" style="background-color: #5dc4bc; color:white">Alumnos Inscritos</th>
                                                        {{-- <th class="th" style="background-color: #5dc4bc; color:white">Nombre de la Sede</th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($alumnosSedes as $key=>$a_sede)
                                                        @if($sede->id == $a_sede->sede_id)
                                                            <tr class="a">
                                                                <td class="th">{{ $a_sede->nombre_curso}}</td> 
                                                                <td class="th">{{ $a_sede->totalalumnoscursos}}</td> 
                                                                {{--  <td class="th">{{ $a_sede->nombre_sede}}</td>   --}}
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="portlet light bordered" style="transform: translate(-10px, 10px);">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="icon-settings font-dark"></i>
                                <span class="caption-subject bold uppercase">Gráfica de alumnos por curso / sede</span>  
                            </div><br><br><br>
                            <div id="limon" style="width: 100%; height: 400px; background-color: #FFFFFF;">
                            </div>
                        </div>
                    </div>
                </div>       
            </div>
            {{-- GRAFICO_DE_ACTIVIDADES_USER --}}
            <div class="row">
                    <div class="col-lg-12 col-xs-12 col-sm-12">
                        <div class="portlet light ">
                            <div class="portlet-title">
                                <div class="caption">
                                    <span class="caption-subject bold uppercase font-dark">Gráfica de Actividades por Usuarios</span>
                                </div>
    
                            </div>
                            <div class="portlet-body">
                                <div id="charUserACt" style="width: 100%; height: 600px; background-color: #FFFFFF;" ></div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Graficas estaticas por culminar --}}
            <div class="row">
                <div class="col-lg-12 col-xs-12 col-sm-12">
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption">
                                <span class="caption-subject bold uppercase font-dark">Construyendo futuros</span>
                            </div>

                        </div>
                        <ul class="nav nav-tabs periodo">
                        @foreach($periodos as $periodo)
                            <li class="@if($periodo->id == 3) ? active : '' @endif"><a data-toggle="tab" data="{{$periodo->id}}" id="{{$periodo->id}}"  href="#" onclick="atendidosPrograma({{ $periodo->id }});"><b>{{ $periodo->periodo }}</b></a></li>
                        @endforeach
                        <h4 class="parrafo">Períodos</h4>
                        </ul> 
                        <div class="portlet-body">
                            <div id="chartdiv" style="width: 100%; height: 600px; background-color: #FFFFFF;" ></div>
                        </div>
                    </div>
                </div>
            </div>
           
</div>
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

