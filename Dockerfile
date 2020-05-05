FROM mediawiki:1.34

# zip & unzip for composer
RUN apt-get update \
    && apt-get install -y zip unzip \
    && rm -rf /var/lib/apt/lists/*

# Install composer
RUN curl -sSo /usr/local/bin/composer https://getcomposer.org/composer.phar && chmod +x /usr/local/bin/composer

COPY wiki-* /usr/local/bin/

# Install extensions
RUN wiki-ext-install https://extdist.wmflabs.org/dist/extensions/WikiEditor-REL1_34-57eb9ad.tar.gz
RUN wiki-ext-install https://extdist.wmflabs.org/dist/extensions/CommonsMetadata-REL1_34-1b37909.tar.gz
RUN wiki-ext-install https://extdist.wmflabs.org/dist/extensions/Popups-REL1_34-375d27b.tar.gz
RUN wiki-ext-install https://extdist.wmflabs.org/dist/extensions/MultimediaViewer-REL1_34-30ea768.tar.gz
RUN wiki-ext-install https://gitlab.com/hydrawiki/extensions/EmbedVideo/-/archive/master/EmbedVideo-master.tar.gz
RUN wiki-ext-install https://extdist.wmflabs.org/dist/extensions/GoogleLogin-REL1_34-c395c86.tar.gz
RUN wiki-ext-install https://extdist.wmflabs.org/dist/extensions/NewestPages-REL1_34-34467ae.tar.gz
RUN wiki-ext-install https://extdist.wmflabs.org/dist/extensions/PagesList-REL1_34-08d363e.tar.gz

COPY GoogleLogin/ extensions/GoogleLogin/
COPY images/ resources/assets/
COPY LocalSettings*.php ./

ENV TZ=Asia/Ho_Chi_Minh
ENV MW_INSTALL_PATH=/var/www/html
