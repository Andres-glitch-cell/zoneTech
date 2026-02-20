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
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\UsuariosController;

/*
|--------------------------------------------------------------------------
| 🌐 RUTAS PÚBLICAS
|--------------------------------------------------------------------------
*/
Route::get('/', [UsuariosController::class, 'showInicio'])->name('inicio');
Route::get('/inicio', [UsuariosController::class, 'showInicio']);

// Fíjate en el 'Tecnico.' antes del nombre del archivo
Route::get('/soporte-tecnico', fn() => view('Tecnico.soporteTecnico'))->name('soporte');
Route::get('/sobre-nosotros',  fn() => view('sobreNosotros'))->name('nosotros');
Route::get('/contacto',        fn() => view('contacto'))->name('contacto');

// + Grupo de Productos accesible para todos
Route::prefix('productos')->group(function () {
    Route::get('/', [ProductosController::class, 'index'])->name('productos');
    Route::get('/portatiles', [ProductosController::class, 'index'])->name('portatiles');
    Route::get('/sobremesa',  fn() => view('sobremesa'))->name('sobremesa');
    Route::get('/{id}', [ProductosController::class, 'show'])->name('productos.show');
});

/*
|--------------------------------------------------------------------------
| 🔑 PROTOCOLOS DE IDENTIDAD (AUTH)
|--------------------------------------------------------------------------
*/
Route::get('/login', fn() => view('Usuario.login'))->name('login');
Route::post('/login', [UsuariosController::class, 'loginPost'])->name('login.post');
Route::post('/logout', [UsuariosController::class, 'logout'])->name('logout');

Route::get('/register', fn() => view('Usuario.register'))->name('register');
Route::post('/register', [UsuariosController::class, 'store'])->name('register.post');

/*
|--------------------------------------------------------------------------
| 🛡️ ÁREA RESTRINGIDA (LOGUEADOS)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/panel-control', [UsuariosController::class, 'dashboard'])->name('usuario.dashboard');
    Route::get('/perfil', fn() => view('Usuario.perfil'))->name('perfil');

    // ! ACCIONES DE ADMINISTRADOR (Añadir y Quitar)
    // Usamos nombres explícitos para evitar el error "Route not defined"
    Route::get('/admin/productos/crear', [ProductosController::class, 'create'])->name('productos.create');
    Route::post('/admin/productos/guardar', [ProductosController::class, 'store'])->name('productos.store');
    Route::delete('/admin/productos/{id}', [ProductosController::class, 'destroy'])->name('productos.destroy');
});