php app/console cache:clear
php app/console assets:install web
php app/console doctrine:schema:update --force
php app/console doctrine:fixtures:load
php app/console server:run
