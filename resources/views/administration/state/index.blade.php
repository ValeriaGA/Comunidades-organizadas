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
      <a href="/administracion" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="/administracion/estados" class="current">Estados</a>
    </div>
  </div>
  <!--End-breadcrumbs-->
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Tipos de estados</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Activo</th>
                  <th>Editar</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($states as $state) 
                <tr class="">
                  <td>{{$state->name}}</td>
                  <td>
                    <form method="POST" action="/administracion/estados/activo/{{ $state->id }}">
                        @method('PATCH')
                        @csrf
                        <input type="checkbox" name="active" onChange="this.form.submit()" {{ $state->active ? 'checked' : '' }}/>
                    </form>
                  </td>
                  <td>
                    <button name="{{$state->name}}_edit" class="btn btn-warning" onclick="location.href = '/administracion/estados/{{ $state->id }}';">Editar</button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <form action="/administracion/estados/agregar"><button class="btn btn-success">Agregar</button></form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--end-main-container-part-->
@endsection