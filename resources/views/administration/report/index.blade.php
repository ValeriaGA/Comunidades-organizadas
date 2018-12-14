@extends('administration.layouts.master')

@section('content')

<!--main-container-part-->
<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Reportes</a>
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
                  <th>Nombre</th>
                  <th>Correo</th>
                  <th>Fecha de Registro</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($reports as $report) 
                <tr class="gradeX">
                  <td>{{$admin->person->name}} {{$admin->person->last_name}} {{$admin->person->second_last_name}}</td>
                  <td>{{$admin->email}}</td>
                  <td>{{$admin->created_at}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <form action="/administracion/administradores/add"><button class="btn">Agregar</button></form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--end-main-container-part-->
@endsection