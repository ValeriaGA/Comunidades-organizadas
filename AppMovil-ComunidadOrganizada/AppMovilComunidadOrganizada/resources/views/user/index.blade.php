<!DOCTYPE html> 
<html> 
    <head> 
        @include ('layout.imports')  
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
            <a href="/news" id="login_button" data-role="button" data-theme="b">Iniciar sesión</a> 
            <a href="/signup" data-role="button" data-theme="a" >Registrarse</a> 
        </form>
    </div> 
       
</div>

    
</body>
</html>
