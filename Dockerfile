FROM mediawiki:1.33

# zip & unzip for composer
RUN apt-get update \
    && apt-get install -y zip unzip \
    && rm -rf /var/lib/apt/lists/*

# Install composer
RUN curl -sSo /usr/local/bin/composer https://getcomposer.org/composer.phar && chmod +x /usr/local/bin/composer

COPY wiki-* /usr/local/bin/

# Install extensions
RUN wiki-ext-install https://extdist.wmflabs.org/dist/extensions/WikiEditor-REL1_33-e051a4b.tar.gz
RUN wiki-ext-install https://extdist.wmflabs.org/dist/extensions/CommonsMetadata-REL1_33-46d720e.tar.gz
RUN wiki-ext-install https://extdist.wmflabs.org/dist/extensions/Popups-REL1_33-07318c3.tar.gz
RUN wiki-ext-install https://extdist.wmflabs.org/dist/extensions/MultimediaViewer-REL1_33-f07cc57.tar.gz
RUN wiki-ext-install https://gitlab.com/hydrawiki/extensions/EmbedVideo/-/archive/v2.8.0/EmbedVideo-v2.8.0.tar.gz
RUN wiki-ext-install https://extdist.wmflabs.org/dist/extensions/GoogleLogin-REL1_33-31ece02.tar.gz
RUN wiki-ext-install https://extdist.wmflabs.org/dist/extensions/NewestPages-REL1_33-ddc318a.tar.gz
RUN wiki-ext-install https://extdist.wmflabs.org/dist/extensions/PagesList-REL1_33-ed7b6f3.tar.gz

# Already included in 1.34
RUN wiki-ext-install https://extdist.wmflabs.org/dist/extensions/TextExtracts-REL1_33-2b04403.tar.gz
RUN wiki-ext-install https://extdist.wmflabs.org/dist/extensions/PageImages-REL1_33-75000f5.tar.gz

COPY GoogleLogin/ extensions/GoogleLogin/
COPY images/ resources/assets/
COPY LocalSettings.php .

ENV TZ=Asia/Ho_Chi_Minh
