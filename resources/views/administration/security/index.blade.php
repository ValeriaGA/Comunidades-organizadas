@extends('administration.layouts.master')

@section('content')

<!--main-container-part-->
<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Seguridad</a>
    </div>
  </div>
  <!--End-breadcrumbs-->
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#tab1">Tipos de reportes de seguridad</a></li>
              <li><a data-toggle="tab" href="#tab2">Tipos de armas</a></li>
              <li><a data-toggle="tab" href="#tab3">Medios de transporte</a></li>
            </ul>
          </div>
          <div class="widget-content tab-content">
            <div id="tab1" class="tab-pane active">
              
              <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Activo</th>
                    <th>Editar</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($categories_security as $cat_security) 
                  <tr class="gradeX">
                    <td>{{$cat_security->name}}</td>
                    <td>
                      @if ($cat_security->active == TRUE)
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
            <div id="tab2" class="tab-pane">
              <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Activo</th>
                    <th>Editar</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($categories_weapon as $cat_weapon) 
                  <tr class="gradeX">
                    <td>{{$cat_weapon->name}}</td>
                    <td>
                      @if ($cat_weapon->active == TRUE)
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
            <div id="tab3" class="tab-pane">
              <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Activo</th>
                    <th>Editar</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($categories_transportation as $cat_transportation) 
                  <tr class="gradeX">
                    <td>{{$cat_transportation->name}}</td>
                    <td>
                      @if ($cat_transportation->active == TRUE)
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
</div>

<!--end-main-container-part-->
@endsection