<!-- ============================================================== -->
<!-- Topbar header - style you can find in pages.scss -->
<!-- ============================================================== -->
<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header">
        <div class="top-left-part">
            <!-- Logo -->
            <a class="logo" href="/index">
                <!-- Logo icon image, you can use font-icon also --><b>
                <!--This is dark logo icon--><img src="{{ asset('plugins/images/admin-logo.png') }}" alt="home" class="dark-logo" /><!--This is light logo icon--><img src="{{ asset('plugins/images/info-logo-dark.png') }}" alt="home" class="light-logo" />
             </b>
                <!-- Logo text image you can use text also --><span class="hidden-xs">
                <!--This is dark logo text--><img src="{{ asset('plugins/images/admin-text.png') }}" alt="home" class="dark-logo" /><!--This is light logo text--><img src="{{ asset('plugins/images/info-text-dark.png') }}" alt="home" class="light-logo" />
             </span> </a>
        </div>
        <!-- /Logo -->
        <ul class="nav navbar-top-links navbar-left">
            <li><a class="open-close waves-effect waves-light"><i class="fa fa-navicon"></i></a></li>
        </ul>
        <ul class="nav navbar-top-links navbar-right">
            @auth
                <li>
                    <a class="profile-pic" href="/user">
                        @if (isset(Auth::user()->avatar_path) && !is_null(Auth::user()->avatar_path))
                            <img src="{{ asset('users/'.Auth::user()->id.'/'.Auth::user()->avatar_path) }}" alt="user-img" width="36" class="img-circle">
                        @else
                            <img src="{{ asset('plugins/images/users/profile.png') }}" alt="user-img" width="36" class="img-circle">
                        @endif

                     <b class="hidden-xs">{{ Auth::user()->person->name }}</b></a>
                </li>
                <li>
                     <a href="/logout"><i class="fa fa-sign-out"></i> Salir</a>
                </li>
            @else
                <li>
                     <a href="{{ route('login') }}"><i class="fa fa-sign-in"></i> Iniciar Sesión</a>
                </li>
                <li>
                     <a href="{{ route('register') }}"><i class="fa fa-pencil-square-o"></i> Registrar</a>
                </li>
            @endauth
        </ul>
    </div>
    <!-- /.navbar-header -->
    <!-- /.navbar-top-links -->
    <!-- /.navbar-static-side -->
</nav>
<!-- End Top Navigation -->