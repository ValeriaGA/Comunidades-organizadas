@extends('administration.layouts.master')

@section('content')

<!--main-container-part-->
<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="/administracion" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="/administracion/comunidades/comunidad" class="current">Comunidades</a>
    </div>
  </div>
  <!--End-breadcrumbs-->
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Seleccionar</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="#" method="get" class="form-horizontal">
              <div class="control-group">
                <label class="control-label">Provincia</label>
                <div class="controls">
                  <select name="province" id="provinces" class="form-control dynamic" data-dependent="cantons">
                      <option value="">Provincia</option>
                  </select>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Cantón</label>
                <div class="controls">
                  <select name="canton" id="cantons" class="form-control dynamic" data-dependent="districts">
                      <option value="">Cantón</option>
                  </select>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Distrito</label>
                <div class="controls">
                  <select name="district" id="districts" class="form-control dynamic">
                      <option value="">Distrito</option>
                  </select>
                </div>
              </div>
              
            </form>
          </div>
        </div>

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Comunidades</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Distrito</th>
                  <th>Editar</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($communities as $community) 
                <tr class="gradeX">
                  <td>{{$community->name}}</td>
                  <td>{{$community->district->name}}</td>
                  <td>
                    <button name="{{$community->name}}_edit" class="btn" onclick="location.href = '/administracion/comunidades/comunidad/{{ $community->id }}';">Editar</button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <form action="/administracion/comunidades/comunidad/agregar"><button class="btn">Agregar</button></form>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<!--end-main-container-part-->
@endsection