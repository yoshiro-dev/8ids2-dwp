# 8IDS2 - Proyecto Laravel

Aplicacion web desarrollada con Laravel para practicar autenticacion, rutas, controladores, modelos, migraciones, vistas Blade y personalizacion de paginas de error.

El proyecto incluye modulos basicos para administrar productos y almacenes, usando Laravel AdminLTE como plantilla visual principal.

Ultima actualizacion: 23 de junio de 2026, 13:06 (-06:00).

## Tecnologias

- PHP 8.3 o superior
- Laravel 13
- Composer
- Node.js y npm
- PostgreSQL
- Vite
- Bootstrap / Sass
- Laravel UI para autenticacion
- Laravel AdminLTE
- Diglactic Laravel Breadcrumbs

## Documentacion del proyecto

- Historial de commits y modulos: `docs/historial-proyecto.md`
- Datos de prueba SQL: `database/datos_prueba.sql`

## Requisitos previos en Windows

Antes de instalar el proyecto, verificar que estas herramientas esten instaladas y disponibles en el `Path`:

```bash
php -v
composer -V
node -v
npm -v
psql --version
```

Links oficiales:

- PHP para Windows: https://www.php.net/downloads.php?os=windows
- Visual C++ Redistributable x64: https://aka.ms/vs/17/release/vc_redist.x64.exe
- Composer: https://getcomposer.org/download/
- Node.js: https://nodejs.org/en/download
- PostgreSQL: https://www.postgresql.org/download/windows/
- Git para Windows: https://git-scm.com/install/windows
- Visual Studio Code: https://code.visualstudio.com/

Para PHP en Windows se recomienda descargar el ZIP `VS17 x64 Non Thread Safe` y agregar al `Path` la carpeta donde esta `php.exe`.

### Extensiones PHP requeridas

El archivo `php.ini` usado por la terminal debe tener activas estas extensiones:

```ini
extension=curl
extension=fileinfo
extension=mbstring
extension=openssl
extension=pdo_pgsql
extension=pgsql
extension=zip
```

Para saber que `php.ini` esta usando PHP:

```bash
php --ini
```

Para validar extensiones:

```bash
php -m | findstr fileinfo
php -m | findstr pgsql
```

Si una extension aparece comentada con `;`, quitar el `;`, guardar `php.ini`, cerrar la terminal y abrir una nueva.

## Funcionalidades

- Registro, inicio y cierre de sesion con `Auth::routes()`.
- Vista principal `/home`.
- CRUD basico de productos.
- CRUD basico de almacenes.
- Filtros de busqueda por codigo o nombre en productos y almacenes.
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

El listado permite buscar por una palabra contenida en `codigo` o `nombre`.

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

El listado permite buscar por una palabra contenida en `codigo` o `nombre`.

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

## Instalacion desde cero

Entrar a la carpeta del proyecto:

```bash
cd /d C:\Users\yrian\Documents\GitHub\8ids2
```

Instalar dependencias de PHP y Node:

```bash
composer install
npm install
```

Crear el archivo de entorno:

```bat
if not exist .env copy .env.example .env
```

Configurar PostgreSQL en `.env`:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=8ids2
DB_USERNAME=postgres
DB_PASSWORD=tu_password
```

La base indicada en `DB_DATABASE` debe existir en PostgreSQL antes de ejecutar migraciones. Se puede crear desde pgAdmin o desde CMD:

```bat
createdb -U postgres 8ids2
```

Si ya se esta dentro de SQL Shell (`psql`), usar SQL en lugar del comando de CMD:

```sql
CREATE DATABASE "8ids2";
```

El nombre va entre comillas porque empieza con numero. Para confirmar que la base existe:

```sql
\l
```

Generar la llave de la aplicacion:

```bash
php artisan key:generate
```

Ejecutar migraciones y seeders:

```bash
php artisan migrate --seed
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

Usuarios de prueba creados por el seeder:

```txt
admin@test.com / 12345678
almacen@test.com / 12345678
producto@test.com / 12345678
```

Roles y permisos:

```txt
admin@test.com     puede ver productos y almacenes
almacen@test.com   puede ver almacenes
producto@test.com  puede ver productos
```

### Datos de prueba adicionales

El proyecto incluye un archivo SQL con 50 productos y 10 almacenes de prueba:

```txt
database/datos_prueba.sql
```

Para cargarlo en PostgreSQL:

```bat
psql -U postgres -d 8ids2 -f database/datos_prueba.sql
```

El archivo no borra registros existentes. Si se ejecuta mas de una vez, agregara datos duplicados.

Nota para PowerShell: si `npm` muestra un error por politicas de ejecucion de scripts, usar `npm.cmd`:

```powershell
npm.cmd install
npm.cmd run build
```

## Flujo diario de desarrollo

Abrir una terminal para Laravel:

```bash
php artisan serve
```

Abrir otra terminal para Vite:

```powershell
npm.cmd run dev
```

Entrar en el navegador:

```txt
http://127.0.0.1:8000
```

Si se usa CMD en lugar de PowerShell, tambien funciona:

```bat
npm run dev
```

## Reset de base de datos

Para borrar tablas, volver a ejecutar migraciones y cargar usuarios de prueba:

```bash
php artisan migrate:fresh --seed
```

Para cargar tambien los 50 productos y 10 almacenes del SQL:

```bat
psql -U postgres -d 8ids2 -f database/datos_prueba.sql
```

## Proyecto ya existente

Si el proyecto ya estaba en la computadora, no es necesario clonar de nuevo. Antes de correr migraciones, verificar que las herramientas y extensiones esten disponibles:

```bat
php -v
composer -V
node -v
npm -v
php -m | findstr fileinfo
php -m | findstr pgsql
```

Si `composer install` falla con errores de clases faltantes dentro de `vendor`, reconstruir las dependencias PHP desde `composer.lock`:

```bat
rmdir /s /q vendor
composer clear-cache
composer install
```

Si `npm install` falla por paquetes anteriores, reconstruir las dependencias de Node desde `package-lock.json`:

```bat
rmdir /s /q node_modules
npm install
```

No borrar `composer.lock` ni `package-lock.json` salvo que se quiera actualizar versiones de dependencias de forma intencional.

## Solucion de problemas

### `npm.ps1` bloqueado en PowerShell

PowerShell puede bloquear `npm.ps1` por politicas de ejecucion. Usar:

```powershell
npm.cmd install
npm.cmd run build
npm.cmd run dev
```

### Composer falla con `StartedSubscriber`

Si aparece un error similar a `Interface "PHPUnit\Event\Application\StartedSubscriber" not found`, regenerar el autoload:

```bat
composer dump-autoload -o --no-scripts
php artisan package:discover
composer install
```

Si el problema continua, reconstruir `vendor`:

```bat
rmdir /s /q vendor
composer clear-cache
composer install
```

### PostgreSQL en modo de recuperacion

Si SQL Shell muestra `el sistema de base de datos esta en modo de recuperacion`, esperar un minuto e intentar otra vez. Si continua, reiniciar el servicio desde `services.msc`:

```txt
postgresql-x64-18
postgresql-x64-17
postgresql-x64-16
```

El nombre exacto depende de la version instalada.

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
