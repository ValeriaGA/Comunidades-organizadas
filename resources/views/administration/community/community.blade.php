@extends('administration.layouts.master')

@section('content')

<!--main-container-part-->
<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="">Comunidades</a> <a href="#" class="current">GRUPO X</a>
    </div>
  </div>
  <!--End-breadcrumbs-->
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
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
                    <form action="/administracion/comunidad/editar" method="post" enctype="multipart/form-data">
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

<!--end-main-container-part-->
@endsection