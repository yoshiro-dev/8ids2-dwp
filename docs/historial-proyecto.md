# Historial del proyecto

Actualizado: 2026-06-23 13:06:57 -06:00.

Este documento registra el avance del repositorio y del proyecto Laravel. Las fechas y horas salen de `git log --date=iso-local`. El historial de commits esta documentado hasta `b0e73b4`; el commit que crea este documento sera posterior.

Nota: en commits antiguos del repositorio, la funcion se resume a partir del mensaje del commit y los archivos modificados. En los modulos Laravel se describe el comportamiento visible en el proyecto actual.

## Modulos Laravel

| Fecha y hora | Commit | Modulo / cambio | Que se agrego | Funcion |
|---|---|---|---|---|
| 2026-05-26 15:43:51 -0600 | `b793213` | Base Laravel y autenticacion | Estructura Laravel, controladores Auth, vistas de login/registro, `HomeController`, `User`, migraciones base, AdminLTE y Vite | Permite iniciar sesion, registrar usuarios, entrar a `/home` y usar la base de la aplicacion |
| 2026-05-26 15:43:51 -0600 | `b793213` | Productos | `ProductosController`, `Producto`, migracion `productos`, vistas `productos/index` y `productos/create` | Administra productos con codigo, nombre, precio, impuesto y existencia |
| 2026-05-26 16:04:54 -0600 | `0550410` | Edicion de productos | Ajustes en controlador y vista de productos para editar registros | Permite modificar productos existentes desde el listado |
| 2026-06-04 16:46:37 -0600 | `966ea8b` | Almacenes | `AlmacenController`, `Almacen`, migracion `almacenes`, vistas `almacen/index` y `almacen/create` | Administra almacenes con codigo y nombre |
| 2026-06-04 16:46:37 -0600 | `966ea8b` | Breadcrumbs | Paquete `diglactic/laravel-breadcrumbs`, `config/breadcrumbs.php`, `routes/breadcrumbs.php` y ajustes en vistas | Muestra navegacion jerarquica dentro de productos y almacenes |
| 2026-06-09 21:30:05 -0600 | `714a482` | Paginas de error | Vistas `401`, `402`, `403`, `404`, `419`, `429`, `500`, `503`, layout de errores, imagenes y ruta local `/error/{code}` | Personaliza errores HTTP y permite probarlos en entorno local |
| 2026-06-16 16:38:41 -0600 | `19a91a7` | Filtros de busqueda | Busqueda en controladores y formularios en listados de productos y almacenes | Permite filtrar registros por codigo o nombre |
| 2026-06-16 16:48:43 -0600 | `3618629` | Busqueda y paginacion | Ajustes en consultas, vistas y documentacion | Conserva busquedas al navegar paginas y mejora listados largos |
| 2026-06-16 16:55:43 -0600 | `ea55183` | Paginacion AdminLTE | Ajustes en `AppServiceProvider` y vistas de index | Usa estilos de paginacion compatibles con AdminLTE |
| 2026-06-18 16:08:29 -0600 | `bd56a63` | Roles y permisos | Spatie Permission, migracion de permisos, `config/permission.php`, seeders de roles, middleware en rutas | Restringe productos y almacenes segun permiso del usuario |
| 2026-06-18 16:38:20 -0600 | `0f39725` | Home autenticado | Ajustes en `resources/views/home.blade.php` | Muestra informacion del usuario autenticado en el inicio |
| 2026-06-23 13:04:25 -0600 | `b0e73b4` | Instalacion, PostgreSQL y datos de prueba | README ampliado, `.env.example` con PostgreSQL y `database/datos_prueba.sql` | Documenta instalacion real en Windows/PostgreSQL y agrega 50 productos + 10 almacenes de prueba |

## Trabajo de configuracion local documentado

Estos pasos se documentaron porque fueron necesarios para levantar el proyecto en Windows:

| Fecha | Tema | Que se hizo | Funcion |
|---|---|---|---|
| 2026-06-23 | PHP en Windows | Se verifico PHP 8.5.7 x64 NTS en el `Path` | Permite ejecutar `php`, `artisan` y Composer desde la terminal |
| 2026-06-23 | Composer | Se verifico Composer 2.10.1 usando el PHP instalado | Permite instalar dependencias de Laravel desde `composer.lock` |
| 2026-06-23 | Node y npm | Se verifico Node 24.17.0 y npm 11.13.0 | Permite instalar dependencias frontend y compilar Vite |
| 2026-06-23 | Extensiones PHP | Se activaron `fileinfo`, `pdo_pgsql`, `pgsql`, `curl`, `mbstring`, `openssl` y `zip` | Cumple requisitos de Laravel, Composer y PostgreSQL |
| 2026-06-23 | Autoload Composer | Se uso `composer dump-autoload -o --no-scripts` y `php artisan package:discover` | Corrige un autoload inconsistente que impedia descubrir paquetes |
| 2026-06-23 | PostgreSQL | Se creo la base con `CREATE DATABASE "8ids2";` dentro de `psql` | Prepara la base para migraciones Laravel |
| 2026-06-23 | Migraciones y seeders | Se ejecuto `php artisan migrate --seed` | Crea tablas y usuarios de prueba con roles |
| 2026-06-23 | Build frontend | Se ejecuto `npm.cmd run build` en PowerShell | Compila assets en `public/build` evitando el bloqueo de `npm.ps1` |
| 2026-06-23 | Servidor local | Se ejecuto `php artisan serve` | Levanta el proyecto en `http://127.0.0.1:8000` |

## Historial de commits

| Fecha y hora | Commit | Cambio | Funcion |
|---|---|---|---|
| 2026-03-07 11:39:48 -0600 | `aa55a5d` | Estructura inicial IDS 7o Cuatrimestre SI | Crea la base inicial del repositorio escolar |
| 2026-03-07 11:43:21 -0600 | `71c5e1e` | Quitar carpeta IDS redundante | Limpia la estructura para evitar carpetas duplicadas |
| 2026-03-07 11:46:42 -0600 | `b5c821f` | Crear README con detalles del proyecto | Documenta informacion inicial del repositorio |
| 2026-03-07 11:50:42 -0600 | `44616db` | Estructura completa 7o a 11o cuatrimestre | Organiza carpetas por cuatrimestre y materias |
| 2026-03-07 11:57:22 -0600 | `e5406a9` | Proyectos SHA256 y file-sha256 | Agrega practicas de seguridad informatica sobre hash |
| 2026-03-07 12:01:31 -0600 | `e690730` | Mover `index.html` y fuentes a raiz | Centraliza el punto de entrada web del repositorio |
| 2026-03-07 12:02:24 -0600 | `9fd83ba` | Agregar enlace web al README | Facilita abrir la version web/documentada |
| 2026-03-07 12:06:40 -0600 | `432412b` | Renombrar cuatrimestres con cero | Mejora el orden alfabetico de carpetas |
| 2026-03-07 12:10:35 -0600 | `d720ea3` | Index central con navegacion completa | Crea una navegacion general para cuatrimestres |
| 2026-03-07 12:13:27 -0600 | `1d2c630` | Ajustar estructura y formato del README | Mejora lectura y organizacion documental |
| 2026-03-07 12:16:53 -0600 | `eba4d57` | Actualizar enlaces de cursos en README | Mantiene navegacion del repositorio actualizada |
| 2026-03-07 13:29:21 -0600 | `2925ab1` | Actualizar proyecto SHA256 | Actualiza practica del 2do parcial de SI |
| 2026-03-07 13:38:33 -0600 | `cf00f90` | Actualizar proyectos SI con carpeta WEB y XML | Organiza proyectos web de SI con archivos de despliegue/configuracion |
| 2026-04-05 19:14:09 -0600 | `e0bc3a5` | Cambios de 2do parcial y agregado 3er parcial AES/Resultado | Agrega practicas criptograficas y resultados |
| 2026-04-05 21:05:29 -0600 | `7168112` | Cambios locales en esta computadora | Guarda avance local previo |
| 2026-04-05 21:26:25 -0600 | `efffc3d` | Nuevo RSA | Agrega practica RSA |
| 2026-04-06 00:35:49 -0600 | `5027a96` | Nuevo RSA 3.0 | Actualiza o amplia la practica RSA |
| 2026-05-26 15:43:51 -0600 | `b793213` | Primer commit Laravel | Agrega base Laravel, autenticacion, AdminLTE, producto inicial y estructura del proyecto web |
| 2026-05-26 15:48:29 -0600 | `c986ba8` | Primer commit adicional | Ajusta rutas del proyecto Laravel |
| 2026-05-26 15:49:19 -0600 | `3db6c61` | Resolver conflicto README | Restablece/combina documentacion del repositorio tras conflicto |
| 2026-05-26 15:57:16 -0600 | `cf7026b` | Limpieza de carpetas | Reduce contenido anterior y limpia estructura del repositorio |
| 2026-05-26 16:04:54 -0600 | `0550410` | Editar producto | Agrega o ajusta edicion en productos |
| 2026-06-04 16:46:37 -0600 | `966ea8b` | Breadcrumbs y almacenes | Agrega navegacion con breadcrumbs y modulo de almacenes |
| 2026-06-09 21:30:05 -0600 | `714a482` | Paginas de error | Agrega vistas e imagenes para errores HTTP |
| 2026-06-09 21:37:26 -0600 | `a25c6df` | Actualizar README del proyecto | Documenta tecnologias, modulos y rutas del proyecto Laravel |
| 2026-06-16 16:38:41 -0600 | `19a91a7` | Filtros a productos y almacenes | Agrega busqueda por codigo o nombre |
| 2026-06-16 16:48:43 -0600 | `3618629` | Ajustar busqueda y paginacion | Mejora listados y conserva filtros |
| 2026-06-16 16:55:43 -0600 | `ea55183` | Ajustar paginacion para AdminLTE | Integra estilos de paginacion con la plantilla |
| 2026-06-18 16:08:29 -0600 | `bd56a63` | Roles y permisos con Spatie | Agrega autorizacion por rol y usuarios de prueba |
| 2026-06-18 16:38:20 -0600 | `0f39725` | Usuario autenticado en home | Muestra datos del usuario logueado |
| 2026-06-23 13:04:25 -0600 | `b0e73b4` | Setup y datos de prueba | Documenta instalacion Windows/PostgreSQL y agrega inserts SQL |
