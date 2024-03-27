# Use an official PHP runtime
FROM php:8.2-apache
# Enable Apache modules
RUN a2enmod rewrite
# Install any extensions you need
RUN apt-get update \
    && apt-get install -y vim \
    && docker-php-ext-install mysqli curl mbstring pdo pdo_mysql
# Set the working directory to /var/www/html
WORKDIR /var/www/html
# Copy the source code in /www into the container at /var/www/html
COPY ../www .