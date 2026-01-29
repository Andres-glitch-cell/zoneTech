<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Strength - Laravel 12</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        /* Evita que los elementos de Alpine se vean antes de que el JS cargue */
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-gray-100 dark:bg-zinc-900 min-h-screen flex items-center justify-center p-4">

    <div class="mx-auto w-full max-w-xl">
        <div
            x-data="{
                showBar: true,
                showMessage: true,
                password: '',
                strength: 0,
                message: 'Choose a strong password',

                checkStrength() {
                    let score = 0;
                    if (this.password.length === 0) {
                        score = 0;
                    } else if (this.password.length < 8) {
                        score = 10;
                    } else {
                        // Cumple longitud mínima
                        if (this.password.length >= 12) score += 20;
                        if (/[0-9]/.test(this.password)) score += 20;
                        if (/[a-z]/.test(this.password)) score += 20;
                        if (/[A-Z]/.test(this.password)) score += 20;
                        if (/[^A-Za-z0-9]/.test(this.password)) score += 20;
                    }

                    this.strength = score;

                    // Actualizar mensaje basado en score
                    if (score === 0) this.message = 'Choose a strong password';
                    else if (score === 10) this.message = 'Too short!';
                    else if (score <= 30) this.message = 'Weak';
                    else if (score <= 60) this.message = 'Medium';
                    else if (score <= 80) this.message = 'Strong';
                    else this.message = 'Very strong!';
                }
            }"
            class="rounded-xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-700/50 dark:bg-zinc-800">
            <form action="#" method="POST" @submit.prevent>
                @csrf

                <div class="space-y-2">
                    <label for="password" class="block text-sm font-medium text-zinc-900 dark:text-zinc-100">
                        Password
                    </label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        x-model="password"
                        @input="checkStrength"
                        placeholder="••••••••"
                        class="block w-full rounded-lg border border-zinc-200 px-3 py-2 text-sm placeholder-zinc-500 focus:border-zinc-500 focus:ring-2 focus:ring-zinc-500/20 dark:border-zinc-600 dark:bg-zinc-900 dark:text-white dark:placeholder-zinc-400 dark:focus:border-zinc-500 outline-none transition-all" />
                </div>

                <div
                    x-cloak
                    x-show="showBar"
                    class="mt-4 h-1.5 w-full rounded-full bg-zinc-100 dark:bg-zinc-700 overflow-hidden"
                    role="progressbar"
                    :aria-valuenow="strength"
                    aria-valuemin="0"
                    aria-valuemax="100">
                    <div
                        class="h-full transition-all duration-500 ease-out"
                        :class="{
                            'bg-zinc-300': strength === 0,
                            'bg-rose-500': strength > 0 && strength <= 30,
                            'bg-orange-500': strength > 30 && strength <= 60,
                            'bg-emerald-500': strength > 60,
                        }"
                        :style="`width: ${strength}%`"></div>
                </div>

                <p
                    x-cloak
                    x-show="showMessage"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 -translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-text="message"
                    class="mt-2 text-xs font-bold uppercase tracking-wide"
                    :class="{
                        'text-zinc-400 dark:text-zinc-500': strength === 0,
                        'text-rose-500': strength > 0 && strength <= 30,
                        'text-orange-500': strength > 30 && strength <= 60,
                        'text-emerald-500': strength > 60,
                    }"></p>

                <button
                    type="submit"
                    class="mt-6 w-full py-2 px-4 bg-zinc-900 dark:bg-white dark:text-zinc-900 text-white rounded-lg font-medium hover:opacity-90 transition-opacity disabled:opacity-50 disabled:cursor-not-allowed"
                    :disabled="strength <= 30">
                    Update Password
                </button>
            </form>
        </div>
    </div>

</body>

</html>
