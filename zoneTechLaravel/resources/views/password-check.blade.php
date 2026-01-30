<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Medidor de contraseña</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-gray-950 min-h-screen grid place-items-center p-4 text-gray-200">

    <div class="w-full max-w-md" x-data="{
    password: '',
    strength: 0,
    message: 'Escribe tu contraseña',

    checkStrength() {
        let s = 0
        const p = this.password

        if (p.length === 0) {
            s = 0
            this.message = 'Escribe tu contraseña'
        }
        else if (p.length < 8) {
            s = 20
            this.message = 'Muy corta'
        }
        else {
            if (p.length >= 10)           s += 20
            if (p.length >= 13)           s += 15
            if (/[a-z]/.test(p))          s += 15
            if (/[A-Z]/.test(p))          s += 20
            if (/[0-9]/.test(p))          s += 20
            if (/[^A-Za-z0-9]/.test(p))   s += 25

            if (s <= 40) this.message = 'Débil'
            else if (s <= 70) this.message = 'Media'
            else if (s <= 95) this.message = 'Fuerte'
            else this.message = 'Muy fuerte'
        }

        this.strength = Math.min(s, 100)
    }
}">

        <div class="bg-zinc-900/70 backdrop-blur-sm border border-zinc-700/60 rounded-xl p-7 shadow-2xl">

            <h2 class="text-xl font-semibold mb-6 text-center">Cambiar contraseña</h2>

            <div class="space-y-5">

                <div>
                    <label class="block text-sm text-zinc-400 mb-1.5">Nueva contraseña</label>
                    <input
                        type="password"
                        x-model="password"
                        @input.debounce.150ms="checkStrength"
                        placeholder="Escribe una contraseña segura..."
                        class="w-full bg-zinc-800 border border-zinc-700 rounded-lg py-2.5 px-4 text-white placeholder-zinc-500 focus:outline-none focus:border-violet-500/60 transition-all" />
                </div>

                <!-- Barra de fuerza -->
                <div class="h-1.5 w-full bg-zinc-800 rounded-full overflow-hidden">
                    <div
                        class="h-full transition-all duration-500 ease-out"
                        :class="{
                        'bg-red-600': strength <= 40,
                        'bg-orange-500': strength > 40 && strength <= 70,
                        'bg-emerald-500': strength > 70 && strength <= 95,
                        'bg-violet-500': strength > 95
                    }"
                        :style="{width: strength + '%'}"></div>
                </div>

                <!-- Mensaje -->
                <p
                    x-text="message"
                    :class="{
                    'text-red-400': strength <= 40,
                    'text-orange-400': strength > 40 && strength <= 70,
                    'text-emerald-400': strength > 70 && strength <= 95,
                    'text-violet-400': strength > 95
                }"
                    class="text-sm font-medium text-center transition-colors"></p>

                <button
                    type="button"
                    class="w-full mt-4 py-3 bg-gradient-to-r from-violet-600 to-indigo-600 hover:from-violet-500 hover:to-indigo-500 rounded-lg font-medium transition-all disabled:opacity-50 disabled:pointer-events-none"
                    :disabled="strength < 60">
                    Cambiar contraseña
                </button>

            </div>
        </div>

        <!-- TODO: Segundo bloque a modificar -->
        <div class="bg-zinc-900/70 backdrop-blur-sm border border-zinc-700/60 rounded-xl p-7 shadow-2xl">

            <h2 class="text-xl font-semibold mb-6 text-center">Cambiar contraseña</h2>

            <div class="space-y-5">

                <div>
                    <label class="block text-sm text-zinc-400 mb-1.5">Nueva contraseña</label>
                    <input
                        type="password"
                        x-model="password"
                        @input.debounce.150ms="checkStrength"
                        placeholder="Escribe una contraseña segura..."
                        class="w-full bg-zinc-800 border border-zinc-700 rounded-lg py-2.5 px-4 text-white placeholder-zinc-500 focus:outline-none focus:border-violet-500/60 transition-all" />
                </div>

                <!-- Barra de fuerza -->
                <div class="h-1.5 w-full bg-zinc-800 rounded-full overflow-hidden">
                    <div
                        class="h-full transition-all duration-500 ease-out"
                        :class="{
                        'bg-red-600': strength <= 40,
                        'bg-orange-500': strength > 40 && strength <= 70,
                        'bg-emerald-500': strength > 70 && strength <= 95,
                        'bg-violet-500': strength > 95
                    }"
                        :style="{width: strength + '%'}"></div>
                </div>

                <!-- Mensaje -->
                <p
                    x-text="message"
                    :class="{
                    'text-red-400': strength <= 40,
                    'text-orange-400': strength > 40 && strength <= 70,
                    'text-emerald-400': strength > 70 && strength <= 95,
                    'text-violet-400': strength > 95
                }"
                    class="text-sm font-medium text-center transition-colors"></p>

                <button
                    type="button"
                    class="w-full mt-4 py-3 bg-gradient-to-r from-violet-600 to-indigo-600 hover:from-violet-500 hover:to-indigo-500 rounded-lg font-medium transition-all disabled:opacity-50 disabled:pointer-events-none"
                    :disabled="strength < 60">
                    Cambiar contraseña
                </button>

            </div>
        </div>
    </div>

</body>

</html>
