php artisan config:clear
php artisan migrate:refresh
php artisan dusk --log-junit browser_tests.xml
