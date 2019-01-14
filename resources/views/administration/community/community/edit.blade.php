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
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Editar comunidades</h5>
          </div>
          <div class="widget-content nopadding">

            <form class="form-horizontal" method="post" action="/administracion/comunidades/comunidad/{{ $community->id }}">
              @method('PATCH')

              @csrf

              <div class="control-group">
                <label class="control-label">Nombre</label>
                <div class="controls">
                  <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $community->name }}" required autofocus>
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
                <label class="control-label">Provincia</label>
                <div class="controls">
                  <select name="province" id="provinces" class="form-control">
                    @foreach($provinces as $province)
                      <option value="{{ $province->id}}" {{ $community->district->canton->province_id == $province->id ? 'selected' : '' }}>{{ $province->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Cantón</label>
                <div class="controls">
                  <select name="canton" id="cantons" class="form-control">
                    @foreach($cantons as $canton)
                      <option value="{{ $canton->id}}" {{ $community->district->canton_id == $canton->id ? 'selected' : '' }}>{{ $canton->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Distrito</label>
                <div class="controls">
                  <select name="district" id="districts" class="form-control">
                    @foreach($districts as $district)
                      <option value="{{ $district->id}}" {{ $community->district_id == $district->id ? 'selected' : '' }}>{{ $district->name}}</option>
                    @endforeach
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

              <div class="control-group">
                <label class="control-label">Administradores</label>
                <div class="controls">
                  <select multiple name="administrator[]" id="administrators" class="form-control">
                      @foreach ($community_admins as $community_admin)
                        <option value="{{$community_admin->id}}" {{ in_array($community_admin->id, $current_admins_id) ? 'selected' : '' }}>{{$community_admin->email}}</option>
                      @endforeach
                  </select>
                  <hr />
                  @if ($errors->has('administrator'))
                    <div class="alert alert-error">
                      <button class="close" data-dismiss="alert">×</button>
                      <strong>Error!</strong> {{ $errors->first('administrator') }}
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