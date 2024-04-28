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
# PRUEBAS PARA VER SI DOCKER VA MAS RAPIDO
# NO HE NOTADO DIFERENCIA
# Establece el directorio de trabajo en /var/www/html (este es el directorio predeterminado para Apache en la imagen de PHP)
# WORKDIR /var/www/html

# Copia el código de la aplicación al contenedor
# COPY . .

# Cambia los permisos del directorio de la aplicación
# RUN chmod -R 755 .

# Cambia el propietario del directorio de la aplicación a www-data (el usuario predeterminado para Apache en la imagen de PHP)
# RUN chown -R www-data:www-data .

# Ejecuta composer install para instalar las dependencias de PHP
# RUN composer install