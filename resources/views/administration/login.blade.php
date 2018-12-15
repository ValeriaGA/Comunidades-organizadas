<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Comunidades Organizadas</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    	<link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}" />
    	<link rel="stylesheet" href="{{ asset('admin/css/bootstrap-responsive.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin/css/matrix-login.css') }}" />
        <link href="{{ asset('admin/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    	<link href="{{ asset('http://fonts.googleapis.com/css?family=Open+Sans:400,700,800') }}" rel='stylesheet' type='text/css'>
        <script>
            document.getElementById("loginbutton").onclick = function() {
                document.getElementById("loginform").submit();
            }
        </script>
    </head>
    <body>
        <div id="loginbox">

            <div class="control-group">
                @include ('layouts.errors')
            </div>          
            <form id="loginform" class="form-vertical" action="/administracion/login" method="post">
                {{ csrf_field() }}
    			 <div class="control-group normal_text">
                    <h3><img src="{{ asset('admin/img/logo.png') }}" alt="Logo" /></h3>
                 </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"></i></span><input type="email" type="text" placeholder="Dirección de correo electrónico" required autofocus name="email">
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" placeholder="Contraseña" name="password" required>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-right"><button id="loginbutton" type="submit" class="btn btn-success"> Iniciar sesión</button></span>
                </div>
            </form>
        </div>
        
        <script src="{{ asset('admin/js/jquery.min.js') }}"></script>  
        <script src="{{ asset('admin/js/matrix.login.js') }}"></script> 
    </body>

</html>
