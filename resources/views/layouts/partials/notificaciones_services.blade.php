<li class="dropdown dropdown-extended dropdown-notification" id="header_notification">
    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
        <i class="icon-envelope-open"></i>
        <span id="notificacion_service" class="badge badge-default"> 0 </span>
    </a>
   <ul class="dropdown-menu">
    <li class="external">
        <h3>{{ trans('user.you_have')}}  
        <span id="newmensaje_service" class="bold">0</span> {{ trans('user.mjs_')}}</h3>
       
    </li>
    <li>
        <ul class="dropdown-menu-list scroller" style="height: 200px;" data-handle-color="#637283">
            <li>
                <a href="#">
                    <span id="subject_service"  class="subject_service"></span>
                    <span id="message_service" class="message_service">  </span>
                </a>
            </li> 
     
        </ul>
    </li>
</ul>
</li>