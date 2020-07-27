FROM php:7.4-cli

COPY . .

CMD [ "php", "./src/main.php" ]