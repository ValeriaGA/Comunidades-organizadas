<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include ('layout.imports') 
</head>
<body>
   <div id="reports_page" data-role="page">

    <div data-role="header">
        <a href="/signin" class="close_session">Salir</a>
        <h1>@yield('title')</h1>
        <a href="/profile" class="close_session" data-icon="home">Perfil</a>
                   
    </div><!-- /header -->
    <div data-role="content">                   
            <a href="/report-type"  data-role="button" data-theme="b">Nueva publicación</a> 

             <div style="margin:30px"></div>

             <div data-role="navbar">
                <ul>
                    @yield('navbar')
                </ul>
            </div><!-- /navbar -->
                              
            @include ('layout.filter')    

            <form>
                <input data-type="search" id="searchForCollapsibleSetChildren" placeholder="Buscar">
            </form>
            
            @yield('content')
                           
    </div>
    <div data-role="footer" data-position="fixed">
        <div data-role="navbar" data-iconpos="bottom" >
            <ul >
                @yield('footer')
            </ul>
        </div>
    </div>
</div>
    
</body>
</html>