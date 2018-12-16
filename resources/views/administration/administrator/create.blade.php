@extends('administration.layouts.master')

@section('content')

<!--main-container-part-->
<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="/administracion" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Administradores</a>
    </div>
  </div>
  <!--End-breadcrumbs-->
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Crear cuenta administrador</h5>
          </div>
          <div class="widget-content nopadding">

            <form class="form-horizontal" method="post" action="/administracion/administradores">
              @csrf

              <div class="control-group">
                <label class="control-label">Nombre</label>
                <div class="controls">
                  <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="John" required autofocus>
                  <hr />
                  @if ($errors->has('name'))
                    <div class="alert alert-error">
                      <button class="close" data-dismiss="alert">×</button>
                      <strong>Error!</strong> {{ $errors->first('name') }}
                    </div>
                  @endif
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Primer Apellido</label>
                <div class="controls">
                  <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname') }}" placeholder="Forbes" required>
                  <hr />
                  @if ($errors->has('lastname'))
                    <div class="alert alert-error">
                      <button class="close" data-dismiss="alert">×</button>
                      <strong>Error!</strong> {{ $errors->first('lastname') }}
                    </div>
                  @endif
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Segundo Apellido</label>
                <div class="controls">
                  <input id="secondlastname" type="text" class="form-control{{ $errors->has('secondlastname') ? ' is-invalid' : '' }}" name="secondlastname" value="{{ old('secondlastname') }}" placeholder="Nash Jr" required>
                  <hr />
                  @if ($errors->has('secondlastname'))
                    <div class="alert alert-error">
                      <button class="close" data-dismiss="alert">×</button>
                      <strong>Error!</strong> {{ $errors->first('secondlastname') }}
                    </div>
                  @endif
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Correo electrónico</label>
                <div class="controls">
                  <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="nash@localhost.com" required>
                  <hr />
                  @if ($errors->has('email'))
                    <div class="alert alert-error">
                      <button class="close" data-dismiss="alert">×</button>
                      <strong>Error!</strong> {{ $errors->first('email') }}
                    </div>
                  @endif
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Cedula</label>
                <div class="controls">
                  <input id="cedula" type="number" class="form-control{{ $errors->has('cedula') ? ' is-invalid' : '' }}" name="cedula" value="{{ old('cedula') }}" placeholder="123456789" required>
                  <hr />
                  @if ($errors->has('cedula'))
                    <div class="alert alert-error">
                      <button class="close" data-dismiss="alert">×</button>
                      <strong>Error!</strong> {{ $errors->first('cedula') }}
                    </div>
                  @endif
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Residencia</label>
                <div class="controls">
                  <label>
                    <input type="checkbox" name="foreigner"/>
                    Extranjero
                  </label>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Género</label>
                <div class="controls">
                  <select id="gender" name="gender" value="{{ old('gender') }}" required>
                      @foreach ($genders as $gender)
                          <option value="{{$gender->name}}">{{$gender->name}}</option>
                      @endforeach
                  </select>

                  <hr />
                  @if ($errors->has('gender'))
                    <div class="alert alert-error">
                      <button class="close" data-dismiss="alert">×</button>
                      <strong>Error!</strong> {{ $errors->first('gender') }}
                    </div>
                  @endif
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Contraseña</label>
                <div class="controls">
                  <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required>
                  <hr />
                  @if ($errors->has('password'))
                    <div class="alert alert-error">
                      <button class="close" data-dismiss="alert">×</button>
                      <strong>Error!</strong> {{ $errors->first('password') }}
                    </div>
                  @endif
                </div>
              </div>

              <div class="control-group">
                  <label for="password-confirm" class="control-label">Confirmar contraseña</label>

                  <div class="controls">
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                  </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Confirmar" class="btn btn-success">
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--end-main-container-part-->
@endsection