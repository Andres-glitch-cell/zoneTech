@extends('plantillaPrincipal')
@section('titulo', 'Acceso Denegado')

@section('principal')
<div style="display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 60vh; text-align: center; padding: 20px;">

    <div style="background: #111; border: 1px solid #1a1a1a; padding: 50px; border-radius: 12px; max-width: 550px; border-top: 5px solid #ff0000; box-shadow: 0 20px 40px rgba(0,0,0,0.5);">

        <div style="color: #ff0000; font-size: 3rem; margin-bottom: 20px;">
            ⚠️
        </div>

        <h2 style="font-family: 'Outfit', sans-serif; font-size: 1.8rem; font-weight: 900; color: #fff; text-transform: uppercase; letter-spacing: -1px; margin-bottom: 15px;">
            IDENTIDAD NO DETECTADA
        </h2>

        <p style="color: #a0a0a0; font-size: 1rem; line-height: 1.6; margin-bottom: 35px;">
            El sistema ha bloqueado el acceso a este nodo de información. <br>
            Para continuar, debe inicializar una sesión o registrar una nueva unidad en la base de datos de <strong>ZoneTech</strong>.
        </p>

        <div style="display: flex; gap: 20px; justify-content: center;">
            <a href="{{ route('auth.login') }}"
               style="background: #fff; color: #000; padding: 15px 30px; border-radius: 6px; text-decoration: none; font-weight: 800; font-size: 12px; text-transform: uppercase; transition: transform 0.2s;"
               onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
               Ingresar al Sistema
            </a>

            <a href="{{ route('auth.register') }}"
               style="background: transparent; border: 1px solid #333; color: #fff; padding: 15px 30px; border-radius: 6px; text-decoration: none; font-weight: 800; font-size: 12px; text-transform: uppercase; transition: all 0.2s;"
               onmouseover="this.style.borderColor='#ff0000'; this.style.color='#ff0000'" onmouseout="this.style.borderColor='#333'; this.style.color='#fff'">
               Crear Cuenta
            </a>
        </div>

    </div>

    <div style="margin-top: 30px; color: #444; font-size: 10px; font-weight: 900; text-transform: uppercase; letter-spacing: 2px;">
        ZoneTech Security Protocol v2.4.0
    </div>
</div>
@endsection
