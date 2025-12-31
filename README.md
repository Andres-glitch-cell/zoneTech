<div align="center">

![ZoneTech Header](https://capsule-render.vercel.app/api?type=waving&color=gradient&customColorList=6,11,20&height=300&section=header&text=ZoneTech&fontSize=90&fontAlignY=38&animation=twinkling)

# ZoneTech

**Plataforma integral de comercio electrónico tecnológico y gestión de soporte técnico**

[![GitHub stars](https://img.shields.io/github/stars/Andres-glitch-cell/zoneTech?style=flat&logo=github&logoColor=white&color=282828)](https://github.com/Andres-glitch-cell/zoneTech/stargazers)
[![GitHub forks](https://img.shields.io/github/forks/Andres-glitch-cell/zoneTech?style=flat&logo=github&logoColor=white&color=282828)](https://github.com/Andres-glitch-cell/zoneTech/network/members)
[![GitHub watchers](https://img.shields.io/github/watchers/Andres-glitch-cell/zoneTech?style=flat&logo=github&logoColor=white&color=282828)](https://github.com/Andres-glitch-cell/zoneTech/watchers)
[![License: MIT](https://img.shields.io/badge/License-MIT-282828?style=flat)](https://opensource.org/licenses/MIT)
[![Laravel](https://img.shields.io/badge/Laravel-v11-ff2d20?style=flat&logo=laravel&logoColor=white)](https://laravel.com)

</div>

## Descripción del Proyecto

ZoneTech es una plataforma web integral diseñada para cubrir las necesidades del sector tecnológico actual. Combina un potente módulo de **comercio electrónico** especializado en productos de alta tecnología con un sistema avanzado de **gestión de soporte técnico** y un espacio de **colaboración comunitaria**.

El objetivo principal es ofrecer una experiencia unificada y moderna —similar a un "MediaMarkt 2.0"— donde los usuarios puedan adquirir dispositivos, gestionar reparaciones y compartir conocimientos en un único entorno seguro y escalable.

El proyecto se desarrolla con estándares profesionales de código limpio, pruebas unitarias y documentación, garantizando mantenibilidad a largo plazo.

## Características Principales

- **Comercio electrónico**: Catálogo completo de productos, gestión de inventario, carrito de compras y preparación para integración de pasarelas de pago.
- **Soporte técnico**: Sistema de tickets con estados, prioridades, asignación de técnicos y seguimiento en tiempo real.
- **Comunidad**: Publicación de reseñas, foros temáticos y sistema de recomendaciones basado en historial de usuario.
- **Autenticación y roles**: Gestión de usuarios con diferentes niveles de acceso (cliente, técnico, administrador).
- **Diseño responsive**: Interfaz adaptada a dispositivos móviles y de escritorio.
- **Seguridad**: Protección CSRF, validación de entradas, hashing de contraseñas y políticas de autorización.

<div align="center">

![Laravel Logomark](https://laravel.com/img/logomark.min.svg)

**Construido sobre Laravel 11 – Framework PHP líder en productividad y robustez**

</div>

## Arquitectura y Tecnologías

| Componente           | Tecnología                    | Descripción                                   |
| -------------------- | ----------------------------- | --------------------------------------------- |
| Backend              | Laravel 11 (PHP 8.2+)         | Routing, Eloquent ORM, autenticación y queues |
| Frontend             | Blade Templates + Livewire    | Renderizado del servidor con interactividad   |
| Base de datos        | MySQL                         | Almacenamiento relacional eficiente           |
| Gestión de assets    | Vite + Tailwind CSS (próximo) | Preparado para estilos modernos y compilación |
| Administración BD    | phpMyAdmin                    | Interfaz gráfica durante desarrollo           |
| Control de versiones | Git + GitHub                  | Colaboración y CI/CD futuro                   |

## Requisitos del Sistema

- PHP ≥ 8.2
- Composer
- MySQL ≥ 8.0
- Node.js & NPM (para assets)
- Servidor web (Apache/Nginx) o Laravel Artisan Serve

## Instalación y Configuración

```bash
# 1. Clonar el repositorio
git clone https://github.com/Andres-glitch-cell/zoneTech.git
cd zoneTech

# 2. Instalar dependencias de PHP
composer install --optimize-autoloader --no-dev

# 3. Instalar y compilar assets frontend (opcional en esta fase)
npm install && npm run build

# 4. Configurar variables de entorno
cp .env.example .env
php artisan key:generate

# 5. Configurar conexión a base de datos en .env
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=zonetech
# DB_USERNAME=root
# DB_PASSWORD=

# 6. Ejecutar migraciones y seeders
php artisan migrate --seed

# 7. Iniciar servidor de desarrollo
php artisan serve

/* ! IMPORTANTE A TENER EN CUENTA !
 ? 1. Si queremos cambiar el nombre de la pestaña (etiqueta <title>), hay que ponerlo entre ""

 ? 2. Para cambiar o hacer cambios en este caso en la página principal de Laravel, donde sale todo,
 ? hay que modificar archivos que acaben en  *.blade.php (blade es el "gestor" que usa Laravel para
 ? trabajar y/o modificar archivos)

 ? 3. Si queremos hacer otros archivos hay que hacerles un "linkeo" un Route::get en el archivo routes\web.php
? e importante tener en cuenta que al nombre del archivo o de la página nueva, hay que ponerle siempre .blade.php
*/
