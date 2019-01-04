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
      <a href="/administracion" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="/administracion/solicitudes" class="current">Solicitudes</a>
    </div>
  </div>
  <!--End-breadcrumbs-->
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Solicitudes de Creación de Comunidades</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Usuario</th>
                  <th>Nombre de Comunidad</th>
                  <th>Acción</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($community_requests as $request) 
                <tr>
                  <td>{{$request->user->email}}</td>
                  <td>{{$request->name}}</td>
                  <td>

                    <form method="POST" action="/administracion/request/community/agregar/{{ $request->id }}">
                      @csrf
                      <button name="{{$request->id}}_community_add" class="btn btn-success" style="width:100%">Agregar</button>
                    </form>
                    <form method="POST" action="/administracion/request/community/{{ $request->id }}">
                      @method('DELETE')
                      @csrf
                      <button name="{{$request->id}}_community_delete" class="btn btn-danger" onClick="this.form.submit()" style="width:100%">Borrar</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Solicitudes de Creación de Grupos de Comunidades</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Usuario</th>
                  <th>Nombre de Grupo</th>
                  <th>Comunidades</th>
                  <th>Acción</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($group_requests as $request) 
                <tr>
                  <td>{{$request->user->email}}</td>
                  <td>{{$request->name}}</td>
                  <td>
                    <ul>
                      @foreach ($request->community as $community)
                        <li>$community->name</li>
                      @endforeach
                    </ul>
                  </td>
                  <td>
                    <form method="POST" action="/administracion/request/group/agregar/{{ $request->id }}">
                      @csrf
                      <button name="{{$request->id}}_group_add" class="btn btn-success" style="width:100%">Agregar</button>
                    </form>
                    <form method="POST" action="/administracion/request/group/{{ $request->id }}">
                      @method('DELETE')
                      @csrf
                      <button name="{{$request->id}}_group_delete" class="btn btn-danger" onClick="this.form.submit()" style="width:100%">Borrar</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<!--end-main-container-part-->
@endsection