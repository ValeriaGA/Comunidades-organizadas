<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav slimscrollsidebar">
        <div class="sidebar-head">
            <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navegación</span></h3>
        </div>
        <ul class="nav" id="side-menu">
            <li style="padding: 70px 0 0;">
                <a href="/index" class="waves-effect"><i class="fa fa-home fa-fw" aria-hidden="true"></i>Inicio</a>
            </li>
            <li>
                <a href="/search" class="waves-effect"><i class="fa fa-search fa-fw" aria-hidden="true"></i>Búsqueda</a>
            </li>
            @auth
            <li>
                <a href="/user" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Perfil</a>
            </li>
            @endauth
            <li>
                <a href="/statistics/bar" class="waves-effect"><i class="fa fa-bar-chart-o fa-fw" aria-hidden="true"></i>Estadísticas Por Delíto</a>
            </li>
            <li>
                <a href="/statistics/pie" class="waves-effect"><i class="fa fa-bar-chart-o fa-fw" aria-hidden="true"></i>Estadísticas Por Sexo</a>
            </li>
            <li>
                <a href="/statistics/chart" class="waves-effect"><i class="fa fa-bar-chart-o fa-fw" aria-hidden="true"></i>Estadísticas Por Tiempo</a>
            </li>
        </ul>
    </div>
    
</div>
<!-- ============================================================== -->
<!-- End Left Sidebar -->
<!-- ============================================================== -->