@extends('administration.layouts.master')

@section('content')

<!--main-container-part-->
<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="/administracion" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="/administracion/reportes" class="current">Reportes</a>
    </div>
  </div>
  <!--End-breadcrumbs-->
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Editar publicacioón</h5>
          </div>
          <div class="widget-content nopadding">

            <form class="form-horizontal" method="post" action="/administracion/reports/editar">
              @csrf

              <div class="control-group">
                <div class="controls">
                  <label>
                    <input type="checkbox" name="active"/>
                    Activa
                  </label>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Estado</label>
                <div class="controls">
                  <select id="state" name="state" value="{{ old('state') }}" required>
                      @foreach ($states as $state)
                          <option value="{{$state->name}}">{{$state->name}}</option>
                      @endforeach
                  </select>

                  <hr />
                  @if ($errors->has('state'))
                    <div class="alert alert-error">
                      <button class="close" data-dismiss="alert">×</button>
                      <strong>Error!</strong> {{ $errors->first('state') }}
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