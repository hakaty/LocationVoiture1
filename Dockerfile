FROM php:8.2-fpm

# Installer les dépendances nécessaires pour PHP et Laravel
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl \
    sqlite3 \
    libsqlite3-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite mbstring exif pcntl bcmath gd

# Ajouter Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Définir le répertoire de travail
WORKDIR /var/www

# Copier les fichiers du projet Laravel dans le container
COPY . .

# Installer les dépendances PHP via Composer
RUN composer install

# Donner les bonnes permissions pour le répertoire storage
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage

# Exposer le port 9000 pour PHP-FPM
EXPOSE 9000

# Démarrer PHP-FPM
CMD ["php-fpm"]
