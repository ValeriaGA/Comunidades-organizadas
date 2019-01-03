<!DOCTYPE html>
<html lang="en">
<head>
    @include ('layout.imports')
</head>
<body>
    <div id="add_report_page" data-role="page">
        <div data-role="header">
            <h1>Seleccione tipo de publicación</h1>    
            <a href="reports.html" data-rel="back">Back</a>
        </div><!-- /header -->
        
        <div data-role="content">    
            <a href="add_news.html"  data-role="button" data-theme="a" data-icon="arrow-r" >Noticia informativa</a> 
            <a href="add_security_report.html"  data-role="button" data-theme="b" data-icon="arrow-r">Reporte de seguridad</a> 
            <a href="add_service_report.html"  data-role="button" data-theme="c" data-icon="arrow-r">Reporte de servicio</a> 
        </div> 
           
        <div data-role="footer" data-position="fixed"  >
        </div><!-- /footer -->
        
    </div>
</body>
</html>