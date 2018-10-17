@extends('layouts.master')

@section('content')
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">

            @include ('layouts.errors')
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
                        <div class="white-box">
                            <form class="form-horizontal form-material" action="/user/update/{{ Auth::user()->id }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label class="col-md-12">Nombre</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control form-control-line" name="name" value="{{Auth::user()->name}}" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">Primer Apellido</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control form-control-line" name="lastname" value="{{Auth::user()->last_name}}" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">Segundo Apellido</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control form-control-line" name="secondlastname" value="{{Auth::user()->second_last_name}}" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">Género</label>
                                    <div class="col-md-12">
                                        <select class="form-control" id="sex" name="sex" required>
                                            @if (Auth::user()->sex == 'm')
                                              <option value="Masculino" selected="selected">Masculino</option>
                                              <option value="Femenino">Femenino</option>
                                  <option value="Otro">Otro</option>
                                            @else
                                                <option value="Masculino">Masculino</option>
                                              <option value="Femenino" selected="selected">Femenino</option>
                                  <option value="Otro">Otro</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                  <label class="col-md-12" for="exampleInputImage">Foto de perfil</label>
                                  <div class="col-md-12">
                                    <input type="file" name="file">
                                  </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success">Actualizar perfil</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by wrappixel.com </footer>
        </div>
@endsection