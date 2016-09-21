# Install

- <a href="https://docs.docker.com/engine/installation/" target="_blank">Docker</a>
- <a href="https://docs.docker.com/compose/install/" target="_blank">Docker compose</a>

# Setup
- `npm install`
- `bower install`
- `gulp build`
- `docker-compose build`
- `docker-compose up`

### Quickly
- `./install.sh -c <app_container_name> -t <title> -u <admin> -p <password> -e <email>`

### Slowly
- `rm wp-config.php`
- `docker exec -t <app_container_name> wp core install --url=localhost --title=<title> --admin_user=<admin> --admin_password=<password> --admin_email=<email>
- `docker exec -t <app_container_name> wp core config --dbname=wordpress --dbuser=wordpress --dbpass=wordpress --dbhost=db`
- `docker exec -t <app_container_name> wp core update`
- `docker exec -t <app_container_name> wp core update-db`
- `docker exec -t <app_container_name> wp plugin update --all`
- `docker exec -t <app_container_name> wp theme activate template`

*app_container container must be running

# Run
- `docker-compose up`
- `gulp`

# Stop
- `docker-compose down`
- `docker-compose rm`

# Access
- website : <a href="http://localhost:80/" target="_blank">http://localhost:80</a>
- phpmyadmin : <a href="http://localhost:8080/" target="_blank">http://localhost:8080</a>

# Data
- export : `docker exec -i <db_container_name> ./export.sh > FILENAME.sql`
- import : `docker exec -i <db_container_name> ./import.sh < FILENAME.sql`

*db_container container must be running
