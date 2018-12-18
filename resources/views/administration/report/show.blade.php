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
              <li><a data-toggle="tab" href="#tab2">Involucrados</a></li>
              <li><a data-toggle="tab" href="#tab3">Evidencia</a></li>
            </ul>
          </div>
          <div class="widget-content tab-content">
            <div id="tab1" class="tab-pane active">
              <div role="tabpanel" class="tab-pane fade active in" id="general1">
                <table class="table" style="width: 100%;">
                  <tr>
                      <td>Fecha</td>
                      <td>{{ $report->date }}</td>
                  </tr>
                  <tr>
                      <td>Hora</td>
                      <td>{{ $report->time }}</td>
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
              
            </div>
            <div id="tab3" class="tab-pane">
              
            </div>
          </div>
          <button name="{{$report->name}}_edit" class="btn" onclick="location.href = '/administracion/reportes/editar/{{ $report->id }}';">Editar</button>
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
                </tr>
              </thead>
              <tbody>
                @foreach ($report_alerts as $alert) 
                <tr class="">
                  <td>{{$alert->email}}</td>
                  <td>{{$alert->reason}}</td>
                  <td>{{$alert->created_at}}</td>
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