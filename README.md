````markdown
# Dental Proyect 🦷

Sistema de gestión integral para clínicas dentales desarrollado con **Laravel**, **Livewire** y **Jetstream**. Permite la administración de pacientes, doctores, catálogo de tratamientos y asignación de citas médicas de forma segura y eficiente.

---

## ⚙️ Instrucciones de Instalación Local

Sigue estos pasos para configurar y ejecutar el proyecto en tu entorno:

### 1. Clonar el repositorio
```bash
git clone <URL_DE_TU_REPOSITORIO>
````

### 2\. Instalar dependencias

Instala las librerías de PHP y compila los activos de frontend:

```bash
composer install
npm install && npm run build
```

### 3\. Configurar el entorno (.env)

Copia el archivo de ejemplo y genera la llave de seguridad de la aplicación:

```bash
cp .env.example .env
php artisan key:generate
```

> **Nota:** Abre el archivo `.env` recién creado y configura las credenciales de tu base de datos (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`).

### 4\. Migrar y ejecutar Seeders

Crea las tablas en la base de datos y carga los datos de prueba iniciales:

```bash
php artisan migrate --seed
```

-----

## 👤 Usuario Admin de Prueba

Utiliza estas credenciales para iniciar sesión y acceder al panel administrativo:

  * **Correo:** `admin@dental.com`
  * **Contraseña:** `password`

-----

## 🛠 Tecnologías Utilizadas

  * Laravel 12
  * Livewire 3
  * Tailwind CSS
  * MySQL

<!-- end list -->

```
```
