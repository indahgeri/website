# Gunakan image resmi PHP + Apache
FROM php:8.2-apache

# Install ekstensi PHP yang umum dibutuhkan CI4 + unzip + git
RUN apt-get update && apt-get install -y \
    libicu-dev zip unzip git curl && \
    docker-php-ext-install intl mysqli pdo pdo_mysql

# Aktifkan modul Apache rewrite (dibutuhkan CI4)
RUN a2enmod rewrite

# Set document root ke folder 'public' milik CI4
ENV APACHE_DOCUMENT_ROOT="/var/www/html/public"

# Ubah semua konfigurasi Apache agar root mengarah ke 'public'
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf \
    /etc/apache2/apache2.conf \
    /etc/apache2/conf-available/*.conf

# Install Composer (jika belum ada)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Salin semua file project CodeIgniter ke dalam container
COPY dashboard/ /var/www/html/

# Masuk ke folder aplikasi dan jalankan composer install
WORKDIR /var/www/html/
# Install dependensi Composer
#  untuk produksi, gunakan --no-dev
#  untuk pengembangan, gunakan --no-dev dan jalankan composer install lagi
# RUN composer install --no-dev --optimize-autoloader
# RUN composer install
RUN composer install --prefer-dist

# jika gagal install composer, bisa gunakan perintah ini, untuk masuk ke dalam container 
# dan install composer secara manual
# > docker exec -it ci4-app bash
# > cd /var/www/html
# > composer install

# Set permission agar bisa diakses Apache
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Buka port HTTP
EXPOSE 80
