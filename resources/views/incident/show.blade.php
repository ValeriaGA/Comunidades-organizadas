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
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Detalles</h3>
                            <div> 
                              @if (!is_null($incident->user->avatar_path))
                                  <img src="{{ asset('images/users/'.$incident->user->avatar_path) }}"  alt="user" class="img-circle">
                              @else
                                  <img src="../plugins/images/users/profile.png"  alt="user" class="img-circle">
                              @endif
                            </div>
                            <div>
                                <h5>{{ $incident->user->name }}</h5>
                                <span><b>Fecha y Hora</b>: {{ $incident->date }} {{ $incident->time }}</span>
                                <br/>
                                <span><b>Lugar:</b> {{ $incident->location }}</span>
                                <br/>
                                <span><b>Tipo:</b> {{ $incident->typesOfIncident->name }}</span>
                                <br/>
                                <span><b>Descripción:</b> {{ $incident->description }} </span>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Evidencia</h3>
                            <div id="accordion">

                              <div class="card">
                                <div class="card-header" id="headingOne">
                                  <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                      Evidencia #1
                                    </button>
                                  </h5>
                                </div>

                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                  <div class="card-body">
                                    <img src="../images/pandas_slide.gif" style="display: block; margin-left: auto; margin-right: auto;">
                                  </div>
                                </div>
                              </div>

                              <div class="card">
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
                              </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by wrappixel.com </footer>
        </div>

@endsection