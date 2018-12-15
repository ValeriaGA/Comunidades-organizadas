@extends('administration.layouts.master')

@section('content')

<!--main-container-part-->
<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="/administracion" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="/administracion/estados" class="current">Estados</a>
    </div>
  </div>
  <!--End-breadcrumbs-->
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Tipos de estados</h5>
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
                @foreach ($states as $state) 
                <tr class="">
                  <td>{{$state->name}}</td>
                  <td>
                    @if ($state->active == TRUE)
                    <input type="checkbox" checked disabled/>
                    @else
                    <input type="checkbox" disabled/>
                    @endif
                  </td>
                  <td>
                    <button name="{{$state->name}}_edit" class="btn" onclick="location.href = '/administracion/estados/{{ $state->id }}';">Editar</button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <form action="/administracion/estados/agregar"><button class="btn">Agregar</button></form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--end-main-container-part-->
@endsection