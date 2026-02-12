<div align="center">
  <img src="https://capsule-render.vercel.app/api?type=soft&color=gradient&height=120&section=header&text=ZoneTech&fontSize=60&fontColor=fff&animation=twinkling&fontAlignY=38" />

  <h3>🛒 Tu tienda tech + soporte técnico + comunidad · todo en un solo lugar</h3>

  <a href="https://git.io/typing-svg">
    <img src="https://readme-typing-svg.herokuapp.com?font=Fira+Code&weight=500&size=22&duration=4000&pause=800&color=00D9FF&center=true&vCenter=true&width=480&lines=Compra+lo+%C3%BAltimo+en+tecnolog%C3%ADa;Solicita+reparaciones+profesionales;Forma+parte+de+una+comunidad+tech" />
  </a>

  <br/>

  <!-- Badges rápidos y coloridos -->
  ![Estado](https://img.shields.io/badge/Estado-En%20Desarrollo-yellow?style=for-the-badge&logo=rocket&logoColor=white)
  ![Laravel](https://img.shields.io/badge/Laravel-11-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
  ![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)
  ![Tailwind](https://img.shields.io/badge/Tailwind%20CSS-3.4-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white)

  <br/><br/>

  <a href="#-características-rápidas">Características</a> •
  <a href="#-demo">Demo</a> •
  <a href="#-instalación-rápida">Instalación en 2 min</a> •
  <a href="#-roadmap">Próximos pasos</a>

</div>

---

### 🚀 ¿Qué es ZoneTech?

Imagina **PcComponentes + un servicio técnico pro + un foro de usuarios**… todo dentro de la misma plataforma.

- 🛍️ **Tienda** especializada en tecnología
- 🔧 **Soporte técnico** con tickets y seguimiento
- 👥 **Comunidad** con reseñas, foros y perfiles

Actualmente en **fase beta** → ¡pero ya puedes probar muchas cosas!

---

### ✨ Características rápidas (estado febrero 2026)

| Área                 | Lo que ya funciona                        | Próximamente                     |
|----------------------|--------------------------------------------|----------------------------------|
| 🛒 E-commerce        | Catálogo • Categorías • Búsqueda • Filtros | Carrito • Wishlist • Pagos       |
| 🔧 Soporte técnico   | Tickets • Prioridades • Asignación técnicos | Notificaciones • Chat en vivo    |
| 👥 Comunidad         | Perfiles • Reseñas con estrellas           | Foros • Reputación • Mensajería  |
| 🔐 Seguridad/Admin   | Auth • Roles (Cliente/Técnico/Admin)       | Panel admin completo • 2FA       |

**100% responsive** • Tailwind CSS • Preparado para crecer

---

### 📸 Demo y capturas

*(Pronto GIFs y screenshots reales)*

Por ahora un pequeño avance:

<div align="center">
  <img src="https://media.giphy.com/media/qgQUggAC3Pfv687qPC/giphy.gif" width="520" alt="Demo placeholder"/>
</div>

---

### ⚡ Instalación rápida (para valientes)

```bash
git clone https://github.com/Andres-glitch-cell/zoneTech.git
cd zoneTech

composer install
npm install

cp .env.example .env
php artisan key:generate

# Edita .env con tu base de datos ⬇
# DB_DATABASE=zonetech
# DB_USERNAME=...
# DB_PASSWORD=...

php artisan migrate --seed
php artisan serve          # http://localhost:8000
# En otra terminal:
npm run dev
