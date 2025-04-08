# Utilisez une image PHP avec le support de FPM
FROM php:8.0-fpm

# Installez les extensions nécessaires pour Laravel
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Installez Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copiez votre code dans le container
COPY ./app /var/www

# Définir le répertoire de travail
WORKDIR /var/www

# Installez les dépendances de l'application Laravel
RUN composer install

# Expose le port que PHP-FPM va écouter
EXPOSE 9000

# Commande pour démarrer PHP-FPM
CMD ["php-fpm"]
