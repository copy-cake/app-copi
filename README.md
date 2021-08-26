## copy cake app

### Docker

To run app in docker run:

    docker-compose up -d

To get into php container:

    docker exec -it php-fpm /bin/bash

Install all libraries:

    composer install

After install libraries create <b>.env</b> files with config connection     

For testing app in docker run:

    ./vendor/bin/phpunit