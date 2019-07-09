# web-benchmark
Not everything from 'RECRUITMENT TASK' is DONE due priorities. 
There was a lot of work in commercial projects.  
But it should be enough to show abilities.

##About
Simple project for website benchmarking.

Symfony 4.4.0-DEV used, just to check it out :-)

## Installation

Clone the repository, enter the main folder and run:

```
cp docker-compose.yml.dist docker-compose.yaml &&\
cp .env.dist .env
```

Than run:
```
docker-compose up -d
```
When containers are up and running, execute:

```
docker-compose exec php composer install && exit
```

## Usage
To create benchmark execute command "app:web-benchmark test.pl"
```
docker-compose exec php php bin/console app:web-benchmark {url1} {url2,url3}
```

## Tests
```
docker-compose exec php php bin/phpunit
``` 