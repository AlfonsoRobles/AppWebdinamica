# Imagen base oficial de PHP con Apache
FROM php:8.2-apache

# Instalar extensiones necesarias para MySQL
RUN docker-php-ext-install pdo pdo_mysql mysqli \
    && docker-php-ext-enable pdo_mysql mysqli

# Copiar tu aplicación al contenedor
COPY . /var/www/html/

# Configurar permisos
RUN chown -R www-data:www-data /var/www/html

# Exponer el puerto 80
EXPOSE 80

# Iniciar Apache
CMD ["apache2-foreground"]
