FROM php:8.1-apache
ENV APACHE_DOCUMENT_ROOT /var/www/html
ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_PID_FILE /var/run/apache2/apache2.pid
ENV APACHE_RUN_DIR /var/run/apache2
ENV APACHE_LOCK_DIR /var/lock/apache2
ENV APACHE_LOG_LEVEL warn
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    libcurl4-openssl-dev \
    unzip \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        pdo \
        pdo_mysql \
        mysqli \
        mbstring \
        exif \
        pcntl \
        bcmath \
        gd \
        zip \
        curl \
        xml \
    && docker-php-ext-enable \
        pdo_mysql \
        mysqli
RUN a2enmod rewrite headers expires deflate
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN echo '<Directory /var/www/html/>' > /etc/apache2/conf-available/app.conf && \
    echo '    Options Indexes FollowSymLinks' >> /etc/apache2/conf-available/app.conf && \
    echo '    AllowOverride All' >> /etc/apache2/conf-available/app.conf && \
    echo '    Require all granted' >> /etc/apache2/conf-available/app.conf && \
    echo '    DirectoryIndex index.php index.html' >> /etc/apache2/conf-available/app.conf && \
    echo '</Directory>' >> /etc/apache2/conf-available/app.conf && \
    a2enconf app
RUN echo "memory_limit = 256M" >> /usr/local/etc/php/conf.d/docker-php-custom.ini && \
    echo "upload_max_filesize = 50M" >> /usr/local/etc/php/conf.d/docker-php-custom.ini && \
    echo "post_max_size = 50M" >> /usr/local/etc/php/conf.d/docker-php-custom.ini && \
    echo "max_execution_time = 300" >> /usr/local/etc/php/conf.d/docker-php-custom.ini && \
    echo "max_input_vars = 3000" >> /usr/local/etc/php/conf.d/docker-php-custom.ini && \
    echo "display_errors = Off" >> /usr/local/etc/php/conf.d/docker-php-custom.ini && \
    echo "log_errors = On" >> /usr/local/etc/php/conf.d/docker-php-custom.ini && \
    echo "error_log = /var/log/apache2/php_errors.log" >> /usr/local/etc/php/conf.d/docker-php-custom.ini
COPY . /var/www/html/
RUN chown -R www-data:www-data /var/www/html/ && \
    find /var/www/html/ -type d -exec chmod 755 {} \; && \
    find /var/www/html/ -type f -exec chmod 644 {} \; && \
    chmod +x /var/www/html/*.php
RUN mkdir -p /var/www/html/logs /var/www/html/uploads && \
    chown -R www-data:www-data /var/www/html/logs /var/www/html/uploads && \
    chmod 775 /var/www/html/logs /var/www/html/uploads
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
RUN echo '#!/bin/bash' > /usr/local/bin/start.sh && \
    echo 'set -e' >> /usr/local/bin/start.sh && \
    echo 'echo "Starting PHP Webshop Application..."' >> /usr/local/bin/start.sh && \
    echo 'echo "PHP Version: $(php -v | head -n 1)"' >> /usr/local/bin/start.sh && \
    echo 'echo "Apache Version: $(apache2 -v | head -n 1)"' >> /usr/local/bin/start.sh && \
    echo 'echo "Document Root: $APACHE_DOCUMENT_ROOT"' >> /usr/local/bin/start.sh && \
    echo 'echo "Starting Apache..."' >> /usr/local/bin/start.sh && \
    echo 'apache2-foreground' >> /usr/local/bin/start.sh && \
    chmod +x /usr/local/bin/start.sh
HEALTHCHECK --interval=30s --timeout=3s --start-period=5s --retries=3 \
    CMD curl -f http://localhost/ || exit 1
EXPOSE 80
CMD ["/usr/local/bin/start.sh"]
