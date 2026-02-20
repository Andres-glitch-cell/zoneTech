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
| 🌐 RUTAS PÚBLICAS (NODO CIVIL)
|--------------------------------------------------------------------------
| * Estas rutas son de libre acceso en el ecosistema ZoneTech.
*/

// * Redirección de aterrizaje: Interfaz principal RTX 5090
Route::get('/', [UsuariosController::class, 'showInicio'])->name('inicio');
Route::get('/inicio', [UsuariosController::class, 'showInicio']);

// NOTE: Información corporativa y soporte técnico
// # Referencia: Ver manual de identidad en docs/branding.pdf
Route::get('/soporte-tecnico', fn() => view('Tecnico.soporteTecnico'))->name('soporte');
Route::get('/sobre-nosotros',  fn() => view('sobreNosotros'))->name('nosotros');
Route::get('/contacto',        fn() => view('contacto'))->name('contacto');

// + Grupo de Catálogo: Visualización de hardware
Route::prefix('productos')->group(function () {
    // API: Sincronización de inventario desde SQL
    Route::get('/', [ProductosController::class, 'index'])->name('productos');
    Route::get('/portatiles', [ProductosController::class, 'index'])->name('portatiles');

    // UI: Galería de estaciones de trabajo
    Route::get('/sobremesa',  fn() => view('sobremesa'))->name('sobremesa');

    // ? Query: ¿Implementar caché para las vistas de productos individuales?
    Route::get('/{id}', [ProductosController::class, 'show'])->name('productos.show');
});

/*
|--------------------------------------------------------------------------
| 🔑 PROTOCOLOS DE IDENTIDAD (AUTH)
|--------------------------------------------------------------------------
| @ ¡IMPORTANTE! La encriptación se gestiona mediante el modelo User (contraseña_hash)
*/

// UI: Puntos de entrada para el personal y usuarios
Route::get('/login', fn() => view('Usuario.login'))->name('login');
Route::get('/securityKey', fn() => view('securityKey'))->name('securityKey');
Route::get('/register', fn() => view('Usuario.register'))->name('register');

// SECURITY: Endpoints de autenticación y cierre de sesión
Route::post('/login', [UsuariosController::class, 'loginPost'])->name('login.post');
Route::post('/register', [UsuariosController::class, 'store'])->name('register.post');
Route::post('/logout', [UsuariosController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| 🛡️ ÁREA RESTRINGIDA (NODO SEGURO)
|--------------------------------------------------------------------------
| XXX: El acceso no autorizado redirigirá al protocolo de advertencia.
*/

// WARNING: Ruta de escape para accesos denegados
Route::get('/Usuario/advertenciaUsuarioSinLogin', function () {
    return view('Usuario.advertenciaUsuarioSinLogin');
})->name('advertencia.login');

// & Seguimiento: Control de acceso mediante Middleware 'auth'
Route::middleware(['auth'])->group(function () {

    // UI: Dashboard y Perfil de usuario
    Route::get('/panel-control', [UsuariosController::class, 'dashboard'])->name('usuario.dashboard');
    Route::get('/perfil', fn() => view('Usuario.perfil'))->name('perfil');

    /*
    |--------------------------------------------------------------------------
    | ⚙️ SISTEMA DE CONFIGURACIÓN
    |--------------------------------------------------------------------------
    | @ ¡IMPORTANTE! Se han unificado las rutas para evitar errores 404
    */

    // + Funcionalidad: Ambos alias apuntan al nodo de configuración de ZoneTech
    Route::get('/configuracion', fn() => view('Usuario.configuracion'))->name('configuracion');
    Route::get('/Usuario/configuracion', fn() => view('Usuario.configuracion'))->name('usuario.configuracion');

    /*
    |--------------------------------------------------------------------------
    | 🛠️ ACCIONES DE ADMINISTRADOR (HARDWARE MGT)
    |--------------------------------------------------------------------------
    | ! Advertencia: Estas rutas modifican la tabla 'productos' en SQL
    */

    Route::post('/favoritos/guardar', [ProductosController::class, 'saveFavorite'])->name('favoritos.store');
    Route::get('/admin/productos/crear', [ProductosController::class, 'create'])->name('productos.create');
    Route::post('/admin/productos/guardar', [ProductosController::class, 'store'])->name('productos.store');

    // FIXME: Añadir middleware de rol 'admin' para mayor seguridad
    Route::delete('/admin/productos/{id}', [ProductosController::class, 'destroy'])->name('productos.destroy');

    // TODO: <u>Desplegar vistas para edit() y lógica para update()</u>
});
