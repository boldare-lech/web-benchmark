# web-benchmark
Not everything from 'RECRUITMENT TASK' is DONE 
due priorities(commercial projects) and some misunderstanding about time :),
so some "TODO's" are left. 

But it should be enough to show abilities.


## About
Simple project for website benchmarking.


## Installation

Clone the repository, 
```
git clone git@github.com:boldare-lech/web-benchmark.git
```


Enter the main folder and run:

```
cp docker-compose.yml.dist docker-compose.yml &&\
cp .env.dist .env
```

Than run:
```
docker-compose up -d
```
When containers are up and running, execute:

```
docker-compose exec php composer install
```

## Usage
To create benchmark execute command "app:web-benchmark"
```
docker-compose exec php php bin/console app:web-benchmark https://www.wp.pl/ https://www.onet.pl/,https://www.interia.pl/
```

## Tests
```
docker-compose exec php bin/phpunit
``` 
