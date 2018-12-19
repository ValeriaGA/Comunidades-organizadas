@extends('administration.layouts.master')

@section('content')

<!--main-container-part-->
<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="/administracion" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="/administracion/servicio" class="current">Servicio</a>
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
                  <th>Imagen</th>
                  <th>Activo</th>
                  <th>Editar</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categories_service as $cat_service) 
                <tr class="">
                  <td>{{$cat_service->name}}</td>
                  <td>
                    @if (!is_null($cat_service->multimedia_path))
                      <img src="{{ asset('/plugins/images/icons/'.$cat_service->multimedia_path) }}">
                      @else
                        <img src="{{ asset('/plugins/images/icons/404_small.png') }}">
                      @endif
                  </td>
                  <td>
                    @if ($cat_service->active == TRUE)
                    <input type="checkbox" checked disabled/>
                    @else
                    <input type="checkbox" disabled/>
                    @endif
                  </td>
                  <td>
                    <button name="{{$cat_service->name}}_edit" class="btn" onclick="location.href = '/administracion/servicio/{{ $cat_service->id }}';">Editar</button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <form action="/administracion/servicio/agregar"><button class="btn">Agregar</button></form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--end-main-container-part-->
@endsection