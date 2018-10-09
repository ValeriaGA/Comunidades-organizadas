@extends('layouts.master')

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