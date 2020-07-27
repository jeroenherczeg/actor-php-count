FROM php:7.4-cli

RUN apk update \
    && apk upgrade \
    && apk add zlib-dev \
    && docker-php-ext-configure zip --with-zlib-dir=/usr \
    && docker-php-ext-install zip

COPY ./* ./

CMD [ "php", "./main.php" ]