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
      <a href="/administracion" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="/administracion/seguridad" class="current">Seguridad</a>
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
                    <th>Imagen</th>
                    <th>Activo</th>
                    <th>Editar</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($categories_security as $cat_security) 
                  <tr class="">
                    <td>{{$cat_security->name}}</td>
                    <td>
                      @if (!is_null($cat_security->multimedia_path))
                        <img src="{{ asset('/plugins/images/icons/'.$cat_security->multimedia_path) }}">
                      @else
                        <img src="{{ asset('/plugins/images/icons/404_small.png') }}">
                      @endif
                    </td>
                    <td>
                        <form method="POST" action="/administracion/seguridad/categorias/activo/{{ $cat_security->id }}">
                          @method('PATCH')
                          @csrf
                          <input type="checkbox" name="active" onChange="this.form.submit()" {{ $cat_security->active ? 'checked' : '' }}/>
                        </form>
                    </td>
                    <td>
                      <button name="{{$cat_security->name}}_edit" class="btn btn-warning" onclick="location.href = '/administracion/seguridad/{{ $cat_security->id }}';">Editar</button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <form action="/administracion/seguridad/categorias/agregar"><button class="btn btn-success">Agregar</button></form>
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
                      <form method="POST" action="/administracion/seguridad/armas/activo/{{ $cat_weapon->id }}">
                          @method('PATCH')
                          @csrf
                          <input type="checkbox" name="active" onChange="this.form.submit()" {{ $cat_weapon->active ? 'checked' : '' }}/>
                      </form>
                    </td>
                    <td>
                      <button name="{{$cat_weapon->name}}_edit" class="btn btn-warning" onclick="location.href = '/administracion/seguridad/armas/{{ $cat_weapon->id }}';">Editar</button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <form action="/administracion/seguridad/armas/agregar"><button class="btn btn-success">Agregar</button></form>
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
                      <form method="POST" action="/administracion/seguridad/transportes/activo/{{ $cat_transportation->id }}">
                          @method('PATCH')
                          @csrf
                          <input type="checkbox" name="active" onChange="this.form.submit()" {{ $cat_transportation->active ? 'checked' : '' }}/>
                      </form>
                    </td>
                    <td>
                      <button name="{{$cat_transportation->name}}_edit" class="btn btn-warning" onclick="location.href = '/administracion/seguridad/transportes/{{ $cat_transportation->id }}';">Editar</button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <form action="/administracion/seguridad/transportes/agregar"><button class="btn btn-success">Agregar</button></form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--end-main-container-part-->
@endsection