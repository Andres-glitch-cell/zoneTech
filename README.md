<div align="center">
  <img src="https://capsule-render.vercel.app/api?type=rect&color=0d1117&height=1"/>
  
  # ZoneTech
  
  **Plataforma integral de e-commerce tecnológico + soporte técnico + comunidad**

  <a href="https://git.io/typing-svg">
    <img src="https://readme-typing-svg.herokuapp.com?font=Fira+Code&weight=400&size=13&duration=3500&pause=1000&color=00D9FF&center=true&vCenter=true&width=380&height=25&lines=Tu+tienda+y+soporte+tecnol%C3%B3gico+todo+en+uno;Productos+%7C+Reparaciones+%7C+Opiniones+reales" alt="Typing SVG" />
  </a>

  <br/><br/>

  <!-- Badges actualizados -->
  ![Estado](https://img.shields.io/badge/Estado-Beta-orange?style=for-the-badge&logo=laravel&logoColor=white)
  ![Laravel](https://img.shields.io/badge/Laravel-11.x-red?style=for-the-badge&logo=laravel)
  ![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php)
  ![MySQL](https://img.shields.io/badge/MySQL-8.x-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
  ![Tailwind](https://img.shields.io/badge/Tailwind_CSS-3.x-06B6D4?style=for-the-badge&logo=tailwindcss)

  <br/>

  [![GitHub stars](https://img.shields.io/github/stars/Andres-glitch-cell/zoneTech?style=social)](https://github.com/Andres-glitch-cell/zoneTech)
  [![GitHub forks](https://img.shields.io/github/forks/Andres-glitch-cell/zoneTech?style=social)](https://github.com/Andres-glitch-cell/zoneTech/forks)
  [![GitHub issues](https://img.shields.io/github/issues/Andres-glitch-cell/zoneTech?style=social)](https://github.com/Andres-glitch-cell/zoneTech/issues)

</div>

---

## 🌟 ¿Qué es ZoneTech?

Plataforma **open source** que combina:

- Tienda online especializada en tecnología
- Sistema profesional de tickets de soporte técnico
- Comunidad con reseñas, foros y reputación de usuarios

Pensada para ser **el punto de encuentro** entre compradores, vendedores y técnicos especializados en dispositivos electrónicos.

---

## Estado actual (febrero 2026)

| Módulo                        | Estado              | Progreso aproximado |
|-------------------------------|---------------------|----------------------|
| Autenticación y roles         | Estable             | 100%                |
| Catálogo + categorías         | Estable             | 100%                |
| Sistema de tickets básico     | Estable             | 100%                |
| Reseñas y valoraciones        | Funcional           | 90%                 |
| Carrito de compras            | En desarrollo       | ~45%                |
| Panel de administración       | En desarrollo       | ~30%                |
| Notificaciones por email      | Parcial             | ~60%                |
| Foro / discusiones            | Planificado         | ~10%                |
| Pasarela de pago real         | Planificado         | 0%                  |

---

## 🚀 Instalación rápida (2026)

```bash
# 1. Clonar
git clone https://github.com/Andres-glitch-cell/zoneTech.git
cd zoneTech

# 2. Dependencias PHP + frontend
composer install --prefer-dist --no-dev
npm ci

# 3. Entorno
cp .env.example .env
php artisan key:generate

# 4. Base de datos (crea la BD antes)
php artisan migrate --seed

# 5. Iniciar (dos terminales)
php artisan serve
npm run dev
