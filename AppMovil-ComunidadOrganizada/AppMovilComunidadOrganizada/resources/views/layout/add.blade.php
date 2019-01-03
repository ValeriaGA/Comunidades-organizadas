<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layout.imports')
   
</head>
<body>
    <div id="add_page" data-role="page">
       
        <div data-role="header">
            <h1>@yield('title')</h1>    
            <a href="report_type.html" data-rel="back">Back</a>
        </div><!-- /header -->
        
        
        <div data-role="content">    
            @yield('content')
        </div> 
        <div data-role="footer" data-position="fixed" data-theme="">
            <input type="submit" value="Publicar" data-theme="b" >
        </div><!-- /footer -->   
    </div>
</body>
</html>