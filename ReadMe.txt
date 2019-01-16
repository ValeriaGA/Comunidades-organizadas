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


#Localizacion al español
composer require laraveles/spanish
php artisan laraveles:install-lang
	# por ultimo en el config/app.php: 'locale' => 'es'