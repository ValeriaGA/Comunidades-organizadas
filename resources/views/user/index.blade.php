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
                                            <img src="{{ asset('images/users/'.Auth::user()->avatar_path) }}" class="thumb-lg img-circle" alt="img">
                                        @else
                                            <img src="../plugins/images/users/profile.png" class="thumb-lg img-circle" alt="img">
                                        @endif
                                        
                                        <h4 class="text-white">{{ Auth::user()->name }}</h4>
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
                                    <h3 class="box-title">Incidentes registrados</h3>
                                    <div class="comment-center p-t-10">
                                        @foreach ($incidents as $incident)
                                          @include('incident.incident')
                                        @endforeach
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