<!-- ============================================================== -->
<!-- Left sidebar                                                   -->
<!-- ============================================================== -->
<div id="sidebar">
  <ul>
    <li class="{{ Request::is('administracion') ? 'active' : '' }}"><a href="/administracion"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="{{ Request::is('administracion/administradores') ? 'active' : '' }}"><a href="/administracion/administradores"><i class="icon icon-cogs"></i> <span>Administradores</span></a></li>
    <li class="{{ Request::is('roles') ? 'active' : '' }}"><a href="/administracion/roles"><i class="icon icon-user"></i> <span>Roles</span></a> </li>
    <li class="submenu"> <a href="#"><i class="icon icon-book"></i> <span>Incidencias</span></a>
        <ul>
            <li class="{{ Request::is('administracion/seguridad') ? 'active' : '' }}"><a href="/administracion/seguridad"><i class="icon icon-chevron-right"></i> Seguridad</a></li>
            <li class="{{ Request::is('administracion/servicio') ? 'active' : '' }}"><a href="/administracion/servicio"><i class="icon icon-chevron-right"></i> Servicio</a></li>
        </ul>
    </li>
    <li class="{{ Request::is('administracion/reportes') ? 'active' : '' }}"> <a href="/administracion/reportes"><i class="icon icon-warning-sign"></i> <span>Reportes</span> <span class="label label-important">{{ $alert_qty }}</span></a> </li>
    <li class="submenu"><a href="#"><i class="icon icon-sitemap"></i> <span>Catálogos</span></a>
        <ul>
            <li class="{{ Request::is('administracion/generos') ? 'active' : '' }}"><a href="/administracion/generos"><i class="icon icon-chevron-right"></i> Género</a></li>
            <li class="{{ Request::is('administracion/estados') ? 'active' : '' }}"><a href="/administracion/estados"><i class="icon icon-chevron-right"></i> Estados</a></li>
            <li class="{{ Request::is('administracion/evidencias') ? 'active' : '' }}"><a href="/administracion/evidencias"><i class="icon icon-chevron-right"></i> Evidencia</a></li>
        </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-group"></i> <span>Comunidades</span></a>
        <ul>
            <li class="{{ Request::is('administracion/comunidades/grupos') ? 'active' : '' }}"><a href="/administracion/comunidades/grupos"><i class="icon icon-chevron-right"></i> <span>Grupos</span></a></li>
            <li class="{{ Request::is('administracion/comunidades/comunidad') ? 'active' : '' }}"><a href="/administracion/comunidades/comunidad"><i class="icon icon-chevron-right"></i> <span>Comunidades</span></a></li>
        </ul>
    </li>
    
    <li class="{{ Request::is('administracion/publicaciones') ? 'active' : '' }}"><a href="/administracion/publicaciones"><i class="icon icon-comments-alt"></i> <span>Publicaciones</span></a></li>
  </ul>
</div>

<!-- ============================================================== -->
<!-- End Left Sidebar -->
<!-- ============================================================== -->