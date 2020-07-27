FROM php:7.4-cli

RUN pecl install zip && docker-php-ext-enable zip

COPY ./* ./

CMD [ "php", "./main.php" ]