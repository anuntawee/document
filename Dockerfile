# Use an official PHP runtime
FROM php:8.2-apache

# Enable Apache modules
RUN a2enmod rewrite

# Install any extensions you need
RUN apt-get update && apt-get install -y && apt-get install -y vim \
    libcurl4-openssl-dev \
    libonig-dev \
    && docker-php-ext-install -j$(nproc) mysqli curl mbstring pdo pdo_mysql

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Copy the source code in /www into the container at /var/www/html
COPY ../www .

# เปิดพอร์ต 80 หรือพอร์ตที่ต้องการ
EXPOSE 80

# คำสั่งที่จะรันเมื่อ container เริ่มต้น
CMD ["php", "-S", "0.0.0.0:80"]
