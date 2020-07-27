FROM php:7.4-cli

RUN apt-get install -y \
        git \
        tree \
        vim \
        wget \
        subversion

#install some base extensions
RUN apt-get install -y \
        zlib1g-dev \
        zip \
  && docker-php-ext-install zip


COPY . .

CMD [ "php", "./src/main.php" ]
