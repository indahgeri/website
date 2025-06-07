# Gunakan image resmi PHP + Apache (mod_php)
FROM php:8.2-apache

# Install ekstensi PHP yang umum dibutuhkan CI4
RUN apt-get update && apt-get install -y libicu-dev zip unzip && \
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

# Salin semua file CodeIgniter 4 ke dalam container
COPY dashboard/ /var/www/html/

# Set permission agar bisa diakses Apache
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Buka port HTTP
EXPOSE 80
