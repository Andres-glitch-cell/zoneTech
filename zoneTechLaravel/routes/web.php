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

/* Ruta principal que carga la vista 'welcome' (significa que tiene el nombre welcome.blade.php)
El "/" quiere decir que esta en localhost, si quisieramos tener archivos en otras carpetas u/o en otras ubicaciones serian por ejemplo /ubicaciones/objetos.blade.php
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/inicio', function () {
    return view('inicio');
});

Route::get('/productosPlantilla', function () {
    return view('productosPlantilla');
});

Route::get('/soporteTecnico', function () {
    return view('soporteTecnico');
});

Route::get('/sobreNosotros', function () {
    return view('sobreNosotros');
});

Route::get('/contacto', function () {
    return view('contacto');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/portatilesI', function () {
    return view('portatilesI');
});

/*
? Texto de prueba bienvenida personalizado con fn() anónima =>
 route::get("/", fn() => "<h1>¡Hola! ZoneTech está online 🚀</h1>");
*/
