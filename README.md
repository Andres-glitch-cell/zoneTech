<div align="center">

# ZoneTech 🌐

![ZoneTech Header](https://capsule-render.vercel.app/api?type=waving&color=gradient&customColorList=6,11,20&height=300&section=header&text=ZoneTech&fontSize=90&fontAlignY=38&animation=twinkling)

### Plataforma integral de e-commerce tecnológico y soporte técnico especializado

ZoneTech es una solución completa que combina un robusto sistema de comercio electrónico para productos tecnológicos con herramientas avanzadas de gestión de soporte técnico y un portal de colaboración para usuarios.

</div>

<div align="center">

[![GitHub stars](https://img.shields.io/github/stars/Andres-glitch-cell/zoneTech?style=social)](https://github.com/Andres-glitch-cell/zoneTech/stargazers)
[![GitHub forks](https://img.shields.io/github/forks/Andres-glitch-cell/zoneTech?style=social)](https://github.com/Andres-glitch-cell/zoneTech/network/members)
[![GitHub watchers](https://img.shields.io/github/watchers/Andres-glitch-cell/zoneTech?style=social)](https://github.com/Andres-glitch-cell/zoneTech/watchers)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![Laravel](https://img.shields.io/badge/Built%20with-Laravel-ff2d20?style=flat&logo=laravel)](https://laravel.com)

</div>

## Descripción del Proyecto

ZoneTech busca reinventar la experiencia de compra y soporte en el sector tecnológico, ofreciendo:

- **E-commerce especializado**: Catálogo dinámico de productos high-tech, carrito de compras inteligente y procesamiento seguro de pagos.
- **Gestión de soporte técnico**: Sistema de tickets, seguimiento de reparaciones y atención personalizada en tiempo real.
- **Portal de colaboración**: Espacio comunitario con reseñas, foros y recomendaciones personalizadas.
- **Diseño responsive**: Interfaz moderna y adaptable a cualquier dispositivo.

Desarrollado con un enfoque en escalabilidad, seguridad y mantenibilidad.

<div align="center">

![Laravel Logo](https://zaltek.co.uk/wp-content/uploads/2024/09/laravel-logolockup-cmyk-red-768x432.jpg.webp)

</div>

## Tecnologías Utilizadas

| Tecnología    | Descripción                              |
|---------------|------------------------------------------|
| **Laravel**   | Framework PHP principal para backend     |
| **PHP**       | Lenguaje principal del servidor          |
| **JavaScript**| Lógica frontend y interacciones dinámicas|
| **MySQL**     | Sistema de gestión de base de datos      |
| **HTML5 & CSS3** | Estructura y estilos de la interfaz   |
| **phpMyAdmin**| Herramienta de administración de BD     |

## Instalación

Sigue estos pasos para configurar el proyecto localmente:

```bash
# Clonar el repositorio
git clone https://github.com/Andres-glitch-cell/zoneTech.git
cd zoneTech

# Instalar dependencias PHP
composer install

# Instalar dependencias frontend (si aplica)
npm install && npm run dev

# Configurar variables de entorno
cp .env.example .env
php artisan key:generate

# Configurar base de datos en .env
# Ejemplo:
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=zonetech
# DB_USERNAME=root
# DB_PASSWORD=

# Ejecutar migraciones
php artisan migrate

# (Opcional) Cargar datos de prueba
php artisan db:seed

# Iniciar servidor de desarrollo
php artisan serve
