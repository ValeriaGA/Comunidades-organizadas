<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav slimscrollsidebar">
        <div class="sidebar-head">
            <h3>
                <span class="fa-fw open-close"><i class="fa fa-navicon"></i></span> <span class="hide-menu">Navegación</span>
            </h3>
        </div>
        <ul class="nav" id="side-menu">
            <li style="padding: 70px 0 0;">
                <a href="/index" class="waves-effect"><i class="fa fa-home fa-fw" aria-hidden="true"></i>Inicio</a>
            </li>
            <li>
                <a href="/busqueda" class="waves-effect"><i class="fa fa-search fa-fw" aria-hidden="true"></i>Búsqueda</a>
            </li>
            @auth
            <li>
                <a href="/user" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Perfil</a>
            </li>
           
            <li>
                <a href="/comunidades" class="waves-effect"><i class="fa fa-group fa-fw" aria-hidden="true"></i>Comunidades</a>
            </li>
            @endauth
            <li>
                <a href="/informacion" class="waves-effect"><i class="fa fa-info fa-fw" aria-hidden="true"></i>Información</a>
            </li>
            <li>
                <a class="waves-effect" href="javascript:void(0);">
                    <i class="fa fa-bar-chart-o fa-fw" aria-hidden="true"></i>
                    <span class="hide-menu">
                        Estadísticas<span class="fa arrow"></span>
                    </span>
                </a>
                <ul class="nav nav-second-level collapse" aria-expanded="false">
                    <li>
                        <a href="/statistics/cr_map" class="waves-effect"><i class="fa fa-flask fa-fw" aria-hidden="true"></i>Comunidades Provincia</a>
                    </li>

                    <li>
                        <a href="/statistics/serviceBar" class="waves-effect"><i class="fa fa-flask fa-fw" aria-hidden="true"></i>Reportes de Servicios</a>
                    </li>
                    
                    <li>
                        <a href="/statistics/securityBar" class="waves-effect"><i class="fa fa-flask fa-fw" aria-hidden="true"></i>Reportes de Seguridad</a>
                    </li>

                    <li>
                        <a href="/statistics/genero" class="waves-effect"><i class="fa fa-flask fa-fw" aria-hidden="true"></i>Estadísticas Sexo</a>
                    </li>
                    <li>
                        <a href="/statistics/tiempo" class="waves-effect"><i class="fa fa-flask fa-fw" aria-hidden="true"></i>Estadísticas Tiempo</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    
</div>
<!-- ============================================================== -->
<!-- End Left Sidebar -->
<!-- ============================================================== -->