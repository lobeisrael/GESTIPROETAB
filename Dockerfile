# Utiliser une image PHP 8.2 avec Apache comme base
FROM php:8.2-apache

#ARG user=default
#ARG uid=1000
# Installer les dépendances système nécessaires
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    libpng-dev \
    libjpeg-dev \
    libpq-dev \
    libfreetype6-dev \
    librdkafka-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo_pgsql mbstring zip exif pcntl \
    && pecl install rdkafka \
    && docker-php-ext-enable rdkafka
# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# Configurer Git pour ignorer la vérification de propriété
RUN git config --global --add safe.directory /var/www/html
 # Installer Composer
#COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Créer un utilisateur système
#RUN useradd -G www-data,root -u $uid -d /home/$user $user && \
#    mkdir -p /home/$user/.composer && \
#    chown -R $user:$user /home/$user
# Copier les fichiers du projet Laravel dans le conteneur
COPY . /var/www/html
# Copier la configuration Apache
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
# Activer la réécriture d'URL
RUN a2enmod rewrite
# Définir le répertoire de travail
WORKDIR /var/www/html
# Installer les dépendances Composer
RUN composer install --no-dev --optimize-autoloader
# Configurer les permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache
# Exposer le port 80

EXPOSE 80
#USER $user
# Définir la commande par défaut pour démarrer Apache
CMD ["apache2-foreground"]
