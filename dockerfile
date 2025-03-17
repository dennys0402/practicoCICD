FROM elrincondeisma/php-for-laravel:8.3.7

WORKDIR /app

# Copia todos los archivos del proyecto al contenedor
COPY . .

# Verifica si Composer está instalado y ejecuta la instalación de dependencias
RUN if command -v composer > /dev/null; then \
        composer install --no-dev --optimize-autoloader; \
    else \
        echo "Composer no está instalado"; \
    fi

# Copia el archivo .envDev como .env
RUN cp .env.example .env

# Genera la clave de Laravel
RUN php artisan key:generate

# Crea carpetas necesarias
RUN mkdir -p storage/logs bootstrap/cache

# Expone el puerto 8000
EXPOSE 8000

# Comando para iniciar Laravel con PHP
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
