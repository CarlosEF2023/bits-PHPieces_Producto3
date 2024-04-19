# Utiliza la imagen oficial de PHP 8.1.2 con Apache como base.
FROM php:8.1.2-apache

# Instala las dependencias necesarias para instalar Node.js, Composer y Git.
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
    curl \
    gnupg \
    unzip \
    git \
    && rm -rf /var/lib/apt/lists/*

# Instala Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash - && \
    apt-get install -y nodejs

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instala las extensiones de PHP necesarias para MySQL.
RUN docker-php-ext-install mysqli pdo pdo_mysql
# Habilita el módulo rewrite de Apache
RUN a2enmod rewrite

# Reinicia Apache para que los cambios tengan efecto
RUN service apache2 restart