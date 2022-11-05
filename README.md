# Laravel-Bootcamp
## Usage
1. build container from docker-compose.yml
```angular2html
docker compose build
```

2. Generate docker container
```angular2html
docker compose up -d
```

3. Exec application container
```angular2html
docker compose exec app bash
```

4. copy env file 
```angular2html
cp .env.example .env
```

5. Generate application key
```angular2html
php artisan key:generate
```

6. Check localhost<br>
 [localhost:8080](http://localhost:8080/)

