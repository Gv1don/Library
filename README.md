# Library
Library account with book tracking 

 # Start
 *configure env file before start for your performance*
 cd library
 composer install
 
 ./vendor/bin/sail up -d
 ./vendor/bin/sail shell
 php artisan migrate
 php artisan db:seed
 exit
