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
          <div class="widget-title">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#tab1">Detalles</a></li>
              <li><a data-toggle="tab" href="#tab2">Usuario</a></li>
              <li><a data-toggle="tab" href="#tab3">Evidencia</a></li>
            </ul>
          </div>
          <div class="widget-content tab-content">
            <div id="tab1" class="tab-pane active">
              <div role="tabpanel" class="tab-pane fade active in" id="general1">
                <table class="table" style="width: 100%;">
                  <tr>
                      <td>Título</td>
                      <td>{{ $report->title }}</td>
                  </tr>
                  <tr>
                      <td>Categoría</td>
                      <td>{{ $report->subCatReport->name }}</td>
                  </tr>
                  <tr>
                      <td>Fecha</td>
                      <td>{{ $report->date }}</td>
                  </tr>
                  <tr>
                      <td>Hora</td>
                      <td>{{ $report->time }}</td>
                  </tr>
                  <tr>
                      <td>Longitud</td>
                      <td>{{ $report->longitud }}</td>
                  </tr>
                  <tr>
                      <td>Latitud</td>
                      <td>{{ $report->latitud }}</td>
                  </tr>
                  <tr>
                      <td>Provincia</td>
                      <td>{{ ($report->communityGroup->community)[0]->district->canton->province->name }}</td>
                  </tr>
                  <tr>
                      <td>Cantón</td>
                      <td>{{ ($report->communityGroup->community)[0]->district->canton->name }}</td>
                  </tr>
                  <tr>
                      <td>Distrito</td>
                      <td>{{ ($report->communityGroup->community)[0]->district->name }}</td>
                  </tr>
                  <tr>
                      <td>Grupo de Comunidades</td>
                      <td>{{ $report->communityGroup->name }}</td>
                  </tr>
                  <tr>
                      <td>Comunidades</td>
                      <td>
                        <ul class="list-group">
                          @foreach($report->communityGroup->community as $community)
                            <li class="list-group-item">{{ $community->name }}</li>
                          @endforeach
                       </ul>
                      </td>
                  </tr>
                  <tr>
                      <td>Descripción</td>
                      <td>{{ $report->description }}</td>
                  </tr>
                </table>
                <div class="clearfix"></div>
              </div>
            </div>
            <div id="tab2" class="tab-pane">
              <div role="tabpanel" class="tab-pane fade active in" id="general1">
                <table class="table" style="width: 100%;">
                  <tr>
                      <td>Correo</td>
                      <td>{{ $report->user->email }}</td>
                  </tr>
                  <tr>
                      <td>Nombre</td>
                      <td>{{ $report->user->person->name }} {{ $report->user->person->last_name }} {{ $report->user->person->second_last_name }}</td>
                  </tr>
                  <tr>
                      <td>Cédula</td>
                      <td>{{ $report->user->person->official_id }}</td>
                  </tr>
                </table>
                <div class="clearfix"></div>
              </div>
            </div>
            <div id="tab3" class="tab-pane">
              <div role="tabpanel" class="tab-pane fade active in" id="general1">
                <table class="table" style="width: 100%;">
                  <tr class="header">
                    <td>
                      <td><strong>Tipo de Evidencia</strong></td>
                      <td><strong>Archivo</strong></td>
                    </td>
                  </tr>
                  @foreach($report->evidence as $evidence)
                    <tr>
                        <td>{{ $evidence->evidenceType->name}}</td>
                        @if ($evidence->evidenceType->name == 'Imagen')
                          <td><img src="{{ asset('evidence/'.$report->id.'/'.$evidence->multimedia_path) }}" style="display: block; margin-left: auto; margin-right: auto;"></td>
                        @else
                          <td><button class="btn btn-info" onclick="{{ link_to_asset('evidence/'.$report->id.'/'.$evidence->multimedia_path) }};">Descargar</button></td>
                        @endif
                    </tr>
                  @endforeach
                </table>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
          <button name="{{$report->name}}_edit" class="btn btn-warning" onclick="location.href = '/administracion/reportes/editar/{{ $report->id }}';">Editar</button>
          <button name="{{$report->name}}_edit" class="btn btn-danger" onclick="location.href = '/administracion/reportes/editar/{{ $report->id }}';">Eliminar</button>
          <button name="{{$report->name}}_edit" class="btn btn-success" onclick="location.href = '/administracion/reportes/editar/{{ $report->id }}';">Ignorar</button>
        </div>

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Reportes sobre publicación</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Usuario</th>
                  <th>Razón</th>
                  <th>Fecha</th>
                  <th>Acción</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($report_alerts as $alert) 
                <tr>
                  <td>{{$alert->email}}</td>
                  <td>{{$alert->reason}}</td>
                  <td>{{$alert->created_at}}</td>
                  <td><button name="{{$report->name}}_edit" class="btn btn-danger" onclick="location.href = '/administracion/reportes/editar/{{ $report->id }}';">Eliminar</button></td>
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