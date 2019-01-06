@extends('layouts.master')

@section('content')
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Página de perfil</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="/">Inicio</a></li>
                            <li class="active">Página de perfil</li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <!-- .row -->
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="white-box">
                            <div class="user-bg"> <img width="100%" alt="user" src="../plugins/images/large/index.png">
                                <div class="overlay-box">
                                    <div class="user-content">
                                        @if (isset(Auth::user()->avatar_path) && !is_null(Auth::user()->avatar_path))
                                            <img src="{{ asset('users/'.Auth::user()->id.'/'.Auth::user()->avatar_path) }}" class="thumb-lg img-circle" alt="img">
                                        @else
                                            <img src="../plugins/images/users/profile.png" class="thumb-lg img-circle" alt="img">
                                        @endif
                                        
                                        <h4 class="text-white">{{ Auth::user()->person->name }}</h4>
                                        <h5 class="text-white">{{ Auth::user()->email }}</h5> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <div class="row">
                            <div class="white-box">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success" onclick="window.location.href='/user/{{ Auth::user()->id }}'">Editar perfil</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="white-box">
                                <div class="form-group">
                                    <h3 class="box-title">Reportes registrados</h3>
                                    <div class="comment-center p-t-10">
                                        <div class="panel-wrapper collapse in">
                                            <ul class="nav customtab nav-tabs" role="tablist">
                                                <li role="presentation" class="active"><a href="#news1" aria-controls="news" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="fa fa-globe"></i></span><span class="hidden-xs">Noticias</span></a></li>
                                                <li role="presentation" class=""><a href="#security1" aria-controls="security" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="fa fa-lock"></i></span> <span class="hidden-xs">Reportes de Seguridad</span></a></li>
                                                <li role="presentation" class=""><a href="#services1" aria-controls="services" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="fa fa-road"></i></span> <span class="hidden-xs">Reportes de Servicios</span></a></li>
                                            </ul>
                                            <div class="panel-body">
                                                <div class="tab-content m-t-0">
                                                    <div role="tabpanel" class="tab-pane fade active in" id="news1">
                                                        @include('home.news')
                                                        <div class="clearfix"></div>
                                                    </div>
        
                                                    <div role="tabpanel" class="tab-pane fade" id="security1">
                                                        @include('home.security')
                                                        <div class="clearfix"></div>
                                                    </div>
        
                                                    <div role="tabpanel" class="tab-pane fade" id="services1">                                           
                                                        @include('home.service')
                                                        <div class="clearfix"></div>
                                                    </div>
        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by wrappixel.com </footer>
        </div>
@endsection