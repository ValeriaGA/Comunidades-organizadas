@extends('administration.layouts.master')

@section('css')

  <link rel="stylesheet" href="{{ asset('css/colorpicker.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}" />
@endsection

@section('js')

    <script src="{{ asset('admin/js/bootstrap-colorpicker.js') }}"></script> 
    <script src="{{ asset('admin/js/bootstrap-datepicker.js') }}"></script> 
    <script src="{{ asset('admin/js/masked.js') }}"></script>
    <script src="{{ asset('admin/js/matrix.form_common.js') }}"></script> 
@endsection

@section('content')

<!--main-container-part-->
<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="/administracion" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="/administracion/seguridad">Seguridad</a> <a href="#" class="current">Categorias</a>
    </div>
  </div>
  <!--End-breadcrumbs-->
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Editar categoria para reportes de seguridad</h5>
          </div>
          <div class="widget-content nopadding">

            <form class="form-horizontal" method="post" action="/administracion/seguridad/categorias/{{ $subCatReport->id }}" enctype="multipart/form-data">
              @method('PATCH')

              @csrf

              <div class="control-group">
                <label class="control-label">Nombre</label>
                <div class="controls">
                  <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $subCatReport->name }}" required>
                  <hr />
                  @if ($errors->has('name'))
                    <div class="alert alert-error">
                      <button class="close" data-dismiss="alert">×</button>
                      <strong>Error!</strong> {{ $errors->first('name') }}
                    </div>
                  @endif
                </div>
              </div>

              <div class="control-group">
                <div class="controls">
                  <label><input type="checkbox" name="active"{{ $subCatReport->active ? 'checked' : '' }}/>Activo</label>
                </div>
              </div>

              <div class="control-group">
                <div class="controls">
                  @if (!is_null($subCatReport->multimedia_path))
                    <img src="{{ asset('/plugins/images/icons/'.$subCatReport->multimedia_path) }}">
                  @else
                    <img src="{{ asset('/plugins/images/icons/404.png') }}">
                  @endif
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Marcador</label>
                <div class="controls">
                  <input type="file" name="file"/>
                  <hr />
                  @if ($errors->has('file'))
                    <div class="alert alert-error">
                      <button class="close" data-dismiss="alert">×</button>
                      <strong>Error!</strong> {{ $errors->first('file') }}
                    </div>
                  @endif
                </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Confirmar" class="btn btn-success">
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--end-main-container-part-->
@endsection