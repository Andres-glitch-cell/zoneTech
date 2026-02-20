@extends('plantillaPrincipal')

@section('titulo', 'Panel de Control')

@push('styles')
<style>
    /* Estética Industrial ZoneTech */
    .dashboard-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 40px 0;
        border-bottom: 1px solid #111;
    }

    .header-left {
        display: flex;
        align-items: center;
        gap: 25px;
    }

    /* Círculo de iniciales estático */
    .avatar-circle {
        width: 68px;
        height: 68px;
        background: linear-gradient(135deg, #dc2626 0%, #7f1d1d 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Outfit', sans-serif;
        font-weight: 900;
        font-size: 1.5rem;
        color: white;
        box-shadow: 0 0 25px rgba(220, 38, 38, 0.4);
        border: 2px solid rgba(255, 255, 255, 0.1);
        position: relative;
    }

    .welcome-text h1 {
        font-family: 'Outfit', sans-serif;
        font-size: 2.0rem;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 0.14em;
        color: #fff;
        margin: 0;
    }

    .status-tag {
        font-size: 9px;
        font-weight: 900;
        color: #ff2a2a;
        text-transform: uppercase;
        letter-spacing: 0.3em;
        margin-top: 4px;
        display: flex;
        align-items: center;
        gap: 8px;
        opacity: 0.7;
    }
</style>
@endpush

@section('principal')
<div class="max-w-5xl mx-auto px-6">

    <header class="dashboard-header">
        <div class="header-left">
            <div class="avatar-circle">
                {{ Auth::user()->iniciales }}
            </div>

            <div class="welcome-text">
                <h1> Bienvenido a zoneTech {{ Auth::user()->nombre }}<span class="text-red-600">.</span></h1>
                <div class="status-tag text-zinc-500">
                    <span class="w-2 h-2 bg-red-600 rounded-full animate-pulse"></span>
                    Sincronización establecida
                </div>
            </div>
        </div>
    </header>

    <main class="py-12">
        </main>

</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('keydown', function(e) {
        if (e.metaKey && e.key === 'f') {
            e.preventDefault();
            console.log("ZoneTech: Abriendo buscador central...");
        }
    });
</script>
@endpush
