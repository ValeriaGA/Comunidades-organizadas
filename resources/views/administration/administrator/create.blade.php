@extends('administration.layouts.master')

@section('content')

<!--main-container-part-->
<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Administradores</a>
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
                  @if ($errors->has('name'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Primer Apellido</label>
                <div class="controls">
                  <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname') }}" placeholder="Forbes" required>
                  @if ($errors->has('lastname'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('lastname') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Segundo Apellido</label>
                <div class="controls">
                  <input id="secondlastname" type="text" class="form-control{{ $errors->has('secondlastname') ? ' is-invalid' : '' }}" name="secondlastname" value="{{ old('secondlastname') }}" placeholder="Nash Jr" required>
                  @if ($errors->has('secondlastname'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('secondlastname') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Correo electrónico</label>
                <div class="controls">
                  <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="nash@localhost.com" required>
                  @if ($errors->has('email'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Cedula</label>
                <div class="controls">
                  <input id="cedula" type="number" class="form-control{{ $errors->has('cedula') ? ' is-invalid' : '' }}" name="cedula" value="{{ old('cedula') }}" placeholder="123456789" required>
                  @if ($errors->has('cedula'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('cedula') }}</strong>
                      </span>
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

                  @if ($errors->has('gender'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('gender') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Contraseña</label>
                <div class="controls">
                  <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required>
                  @if ($errors->has('password'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
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