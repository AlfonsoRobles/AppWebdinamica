FROM php:8.2-cli

# Instalar extensiones necesarias para MySQL
RUN docker-php-ext-install pdo pdo_mysql mysqli \
    && docker-php-ext-enable pdo_mysql mysqli

# Copiar tu aplicación al contenedor
COPY . /var/www/html/
WORKDIR /var/www/html

# Exponer el puerto dinámico
EXPOSE 8080

# 👇 Usar la variable $PORT que Railway asigna
CMD ["sh", "-c", "php -S 0.0.0.0:${PORT:-8080} -t /var/www/html"]
