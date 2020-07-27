FROM php:7.4-cli

RUN apt-get update && \
    apt-get install -y \
        zlib1g-dev
        
RUN docker-php-ext-install zip

COPY . .

CMD [ "php", "./src/main.php" ]
