FROM php:7.4-cli

RUN docker-php-ext-install zip

COPY . .

CMD [ "php", "./src/main.php" ]
