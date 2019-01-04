
Crear un proyecto laravel
1- instalar el exe de composer
2- en consola ejecutar:
composer create-project laravel/laravel mi-proyecto-laravel

Comandos para inicializar el proyecto una vez clonado

->composer install 
->composer update
->php artisan key:generate

Para migraciones(crear base de datos)
->php artisan migrate
->php artisan migrate:refresh


Para correr la aplicacion
->php artisan serve

Para crear la plantilla de test
php artisan make:test ../ruta/nametestTest


Para correr los test
->vendor/bin/phpunit
alias test=vendor/bin/phpunit //Asi usamos test para ejecutar las pruebas
