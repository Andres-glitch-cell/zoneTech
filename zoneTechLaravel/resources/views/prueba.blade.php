<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ZoneTech – Pro Store</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Outfit:wght@700;800;900&display=swap" rel="stylesheet">

    <style>
        [x-cloak] {
            display: none !important;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #030305;
            color: #e0e0e0;
            overflow-x: hidden;
        }

        h1,
        h2,
        h3,
        .logo,
        .precio-actual {
            font-family: 'Outfit', sans-serif;
        }

        /* --- EFECTO BORDER BEAM (SNAKE LIGHT) PARA TARJETAS --- */
        .efecto-border-fluido {
            position: relative;
            padding: 1.5px;
            border-radius: 20px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.05);
            transition: transform 0.3s ease;
        }

        .efecto-border-fluido::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: conic-gradient(from 0deg,
                    transparent 0%,
                    #ff3333 15%,
                    #a855f7 30%,
                    #06b6d4 45%,
                    transparent 60%);
            animation: rotate-border 4s linear infinite;
            opacity: 0;
            filter: blur(8px);
            transition: opacity 0.5s ease;
        }

        @keyframes rotate-border {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .efecto-border-fluido:hover {
            transform: translateY(-5px);
        }

        .efecto-border-fluido:hover::before {
            opacity: 1;
        }

        .contenido-tarjeta {
            position: relative;
            z-index: 2;
            background: #0d0d10;
            border-radius: 19px;
            padding: 20px;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        /* --- BUSCADOR 3D (TU DISEÑO ORIGINAL REFINADO) --- */
        .overlay-blur {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(12px);
            z-index: 998;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.4s;
        }

        .overlay-blur.activo {
            opacity: 1;
            pointer-events: auto;
        }

        .buscador-animado {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.9);
            opacity: 0;
            pointer-events: none;
            z-index: 999;
            transition: 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .buscador-animado.activo {
            opacity: 1;
            transform: translate(-50%, -50%) scale(1);
            pointer-events: auto;
        }

        .input__container {
            position: relative;
            background: rgba(255, 255, 255, 0.95);
            padding: 14px 24px;
            display: flex;
            align-items: center;
            gap: 15px;
            border-radius: 35px;
            width: 450px;
            max-width: 90vw;
            transform: perspective(1000px) rotateX(12deg) rotateY(-15deg);
            transition: 0.5s;
        }

        .input__container:hover {
            transform: perspective(1000px) rotateX(0) rotateY(0) scale(1.05);
        }

        .shadow__input {
            position: absolute;
            inset: -5px;
            z-index: -1;
            filter: blur(35px);
            border-radius: 40px;
            background: linear-gradient(120deg, #ff3333, #a855f7, #06b6d4);
            background-size: 200% 200%;
            animation: glow-move 5s infinite;
        }

        @keyframes glow-move {

            0%,
            100% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }
        }

        .input__search {
            flex: 1;
            border: none;
            outline: none;
            background: transparent;
            color: #1a1a1a;
            font-weight: 600;
            font-size: 1rem;
        }

        /* --- CABECERA --- */
        .cabecera-sitio {
            background: rgba(3, 3, 5, 0.8);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            transition: transform 0.3s ease;
        }

        .cabecera-sitio.oculta {
            transform: translateY(-100%);
        }
    </style>
</head>

<body x-data="{
    searchActive: false,
    category: 'Noticias',
    scrolled: false
}" @scroll.window="scrolled = (window.pageYOffset > 20)">

    <div class="overlay-blur" :class="searchActive ? 'activo' : ''" @click="searchActive = false"></div>
    <div class="buscador-animado" :class="searchActive ? 'activo' : ''">
        <div class="input__container">
            <div class="shadow__input"></div>
            <svg fill="none" viewBox="0 0 24 24" height="20" width="20" stroke="#1a1a1a" stroke-width="3">
                <circle cx="11" cy="11" r="8" />
                <path d="m21 21-4.3-4.3" />
            </svg>
            <input type="text" class="input__search" placeholder="Buscar tecnología..." @keydown.escape="searchActive = false" />
        </div>
    </div>

    <header class="cabecera-sitio fixed top-0 w-full z-50 transition-all duration-300" :class="scrolled ? 'py-3' : 'py-6'">
        <div class="max-w-7xl mx-auto px-6 flex items-center justify-between">
            <div class="logo text-3xl font-black tracking-tighter cursor-pointer text-white" onclick="location.reload()">
                ZONE<span class="text-red-600">TECH</span>
            </div>

            <nav class="hidden lg:flex gap-10">
                <template x-for="item in ['Ofertas', 'Móviles', 'Hardware', 'Gaming']">
                    <a href="#" class="text-[11px] font-black uppercase tracking-[0.2em] text-zinc-500 hover:text-white transition-colors" @click="category = item" x-text="item"></a>
                </template>
            </nav>

            <div class="flex items-center gap-6">
                <button @click="searchActive = true" class="hover:text-red-500 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
                <button onclick="window.location.href='/login'" class="hover:text-purple-500 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </button>
                <button class="bg-white text-black p-2 rounded-xl hover:bg-red-600 hover:text-white transition-all shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <main class="pt-40 pb-20 px-6 max-w-7xl mx-auto">
        <section class="text-center mb-20">
            <h2 class="text-7xl font-black tracking-tighter mb-6 leading-none">EL FUTURO ESTÁ EN<br><span class="text-transparent bg-clip-text bg-gradient-to-r from-red-600 via-purple-600 to-cyan-500">ZONETECH</span></h2>
            <p class="text-zinc-600 uppercase tracking-[0.6em] text-[10px] font-bold">TEXTO ALTERNATIVO QUE INTRODUCIR (NO SE POR AHORA)</p>
        </section>

        <div class="flex items-center gap-6 mb-12">
            <h3 class="text-xs font-black uppercase tracking-[0.4em] text-red-600" x-text="category"></h3>
            <div class="h-[1px] flex-1 bg-gradient-to-r from-zinc-800 to-transparent"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

            <div class="efecto-border-fluido group">
                <div class="contenido-tarjeta">
                    <div class="w-full aspect-square bg-[#030305] rounded-2xl mb-6 overflow-hidden border border-white/5 relative">
                        <img src="https://via.placeholder.com/400" alt="Producto 1" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-br from-red-600/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>

                    <div class="flex-1">
                        <span class="text-[9px] font-black text-purple-500 uppercase tracking-widest">En Stock</span>
                        <h4 class="text-xl font-bold text-white mt-1 mb-2">Zone Blade X-1</h4>
                        <p class="text-zinc-500 text-xs leading-relaxed mb-6">Procesador de última generación con refrigeración líquida.</p>
                    </div>

                    <div class="flex items-end justify-between">
                        <div>
                            <p class="text-[9px] text-zinc-700 font-bold uppercase mb-1">Precio</p>
                            <p class="precio-actual text-2xl text-white">1.299€</p>
                        </div>
                        <a href="enlace-a-tu-producto.html" class="bg-zinc-800 hover:bg-white hover:text-black text-white p-4 rounded-2xl transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                <path d="M12 4v16m8-8H4"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="efecto-border-fluido group">
                <div class="contenido-tarjeta">
                    <div class="w-full aspect-square bg-[#030305] rounded-2xl mb-6 overflow-hidden border border-white/5 relative">
                        <img src="https://via.placeholder.com/400" alt="Producto 2" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-br from-cyan-600/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>

                    <div class="flex-1">
                        <span class="text-[9px] font-black text-cyan-500 uppercase tracking-widest">Novedad</span>
                        <h4 class="text-xl font-bold text-white mt-1 mb-2">Monitor Neural Pro</h4>
                        <p class="text-zinc-500 text-xs leading-relaxed mb-6">4K OLED con tasa de refresco de 240Hz para gaming pro.</p>
                    </div>

                    <div class="flex items-end justify-between">
                        <div>
                            <p class="text-[9px] text-zinc-700 font-bold uppercase mb-1">Precio</p>
                            <p class="precio-actual text-2xl text-white">849€</p>
                        </div>
                        <a href="enlace-a-tu-producto.html" class="bg-zinc-800 hover:bg-white hover:text-black text-white p-4 rounded-2xl transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                <path d="M12 4v16m8-8H4"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="efecto-border-fluido group">
                <div class="contenido-tarjeta">
                    <div class="w-full aspect-square bg-[#030305] rounded-2xl mb-6 overflow-hidden border border-white/5 relative">
                        <img src="https://via.placeholder.com/400" alt="Producto 3" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>

                    <div class="flex-1">
                        <span class="text-[9px] font-black text-red-500 uppercase tracking-widest">Oferta</span>
                        <h4 class="text-xl font-bold text-white mt-1 mb-2">Teclado Ghost RGB</h4>
                        <p class="text-zinc-500 text-xs leading-relaxed mb-6">Switches mecánicos ultra rápidos con respuesta táctil.</p>
                    </div>

                    <div class="flex items-end justify-between">
                        <div>
                            <p class="text-[9px] text-zinc-700 font-bold uppercase mb-1">Precio</p>
                            <p class="precio-actual text-2xl text-white">120€</p>
                        </div>
                        <a href="#" class="bg-zinc-800 hover:bg-white hover:text-black text-white p-4 rounded-2xl transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                <path d="M12 4v16m8-8H4"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="efecto-border-fluido group">
                <div class="contenido-tarjeta">
                    <div class="w-full aspect-square bg-[#030305] rounded-2xl mb-6 overflow-hidden border border-white/5 relative">
                        <img src="https://via.placeholder.com/400" alt="Producto 4" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>

                    <div class="flex-1">
                        <span class="text-[9px] font-black text-zinc-500 uppercase tracking-widest">Limitado</span>
                        <h4 class="text-xl font-bold text-white mt-1 mb-2">Auriculares Void 7.1</h4>
                        <p class="text-zinc-500 text-xs leading-relaxed mb-6">Sonido envolvente 3D para una inmersión total.</p>
                    </div>

                    <div class="flex items-end justify-between">
                        <div>
                            <p class="text-[9px] text-zinc-700 font-bold uppercase mb-1">Precio</p>
                            <p class="precio-actual text-2xl text-white">215€</p>
                        </div>
                        <a href="#" class="bg-zinc-800 hover:bg-white hover:text-black text-white p-4 rounded-2xl transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                <path d="M12 4v16m8-8H4"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="efecto-border-fluido group">
                <div class="contenido-tarjeta">
                    <div class="w-full aspect-square bg-[#030305] rounded-2xl mb-6 overflow-hidden border border-white/5 relative">
                        <img src="https://via.placeholder.com/400" alt="Producto 4" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>

                    <div class="flex-1">
                        <span class="text-[9px] font-black text-zinc-500 uppercase tracking-widest">Limitado</span>
                        <h4 class="text-xl font-bold text-white mt-1 mb-2">ORDENADOR GAMING Void 7.1</h4>
                        <p class="text-zinc-500 text-xs leading-relaxed mb-6">Sonido envolvente 3D para una inmersión total.</p>
                    </div>

                    <div class="flex items-end justify-between">
                        <div>
                            <p class="text-[9px] text-zinc-700 font-bold uppercase mb-1">Precio</p>
                            <p class="precio-actual text-2xl text-white">215€</p>
                        </div>
                        <a href="#" class="bg-zinc-800 hover:bg-white hover:text-black text-white p-4 rounded-2xl transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                <path d="M12 4v16m8-8H4"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Ocultar cabecera al hacer scroll hacia abajo
        let lastScroll = 0;
        window.addEventListener("scroll", () => {
            const currentScroll = window.pageYOffset;
            const header = document.querySelector('.cabecera-sitio');
            if (currentScroll > lastScroll && currentScroll > 150) {
                header.classList.add("oculta");
            } else {
                header.classList.remove("oculta");
            }
            lastScroll = currentScroll;
        });
    </script>
</body>

</html>