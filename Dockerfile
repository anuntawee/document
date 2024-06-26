# Use an official PHP runtime
FROM php:8.2-apache

# Enable Apache modules
RUN a2enmod rewrite

# Install any extensions you need
RUN apt-get update && apt-get install -y && apt-get install -y vim \
    git \   
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libcurl4-openssl-dev \
    libonig-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd zip mysqli curl mbstring pdo pdo_mysql

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Copy the source code in /www into the container at /var/www/html
COPY www .

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer require phpmailer/phpmailer

COPY www/vardor ./var/www/html/

# เปิดพอร์ต 80 หรือพอร์ตที่ต้องการ
EXPOSE 80

# คำสั่งที่จะรันเมื่อ container เริ่มต้น
CMD ["php", "-S", "0.0.0.0:80", "-t", "/var/www/html"]