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
        <ul class="nav navbar-top-links navbar-right pull-right">
            @auth
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if (isset(Auth::user()->avatar_path) && !is_null(Auth::user()->avatar_path))
                            <img src="{{ asset('users/'.Auth::user()->id.'/'.Auth::user()->avatar_path) }}" alt="user-img" width="36" class="img-circle">
                        @else
                            <img src="{{ asset('plugins/images/users/profile.png') }}" alt="user-img" width="36" class="img-circle">
                        @endif

                        <b class="hidden-xs">{{ Auth::user()->person->name }}</b>
                     </a>

                    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY" style="width: 280px">
                        <div>
                            <div class="row">
                                <div class="col-md-4">
                                    @if (isset(Auth::user()->avatar_path) && !is_null(Auth::user()->avatar_path))
                                        <img src="{{ asset('users/'.Auth::user()->id.'/'.Auth::user()->avatar_path) }}" alt="user" width="80" class="rounded">
                                    @else
                                        <img src="{{ asset('plugins/images/users/profile.png') }}" alt="user" width="80" class="rounded">
                                    @endif
                                </div>
                                <div class="col-md-8">
                                    <div>
                                        <h4 class="mb-0">{{ Auth::user()->person->name }} {{ Auth::user()->person->last_name }} {{ Auth::user()->person->second_last_name }}</h4>
                                    </div>
                                    <div>
                                        <p class=" mb-0 text-muted">{{ Auth::user()->email }}</p>
                                    </div>
                                    
                                </div>
                            </div>
                            <hr/>
                            @if (Auth::user()->communityAdmin)
                            <div>
                                <small>&nbsp;Comunidad Activa</small>
                            </div>
                                <div>
                                    <div class="col-md-12">
                                        <form method="POST" action="/active-community">
                                            @method('PATCH')
                                            @csrf
                                            <select name="community" onChange="this.form.submit()" style="width:100%">
                                                <option value="" disabled selected style="display:none;">Seleccionar Comunidad</option>
                                                @foreach (Auth::user()->communityAdmin->community as $myCommunities)
                                                    <option value="{{$myCommunities->id}}" {{ Auth::user()->communityAdmin->active_community_id == $myCommunities->id ? 'selected' : ' '}}>{{$myCommunities->name}}</option>
                                                @endforeach
                                            </select>
                                        </form>
                                    </div>
                                </div>
                            @endif
                            <hr/>
                            <div>
                                <div class="col-md-6">
                                    <div>
                                        <a href="/user" class="btn btn-info waves-effect waves-light btn-outline" style="width:100%"><span class="btn-label"><i class="fa fa-user"></i></span>Perfil</a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <a href="/logout" class="btn btn-danger waves-effect waves-light btn-outline" style="width:100%"><span class="btn-label"><i class="fa fa-sign-out"></i></span>Salir</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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