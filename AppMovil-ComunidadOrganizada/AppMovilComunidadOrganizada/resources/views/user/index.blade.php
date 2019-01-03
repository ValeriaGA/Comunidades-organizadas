<!DOCTYPE html> 
<html> 
    <head> 
    <title>Comunidad organizada</title> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="{{ asset('css/jquery.mobile-1.1.1.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery-1.8.2.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mobile-1.1.1.min.js') }}"></script>  
</head> 
<body> 

<div id="login_page" data-role="page">
   
    <div data-role="header">
        <h1>Comunidad organizada</h1>
    </div>
    
    <div data-role="content">
        <form id="login_form">
            <input type="text" name="username" id="username" value="" 
                   placeholder="Username" required />
            <input type="password" name="password" id="password" value="" 
                   placeholder="Password" required />
            <a href="reports.html" id="login_button" data-role="button" data-theme="b">Login</a> 
            <a href="signup.html" data-role="button" data-theme="a" >Registrarse</a> 
        </form>
    </div> 
       
</div>

    
</body>
</html>
