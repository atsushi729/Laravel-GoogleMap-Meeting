# Laravel-GoogleMap-Meeting

## Usage
1. *Clone this repository.*
```angular2html
git clone https://github.com/atsushi729/Laravel-GoogleMap-Meeting.git
```
2. *Change directory.*
```angular2html
cd Laravel-GoogleMap-Meeting
```
3. *Build image and activate container.*
```angular2html
docker compose up -d
```
4. *Run a command in a running container.*
```angular2html
docker compose exec app bash
```
5. *Change default permission to write error log.*
```angular2html
chmod -R 777 storage bootstrap/cache
```
6. *Install composer.*
```
composer install
```
7. *Create env file.*
```angular2html
cp .env.example .env
```
9. *Create application key.*
```angular2html
php artisan key:generate
```
9. *Set symbolic link.*
```angular2html
php artisan storage:link
```
10. *Migrate to database.*
```angular2html
php artisan migrate
```

11. *Check localhost* <br>
    [localhost:8080](http://localhost:8080/)