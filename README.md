# web-benchmark

cp docker-compose.yml.dist cp docker-compose.yml
docker-compose build
set 'benchmark.local' in hosts
docker-compose exec php composer install && exit