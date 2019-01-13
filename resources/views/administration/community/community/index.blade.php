@extends('administration.layouts.master')

@section('css')

@endsection

@section('js')
    <script src="{{ asset('admin/js/select2.min.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/js/matrix.tables.js') }}"></script>
    <script src="{{ asset('js/comboBoxControl.js') }}"></script>
@endsection

@section('content')

<!--main-container-part-->
<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="/administracion" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="/administracion/comunidades/comunidad">Comunidades</a></a> <a href="/administracion/comunidades/comunidad" class="current">Comunidad</a>
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
            <form method="post" class="form-horizontal" action="/administracion/comunidades/comunidad/filtrar">
              @csrf
              <div class="control-group">
                <label class="control-label">Provincia</label>
                <div class="controls">
                  <select name="province" id="provinces" class="form-control">
                  </select>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Cantón</label>
                <div class="controls">
                  <select name="canton" id="cantons" name="canton" class="form-control">
                  </select>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Distrito</label>
                <div class="controls">
                  <select name="district" id="districts" class="form-control">
                  </select>
                  <hr />
                  @if ($errors->has('district'))
                    <div class="alert alert-error">
                      <button class="close" data-dismiss="alert">×</button>
                      <strong>Error!</strong> {{ $errors->first('district') }}
                    </div>
                  @endif
                </div>
              </div>

              <input type="submit" value="Filtrar" class="btn btn-info">
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
                  <th>Administradores</th>
                  <th>Editar</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($communities as $community) 
                <tr class="">
                  <td>{{$community->name}}</td>
                  <td>{{$community->district->name}}</td>
                  <td>
                    <ul>
                      @foreach($community->communityAdmin as $admin)
                        <li>{{ $admin->user->email }}</li>
                      @endforeach
                    </ul>
                  </td>
                  <td>
                    <button name="{{$community->name}}_edit" class="btn btn-warning" onclick="location.href = '/administracion/comunidades/comunidad/{{ $community->id }}';">Editar</button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <form action="/administracion/comunidades/comunidad/agregar"><button class="btn btn-success">Agregar</button></form>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<!--end-main-container-part-->
@endsection