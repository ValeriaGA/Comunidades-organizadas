@extends('administration.layouts.master')

@section('content')

<!--main-container-part-->
<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="/administracion" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="/administracion/reportes" class="current">Reportes</a>
    </div>
  </div>
  <!--End-breadcrumbs-->
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Publicaciones reportadas</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>ID de publicacion</th>
                  <th>ID del Usuario</th>
                  <th>Correo del Usuario</th>
                  <th>Reportes Recibidos</th>
                  <th>Acción</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($reports as $report) 
                <tr class="">
                  <td>{{$report->report_id}}</td>
                  <td>{{$report->user_id}}</td>
                  <td>{{$report->email}}</td>
                  <td>{{$report->count}}</td>
                  <td>
                    <button name="{{$report->report_id}}_edit" class="btn" onclick="location.href = '/administracion/reportes/{{ $report->report_id }}';">Ver</button>
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