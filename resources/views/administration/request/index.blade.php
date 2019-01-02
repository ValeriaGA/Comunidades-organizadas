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
      <a href="/administracion" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="/administracion/solicitudes" class="current">Solicitudes</a>
    </div>
  </div>
  <!--End-breadcrumbs-->
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Solicitudes de Creación de Comunidades</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Usuario</th>
                  <th>Nombre de Comunidad</th>
                  <th>Fecha</th>
                  <th>Acción</th>
                </tr>
              </thead>
              <tbody>
                <tr class="">
                  <td>philip@localhost.com</td>
                  <td>Barrio Amón</td>
                  <td></td>
                  <td><button>Borrar</button></td>
                </tr>
                <!-- {{-- @foreach ($report_alerts as $alert) 
                <tr class="">
                  <td>{{$alert->email}}</td>
                  <td>{{$alert->reason}}</td>
                  <td>{{$alert->created_at}}</td>
                  <td><button name="{{$rol->name}}_edit" class="btn" onclick="location.href = '/administracion/roles/{{ $rol->id }}';" disabled>Editar</button></td>
                </tr>
                @endforeach --}} -->
              </tbody>
            </table>
          </div>
        </div>

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Solicitudes de Creación de Grupos de Comunidades</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Usuario</th>
                  <th>Descripción</th>
                  <th>Nombre de Grupo</th>
                  <th>Comunidades</th>
                  <th>Fecha</th>
                  <th>Acción</th>
                </tr>
              </thead>
              <tbody>
                <tr class="">
                  <td>philip@localhost.com</td>
                  <td>Solicitud para crear una grupo con las comunidades Barrio Amón y Barrio Otoya</td>
                  <td>Comunidad Barrio Amón y Barrio Otoya</td>
                  <td>
                    <ul>
                      <li>Barrio Amón</li>
                      <li>Barrio Otoya</li>
                    </ul>
                  <td>Fecha</td>
                  <td><button>Borrar</button></td>
                </tr>
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