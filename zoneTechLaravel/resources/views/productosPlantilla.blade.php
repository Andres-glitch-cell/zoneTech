@extends('plantillaPrincipal')

@section('titulo', 'Productos')

@push('styles')
<style>
    /* --- Main Content --- */
    .contenedor-productos {
        display: flex;
        gap: 32px;
        align-items: flex-start;
    }

    /* --- Productos Categorías --- */
    .productos-categorias {
        width: 300px;
        background: rgba(255, 255, 255, 0.02);
        border: 1px solid rgba(255, 255, 255, 0.05);
        border-radius: 16px;
        padding: 2.contenedor-4px;
        position: sticky;
        top: 100px;
        max-height: calc(100vh - 120px);
        overflow-y: auto;
    }

    .productos-categorias::-webkit-scrollbar {
        width: 6px;
    }

    .productos-categorias::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.02);
        border-radius: 10px;
    }

    .productos-categorias::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
    }

    .productos-categorias::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 255, 255, 0.15);
    }

    .productos-titulo {
        font-family: 'Outfit', sans-serif;
        font-size: 0.75rem;
        font-weight: 700;
        color: rgba(255, 255, 255, 0.4);
        text-transform: uppercase;
        letter-spacing: 1.2px;
        margin-bottom: 20px;
    }

    .menu-categorias {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .categoria-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 16px;
        color: #e0e0e0;
        text-decoration: none;
        border-radius: 10px;
        font-size: 0.93rem;
        font-weight: 500;
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .categoria-item::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 3px;
        background: #ff0000;
        transform: scaleY(0);
        transition: transform 0.2s ease;
    }

    .categoria-item:hover {
        background: rgba(255, 255, 255, 0.05);
        color: #ff2a2a;
        transform: translateX(4px);
    }

    .categoria-item:hover::before {
        transform: scaleY(1);
    }

    .categoria-item.activo {
        background: rgba(255, 0, 0, 0.1);
        color: #ff2a2a;
    }

    .categoria-item.activo::before {
        transform: scaleY(1);
    }

    /* Separador de categorías */
    .categoria-separador {
        height: 1px;
        background: rgba(255, 255, 255, 0.05);
        margin: 16px 0;
    }

    .categoria-grupo-titulo {
        font-family: 'Outfit', sans-serif;
        font-size: 0.7rem;
        font-weight: 700;
        color: rgba(255, 255, 255, 0.3);
        text-transform: uppercase;
        letter-spacing: 1px;
        margin: 20px 0 12px 16px;
    }

    /* --- Contenido Principal --- */
    .contenido-principal {
        flex: 1;
        min-width: 0;
    }
</style>
@stack('estilo-categorias')
@endpush

@section('principal')
<div class="contenedor-productos">
    <!-- Categorías de productos -->
    <aside class="productos-categorias">
        <h3 class="productos-titulo">Todas las Categorías</h3>
        <nav class="menu-categorias">

            <!-- INFORMÁTICA -->
            <div class="categoria-grupo-titulo">Informática</div>
            <a onclick="portatiles()" class="categoria-item">Portátiles</a>
            <a onclick="PCsobremesa()" class="categoria-item">PC sobremesa</a>
            <a onclick="Tablets()" class="categoria-item">Tablets</a>
            <a onclick="Monitores()" class="categoria-item">Monitores</a>
            <a onclick="Impresoras()" class="categoria-item">Impresoras</a>
            <a onclick="eBooks()" class="categoria-item">eBooks</a>
            <a onclick="Software()" class="categoria-item">Software</a>

            <div class="categoria-separador"></div>

            <!-- GAMING -->
            <div class="categoria-grupo-titulo">Gaming</div>
            <a href="#" class="categoria-item">Portátiles gaming</a>
            <a href="#" class="categoria-item">PC gaming</a>
            <a href="#" class="categoria-item">Monitores gaming</a>
            <a href="#" class="categoria-item">Accesorios gaming</a>
            <a href="#" class="categoria-item">Cockpits y simuladores</a>
            <a href="#" class="categoria-item">Juegos PC y ordenador</a>

            <div class="categoria-separador"></div>

            <!-- ACCESORIOS DE INFORMÁTICA -->
            <div class="categoria-grupo-titulo">Accesorios de informática</div>
            <a href="#" class="categoria-item">Almacenamiento</a>
            <a href="#" class="categoria-item">Ratones y alfombrillas</a>
            <a href="#" class="categoria-item">Teclados</a>
            <a href="#" class="categoria-item">Tabletas gráficas</a>
            <a href="#" class="categoria-item">Redes y conectividad</a>
            <a href="#" class="categoria-item">Accesorios tablets</a>
            <a href="#" class="categoria-item">Cartuchos y consumibles</a>
            <a href="#" class="categoria-item">Webcams</a>
            <a href="#" class="categoria-item">Micrófonos</a>
            <a href="#" class="categoria-item">Alimentación y carga</a>
            <a href="#" class="categoria-item">Cables, regletas y hubs</a>
            <a href="#" class="categoria-item">Fundas y maletines</a>
            <a href="#" class="categoria-item">Componentes</a>

            <div class="categoria-separador"></div>

            <!-- TELEFONÍA -->
            <div class="categoria-grupo-titulo">Telefonía</div>
            <a href="#" class="categoria-item">Smartphones</a>
            <a href="#" class="categoria-item">Accesorios para móviles</a>
            <a href="#" class="categoria-item">Fundas y protectores</a>
            <a href="#" class="categoria-item">Telefonía doméstica</a>

            <div class="categoria-separador"></div>

            <!-- Relojes inteligentes y wearables -->
            <div class="categoria-grupo-titulo">Relojes inteligentes y wearables</div>
            <a href="#" class="categoria-item">Smartwatch</a>
            <a href="#" class="categoria-item">Pulsera de actividad</a>
            <a href="#" class="categoria-item">Gafas IA</a>
            <a href="#" class="categoria-item">Anillos inteligentes</a>
            <a href="#" class="categoria-item">Correas y recambios</a>
        </nav>
    </aside>

    <!-- Contenido principal -->
    <div class="contenido-principal">
        @yield('categoria')
    </div>
</div>
@endsection

@push('scripts')
<script>
    function portatiles() {
    window.location.href = "portatilesI"
}
function PCsobremesa() {
    window.location.href = "PCsobremesa"
}
function Tablets() {
    window.location.href = "Tablets"
}
function Monitores() {
    window.location.href = "Monitores"
}
function Impresoras() {
    window.location.href = "Impresoras"
}
function eBooks() {
    window.location.href = "eBooks"
}
function Software() {
    window.location.href = "Software"
}
</script>
@stack('script-categorias')
@endpush
