## Step to run Application
```sh
docker compose build
```
```sh
docker compose up -d
```
## Install composer

### Exec to php apache image and run composer install:
```sh
docker exec -it php-apache sh
```
```sh
composer install
```
## Test

### Exec to php apache image
```sh
docker exec -it php-apache sh
```
#### run all tests

```sh
./vendor/bin/phpunit tests
```

#### run a single test
```sh
./vendor/bin/phpunit tests/{name}.php
```
./vendor/bin/phpunit tests/EditToDoTest.php