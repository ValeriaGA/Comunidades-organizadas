@extends('administration.layouts.master')

@section('css')
@endsection

@section('js')
    <script src="{{ asset('admin/js/select2.min.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/js/matrix.tables.js') }}"></script>
@endsection

@section('content')

<!--main-container-part-->
<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="/administracion" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="/administracion/roles" class="current">Roles</a>
    </div>
  </div>
  <!--End-breadcrumbs-->
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Roles</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Editar</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($roles as $rol) 
                <tr class="">
                  <td>{{$rol->name}}</td>
                  <td>
                    <button name="{{$rol->name}}_edit" class="btn btn-warning" onclick="location.href = '/administracion/roles/{{ $rol->id }}';">Editar</button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <form action="/administracion/roles/agregar"><button class="btn btn-success">Agregar</button></form>
          </div>
        </div>

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Filtrar por rol</h5>
          </div>
          <form class="form-horizontal" method="post" action="/administracion/roles/filtrar">
          @csrf
            <div class="widget-content nopadding">
              <div class="control-group">
                <label class="control-label">Roles</label>
                <div class="controls">
                  <select name="role" class="form-control">
                    @foreach ($roles as $rol) 
                      <option value="{{$rol->name}}">{{$rol->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <input type="submit" value="Filtrar" class="btn btn-info">
            </div>
          </form>
        </div>

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Usuarios</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Correo</th>
                  <th>Role</th>
                  <th>Editar</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user) 
                <tr class="">
                  <td>{{$user->person->name}} {{$user->person->last_name}} {{$user->person->second_last_name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->role->name}}</td>
                  <td>
                    <button name="{{$user->name}}_edit" class="btn btn-warning" onclick="location.href = '/administracion/roles/usuarios/{{ $user->id }}';">Editar</button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--end-main-container-part-->
@endsection