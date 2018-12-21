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
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Seleccionar</h5>
          </div>
          <div class="widget-content nopadding">
            <form method="post" class="form-horizontal" action="/administracion/comunidades/grupos/filtrar">
              @csrf
              <div class="control-group">
                <label class="control-label">Provincia</label>
                <div class="controls">
                  <select name="province" id="provinces" class="form-control">
                    <option value="1" selected>San José</option>
                    <option value="2">Alajuela</option>
                    <option value="3">Cartago</option>
                    <option value="4">Heredia</option>
                    <option value="5">Guanacaste</option>
                    <option value="6">Puntarenas</option>
                    <option value="7">Limón</option>
                  </select>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Cantón</label>
                <div class="controls">
                  <select name="canton" id="cantons" name="canton" class="form-control">
                    <option value="1" selected="selected">Cantones</option>
                  </select>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Distrito</label>
                <div class="controls">
                  <select name="district" id="districts" class="form-control">
                    <option value="1" selected="selected">Distritos</option>
                  </select>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Comunidades</label>
                <div class="controls">
                  <select name="community" id="communities" class="form-control">
                    <option value="1" selected="selected">Comunidades</option>
                  </select>
                </div>
              </div>

              <input type="submit" value="Filtrar" class="btn btn-success">
            </form>
          </div>
        </div>

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Grupos de comunidades</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Comunidades</th>
                  <th>Editar</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($community_groups as $community_group) 
                <tr class="gradeX">
                  <td>{{$community_group->name}}</td>
                  <td>
                    @foreach ($community_group->community as $communities)
                      <ul class="activity-list">
                        <li><strong>{{ $communities->name }}</strong></li>
                      </ul>
                    @endforeach
                  </td>
                  <td>
                      <button name="{{$community_group->name}}_edit" class="btn" onclick="location.href = '/administracion/comunidades/grupos/{{ $community_group->id }}';">Editar</button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <form action="/administracion/comunidades/grupos/agregar"><button class="btn">Agregar</button></form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--end-main-container-part-->
@endsection