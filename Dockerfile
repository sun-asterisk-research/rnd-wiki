FROM mediawiki:stable

# zip & unzip for composer
RUN apt-get update \
    && apt-get install -y zip unzip \
    && rm -rf /var/lib/apt/lists/*

# Install composer
RUN curl -sSo /usr/local/bin/composer https://getcomposer.org/composer.phar && chmod +x /usr/local/bin/composer

# Install GoogleLogin extension
ARG GOOGLE_LOGIN_DOWNLOAD_URL=https://extdist.wmflabs.org/dist/extensions/GoogleLogin-REL1_33-31ece02.tar.gz

RUN curl -sS ${GOOGLE_LOGIN_DOWNLOAD_URL} | tar -xzC extensions \
    && composer install --no-dev -d extensions/GoogleLogin

COPY GoogleLogin/ extensions/GoogleLogin/
COPY images/ resources/assets/
COPY LocalSettings.php .
COPY wiki-install /usr/local/bin

ENV TZ=Asia/Ho_Chi_Minh
