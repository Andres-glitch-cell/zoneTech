<?php

// * Comentario estándar/resaltado (Verde)
        // ! Advertencia o nota crítica (Rojo intenso, Negrita)
        // ? Pregunta o duda sobre el código (Azul, Cursiva)
        // TODO: Tarea pendiente o algo por completar (Naranja/Ámbar, Negrita, Subrayado)
        // // Comentario obsoleto o tachado (Gris oscuro, Tachado)
        // & Nota de seguimiento o especial (Morado)

        // --- Nuevos Comentarios AÑADIDOS ---
        // @ ¡IMPORTANTE! Revisar o acción crucial (Amarillo, Fondo Semitransparente, Negrita)
        // # Referencia a un ticket, enlace o doc. (Gris claro, Fondo Sólido Oscuro)
        // + Código recién añadido o nueva funcionalidad (Verde claro, Negrita, Cursiva)

        // BUG: Error conocido que hay que arreglar (Rojo, Subrayado)
        // FIXME: Hay que corregir esto urgentemente (Rojo fuerte)
        // HACK: Solución temporal / truco feo pero funciona (Morado oscuro)
        // XXX: Algo muy importante / ojo aquí (Naranja fuerte)
        // NOTE: Explicación adicional o aclaración (Azul claro)
        // REVIEW: Necesita revisión por otro programador (Morado)
        // OPTIMIZE: Código que se puede mejorar en rendimiento (Naranja)
        // DEPRECATED: Esta parte ya no se recomienda usar (Gris, Tachado)
        // SECURITY: Posible vulnerabilidad o tema de seguridad (Rojo con fondo)
        // PERF: Mejora de rendimiento posible (Azul verdoso)
        // CLEANUP: Código que hay que limpiar/reorganizar (Gris claro)
        // TEST: Relacionado con pruebas unitarias o e2e (Verde test)
        // DEBUG: Línea solo para depuración (Rosa / Magenta)
        // LOG: Comentario de log temporal para debug (Cyan)
        // API: Comentario sobre endpoint, contrato o API (Azul oscuro)
        // UI: Relacionado con interfaz de usuario (Rosa pastel)
        // MOBILE: Comentario específico para responsive/mobile (Verde móvil)
        // LEGACY: Código antiguo que se mantiene por compatibilidad (Gris)
        // REFACTOR: Idea o zona candidata a refactorizar (Amarillo suave)
        // IDEA: Posible mejora o feature futura (Verde menta)
        // BLOCKER: Impide avanzar / bloqueante (Rojo negrita)
        // WARNING: Algo que puede causar problemas en ciertos casos (Naranja)
        // INFO: Información útil pero no crítica (Azul suave)
        // REMINDER: Recordatorio personal (Amarillo claro)
        // AUTHOR: Quién escribió o modificó esta parte (Violeta)
        // LICENSE: Comentario de licencia o derechos (Gris)
        // SOURCE: Referencia a fuente/original (Azul link)
        // SEE: Ver también / relacionado con (Cyan)
        // EXAMPLE: Ejemplo de uso (Verde con cursiva)
        // WHY: Explicación del porqué se hizo así (Morado claro)
        // HOW: Cómo funciona esta parte (Azul)
        // TEMP: Temporal, eliminar pronto (Naranja claro tachado)
        // OVERRIDE: Sobreescritura intencional (Morado)
        // POLYFILL: Código para compatibilidad con navegadores antiguos (Gris)
        // MAGIC: Número o valor 'mágico' que necesita explicación (Rosa)
        // GOD: Sección muy compleja / 'dios function' (Rojo oscuro)
        // FUTURE: Planeado para el futuro (Verde futuro)
        // PERFORMANCE: Anotación de benchmark o rendimiento (Naranja)
        // ACCESSIBILITY: Tema de a11y / accesibilidad (Azul a11y)
        // i18n: Relacionado con internacionalización (Verde global)
        // TYPO: Corregir error tipográfico (Rojo suave)

/**
 * 🚀 GUÍA DE GIT - TRABAJO EN EQUIPO
 * --------------------------------
 * 1. ACTUALIZAR (Pull):
 * git checkout main
 * git pull origin main
 * git checkout Andres
 * git merge main
 *
 * 2. GUARDAR (Commit):
 * git add .
 * git commit -m "Descripción de los cambios"
 *
 * 3. SUBIR (Push):
 * git push origin Andres
 *
 * 4. FIX .GITIGNORE (Si falla):
 * git rm -r --cached .
 * git add .
 * git commit -m "Limpieza de cache"
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UsuariosController;

/*
|--------------------------------------------------------------------------
[IMPORTANT] 🌐 [PUBLIC] RUTAS DE ACCESO LIBRE
|--------------------------------------------------------------------------
*/

// * --- PUNTO DE ENTRADA --- //
Route::get('/', function () {
    return view('welcome');
});

// * --- DASHBOARD INICIAL --- //
Route::get('/inicio', [UsuariosController::class, 'showInicio'])->name('inicio');

// * --- CATÁLOGO Y HARDWARE (SISTEMA DE PLANTILLAS) --- //
Route::prefix('productos')->group(function () {
    // @ Ruta base del catálogo
    Route::get('/', function () {
        return view('productosPlantilla');
    })->name('productos');

    // + Sub-rutas de categorías (Inyectan contenido dinámico)
    Route::get('/portatiles', function () {
        return view('portatilesI');
    })->name('portatiles');

    // TODO: Crear las vistas físicas para estas rutas
    Route::get('/sobremesa', function () {
        return view('sobremesa');
    })->name('sobremesa');
    Route::get('/tablets', function () {
        return view('tablets');
    })->name('tablets');
});

// * --- INFORMACIÓN CORPORATIVA --- //

Route::get('/soporte-tecnico', function () {
    return view('soporteTecnico');
})->name('soporte');
Route::get('/sobre-nosotros', function () {
    return view('sobreNosotros');
})->name('nosotros');
Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');

/*
|--------------------------------------------------------------------------
[IMPORTANT] 🔑 PROTOCOLOS DE IDENTIDAD Y ACCESO
|--------------------------------------------------------------------------
*/

Route::name('auth.')->group(function () {
    // ! GESTIÓN DE LOGIN
    Route::get('/login', function () {
        return view('login');
    })->name('login');
    Route::post('/login', [UsuariosController::class, 'loginPost'])->name('login.post');
    Route::post('/logout', [UsuariosController::class, 'logout'])->name('logout');

    // + REGISTRO DE NUEVAS UNIDADES
    Route::get('/register', function () {
        return view('register');
    })->name('register');
    Route::post('/register', [UsuariosController::class, 'store'])->name('usuarios.store');

    // & SEGURIDAD Y RECUPERACIÓN
    Route::get('/recuperar-password', function () {
        return view('recuperarContraseña');
    })->name('password.request');
    Route::get('/security-key-info', function () {
        return view('securityKey');
    })->name('security.info');
});

/*
|--------------------------------------------------------------------------
[IMPORTANT] 🛡️ [PRIVATE] ÁREA RESTRINGIDA (SÓLO USUARIOS LOGUEADOS)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    // + EXPEDIENTES DE USUARIO
    Route::get('/perfil', function () {
        return view('perfil');
    })->name('perfil');

    // TODO: Finalizar implementación de ajustes
    Route::get('/configuracion', function () {
        return view('configuracion');
    })->name('configuracion');
});
