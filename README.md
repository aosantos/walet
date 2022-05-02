Componentes
NGINX (latest)
MYSQL (latest)
PHP8.0-FPM (latest)
COMPOSER (lastest)

Instalação

git clone  https://github.com/aosantos/walet
cd docker-laravel-app-wallet
cp .env-example .env
cp ./src/.env.example ./src/.env
docker-compose up -d --build

COMANDOS

docker-compose run --rm composer install

docker-compose run --rm artisan key:generate

docker-compose run --rm artisan migrate

docker-compose run --rm artisan db:seed

docker-compose run --rm artisan l5-swagger:generate

docker-compose run --rm artisan test

MYSQL
Host: locahost
Port: 3306
User: root
Password: secret
