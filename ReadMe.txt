Comandos para inicializar el proyecto una vez clonado
->composer install 
->composer update

// Crear BD
CREATE DATABASE InfoDenuncias;

->php artisan migrate
->php artisan migrate:refresh
->php artisan serve


Agregar a migrations:
insert into InfoDenuncias.type_of_incidents(name, image_path) values ('Otro', 'other_small.png'), ('Asalto', 'assault_small.png'), ('Robo de Autos', 'autotheft_small.png'), ('Robo', 'burglary_small.png'), ('Robo de Tienda', 'shoplifting_small.png'), ('Actividades Sospechosas', 'suspactivity_small.png'), ('Homicidio', 'homicide_small.png'), ('Vandalismo', 'vandalism_small.png'), ('Drogas', 'drugs_small.png');

insert into InfoDenuncias.weapons(name) values ('No Aplica'), ('Blancas'), ('Contundentes'), ('Arrojadizas'), ('Proyeccion'), ('Fuego'), ('Bomba');
insert into InfoDenuncias.transportations(name) values ('Sin vehiculo'), ('Motocicleta'), ('Carro'), ('Camion'), ('Buseta');


Falta:
+ Modificar texto al hacer click en un marcador en el mapa
+ Filtrar en vista de busqueda (Tipo de incidente)
+ Estadisticas
