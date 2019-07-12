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
cp docker-compose.yaml.dist docker-compose.yaml &&\
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
To create benchmark execute command "app:web-benchmark test.pl"
```
docker-compose exec php php bin/console app:web-benchmark {url1} {url2,url3}
```

## Tests
```
docker-compose exec php bin/phpunit
``` 
