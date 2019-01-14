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
      <a href="/administracion" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="/administracion/comunidades/grupos">Comunidades</a></a> <a href="/administracion/comunidades/grupos" class="current">Grupos</a>
    </div>
  </div>
  <!--End-breadcrumbs-->
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Editar grupo de comunidades</h5>
          </div>
          <div class="widget-content nopadding">

            <form class="form-horizontal" method="post" action="/administracion/comunidades/grupos/{{ $community_group->id }}">
              @method('PATCH')

              @csrf

              <div class="control-group">
                <label class="control-label">Nombre</label>
                <div class="controls">
                  <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $community_group->name }}" required autofocus>
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
                  <select name="province" id="provinces" class="form-control dynamic" data-dependent="cantons">
                    @foreach($provinces as $province)
                      <option value="{{ $province->id}}" {{ $community_group->community[0]->district->canton->province_id == $province->id ? 'selected' : '' }}>{{ $province->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Canton</label>
                <div class="controls">
                  <select name="canton" id="cantons" class="form-control dynamic" data-dependent="districts">
                    @foreach($cantons as $canton)
                      <option value="{{ $canton->id}}" {{ $community_group->community[0]->district->canton_id == $canton->id ? 'selected' : '' }}>{{ $canton->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Distrito</label>
                <div class="controls">
                  <select name="district" id="districts" class="form-control dynamic" data-dependent="communities">
                    @foreach($districts as $district)
                      <option value="{{ $district->id}}" {{ $community_group->community[0]->district_id == $district->id ? 'selected' : '' }}>{{ $district->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Comunidad</label>
                <div class="controls">
                  <select multiple name="community[]" id="communities" class="form-control">
                    @foreach($community_group->community[0]->district->community as $community)
                      <option value="{{$community->id}}" {{ in_array($community->id, $current_communities_id) ? 'selected' : '' }}>{{$community->name}}</option>
                    @endforeach
                  </select>
                  <hr />
                  @if ($errors->has('community'))
                    <div class="alert alert-error">
                      <button class="close" data-dismiss="alert">×</button>
                      <strong>Error!</strong> {{ $errors->first('community') }}
                    </div>
                  @endif
                </div>
                </ul>
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