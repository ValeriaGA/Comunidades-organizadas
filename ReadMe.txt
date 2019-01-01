Comandos para inicializar el proyecto una vez clonado

composer install 
composer update
composer dump-autoload

CREATE DATABASE ComunidadesOrganizadas;

php artisan migrate:fresh --seed

php artisan serve
php artisan key:generate
php artisan cache:clear

php artisan db:seed

#Pruebas
php artisan dusk:install
