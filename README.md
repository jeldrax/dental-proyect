````markdown
# DentalCare

##Descripción del Sistema
**DentalCare** es una plataforma web para la gestión administrativa de una clínica dental, desarrollada con **Laravel 11**, **Jetstream** y **Livewire**.

El sistema permite controlar el flujo de trabajo del consultorio mediante:
* **Gestión de Usuarios:** Administración de roles (Admin, Dentista, Recepcionista, Paciente).
* **Catálogo de Tratamientos:** Control de servicios, precios y descripciones.
* **Seguridad:** Autenticación robusta y protección de rutas.

## Instrucciones de Instalación Local

Ejecutar el proyecto en tu entorno:

### 1. Clonar el repositorio
```bash
git clone <URL_DE_TU_REPOSITORIO>
````

### 2\. Instalar dependencias

Instalar las librerías de PHP y compilar los activos de frontend:

```bash
composer install
npm install && npm run build
```

### 3\. Configurar el entorno (.env)

```bash
cp .env.example .env
php artisan key:generate
```

> **Nota:** Abrir el archivo `.env` recién creado y configura las credenciales de tu base de datos (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`).

### 4\. Migrar y ejecutar Seeders

Crear las tablas en la base de datos y carga los datos de prueba iniciales:

```bash
php artisan migrate --seed
```

-----

## 👤 Usuario Admin de Prueba

Utiliza estas credenciales para iniciar sesión y acceder al panel administrativo:

  * **Correo:** `admin@dental.com`
  * **Contraseña:** `12345678`

-----

