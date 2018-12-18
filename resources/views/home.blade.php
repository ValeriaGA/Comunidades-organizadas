@extends('layouts.master')

@section('content')
        
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Inicio</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Inicio</a></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                
                @auth
                <!-- row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <button type='submit' onclick="window.location.href='/reporte'" class="btn btn-success">Agregar Reporte</button>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                @endauth


    
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading"> Publicaciones </div>
                            <div class="panel-wrapper collapse in">
                                <ul class="nav customtab nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#news1" aria-controls="news" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs">Noticias</span></a></li>
                                    <li role="presentation" class=""><a href="#security1" aria-controls="security" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Reportes de Seguridad</span></a></li>
                                    <li role="presentation" class=""><a href="#services1" aria-controls="services" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-email"></i></span> <span class="hidden-xs">Reportes de Servicios</span></a></li>
                                </ul>
                                <div class="panel-body">
                                    <div class="tab-content m-t-0">
                                        <div role="tabpanel" class="tab-pane fade active in" id="news1">
                                            @include('home.news')
                                            <div class="clearfix"></div>
                                        </div>

                                        <div role="tabpanel" class="tab-pane fade" id="security1">
                                            @include('home.security')
                                            <div class="clearfix"></div>
                                        </div>

                                        <div role="tabpanel" class="tab-pane fade" id="services1">                                           
                                            @include('home.service')
                                            <div class="clearfix"></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2" style="width: 300px;">
                        <div class="white-box">
                            Filtrar por Grupo de Comunidades
                            <br/>
                            <form class="form-horizontal form-material" action="/statistics/bar" method="post" enctype="multipart/form-data">
                                <div style="margin-top: 25px; margin-left: 0px; display:inline;">
                                    <label >Grupo</label>
                                    
                                    <select id="communityGroupsFilter" style="width:250px; display:inline;" class="form-control" name="province" required>
                                        <option value="1" selected>Comunidades de San Mateo</option>
                                        
                                    </select>
                                </div>
                                <br/>
                                <br/>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success">Filtrar</button>
                                    </div>
                                </div>
                            </form>
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