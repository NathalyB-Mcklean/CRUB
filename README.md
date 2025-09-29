# CRUD Rápido con Laravel

<p align="center">
  <img src="https://laravel.com/img/logomark.min.svg" alt="Laravel" width="100">
  <img src="https://raw.githubusercontent.com/github/explore/80688e429a7d4ef2fca1e82350fe8e3517d3494d/topics/php/php.png" alt="PHP" width="100">
  <img src="https://raw.githubusercontent.com/github/explore/80688e429a7d4ef2fca1e82350fe8e3517d3494d/topics/mysql/mysql.png" alt="MySQL" width="100">
  <img src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo-shadow.png" alt="Bootstrap" width="100">
</p>

## Requisitos Previos

### Prerrequisitos (Ecosistema de desarrollo)
- ![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat&logo=php&logoColor=white) **PHP** versión 8.0 o superior
- ![Composer](https://img.shields.io/badge/Composer-885630?style=flat&logo=composer&logoColor=white) **Composer** última versión estable
- ![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=flat&logo=laravel&logoColor=white) **Laravel Installer**
- ![WAMP](https://img.shields.io/badge/WAMP-CC2927?style=flat&logo=apache&logoColor=white) **WampServer** (Entorno de Desarrollo)
- ![Apache](https://img.shields.io/badge/Apache-D22128?style=flat&logo=apache&logoColor=white) **Servidor web**: Apache
- ![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat&logo=mysql&logoColor=white) **Base de datos**: MySQL/MariaDB
- ![VSCode](https://img.shields.io/badge/VS_Code-007ACC?style=flat&logo=visual-studio-code&logoColor=white) **Editor de código**: Visual Studio Code
- ![Node.js](https://img.shields.io/badge/Node.js-339933?style=flat&logo=node.js&logoColor=white) **NPM**: Para compilación de assets
- ![Bootstrap](https://img.shields.io/badge/Bootstrap-7952B3?style=flat&logo=bootstrap&logoColor=white) **Bootstrap**: Framework CSS
- ![Windows](https://img.shields.io/badge/Windows-0078D6?style=flat&logo=windows&logoColor=white) **Sistema Operativo**: Windows

## Introducción

Este proyecto implementa un **CRUD (Create, Read, Update, Delete)** completo utilizando Laravel y el generador automático **ibex/crud-generator**. El sistema permite gestionar productos con sus descripciones, precios y stock, siguiendo el patrón **Modelo-Vista-Controlador (MVC)**.

### Arquitectura MVC en Laravel:
- **Modelos** (`app/Models`): Representan la estructura de datos (Product)
- **Vistas** (`resources/views`): Interfaz de usuario para el CRUD
- **Controladores** (`app/Http/Controllers`): Lógica de negocio (ProductController)
- **Rutas** (`routes/web.php`): Definición de endpoints RESTful

### Objetivo del Proyecto
Implementar un sistema CRUD funcional con operaciones completas de creación, lectura, actualización y eliminación de productos, utilizando herramientas de generación automática de código para optimizar el desarrollo.

## Comandos Utilizados

### FASE 1: Instalación y Configuración Inicial
```bash
# Instalar Laravel Installer globalmente
composer global require laravel/installer

# Crear nuevo proyecto Laravel
cd C:\wamp64\www
laravel new crud_rapido

# Navegar al proyecto
cd crud_rapido

# Copiar archivo de configuración
copy .env.example .env

# Generar clave de aplicación
php artisan key:generate
```

### FASE 2: Configuración de Laravel
```bash
# Limpiar caché de configuración
php artisan config:clear
php artisan cache:clear

# Cachear configuración optimizada
php artisan config:cache
```

### FASE 3: Creación del Modelo y Migración
```bash
# Crear modelo Product con migración
php artisan make:model Product -m

# Ejecutar migraciones
php artisan migrate
```

### FASE 4: Generación del CRUD
```bash
# Instalar generador de CRUD
composer require ibex/crud-generator --dev

# Publicar archivos del generador
php artisan vendor:publish --tag=crud

# Generar CRUD completo para productos
php artisan make:crud products
# Selección: Blade with Bootstrap CSS

# Refrescar autoload de Composer
composer dump-autoload
```

### FASE 5: Instalación de UI y Assets
```bash
# Instalar Laravel UI
composer require laravel/ui --dev

# Generar scaffolding con Bootstrap y autenticación
php artisan ui bootstrap --auth

# Instalar dependencias de Node.js
npm install

# Compilar assets
npm run dev
```

### FASE 6: Ejecución del Servidor
```bash
# Iniciar servidor de desarrollo
php artisan serve
```

## Capturas de Pantalla

### Listado de Productos
*[Aquí deberías incluir captura de /products]*

### Formulario de Creación
*[Aquí deberías incluir captura de /products/create]*

### Formulario de Edición
*[Aquí deberías incluir captura de /products/{id}/edit]*

### Vista Individual de Producto
*[Aquí deberías incluir captura de /products/{id}]*

## Base de Datos

### Configuración del archivo .env
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=crud_rapido
DB_USERNAME=root
DB_PASSWORD=
```

### Estructura de la Tabla `products`

| Campo | Tipo | Descripción |
|-------|------|-------------|
| id | BIGINT UNSIGNED | Identificador único (PRIMARY KEY) |
| description | VARCHAR(191) | Descripción del producto |
| price | DOUBLE(8,2) | Precio del producto (8 enteros, 2 decimales) |
| stock | INTEGER | Cantidad en inventario |
| created_at | TIMESTAMP | Fecha de creación |
| updated_at | TIMESTAMP | Fecha de última actualización |

### Migración Ejecutada

```php
public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('description');
        $table->double('price', 8, 2);
        $table->integer('stock');
        $table->timestamps();
    });
}
```

### Configuración del Modelo

```php
class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'description',
        'price',
        'stock'
    ];
}
```

### Configuración Importante en AppServiceProvider

```php
use Illuminate\Support\Facades\Schema;

public function boot(): void
{
    Schema::defaultStringLength(191);
}
```

*Nota: Esta configuración evita errores de longitud de índice en versiones antiguas de MySQL.*

## Dificultades Encontradas y Soluciones

### Problema 1: Comando Laravel no reconocido
**Descripción**: El comando `laravel` no era reconocido en la consola.

**Solución**: Instalar Laravel Installer globalmente con Composer:
```bash
composer global require laravel/installer
```

### Problema 2: Base de datos no existía
**Descripción**: Error al ejecutar migraciones porque la base de datos `crud_rapido` no existía.

**Solución**: Laravel detectó automáticamente el problema y ofreció crear la base de datos. Se aceptó la opción respondiendo "yes".

### Problema 3: Rutas del CRUD no aparecían
**Descripción**: Al ejecutar `php artisan route:list` solo aparecían 3 rutas básicas, no las del CRUD.

**Solución**: Agregar manualmente en `routes/web.php`:
```php
use App\Http\Controllers\ProductController;
Route::resource('products', ProductController::class);
```

### Problema 4: Error de layout no encontrado
**Descripción**: Error `View [layouts.app] not found` al intentar acceder a las vistas del CRUD.

**Solución**: Instalar Laravel UI que incluye el layout por defecto:
```bash
composer require laravel/ui --dev
php artisan ui bootstrap --auth
```

### Problema 5: Vite no reconocido
**Descripción**: Error al intentar compilar assets con Vite.

**Solución**: Instalar dependencias de Node.js y compilar:
```bash
npm install
npm run dev
```

## Referencias Bibliográficas

1. **Laravel Documentation**. (2025). *Laravel Framework Documentation*. Recuperado de: https://laravel.com/docs
2. **Composer**. (2025). *Dependency Manager for PHP*. Recuperado de: https://getcomposer.org/doc/
3. **Ibex CRUD Generator**. (2025). *Laravel CRUD Generator Package*. Recuperado de: https://packagist.org/packages/ibex/crud-generator
4. **Bootstrap**. (2025). *Bootstrap Framework Documentation*. Recuperado de: https://getbootstrap.com/docs/
5. **Laravel UI**. (2025). *Laravel UI Package*. Recuperado de: https://github.com/laravel/ui

## Funcionalidades Implementadas

- **CREATE**: Formulario para crear nuevos productos
- **READ**: Listado paginado y visualización individual de productos
- **UPDATE**: Formulario para editar productos existentes
- **DELETE**: Eliminación de productos con confirmación
- **VALIDACIONES**: Validación de datos en formularios
- **PAGINACIÓN**: Listado paginado de productos
- **INTERFAZ**: Diseño responsive con Bootstrap
- **AUTENTICACIÓN**: Sistema de login y registro de usuarios


## Información de los Desarrolladores

---

**Este laboratorio ha sido desarrollado por estudiantes de la Universidad Tecnológica de Panamá:**

- **Nathaly Bonilla Mcklean**
- **Correos de contacto**:
  - **Institucional**: nathaly.bonilla1@utp.ac.pa
  - **GitHub**: githubmcklean@gmail.com
  - **Profesional**: nbmcklean@gmail.com

- **Abdiel Abrego**
- **Correos de contacto**:
  - **Institucional**: abdiel.abrego1@utp.ac.pa

- **Curso**: Ingeniería Web
- **Instructora del Laboratorio**: Ing. Irina Fong
- **Fecha de Ejecución**:  29 de septiembre de 2025
- **Fecha de Entrega**: 29 de septiembre de 2025
- **Última Modificación**: 29 de septiembre de 2025

---

<p align="center">
  <strong>Universidad Tecnológica de Panamá</strong><br>
  Facultad de Ingeniería de Sistemas Computacionales<br>
  Licenciatura en Ingeniería de Software<br>
  II Semestre 2025
</p>