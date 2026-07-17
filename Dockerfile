FROM php:8.0-apache

RUN apt-get update && apt-get install -y --no-install-recommends \
      libjpeg-dev libpng-dev libfreetype6-dev libwebp-dev \
      libzip-dev libicu-dev libonig-dev \
      default-mysql-client unzip less ca-certificates curl \
  && docker-php-ext-configure gd --with-jpeg --with-freetype --with-webp \
  && docker-php-ext-install -j"$(nproc)" mysqli gd zip exif intl opcache \
  && a2dismod mpm_event mpm_worker 2>/dev/null; a2enmod mpm_prefork rewrite headers && true \
  && rm -rf /var/lib/apt/lists/*

RUN curl -fsSL -o /usr/local/bin/wp \
      https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
  && chmod +x /usr/local/bin/wp

RUN { \
      echo 'upload_max_filesize=64M'; \
      echo 'post_max_size=64M'; \
      echo 'memory_limit=512M'; \
      echo 'max_execution_time=300'; \
    } > /usr/local/etc/php/conf.d/wp.ini

WORKDIR /var/www/html

COPY lidik.art/ /var/www/html/
COPY lidik.art/wp-config.railway.php /var/www/html/wp-config.php
RUN rm -f /var/www/html/wp-config.railway.php \
          /var/www/html/wp-config.php.orig \
          /var/www/html/wp-config.php.bak \
  && chown -R www-data:www-data /var/www/html

# --- force single MPM (a2dismod requires -f for MPMs) ---
RUN set -eux; \
    a2dismod -f mpm_event  || true; \
    a2dismod -f mpm_worker || true; \
    a2enmod mpm_prefork rewrite headers; \
    ls -1 /etc/apache2/mods-enabled/ | grep mpm; \
    test "$(ls -1 /etc/apache2/mods-enabled/ | grep -c 'mpm_.*\.load')" = "1"; \
    apache2ctl -t

CMD rm -f /etc/apache2/mods-enabled/mpm_event.* /etc/apache2/mods-enabled/mpm_worker.*; \
    ln -sf ../mods-available/mpm_prefork.load /etc/apache2/mods-enabled/mpm_prefork.load; \
    ln -sf ../mods-available/mpm_prefork.conf /etc/apache2/mods-enabled/mpm_prefork.conf; \
    echo "=== MPM at start: $(ls -1 /etc/apache2/mods-enabled/ | grep mpm | tr '\n' ' ')"; \
    sed -ri "s/^Listen 80$/Listen ${PORT:-80}/" /etc/apache2/ports.conf && \
    sed -ri "s/:80>/:${PORT:-80}>/" /etc/apache2/sites-available/000-default.conf && \
    apache2-foreground
