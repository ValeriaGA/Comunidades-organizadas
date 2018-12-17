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
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"> Detalles </div>
                        <div class="panel-wrapper collapse in">
                            <ul class="nav customtab nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#general1" aria-controls="general" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs"> Generales</span></a></li>
                                <li role="presentation" class=""><a href="#specific1" aria-controls="specific" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Específicos</span></a></li>
                                <li role="presentation" class=""><a href="#perpetrator1" aria-controls="perpetrator" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Perpetradores</span></a></li>
                                <li role="presentation" class=""><a href="#evidence1" aria-controls="evidence" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-email"></i></span> <span class="hidden-xs">Evidencia</span></a></li>
                                <li role="presentation" class=""><a href="#user1" aria-controls="user" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs"> Usuario</span></a></li>
                            </ul>
                            <div class="panel-body">
                                <div class="tab-content m-t-0">
                                    <div role="tabpanel" class="tab-pane fade active in" id="general1">
                                        <div class="col-md-4">
                                            <h4><b>Fecha</b>: 2018 - 05 - 05</h4>
                                            <h4><b>Hora</b>: 12:00pm </h4>
                                            <h4><b>Ubicación:</b> Barrio x</h4>
                                        </div>
                                        <div class="col-md-6 pull-right">
                                            <h4><b>Descripción:</b></h4>
                                            <h4> Asalto a arma </h4>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="specific1">
                                        <div class="col-md-4">
                                            <h4><b>Tipo:</b> Seguridad </h4>
                                            <h4><b>Arma:</b> X</h4>
                                            <h4><b>Vehiculo:</b> Bicicleta</h4>
                                            
                                        </div>
                                        <div class="col-md-6 pull-right">
                                            <h4><b>Perpetradores:</b> 2</h4>
                                            <h4><b>Victimas:</b> 1</h4>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>


                                    <!--PERPETRATOR TAB-->
                                    <div role="tabpanel" class="tab-pane fade" id="perpetrator1">
                                            <div class="white-box">
                                                <div class="comment-center p-t-10">
                                                    <div class="container">
                                                        <table class="table table-bordered" style="width: 550px;">
                                                            <tr class="header" >
                                                                <td colspan="2">
                                                                    Perpetrador 1
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Género</strong></td>
                                                                <td><strong>Descripción</strong></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Masculino</td>
                                                                <td>Tatuaje en el hombro</td>
                                                            </tr>
                                                            <tr class="header">
                                                                <td colspan="2">
                                                                    Perpetrador 2
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Género</strong></td>
                                                                <td><strong>Descripción</strong></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Femenino</td>
                                                                <td>Pelo Rubio</td>
                                                            </tr>
                                                        </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="clearfix"></div>
                                        </div>
                                   <!--PERPETRATOR TAB-->


                                    <div role="tabpanel" class="tab-pane fade" id="evidence1">
                                        <div id="accordion">
                                          {{--@foreach ($incident->evidence as $evidence)--}}
                                              <div class="card">
                                                <div class="card-header" id="headingOne">
                                                  <h5 class="mb-0">
                                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                      <i class="fa fa-file-image-o fa-fw"></i> Imagen | 
                                                      <i class="fa fa-file-video-o fa-fw"></i> Video | 
                                                      <i class="fa fa-file-audio-o fa-fw"></i> Audio
                                                    </button>
                                                  </h5>
                                                </div>

                                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                                  <div class="card-body">
                                                    <img src="{{-- asset('images/evidence/'.$evidence->multimedia_path) --}}" style="display: block; margin-left: auto; margin-right: auto;">
                                                  </div>
                                                </div>
                                              </div>
                                          {{--@endforeach--}}
                                          <!-- <div class="card">
                                            <div class="card-header" id="headingTwo">
                                              <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                  Evidencia #2
                                                </button>
                                              </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                              <div class="card-body">
                                                <img src="../images/pandas.jpg" style="display: block; margin-left: auto; margin-right: auto;">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="card">
                                            <div class="card-header" id="headingThree">
                                              <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                  Evidencia #3
                                                </button>
                                              </h5>
                                            </div>
                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                              <div class="card-body">
                                                
                                              </div>
                                            </div>
                                          </div> -->
                                        </div> 
                                        <div class="clearfix"></div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="user1">
                                        <div class="col-md-4">
                                          {{--@if (!is_null($incident->user->avatar_path))
                                                <img src="{{ asset('images/users/'.$incident->user->avatar_path) }}"  alt="user" class="img-responsive thumbnail m-r-15">
                                            @else
                                                <img src="../plugins/images/users/profile.png"  alt="user" class="img-responsive thumbnail m-r-15">
                                            @endif--}}
                                            
                                        </div>
                                        <div class="col-md-6">
                                            {{--<h3>{{ $incident->user->name }} {{ $incident->user->last_name }} {{ $incident->user->second_last_name }}</h3>--}}
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              <div class="row">
                    <div class="col-md-12 col-lg-8 col-sm-12">
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