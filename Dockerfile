FROM php:8.2-fpm

ENV PHP_OPCACHE_ENABLE=1
ENV PHP_OPCACHE_ENABLE_CLI=0
ENV PHP_OPCACHE_VALIDATE_TIMESTAMPS=1
ENV PHP_OPCACHE_REVALIDATE_FREQ=1

RUN usermod -u 1000 www-data


RUN docker-php-ext-install pdo pdo_mysql


RUN apt-get update

# Install useful tools
RUN apt-get -y install apt-utils nano wget dialog vim

RUN apt-get install -y unzip libpq-dev libcurl4-gnutls-dev nginx

# Install important libraries
RUN echo "\e[1;33mInstall important libraries\e[0m"
RUN apt-get -y install --fix-missing \
    apt-utils \
    build-essential \
    git \
    curl \
    libcurl4 \
    libcurl4-openssl-dev \
    zlib1g-dev \
    libzip-dev \
    zip \
    libbz2-dev \
    locales \
    libmcrypt-dev \
    libicu-dev \
    libonig-dev \
    libxml2-dev
    
RUN echo "\e[1;33mInstall important docker dependencies\e[0m"
RUN docker-php-ext-install \
    bcmath \
    curl

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY ./php/php.ini /usr/local/etc/php/php.ini
COPY ./php/php-fpm.conf /usr/local/etc/php-fpm.d/www.conf
COPY ./php/opcache.ini /usr/local/etc/php/conf.d/opcache.ini
COPY ./nginx/nginx.conf /etc/nginx/nginx.conf


RUN chmod -R 755 /var/www



# Install Postgre PDO
# RUN apt-get install -y libpq-dev \
#     && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
#     && docker-php-ext-install pdo pdo_pgsql pgsql