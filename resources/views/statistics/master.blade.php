@extends('layouts.master')

@section('js')
    
    <!-- chartist chart -->
    <script src="{{ asset('plugins/bower_components/chartist-js/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="{{ asset('plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('js/dashboard1.js') }}"></script>
@endsection

@section('content')

    <!-- jvectormap CSS -->
    <link href="{{ asset('plugins/bower_components/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet">
    <!-- jvectormap JavaScript -->
    <script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
    <script src="{{ asset('plugins/bower_components/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
    <script src="{{ asset('js/jquery-jvectormap-world-mill.js') }}"></script>
    <!-- bar-colors -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
    <script src="{{ asset('js/morris.js') }}"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script>
    <script src="{{ asset('lib/example.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('lib/example.css') }}">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.css">
    <link rel="stylesheet" href="{{ asset('css/morris.css') }}">


    <style>
        #chartdiv {
            width: 100%;
            height: 500px;
        }
    
    </style>
    <!-- Resources -->

    <script src="https://www.amcharts.com/lib/4/core.js"></script>
    <script src="https://www.amcharts.com/lib/4/maps.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
    <script src="{{ asset('js/CRmap.js') }}"></script>

        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Estadísticas</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Estadísticas</a></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                @yield('stats_content')

            </div>

                <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by wrappixel.com </footer>
        </div>

        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
@endsection