# Use the official PHP image with Apache
FROM php:8.0-apache

WORKDIR /var/www/html

RUN apt-get update -y && apt-get install -y libmariadb-dev

RUN docker-php-ext-install mysqli

# Install mysqli extension

# RUN docker-php-ext-install mysqli

# Copy all project files into the container
# COPY . /var/www/html/


# COPY ./php/ .

# Expose port 80 for Apache
# EXPOSE 80