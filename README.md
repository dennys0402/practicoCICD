```markdown
# Guía de Configuración y Ejecución de Pruebas con Docker para Laravel

Este archivo describe los pasos para configurar una aplicación Laravel utilizando Docker, ejecutar la aplicación y cómo ejecutar las pruebas utilizando PHPUnit.

## Requisitos Previos

Asegúrate de tener Docker y Docker Compose instalados en tu máquina.

- [Instalar Docker](https://docs.docker.com/get-docker/)
- [Instalar Docker Compose](https://docs.docker.com/compose/install/)

## Pasos para la Configuración

### 1. Tener Docker en tu máquina

Asegúrate de tener Docker y Docker Compose funcionando correctamente en tu máquina.

### 2. Copiar el archivo `.env.example` a `.env`

Copia el archivo de ejemplo `.env.example` a `.env` para configurar el entorno de la aplicación.

```bash
cp .env.example .env
```

### 3. Configurar el archivo `.env`

Abre el archivo `.env` y configura las siguientes variables de entorno:

```plaintext
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=secret
```

### 4. Ejecutar los contenedores con Docker Compose

Ejecuta el siguiente comando para construir y levantar los contenedores de Docker:

```bash
docker-compose up -d
```

Este comando construye y ejecuta los contenedores en segundo plano.

### 5. Acceder a la aplicación

Una vez que los contenedores estén en ejecución, puedes acceder a la aplicación Laravel en tu navegador:

- Navega a [http://localhost:8000](http://localhost:8000) para ver la aplicación.
- Accede a la ruta de empleados en [http://localhost:8000/empleados](http://localhost:8000/empleados).

## Pasos para Ejecutar las Pruebas con PHPUnit

### 6. Conectarse al contenedor

Para ejecutar las pruebas, primero accede al contenedor de Laravel. Abre una terminal y ejecuta el siguiente comando:

```bash
docker exec -it mi-contenedor-laravel bash
```

Esto te permitirá interactuar con el contenedor de Laravel.

### 7. Instalar PHPUnit en el contenedor

Una vez dentro del contenedor, instala PHPUnit ejecutando el siguiente comando:

```bash
composer require --dev phpunit/phpunit
```

### 8. Ejecutar las pruebas

Para ejecutar las pruebas de Laravel, ejecuta el siguiente comando dentro del contenedor:

```bash
php artisan test
```

Esto ejecutará las pruebas de tu aplicación y te mostrará el resultado en la terminal.
```