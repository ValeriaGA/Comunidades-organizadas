@extends('administration.layouts.master')

@section('content')

<!--main-container-part-->
<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Servicio</a>
    </div>
  </div>
  <!--End-breadcrumbs-->
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Tipos de reportes de servicio</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Activo</th>
                  <th>Editar</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categories_service as $cat_service) 
                <tr class="gradeX">
                  <td>{{$cat_service->name}}</td>
                  <td>
                    @if ($cat_service->active == TRUE)
                    <input type="checkbox" checked disabled/>
                    @else
                    <input type="checkbox" disabled/>
                    @endif
                  </td>
                  <td>
                    <form action="/administracion/seguridad/agregar" method="post" enctype="multipart/form-data">
                      <button class="btn">Editar</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <form action="/administracion/seguridad/agregar"><button class="btn">Agregar</button></form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--end-main-container-part-->
@endsection