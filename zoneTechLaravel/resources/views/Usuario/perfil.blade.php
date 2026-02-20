@extends('plantillaPrincipal')

@section('titulo', 'Mi Expediente')

@push('styles')
<style>
    /* Contenedor de Identidad */
    .profile-container {
        max-width: 900px;
        margin: 0 auto;
        padding: 20px;
    }

    .profile-header {
        display: flex;
        align-items: center;
        gap: 30px;
        margin-bottom: 50px;
        padding-bottom: 30px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }

    .profile-avatar-big {
        width: 120px;
        height: 120px;
        background: linear-gradient(135deg, #dc2626 0%, #7f1d1d 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Outfit', sans-serif;
        font-size: 3rem;
        font-weight: 900;
        color: white;
        box-shadow: 0 0 40px rgba(220, 38, 38, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .profile-title h2 {
        font-family: 'Outfit', sans-serif;
        font-size: 2.5rem;
        text-transform: uppercase;
        letter-spacing: -1px;
        margin: 0;
    }

    .profile-id-tag {
        font-size: 10px;
        font-weight: 900;
        color: #dc2626;
        letter-spacing: 0.3em;
        text-transform: uppercase;
    }

    /* Rejilla de Información */
    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 25px;
    }

    .info-card {
        background: rgba(255, 255, 255, 0.02);
        border: 1px solid rgba(255, 255, 255, 0.05);
        border-left: 3px solid #dc2626;
        padding: 25px;
        border-radius: 4px;
        transition: transform 0.3s ease;
    }

    .info-card:hover {
        background: rgba(255, 255, 255, 0.04);
        transform: translateX(5px);
    }

    .info-label {
        display: block;
        font-size: 9px;
        font-weight: 900;
        text-transform: uppercase;
        color: #555;
        letter-spacing: 0.2em;
        margin-bottom: 8px;
    }

    .info-value {
        font-family: 'Inter', sans-serif;
        font-size: 1.1rem;
        font-weight: 600;
        color: #eee;
    }

    /* Botón de Acción */
    .btn-edit-profile {
        margin-top: 40px;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 12px 24px;
        background: transparent;
        border: 1px solid #dc2626;
        color: #dc2626;
        text-transform: uppercase;
        font-weight: 900;
        font-size: 11px;
        letter-spacing: 0.1em;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
    }

    .btn-edit-profile:hover {
        background: #dc2626;
        color: white;
        box-shadow: 0 0 20px rgba(220, 38, 38, 0.4);
    }
</style>
@endpush

@section('principal')
<div class="profile-container">

    <header class="profile-header">
        <div class="profile-avatar-big">
            {{-- Usamos un helper para evitar errores si no hay iniciales --}}
            {{ Auth::user()->iniciales ?? 'ZT' }}
        </div>
        <div class="profile-title">
            <span class="profile-id-tag">Expediente Oficial</span>
            <h2>{{ Auth::user()->usuario }}<span class="text-red-600">.</span></h2>
            <div style="display: flex; align-items: center; gap: 8px; margin-top: 8px;">
                <span style="width: 8px; height: 8px; background: #22c55e; border-radius: 50%; box-shadow: 0 0 8px #22c55e;"></span>
                <span style="font-size: 10px; color: #71717a; font-weight: 800; text-transform: uppercase; letter-spacing: 0.1em;">Estado: Operativo</span>
            </div>
        </div>
    </header>

    <div class="info-grid">
        <div class="info-card">
            <span class="info-label">Nombre Completo</span>
            <div class="info-value">
                {{ Auth::user()->nombre }} {{ Auth::user()->apellido1 }} {{ Auth::user()->apellido2 }}
            </div>
        </div>

        <div class="info-card">
            <span class="info-label">Dirección de Contacto</span>
            <div class="info-value">{{ Auth::user()->email }}</div>
        </div>

        <div class="info-card">
            <span class="info-label">Nivel de Acceso</span>
            <div class="info-value">Usuario</div>
        </div>

        <div class="info-card">
            <span class="info-label">Fecha de Registro</span>
            <div class="info-value">
                {{-- Comprobamos si la fecha existe y si es un objeto antes de formatear --}}
                @if(Auth::user()->created_at instanceof \DateTime)
                    {{ Auth::user()->created_at->format('d / m / Y') }}
                @else
                    {{ \Carbon\Carbon::parse(Auth::user()->created_at)->format('d / m / Y') ?? 'No disponible' }}
                @endif
            </div>
        </div>
    </div>

    <div class="flex gap-4">
        <a href="{{ url('configuracion') }}" class="btn-edit-profile">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"></path>
                <path d="M18.5 2.5a2.121 2.121 0 113 3L12 15l-4 1 1-4 9.5-9.5z"></path>
            </svg>
            Modificar Credenciales
        </a>
    </div>

</div>
@endsection
