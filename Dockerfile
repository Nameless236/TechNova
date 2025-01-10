FROM php:8.3-fpm

ARG user=pastojakub
ARG uid=1000

# Inštalácia systémových závislostí
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Vyčistenie cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Inštalácia PHP rozšírení
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Inštalácia Composera
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Vytvorenie používateľa
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Nastavenie pracovného adresára
WORKDIR /var/www

# Kopírovanie projektu
COPY . /var/www

# Nastavenie oprávnení
RUN chown -R $user:www-data /var/www
RUN chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Skopírujte composer súbory
COPY composer.json composer.lock ./

# Nainštalujte závislosti
RUN composer install

# Skopírujte zvyšok projektu
COPY . .

# Prepnutie na vytvoreného používateľa
USER $user

EXPOSE 9000

CMD ["php-fpm"]
