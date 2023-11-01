FROM php:7.2-apache

RUN a2enmod rewrite

# Crear el archivo de configuración para la redirección
RUN echo "RewriteEngine On" >> /etc/apache2/sites-available/config-redirect.conf
RUN echo "RewriteRule ^/config$ http://adminer:8080 [P]" >> /etc/apache2/sites-available/config-redirect.conf
RUN echo "ServerName localhost" >> /etc/apache2/sites-available/000-default.conf

# Habilitar el sitio de configuración personalizado
RUN a2ensite config-redirect

# Reiniciar el servidor Apache después de habilitar la configuración
RUN service apache2 restart