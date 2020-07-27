FROM php:7.4-cli

RUN apt-get install -y \
        libzip-dev \
        zip \
  && docker-php-ext-configure zip --with-libzip \
  && docker-php-ext-install zip

COPY ./* ./

CMD [ "php", "./main.php" ]