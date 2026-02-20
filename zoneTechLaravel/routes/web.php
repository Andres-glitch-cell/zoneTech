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
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| 🌐 RUTAS PÚBLICAS (ACCESO LIBRE)
|--------------------------------------------------------------------------
*/

// * Punto de entrada del servidor
Route::get('/', function () {
    return view('welcome');
});

// * Landing Espectacular (RTX 5090 / Andrés & Carolina)
Route::get('/inicio', [UsuariosController::class, 'showInicio'])->name('inicio');

// * Catálogo y Hardware
Route::prefix('productos')->group(function () {
    Route::get('/', function () {
        return view('Productos.productosPlantilla');
    })->name('productos');

    Route::get('/portatiles', [ProductosController::class, 'index'])->name('portatiles');
    Route::get('/sobremesa',  fn() => view('sobremesa'))->name('sobremesa');
    Route::get('/tablets',    fn() => view('tablets'))->name('tablets');

    // + CRUD Operativo de Productos
    Route::get('/crear',            [ProductosController::class, 'create'])->name('Productos.create');
    Route::post('/',                [ProductosController::class, 'store'])->name('Productos.store');
    Route::get('/{id}',             [ProductosController::class, 'show'])->name('Productos.show');
    Route::get('/{id}/editar',      [ProductosController::class, 'edit'])->name('Productos.edit');
    Route::put('/{id}',             [ProductosController::class, 'update'])->name('Productos.update');
    Route::delete('/{id}',          [ProductosController::class, 'destroy'])->name('Productos.destroy');
});

// * Información Corporativa
Route::get('/soporte-tecnico', fn() => view('soporteTecnico'))->name('soporte');
Route::get('/sobre-nosotros',  fn() => view('sobreNosotros'))->name('nosotros');
Route::get('/contacto',        fn() => view('contacto'))->name('contacto');

/*
|--------------------------------------------------------------------------
| 🔑 PROTOCOLOS DE IDENTIDAD (AUTH)
|--------------------------------------------------------------------------
*/

Route::name('auth.')->group(function () {
    // ! Acceso
    Route::get('/login', fn() => view('Usuario.login'))->name('login');
    Route::post('/login', [UsuariosController::class, 'loginPost'])->name('login.post');
    Route::post('/logout', [UsuariosController::class, 'logout'])->name('logout');

    // + Registro
    Route::get('/register', fn() => view('Usuario.register'))->name('register');
    Route::post('/register', [UsuariosController::class, 'store'])->name('usuarios.store');

    // & Seguridad
    Route::get('/recuperar-password', fn() => view('Usuario.recuperarContraseña'))->name('password.request');
    Route::get('/securityKey', fn() => view('securityKey'))->name('security.info');
});

// @ Aviso para invitados
Route::get('/Usuario/advertenciaUsuarioSinLogin', fn() => view('Usuario.advertenciaUsuarioSinLogin'))->name('advertencia.login');

/*
|--------------------------------------------------------------------------
| 🛡️ ÁREA RESTRINGIDA (MIDDLEWARE AUTH)
|--------------------------------------------------------------------------
*/

Route::resource('Productos', ProductosController::class);
Route::middleware(['auth'])->group(function () {

    // @ PANEL DE CONTROL (El que tiene las dos tarjetas: Productos o Pantalla Principal)
    Route::get('/panel-control', [UsuariosController::class, 'dashboard'])->name('usuario.dashboard');

    // + Expedientes y Ajustes
    Route::get('/perfil', fn() => view('Usuario.perfil'))->name('perfil');
    Route::get('/configuracion', fn() => view('Usuario.configuracion'))->name('configuracion');
});
