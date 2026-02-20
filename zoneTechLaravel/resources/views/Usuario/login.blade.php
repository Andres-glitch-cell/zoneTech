@extends('layout.app')

@section('content')
<div class="min-h-screen flex items-center justify-center p-6">
    <div class="w-full max-w-[450px]">

        <div class="mb-10 text-left">
            <h1 onclick="window.location.href='{{ route('inicio') }}'" class="text-4xl font-black text-white tracking-tighter uppercase logo-font italic cursor-pointer">
                ZONE<span class="text-red-600">TECH</span>
            </h1>
            <p class="text-zinc-600 text-[10px] mt-1 font-bold tracking-widest uppercase">Protocolo de Acceso al Núcleo</p>
        </div>

        {{-- Alertas de Error --}}
        @if ($errors->any())
            <div class="bg-red-600/10 border border-red-600/20 p-4 rounded-lg mb-6">
                <ul class="list-none">
                    @foreach ($errors->all() as $error)
                        <li class="text-[9px] text-red-400 font-bold uppercase italic">!! {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

       <form action="{{ route('login.post') }}" method="POST" class="space-y-5">
            @csrf

            <div class="group">
                <label class="label-text">Correo Electrónico</label>
                <div class="input-box">
                    <input type="email" name="email" placeholder="identidad@zonetech.pro" value="{{ old('email') }}" required class="input-field" />
                </div>
            </div>

            <div class="group" x-data="{ 
                open: false, 
                selected: '{{ old('rol') }}', 
                label: '{{ old('rol') ? ucfirst(old('rol')) : 'Seleccione Rango...' }}',
                roles: [
                    { id: 'cliente', name: 'Cliente', desc: 'Acceso Estándar' },
                    { id: 'tecnico', name: 'Técnico', desc: 'Soporte y Hardware' },
                    { id: 'administrador', name: 'Administrador', desc: 'Acceso Total al Núcleo' }
                ]
            }">
                <label class="label-text">Rango de Autorización</label>
                <input type="hidden" name="rol" :value="selected" required>

                <div class="relative">
                    <button type="button" @click="open = !open" @click.away="open = false"
                        class="input-box w-full flex items-center justify-between px-4 py-[14px] text-sm transition-all"
                        :class="open ? 'border-red-600 bg-[#111]' : ''">
                        <span :class="selected ? 'text-white' : 'text-zinc-600'" x-text="label"></span>
                        <svg class="w-4 h-4 text-zinc-500 transition-transform duration-300" :class="open ? 'rotate-180 text-red-600' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <div x-show="open" x-cloak x-transition class="absolute z-50 w-full mt-2 bg-[#0a0a0a] border border-zinc-800 rounded-lg overflow-hidden dropdown-panel">
                        <template x-for="role in roles" :key="role.id">
                            <div @click="selected = role.id; label = role.name; open = false" class="custom-option px-4 py-3 cursor-pointer">
                                <div class="flex flex-col">
                                    <span class="text-[11px] font-black uppercase tracking-wider" :class="selected === role.id ? 'text-red-500' : 'text-zinc-300'" x-text="role.name"></span>
                                    <span class="text-[9px] text-zinc-600 font-bold uppercase italic" x-text="role.desc"></span>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>

            <div class="group">
                <label class="label-text">Security Key</label>
                <div class="input-box">
                    <input type="password" name="password" placeholder="••••••••" required class="input-field" />
                </div>
            </div>

            <div class="pt-2">
                <button type="submit" class="btn-submit w-full py-4 text-xs">
                    Iniciar Secuencia de Acceso
                </button>
            </div>
        </form>

        <div class="mt-8 flex items-center justify-between border-t border-zinc-900 pt-6">
            <span class="text-zinc-700 text-[10px] font-bold tracking-widest uppercase">Nodo: Zone-OS</span>
            <a href="{{ route('register') }}" class="text-zinc-500 hover:text-white text-[10px] font-bold uppercase transition-colors">
                ¿Sin identidad? Registrar
            </a>
        </div>
    </div>
</div>
@endsection