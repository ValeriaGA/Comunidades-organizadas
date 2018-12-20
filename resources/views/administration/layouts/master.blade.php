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
        <link rel="stylesheet" href="{{ asset('admin/css/fullcalendar.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/colorpicker.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin/css/uniform.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin/css/select2.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin/css/matrix-style.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin/css/matrix-media.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin/css/bootstrap-wysihtml5.css') }}" />
        <link href="{{ asset('admin/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('admin/css/jquery.gritter.css') }}" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700,800" rel='stylesheet' type='text/css'>
        <!-- Message CSS -->
        <link href="{{ asset('css/messages.css') }}" rel="stylesheet">
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
    <script src="{{ asset('admin/js/bootstrap-colorpicker.js') }}"></script> 
    <script src="{{ asset('admin/js/bootstrap-datepicker.js') }}"></script> 
    <script src="{{ asset('admin/js/jquery.toggle.buttons.js') }}"></script> 
    <script src="{{ asset('admin/js/masked.js') }}"></script> 
    <script src="{{ asset('admin/js/jquery.uniform.js') }}"></script> 
    <script src="{{ asset('admin/js/select2.min.js') }}"></script> 


    <script src="{{ asset('js/comboBoxControl.js') }}"></script>

<!--problems with checkbox-->
<!-- jquery.dataTables.min.js -->
<!-- matrix.tables.js -->

    <script src="{{ asset('admin/js/jquery.dataTables.min.js') }}"></script> 
    <script src="{{ asset('admin/js/matrix.js') }}"></script> 
    <script src="{{ asset('admin/js/matrix.tables.js') }}"></script>

    <script src="{{ asset('admin/js/matrix.form_common.js') }}"></script> 
    <script src="{{ asset('admin/js/wysihtml5-0.3.0.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.peity.min.js') }}"></script> 
    <script src="{{ asset('admin/js/bootstrap-wysihtml5.js') }}"></script> 

    <script src="{{ asset('admin/js/excanvas.min.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.flot.min.js') }}"></script> 
    <script src="{{ asset('admin/js/jquery.flot.resize.min.js') }}"></script>
    <script src="{{ asset('admin/js/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('admin/js/matrix.dashboard.js') }}"></script> 
    <script src="{{ asset('admin/js/jquery.gritter.min.js') }}"></script> 
    <script src="{{ asset('admin/js/matrix.interface.js') }}"></script> 
    <script src="{{ asset('admin/js/matrix.chat.js') }}"></script> 
    <script src="{{ asset('admin/js/jquery.validate.js') }}"></script> 
    <script src="{{ asset('admin/js/matrix.form_validation.js') }}"></script> 
    <script src="{{ asset('admin/js/jquery.wizard.js') }}"></script>
    <script src="{{ asset('admin/js/matrix.popover.js') }}"></script>

    <script type="text/javascript">
    // This function is called from the pop-up menus to transfer to
    // a different page. Ignore if the value returned is a null string:
    function goPage (newURL) {

    // if url is empty, skip the menu dividers and reset the menu selection to default
    if (newURL != "") {

        // if url is "-", it is this page -- reset the menu:
        if (newURL == "-" ) {
            resetMenu();            
        } 
        // else, send page to designated URL            
        else {  
            document.location.href = newURL;
        }
    }
    }

    // resets the menu selection upon entry to this page:
    function resetMenu() {
    document.gomenu.selector.selectedIndex = 2;
    }
    
    </script>

    <script>
        $('.textarea_editor').wysihtml5();
    </script>

    </body>
</html>
