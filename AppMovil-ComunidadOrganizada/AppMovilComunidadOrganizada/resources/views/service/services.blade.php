@extends('layout.master')


@section('title', 'Reportes de servicios')

@section('navbar') 
    <li><a href="reports.html" >Noticias</a></li>
    <li><a href="security.html">Seguridad</a></li>
    <li><a href="services.html" class="ui-btn-active">Servicios</a></li>   
@endsection              

@section('content')
<!-- inicio de report -->
<div data-role="controlgroup" style="border-color: black; border-width: 10px">
        <div data-role="header" style="overflow:hidden;" data-theme="c">
            
            <a href="#" data-icon="gear" class="ui-btn-right">Reportar</a>
            <h3>Maria Gonzales</h3>
            
        </div><!-- /report -->
        
        <h2>Titulo de noticia</h2>
        <p>Descripcion de noticia: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero assumenda eaque sed praesentium deleniti recusandae odio neque totam excepturi aut, quo natus nostrum tempore voluptas omnis. Dolores mollitia dolor quis!</p>
        
        <a href="#" class="ui-btn-left" style="text-decoration: none"><img src="///png.icons8.com/thumbs_up/android/24/5B5B5B" alt=""><strong>20</strong></a>
        <div data-role="collapsibleset" data-inset="true">
            <div data-role="collapsible" data-collapsed-icon="info">
                <h3>Ver detalles</h3>
                <div data-role="controlgroup">
                    
                    <label for="date">Fecha de lo ocurrido:</label>
                    <input type="text" id="" disabled="disabled" value="11/10/18"/> 

                    <label for="community" class="select">Comunidad:</label>
                    <input type="text" id="" disabled="disabled" value="Comunidad 1"/> 

                    <label for="sub_cat_report" class="select">Tipo de servicio:</label>
                    <input type="text" id="" disabled="disabled" value="Agua"/> 

                    <label for="state" class="select">Estado de la publicación:</label>
                    <input type="text" id="" disabled="disabled" value="Procesado"/> 

                    <label for="evidence">Evidencia:</label>
                    <div data-role="controlgroup">
                        <img src="/images/evidence.jpg"  height="200px" alt="">
                    </div>

                </div>
            </div>
        </div>
        
    </div><!-- Report end-->
@endsection
            
               
@section('footer')
    <li><a href="reports.html" data-icon="grid" data-theme="b">Publicaciones</a></li>                    
    <li><a href="map.html" data-icon="star">Mapa</a></li>
    <li><a href="about.html" data-icon="info">Sobre nosotros</a></li>
@endsection


