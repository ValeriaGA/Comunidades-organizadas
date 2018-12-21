@extends('layouts.master')

@section('content')
        
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Información</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Información</a></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            


    
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading"> Información </div>
                            <div class="panel-wrapper collapse in">
                                <ul class="nav customtab nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#news1" aria-controls="news" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs">Bomberos</span></a></li>
                                    <li role="presentation" class=""><a href="#security1" aria-controls="security" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Policía</span></a></li>
                                    <li role="presentation" class=""><a href="#services1" aria-controls="services" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-email"></i></span> <span class="hidden-xs">OIJ</span></a></li>
                                </ul>
                                <div class="panel-body">
                                    <div class="tab-content m-t-0">
                                        <div role="tabpanel" class="tab-pane fade active in" id="news1">
                                            <div class="col-md-12 col-lg-8 col-sm-12">
                                                    <div class="white-box">
                                                        <div class="comment-center p-t-10">
                                                            
                                                            <div class="comment-body">
                                                                <div class="mail-contnet">
                                                                    <span class="time"><b>Teléfonos</b>: 2435-4837</span>
                                                                    <br/>
                                                                    <br/>
                                                                    <span> 
                                                                        Brindamos servicios de prevención y protección para salvaguardar la vida,
                                                                         los bienes y el medio ambiente. 
                                                                        
                                                                    </span>
                                                                </div>
                                                            </div>
                                                          
                                                        </div>
                                                  
                                                    </div>
                                                </div>
                                            <div class="clearfix"></div>
                                        </div>

                                        <div role="tabpanel" class="tab-pane fade" id="security1">
                                                <div class="col-md-12 col-lg-8 col-sm-12">
                                                        <div class="white-box">
                                                            <div class="comment-center p-t-10">
                                                                
                                                                <div class="comment-body">
                                                                    <div class="mail-contnet">
                                                                        <span class="time"><b>Teléfonos</b>: 2435-4837</span>
                                                                        <br/>
                                                                        <br/>
                                                                        <span > Seguridad ante todo, </span>
                                                                    </div>
                                                                </div>
                                                              
                                                            </div>
                                                      
                                                        </div>
                                                    </div>
                                            <div class="clearfix"></div>
                                        </div>

                                        <div role="tabpanel" class="tab-pane fade" id="services1">                                           
                                                <div class="col-md-12 col-lg-8 col-sm-12">
                                                        <div class="white-box">
                                                            <div class="comment-center p-t-10">
                                                                
                                                                <div class="comment-body">
                                                                    <div class="mail-contnet">
                                                                        <span class="time"><b>Teléfonos</b>: 2435-4837</span>
                                                                        <br/>
                                                                        <br/>
                                                                        <span > Organismo de Invesigación Judicial </span>
                                                                    </div>
                                                                </div>
                                                              
                                                            </div>
                                                      
                                                        </div>
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
            <!-- /.container-fluid -->

            <footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by wrappixel.com </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->

            <!-- google maps api -->
<!-- <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="../plugins/bower_components/gmaps/gmaps.min.js"></script>
    <script src="../plugins/bower_components/gmaps/jquery.gmaps.js"></script> -->

    
@endsection