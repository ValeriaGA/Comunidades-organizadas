@extends('layout.master')


@section('title', 'Reportes de seguridad')

@section('navbar') 
    <li><a href="/news" >Noticias</a></li>
    <li><a href="/security" class="ui-btn-active">Seguridad</a></li>
    <li><a href="/service">Servicios</a></li>    
@endsection              

@section('content')
<!-- inicio de lista report -->
    <div data-role="controlgroup" style="border-color: black; border-width: 10px">
                <div data-role="header" style="overflow:hidden;" data-theme="c">
                    
                    <a href="#" data-icon="gear" class="ui-btn-right">Reportar</a>
                    <h3>Maria Gonzales</h3>
                    
                </div><!-- /report -->
                
                <h2>Titulo del reporte</h2>
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

                            <label for="sub_cat_report" class="select">Tipo de delito:</label>
                            <input type="text" id="" disabled="disabled" value="Robo"/> 

                            <label for="cat_weapon" class="select">Tipo de arma usada:</label>
                            <input type="text" id="" disabled="disabled" value="Arma blanca"/> 

                            <label for="cat_transportation" class="select">Medio de transporte del perpetrador:</label>
                            <input type="text" id="" disabled="disabled" value="Carro"/> 

                            <label  class="select">Numero de perpetradores masculinos:</label>
                            <input type="text" id="" disabled="disabled" value="Comunidad 1"/> 

                            <label  class="select">Numero de perpetradoras femeninas:</label>
                            <input type="text" id="" disabled="disabled" value="0"/> 

                            <label for="number_male_victims" class="select">Numero de victimas masculinos:</label>
                            <input type="text" id="" disabled="disabled" value="1"/> 

                            <label for="number_male" class="select">Numero de victimas femeninas:</label>
                            <input type="text" id="" disabled="disabled" value="1"/> 

                            <label for="state" class="select">Estado de la publicación:</label>
                            <input type="text" id="" disabled="disabled" value="Procesado"/> 

                            <label for="evidence">Evidencia:</label>
                            <div data-role="controlgroup">
                                <img src="/images/evidence.jpg" height="200px" alt="">
                            </div>

                        </div>
                    </div>
                </div>
                
            </div><!-- Report end-->
            
            <div style="margin:50px"></div>
            
            <!-- inicio de report -->
            <div data-role="controlgroup" style="border-color: black; border-width: 10px">
                <div data-role="header" style="overflow:hidden;" data-theme="c">
                    
                    <a href="#" data-icon="gear" class="ui-btn-right">Reportar</a>
                    <h3>Marta Gonzales</h3>
                    
                </div><!-- /report -->
                
                <h2>Titulo del reporte</h2>
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

                            <label for="sub_cat_report" class="select">Tipo de delito:</label>
                            <input type="text" id="" disabled="disabled" value="Robo"/> 

                            <label for="cat_weapon" class="select">Tipo de arma usada:</label>
                            <input type="text" id="" disabled="disabled" value="Arma blanca"/> 

                            <label for="cat_transportation" class="select">Medio de transporte del perpetrador:</label>
                            <input type="text" id="" disabled="disabled" value="Carro"/> 

                            <label  class="select">Numero de perpetradores masculinos:</label>
                            <input type="text" id="" disabled="disabled" value="Comunidad 1"/> 

                            <label  class="select">Numero de perpetradoras femeninas:</label>
                            <input type="text" id="" disabled="disabled" value="0"/> 

                            <label for="number_male_victims" class="select">Numero de victimas masculinos:</label>
                            <input type="text" id="" disabled="disabled" value="1"/> 

                            <label for="number_male" class="select">Numero de victimas femeninas:</label>
                            <input type="text" id="" disabled="disabled" value="1"/> 

                            <label for="state" class="select">Estado de la publicación:</label>
                            <input type="text" id="" disabled="disabled" value="Procesado"/> 

                            <label for="evidence">Evidencia:</label>
                            <div data-role="controlgroup">
                                <img src="/images/evidence.jpg" height="200px" alt="">
                            </div>

                        </div>
                    </div>
                </div>
                
            </div><!-- Report end-->
@endsection
            
               
@section('footer')
    <li><a href="/news" data-icon="grid" data-theme="b">Publicaciones</a></li>                    
    <li><a href="/map" data-icon="star" >Mapa</a></li>
    <li><a href="/about" data-icon="info">Sobre nosotros</a></li>
@endsection

