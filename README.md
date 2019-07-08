# web-benchmark

## Installation

Clone the repository, enter the main folder and run:

```
cp docker-compose.yml.dist docker-compose.yaml &&\
cp .env.dist .env
```

Than run:
```
docker-compose up
```
When containers are up and running, execute:

```
docker-compose exec php composer install && exit
```

## Usage
To create benchmark execute command "app:web-benchmark test.pl"
```
docker-compose exec php bin/console app:web-benchmark {url1} {url2,url3}
```