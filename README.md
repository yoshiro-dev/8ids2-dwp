# 8IDS2 - Proyecto Laravel

Aplicacion web desarrollada con Laravel para practicar autenticacion, rutas, controladores, modelos, migraciones, vistas Blade y personalizacion de paginas de error.

El proyecto incluye modulos basicos para administrar productos y almacenes, usando Laravel AdminLTE como plantilla visual principal.

## Tecnologias

- PHP 8.3
- Laravel 13
- Composer
- Node.js y npm
- Vite
- Bootstrap / Sass
- Laravel UI para autenticacion
- Laravel AdminLTE
- Diglactic Laravel Breadcrumbs

## Funcionalidades

- Registro, inicio y cierre de sesion con `Auth::routes()`.
- Vista principal `/home`.
- CRUD basico de productos.
- CRUD basico de almacenes.
- Breadcrumbs para la navegacion interna.
- Paginas de error personalizadas en `resources/views/errors`.
- Imagenes para errores en `public/images/errors`.
- Ruta local para probar errores HTTP.

## Modulos

### Productos

Rutas principales:

```txt
GET    /productos
GET    /producto/nuevo
GET    /producto/editar/{id}
POST   /producto/guardar
DELETE /producto/eliminar/{id}
```

Campos del producto:

```txt
codigo
nombre
precio
impuesto
existencia
```

### Almacenes

Rutas principales:

```txt
GET    /almacen
GET    /almacen/nuevo
GET    /almacen/editar/{id}
POST   /almacen/guardar
DELETE /almacen/eliminar/{id}
```

Campos del almacen:

```txt
codigo
nombre
```

## Paginas de error

Las vistas de error estan en:

```txt
resources/views/errors/
```

Se personalizaron paginas como:

```txt
401 - No autorizado
403 - Acceso prohibido
404 - Pagina no encontrada
419 - Sesion expirada
500 - Error del servidor
```

La plantilla base visual esta en:

```txt
resources/views/errors/minimal.blade.php
```

Las imagenes se guardan en:

```txt
public/images/errors/
```

Para probar las paginas de error en desarrollo, existe la ruta local:

```txt
/error/{code}
```

Ejemplos:

```txt
http://127.0.0.1:8000/error/401
http://127.0.0.1:8000/error/403
http://127.0.0.1:8000/error/404
http://127.0.0.1:8000/error/419
http://127.0.0.1:8000/error/500
```

Esta ruta solo se registra cuando la aplicacion esta en entorno `local`.

## Instalacion

Clonar el repositorio e instalar dependencias:

```bash
composer install
npm install
```

Crear el archivo de entorno:

```bash
copy .env.example .env
```

Generar la llave de la aplicacion:

```bash
php artisan key:generate
```

Configurar la base de datos en `.env` y ejecutar migraciones:

```bash
php artisan migrate
```

Compilar assets:

```bash
npm run build
```

Levantar el servidor local:

```bash
php artisan serve
```

Abrir en el navegador:

```txt
http://127.0.0.1:8000
```

## Desarrollo

Para trabajar con Vite en modo desarrollo:

```bash
npm run dev
```

En otra terminal se puede mantener Laravel activo:

```bash
php artisan serve
```

Tambien existe el script combinado:

```bash
composer run dev
```

## Estructura importante

```txt
app/Http/Controllers/
app/Models/
database/migrations/
public/images/errors/
resources/views/
resources/views/errors/
routes/web.php
routes/breadcrumbs.php
```

## Autor

Yoshiro Pablo Armando Riano Ishiwara
