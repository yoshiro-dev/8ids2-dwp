# Cómo probar la API (Login + CRUD Productos)

Tarea Tercer Parcial — "Crear API en Laravel".

## Qué necesitas

- **Postman Desktop** (aplicación de escritorio, descarga gratis en https://www.postman.com/downloads/).
  - ⚠️ Postman **Web** (en el navegador) NO puede conectarse a `http://127.0.0.1:8000` a menos que instales aparte el "Postman Desktop Agent". Es más fácil usar directamente la app de escritorio.
- El servidor de Laravel corriendo (paso 1 abajo).
- La base de datos con las migraciones y seeders ejecutados (usuario `admin@test.com`).

## Paso 1 — Levantar el servidor

```bash
php artisan serve
```

Debe quedar corriendo en `http://127.0.0.1:8000`. Deja esa terminal abierta.

Si es la primera vez en esta máquina:

```bash
composer install
php artisan migrate --seed
```

## Paso 2 — Importar la colección en Postman

1. Abre Postman Desktop.
2. La forma más fácil: abre el Explorador de Windows y **arrastra** el archivo `docs/8ids2-api.postman_collection.json` al centro de la ventana de Postman (también sirve `Ctrl+O`, o la flechita **˅** de la esquina superior izquierda que despliega el menú File → Import).
3. Aparece la colección **"8IDS2 - API Laravel (Login + CRUD Productos)"** con 6 peticiones numeradas.
4. No hay que configurar nada más: la variable `{{base_url}}` ya viene apuntando a `http://127.0.0.1:8000` dentro de la colección.

## Paso 3 — Ejecutar las peticiones EN ORDEN

| # | Petición | Método y ruta | Qué demuestra |
|---|----------|---------------|----------------|
| 1 | Login | `POST /api/login` | Autenticación con Sanctum. Devuelve `acceso: "Ok"` y un `token`. **El token se guarda solo** (script de la colección) y las demás peticiones lo usan automáticamente como Bearer. |
| 2 | Crear Producto | `POST /api/productos` | Crea un producto y guarda su `id` automáticamente. |
| 3 | Lista Productos | `GET /api/productos` | Devuelve todos los productos. |
| 4 | Lista 1 Producto | `GET /api/productos/{id}` | Devuelve solo el producto recién creado. |
| 5 | Editar Producto | `PUT /api/productos/{id}` | Actualiza precio y existencia. |
| 6 | Eliminar Producto | `DELETE /api/productos/{id}` | Borra el producto. |

Credenciales del login (ya vienen en el body de la petición 1, creadas por el seeder):

```json
{
    "email": "admin@test.com",
    "password": "12345678"
}
```

## Qué mostrar al profesor (demo sugerida)

1. **Terminal con `php artisan serve` corriendo** → la API está viva.
2. **Login sin token / credenciales malas** → cambia la contraseña a algo incorrecto y muestra la respuesta de error (`"No existe el usuario y/o contrasena"`). También puedes ejecutar "Lista Productos" ANTES del login (borra la variable `token` de la colección) para mostrar el `401 Unauthenticated` → demuestra que las rutas están protegidas con `auth:sanctum`.
3. **Login correcto** → muestra el JSON con `acceso: "Ok"` y el token generado.
4. **Crear → Listar → Ver uno → Editar → Eliminar**, en ese orden. Después de eliminar, vuelve a ejecutar "Lista 1 Producto" para mostrar que ya no existe (404).
5. Si pide ver código: `routes/api.php`, `app/Http/Controllers/LoginController.php` y `app/Http/Controllers/ProductoApiController.php`.

## Rutas de la API (resumen)

```
POST   /api/login              (pública)
GET    /api/productos          (requiere token)
GET    /api/productos/{id}     (requiere token)
POST   /api/productos          (requiere token)
PUT    /api/productos/{id}     (requiere token)
DELETE /api/productos/{id}     (requiere token)
```

## ¿Cómo repito la prueba después de eliminar? (FAQ)

- **El ciclo es autocontenido**: la petición 2 crea el producto de prueba y la 6 lo borra. Los 50 productos del seeder nunca se tocan.
- **El DELETE es definitivo** (hard delete, sin soft deletes): no se puede deshacer. Pero no hace falta: para repetir la demo solo vuelve a ejecutar desde la petición **2** — crea un producto nuevo (con otro `id`, que se guarda solo) y las peticiones 3-6 funcionan igual.
- **Resetear TODA la base de datos** (solo si quedó desordenada; borra todo y vuelve a los datos del seeder):

  ```bash
  php artisan migrate:fresh --seed
  ```

## Dónde está cada API en el código

La API vive en 3 archivos:

### 1. Las rutas — `routes/api.php`

Es el "mapa" de la API: dice qué URL existe y qué método de qué controlador la atiende (todo bajo el prefijo `/api`).

- **Línea 8**: `POST /api/login` → `LoginController@login`. Está FUERA del grupo protegido, por eso es pública.
- **Líneas 10-16**: el grupo `Route::middleware('auth:sanctum')->group(...)` — todo lo de adentro exige token. **Si el profesor pregunta "¿dónde se protegen las rutas?", la respuesta es esta línea.**

| Petición Postman | Ruta | Método del controlador |
|---|---|---|
| 2. Crear Producto | `POST /productos` | `store` |
| 3. Lista Productos | `GET /productos` | `index` |
| 4. Lista 1 Producto | `GET /productos/{id}` | `show` |
| 5. Editar Producto | `PUT /productos/{id}` | `update` |
| 6. Eliminar Producto | `DELETE /productos/{id}` | `destroy` |

### 2. El login — `app/Http/Controllers/LoginController.php`

Un solo método, `login()`:

- `Auth::attempt(...)` verifica email y contraseña contra la base de datos.
- Si son correctos, `$user->createToken('app')->plainTextToken` — **aquí es donde Sanctum genera el token** que se ve en Postman — y responde el JSON con `acceso: "Ok"`.
- Si fallan, responde `"No existe el usuario y/o contrasena"`.

### 3. El CRUD — `app/Http/Controllers/ProductoApiController.php`

Un método por operación, todos usan el modelo `Producto` (Eloquent):

- **`index()`** — `Producto::orderBy('id','desc')->get()` trae todos los productos.
- **`show($id)`** — `Producto::find($id)` busca uno; si no existe devuelve **404** (este es el 404 que se ve después de eliminar).
- **`store()`** — valida el body (código, nombre, precio y existencia obligatorios), inserta con `Producto::create(...)` y responde **201 Created**.
- **`update($id)`** — busca el producto, valida solo los campos enviados (`sometimes` = "si viene, valídalo"), aplica con `fill()` y guarda con `save()`.
- **`destroy($id)`** — busca el producto y hace `$producto->delete()` (borrado definitivo).

### El flujo completo, en una frase

Postman envía la petición → Laravel busca la URL en `routes/api.php` → si la ruta está en el grupo `auth:sanctum`, Sanctum verifica el header `Authorization: Bearer <token>` (sin token válido corta ahí con **401**) → llama al método del controlador → el controlador usa el modelo `Producto` para hablar con PostgreSQL → devuelve el JSON que se ve en Postman.

## Armar la colección a mano (sin variables)

Alternativa a la colección importada: crear las 6 peticiones manualmente, con las URLs escritas directas y el token pegado a mano. Pasos clave:

1. Crear la colección vacía y agregar cada petición con **Add request**.
2. A cada petición: método correcto (POST/GET/PUT/DELETE), URL completa (`http://127.0.0.1:8000/api/...`) y header `Accept: application/json`.
3. Login con Auth Type **No Auth**; las demás con **Bearer Token**, pegando el token que devolvió el login.
4. Atajo válido: pegar el token una sola vez en **Authorization de la colección** (clic en el nombre de la colección → pestaña Authorization → Bearer Token) y dejar las peticiones en "Inherit auth from parent".
5. Contras de no usar variables: cada vez que se crea un producto nuevo hay que **actualizar a mano el id** en las URLs de Listar 1 / Editar / Eliminar.

## Errores y avisos comunes en Postman

- **⚠️ El body debe ser raw + JSON, no raw + Text.** En la pestaña Body, junto a los radio buttons hay un dropdown que debe decir **JSON** (no "Text"). Si queda en Text, Postman envía `Content-Type: text/plain`, Laravel NO interpreta el body, y en el PUT pasa algo traicionero: como la validación usa `sometimes`, no ve campos, no cambia nada **y aun así responde 200 "Producto actualizado"**. La pista: `updated_at` sigue igual a `created_at`. En el POST de crear sí falla con error de validación (los campos son `required`).
- **Aviso "Secrets Detected" al guardar**: Postman detecta el token pegado y ofrece protegerlo. Elegir **Override** (dejar el valor tal cual). "Secure" lo convertiría en variable del vault y "Remove" lo borra. Es solo una advertencia — aplica si la colección se compartiera públicamente; un token local de desarrollo no corre riesgo.
- **Cómo distinguir errores**: **401 Unauthenticated** = problema de token (no llegó, mal pegado, o se borró la BD). **404 "No existe el producto"** = el token está BIEN, pero el id de la URL no existe en la base — revisar qué id devolvió el último "Crear Producto".
- **Exportar la colección**: tres puntos (⋯) junto al nombre de la colección → Export → Collection v2.1. Ojo: el token pegado va incluido en texto plano en el archivo exportado.

## Preguntas frecuentes sobre el token

- **¿Hacer login otra vez invalida el token anterior?** No. Cada login ejecuta `$user->createToken('app')` y eso **agrega una fila nueva** a la tabla `personal_access_tokens` — el usuario puede tener varios tokens activos a la vez, todos válidos.
- **¿El token expira?** No: `config/sanctum.php` tiene `'expiration' => null`. Solo muere si se borra la base de datos (`migrate:fresh` elimina la tabla de tokens → 401).
- **¿Dónde está `personal_access_tokens` en el código?** Tres puntos:
  1. **Se crea** con la migración `database/migrations/2026_07_02_213336_create_personal_access_tokens_table.php` (al correr `php artisan migrate`).
  2. **Se inserta** al hacer login: `createToken()` viene del trait `HasApiTokens` que usa el modelo `User` (`app/Models/User.php`); el método vive en el paquete Sanctum (`vendor/laravel/sanctum`) y hace el INSERT.
  3. **Se lee** en cada petición protegida: el middleware `auth:sanctum` busca el token en la tabla y deja pasar o responde 401.
- **Dato de seguridad**: la tabla guarda el **hash SHA-256** del token, no el token real (igual que las contraseñas). El prefijo numérico del token que ves en Postman (ej. `8|ZI...`) es el id de la fila en la tabla.

## Vocabulario rápido

- **Request (petición)**: cada elemento de la colección (Login, Crear Producto...). Método + URL + headers/body/auth.
- **Collection (colección)**: la carpeta que agrupa las peticiones de una API.
- **Endpoint / ruta**: las URLs del lado del servidor (`/api/login`, `/api/productos`). Las peticiones de Postman los consumen.
- **JSON**: formato de texto para escribir datos (`{"clave": valor}`). No es la API — es el *idioma* en que la API recibe y responde los datos. También es el formato del archivo de exportación de Postman (otro uso, sin relación con la API).
