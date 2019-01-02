<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Comunidades Organizadas</title>
        <meta name="_token" content="{{ csrf_token() }}" /> 
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('plugins/images/info-logo-dark.png') }}">
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin/css/bootstrap-responsive.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin/css/uniform.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin/css/select2.css') }}" />
        @yield ('css')
        <link rel="stylesheet" href="{{ asset('admin/css/matrix-style.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin/css/matrix-media.css') }}" />
        <link href="{{ asset('admin/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('admin/css/jquery.gritter.css') }}" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700,800" rel='stylesheet' type='text/css'>
        <!-- Message CSS -->
        <link href="{{ asset('css/flash-messages.css') }}" rel="stylesheet">
    </head>
    <body>


    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">

        <!--Header-part-->
        <div id="header">
          <h1><a href="/">Panel Administrativo</a></h1>
        </div>

        @include ('administration.layouts.top_header')
        @include ('administration.layouts.side_bar')
        @if ($flash = session('message'))
          <div id="flash-message" class="alert alert-success" role='alert'>
            
              {{ $flash }}

          </div>
        @endif
        @yield ('content')
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->


    <!--Footer-part-->

    <div class="row-fluid">
        <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
    </div>
    <!--end-Footer-part-->
    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.ui.custom.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.uniform.js') }}"></script> 
    <script src="{{ asset('admin/js/select2.min.js') }}"></script> 
    <script src="{{ asset('admin/js/matrix.js') }}"></script>
    @yield ('js')

    </body>
</html>
