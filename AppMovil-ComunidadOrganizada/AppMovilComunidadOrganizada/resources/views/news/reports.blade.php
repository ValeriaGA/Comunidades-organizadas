@extends('layout.master')


@section('title', 'Noticias')
    

@section('navbar') 
    <li><a href="/news" class="ui-btn-active">Noticias</a></li>
    <li><a href="/security">Seguridad</a></li>
    <li><a href="/service">Servicios</a></li>   
@endsection              

@section('content')
<div data-role="controlgroup" style="border-color: black; border-width: 10px">
    <div data-role="header" style="overflow:hidden;" data-theme="c">
        
        <a href="#" data-icon="gear" class="ui-btn-right">Reportar</a>
        <h3>Maria Gonzales</h3>
        
    </div><!-- /report -->
    
    <h2>Titulo de noticia</h2>
    <p>Descripcion de noticia: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero assumenda eaque sed praesentium deleniti recusandae odio neque totam excepturi aut, quo natus nostrum tempore voluptas omnis. Dolores mollitia dolor quis!</p>
    
    <a href="#" class="ui-btn-left" style="text-decoration: none"><img src="///png.icons8.com/thumbs_up/android/24/5B5B5B" alt=""><strong>20</strong></a>
                    
</div><!-- Report end-->
@endsection
            
               
@section('footer')
    <li><a href="/news" data-icon="grid" data-theme="b">Publicaciones</a></li>                    
    <li><a href="/map" data-icon="star" >Mapa</a></li>
    <li><a href="/about" data-icon="info">Sobre nosotros</a></li>
@endsection
