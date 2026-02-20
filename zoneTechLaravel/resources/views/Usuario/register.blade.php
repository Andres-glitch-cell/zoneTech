@extends('layout.app')

@section('content')
<div class="min-h-screen flex items-center justify-center p-6">
    <div class="w-full max-w-[500px]">

        <div class="mb-10 text-left">
            <h1 onclick="window.location.href='{{ route('inicio') }}'" class="text-4xl font-black text-white tracking-tighter uppercase logo-font italic cursor-pointer">
                ZONE<span class="text-red-600">TECH</span>
            </h1>
            <p class="text-zinc-600 text-[10px] mt-1 font-bold tracking-widest uppercase">Generar Nueva Identidad de Acceso</p>
        </div>

        @if ($errors->any())
            <div class="bg-red-600/10 border border-red-600/20 p-4 rounded-lg mb-6">
                <ul class="list-none">
                    @foreach ($errors->all() as $error)
                        <li class="text-[9px] text-red-400 font-bold uppercase italic">!! {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.post') }}" method="POST" class="space-y-6">
            @csrf 

            <div class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="group">
                        <label class="label-text">Identificador de Usuario</label>
                        <div class="input-box">
                            <input type="text" name="usuario" placeholder="User.ZT" value="{{ old('usuario') }}" required class="input-field" />
                        </div>
                    </div>
                    <div class="group">
                        <label class="label-text">Rango de Autorización</label>
                        <div class="input-box px-2">
                            <select name="rol" required class="input-field bg-transparent cursor-pointer appearance-none">
                                <option value="" disabled selected class="bg-black text-zinc-500">Seleccionar...</option>
                                <option value="cliente" class="bg-black text-white" {{ old('rol') == 'cliente' ? 'selected' : '' }}>Cliente</option>
                                <option value="tecnico" class="bg-black text-white" {{ old('rol') == 'tecnico' ? 'selected' : '' }}>Técnico</option>
                                <option value="administrador" class="bg-black text-white" {{ old('rol') == 'administrador' ? 'selected' : '' }}>Administrador</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="group">
                    <label class="label-text">Correo Electrónico</label>
                    <div class="input-box">
                        <input type="email" name="email" placeholder="mail@zonetech.pro" value="{{ old('email') }}" required class="input-field" />
                    </div>
                </div>
            </div>

            <hr class="border-zinc-900">

            <div class="space-y-4">
                <div class="group">
                    <label class="label-text">Nombre</label>
                    <div class="input-box">
                        <input type="text" name="nombre" placeholder="Tu nombre" value="{{ old('nombre') }}" required class="input-field" />
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="group">
                        <label class="label-text">Primer Apellido</label>
                        <div class="input-box">
                            <input type="text" name="apellido1" placeholder="Primer Apellido" value="{{ old('apellido1') }}" required class="input-field" />
                        </div>
                    </div>
                    <div class="group">
                        <label class="label-text">Segundo Apellido</label>
                        <div class="input-box">
                            <input type="text" name="apellido2" placeholder="Segundo Apellido (Opcional)" value="{{ old('apellido2') }}" class="input-field" />
                        </div>
                    </div>
                </div>
            </div>

            <hr class="border-zinc-900">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="group">
                    <label class="label-text">Security Key</label>
                    <div class="input-box">
                        <input type="password" name="password" placeholder="••••••••" required class="input-field" />
                    </div>
                </div>
                <div class="group">
                    <label class="label-text">Confirmar Key</label>
                    <div class="input-box">
                        <input type="password" name="password_confirmation" placeholder="••••••••" required class="input-field" />
                    </div>
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" class="btn-submit w-full py-4 text-xs font-bold uppercase">
                    Generar Identidad
                </button>
            </div>
        </form>

        <div class="mt-8 flex items-center justify-between border-t border-zinc-900 pt-6">
            <span class="text-zinc-700 text-[10px] font-bold tracking-widest uppercase">Protocolo: Zone-OS</span>
            <a href="{{ route('login') }}" class="text-zinc-500 hover:text-white text-[10px] font-bold uppercase transition-colors">
                ¿Ya tienes identidad? Acceder
            </a>
        </div>
    </div>
</div>
@endsection