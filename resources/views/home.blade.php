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


    
                <div class="tab">
                    <button class="tablinks" onclick="openCity(event, 'NEWS')" id="defaultOpen">Noticias</button>
                    <button class="tablinks" onclick="openCity(event, 'SECURITY')">Reportes de Seguridad</button>
                    <button class="tablinks" onclick="openCity(event, 'SERVICES')">Reportes de Servicios</button>
                </div>

                @include('layouts.home_news_section')
                @include('layouts.home_security_section')
                @include('layouts.home_services_section')
                {{--<div class="row">
                    <div class="col-md-12 col-lg-8 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Reportes recientes</h3>
                            <div class="comment-center p-t-10">
                                @foreach ($reports as $report)
                                  @include('report.report')
                                @endforeach 
                                @include('report.report')
                            </div>

                            {{ $reports->links() }}
                        </div>
                    </div>
                </div> --}}
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