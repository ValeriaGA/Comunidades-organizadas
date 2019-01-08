@extends('layout.add')

@section('title', 'Noticia')   
           
@section('content')
<form id="service_form" data-ajax="false">
                  
    <input type="text" name="title" id="title" value="" placeholder="Titulo" required />               

    
    <textarea name="description" id="description" cols="50" rows="100" placeholder="Descripción"></textarea>
    
    <label for="community" class="select">Comunidad:</label>
    <select name="community" id="community" data-native-menu="false">
        <option>Comunidad</option>
        <option id="1" value="1">Comunidad 1</option>
        <option id="2" value="2">Comunidad 2</option>
        <option id="3" value="3">Comunidad 3</option>
        <option id="4" value="4">Comunidad 4</option>
    </select>
    
    
</form>
@endsection       
        
     