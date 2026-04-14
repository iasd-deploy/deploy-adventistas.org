FROM wordpress:php8.1-apache

COPY --chown=www-data:www-data app /var/www/html

RUN docker-php-ext-install opcache

COPY --chown=www-data:www-data --from=internetdsa/pa-theme-sedes /var/www/build /var/www/html/pt/wp-content/themes/pa-theme-sedes
COPY --chown=www-data:www-data --from=internetdsa/pa-theme-sedes /var/www/build /var/www/html/es/wp-content/themes/pa-theme-sedes
COPY --chown=www-data:www-data --from=internetdsa/pa-theme-sedes-child /var/www/build /var/www/html/pt/wp-content/themes/pa-theme-sedes-child
COPY --chown=www-data:www-data --from=internetdsa/pa-theme-sedes-child /var/www/build /var/www/html/es/wp-content/themes/pa-theme-sedes-child

RUN apt-get update \
 && apt-get install -y --no-install-recommends wget gnupg ca-certificates \
 && echo 'deb http://apt.newrelic.com/debian/ newrelic non-free' > /etc/apt/sources.list.d/newrelic.list \
 && wget -qO- https://download.newrelic.com/548C16BF.gpg | apt-key add - \
 && apt-get update \
 && apt-get install -y --no-install-recommends newrelic-php5 \
 && NR_INSTALL_SILENT=1 newrelic-install install \
 && apt-get clean \
 && rm -rf /var/lib/apt/lists/*

RUN chown -R www-data:www-data /var/www/html \
 && find /var/www/html -type d -exec chmod 755 {} \; \
 && find /var/www/html -type f -exec chmod 644 {} \; \
 && find /var/www/html -type d -path '*/wp-content/uploads*' -exec chmod 775 {} \;

COPY extras/init /usr/local/bin/docker-entrypoint.sh
COPY extras/opcache.ini /usr/local/etc/php/conf.d/opcache.ini
COPY extras/php.ini $PHP_INI_DIR/conf.d/php.ini

ARG WP_DB_HOST
ARG WP_DB_NAME
ARG WP_DB_PASSWORD
ARG WP_DB_USER
ARG WP_S3_ACCESS_KEY
ARG WP_S3_SECRET_KEY
ARG WP_S3_BUCKET
ARG NEWRELIC_KEY
ARG NEWRELIC_APP_NAME

ENV WP_DB_HOST=$WP_DB_HOST
ENV WP_DB_NAME=$WP_DB_NAME
ENV WP_DB_PASSWORD=$WP_DB_PASSWORD
ENV WP_DB_USER=$WP_DB_USER
ENV WP_S3_ACCESS_KEY=$WP_S3_ACCESS_KEY
ENV WP_S3_SECRET_KEY=$WP_S3_SECRET_KEY
ENV WP_S3_BUCKET=$WP_S3_BUCKET
ENV NEWRELIC_KEY=$NEWRELIC_KEY
ENV NEWRELIC_APP_NAME=$NEWRELIC_APP_NAME

RUN chmod +x /usr/local/bin/docker-entrypoint.sh

EXPOSE 80
