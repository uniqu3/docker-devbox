ARG PHP_VERSION
FROM prooph/php:$PHP_VERSION

# Set working directory
WORKDIR /var/www

# install PHP libzip
RUN apk add --no-cache libzip-dev && \
    docker-php-ext-configure zip --with-libzip=/usr/include && \
    docker-php-ext-install zip

# Create system www-data user to run composer commands and php
ARG UID
ARG GID

RUN deluser www-data && \
    if getent group www-data; then delgroup www-data; fi && \
    addgroup -S -g ${GID} www-data && \
    adduser -S -u ${UID} -G www-data www-data
RUN chown -R www-data /var/www

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN mkdir -p /home/www-data/.composer && \
    chown -R www-data:www-data /home/www-data
