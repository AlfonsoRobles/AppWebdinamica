# Imagen base oficial de PHP CLI
FROM php:8.2-cli

# Instalar extensiones necesarias para MySQL
RUN docker-php-ext-install pdo pdo_mysql mysqli \
    && docker-php-ext-enable pdo_mysql mysqli

# Copiar tu aplicación al contenedor
COPY . /var/www/html/
WORKDIR /var/www/html

# Exponer el puerto 80
EXPOSE 80

# Iniciar servidor embebido de PHP
CMD ["php", "-S", "0.0.0.0:80", "-t", "/var/www/html"]
