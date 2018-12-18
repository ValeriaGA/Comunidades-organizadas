@extends('layouts.master')

@section('content')

<div id="page-wrapper">
      <div class="container-fluid">
          <div class="row bg-title">
              <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                  <h4 class="page-title">Incidente</h4> </div>
              <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                  <ol class="breadcrumb">
                      <li><a href="/">Home</a></li>
                      <li class="active">Incidente</li>
                  </ol>
              </div>
              <!-- /.col-lg-12 -->
          </div>

          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="white-box">
                    <div class="panel panel-default">
                        <div class="panel-heading"> 
                            Detalles 
                            @if($report -> user_id == Auth::id())
                                <a id="editReportButton" style="margin-left: 750px; background-color: green; color:white;" href="/servicio/editar/{{ $report->id }}" class="btn btn btn-rounded btn-default btn-outline m-r-5" active="0">
                                    Editar
                                </a>
                            @endif
                        </div>
                        <div class="panel-wrapper collapse in">
                            <ul class="nav customtab nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#general1" aria-controls="general" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs"> Generales</span></a></li>
                                <li role="presentation" class=""><a href="#evidence1" aria-controls="evidence" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-email"></i></span> <span class="hidden-xs">Evidencia</span></a></li>
                                <li role="presentation" class=""><a href="#user1" aria-controls="user" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs"> Usuario</span></a></li>
                            </ul>
                            <div class="panel-body">
                                <div class="tab-content m-t-0">

                                    <div role="tabpanel" class="tab-pane fade active in" id="general1">
                                      <table class="table" style="width: 100%;">
                                          <tr class="header" >
                                              <td colspan="2">
                                                  Detalles
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>Categoría Reporte</td>
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
                                          <tr class="header">
                                              <td>
                                                  Descripción
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>{{ $report->description }}</td>
                                          </tr>
                                      </table>
                                        <div class="clearfix"></div>
                                    </div>
                                    
                                    <div role="tabpanel" class="tab-pane fade" id="evidence1">
                                        <table class="table table-bordered" style="width: 100%;">
                                          @foreach($report->evidence as $evidence)
                                          <tr class="header">
                                            <td colspan="2">
                                                Evidencia
                                            </td>
                                          </tr>
                                          <tr>
                                              <td><strong>Tipo de Evidencia</strong></td>
                                              <td><strong>Archivo</strong></td>
                                          </tr>
                                          <tr>
                                              <td>{{ $evidence->evidenceType->name}}</td>
                                              <td>{{ $evidence->multimedia_path}}</td>
                                              <!-- <img src="{{-- asset('images/evidence/'.$evidence->multimedia_path) --}}" style="display: block; margin-left: auto; margin-right: auto;"> -->
                                          </tr>
                                          @endforeach
                                      </table>
                                      <div class="clearfix"></div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade" id="user1">
                                        <div class="col-md-4">
                                          @if (!is_null($report->user->avatar_path))
                                              <img src="{{ asset('images/users/'.$incident->user->avatar_path) }}"  alt="user" class="img-responsive thumbnail m-r-15">
                                          @else
                                              <img src="../plugins/images/users/profile.png"  alt="user" class="img-responsive thumbnail m-r-15">
                                          @endif
                                            
                                        </div>
                                        <div class="col-md-6">
                                            <h3>{{ $report->user->person->name }} {{ $report->user->person->last_name }} {{ $report->user->person->second_last_name }}</h3>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title panel-heading">Comentarios</h3>

                            <div class="form-group" >

                                <div class="col-md-12" style="margin-bottom: 10px;">
                                    <textarea id="commentInput" rows="5" class="form-control form-control-line" name="description" placeholder="Nuevo comentario..."required></textarea>
                                </div>

                                <button id="commentButton" style="margin-left: 500px;" onclick="addComment('commentInput')" class="btn btn btn-rounded btn-default btn-outline m-r-5 like-button" active="0">
                                    Comentar
                                </button>
                            </div>

                            <div id="commentSection" class="comment-center p-t-10">
                                
                                @include('comment.comment')
                            </div>
            
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by wrappixel.com </footer>
        </div>

@endsection