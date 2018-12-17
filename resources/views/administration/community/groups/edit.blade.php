@extends('administration.layouts.master')

@section('content')

<!--main-container-part-->
<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="/administracion" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="/administracion/comunidades/grupos">Comunidades</a></a> <a href="#" class="current">Grupos</a>
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

            <form class="form-horizontal" method="post" action="/administracion/comunidades/grupos/update/{{ $community_group->id }}">
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
                      <option value="">Provincia</option>
                  </select>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Canton</label>
                <div class="controls">
                  <select name="canton" id="cantons" class="form-control dynamic" data-dependent="districts">
                      <option value="">Canton</option>
                  </select>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Distrito</label>
                <div class="controls">
                  <select name="district" id="districts" class="form-control dynamic" data-dependent="communities">
                      <option value="">Distrito</option>
                  </select>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Comunidad</label>
                <div class="controls">
                  <select multiple name="community" id="communities" class="form-control">
                      <option value="">Comunidad</option>
                  </select>
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