FROM php:5.6.18-apache

MAINTAINER haertl.mike@gmail.com

ENV PATH $PATH:/root/.composer/vendor/bin

# PHP extensions come first, as they are less likely to change between Yii releases
RUN apt-get update \
    && apt-get -y install \
            g++ \
            git \
            libicu-dev \
            libmcrypt-dev \
            libfreetype6-dev \
            libjpeg-dev \
            libjpeg62-turbo-dev \
            libmcrypt-dev \
            libpng12-dev \
            libpq-dev \
            libmagickwand-dev \            
            zlib1g-dev \
            libxml2-dev \
            vim \
            yui-compressor \
            linkchecker \
            mcrypt \            
	    libxslt-dev \                        
            ant \
            openjdk-7-jdk \
        --no-install-recommends \
    # Enable mod_rewrite
    && a2enmod rewrite \

    # Install PHP extensions
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/ \
    && docker-php-ext-install gd \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo \
    && docker-php-ext-configure bcmath \
    && docker-php-ext-install bcmath \
    && docker-php-ext-install intl \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install pdo_pgsql \
    && docker-php-ext-install pgsql \
    && docker-php-ext-install mbstring \
    && docker-php-ext-install mcrypt \
    && docker-php-ext-install soap \
    && docker-php-ext-install xsl \
    && docker-php-ext-install zip \
    && pecl install apcu-4.0.11 && echo extension=apcu.so > /usr/local/etc/php/conf.d/apcu.ini \
    && pecl install imagick \
    && docker-php-ext-enable imagick \

    && apt-get purge -y g++ \
    && apt-get autoremove -y \
    && rm -r /var/lib/apt/lists/* \

    # Fix write permissions with shared folders
    && usermod -u 1000 www-data

COPY composer.phar /usr/local/bin/composer.phar
RUN chmod +x /usr/local/bin/composer.phar
# Next composer and global composer package, as their versions may change from time to time
RUN composer.phar global require --no-progress "fxp/composer-asset-plugin:~1.2.0" \
    && composer.phar global require --no-progress "codeception/codeception=2.0.*" \
    && composer.phar global require --no-progress "codeception/specify=*" \
    && composer.phar global require --no-progress "codeception/verify=*"

# Timezone Argentina
ENV TZ=America/Buenos_Aires
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Apache config and composer wrapper
COPY apache2.conf /etc/apache2/apache2.conf
COPY composer /usr/local/bin/composer

WORKDIR /var/www/html

