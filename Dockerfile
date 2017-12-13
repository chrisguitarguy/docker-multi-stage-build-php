FROM php:7.2-alpine AS deps

# install composer
RUN apk update \
    && apk add ca-certificates coreutils \
    && wget -q https://getcomposer.org/installer -O composer-setup.php \
    && wget -q https://composer.github.io/installer.sha384sum -O installer.sha384sum \
    && sha384sum installer.sha384sum \
    && php composer-setup.php --install-dir /usr/local/bin

# Add our application files here
ADD src /app/src
ADD bin /app/bin
ADD composer.* /app/
WORKDIR /app

# Install deps
RUN composer.phar install --no-dev --classmap-authoritative

# this is the REAL application container now
FROM php:7.2-alpine

# we don't need to do anything here by copy the `/app` folder from the
# `deps` stage above. Its /app folder will have all the vendor files etc
COPY --from=deps /app /app

CMD ["/app/bin/hello"]
