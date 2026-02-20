<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /* ^ 1. index() --> Lista todos los productos del catálogo ^ */
    public function index()
    {
        $productos = Producto::all();
        return view('Productos.portatilesI', compact('productos'));
    }

    /* ^ 2. create() --> Muestra el formulario para añadir un nuevo producto ^ */
    public function create()
    {
        return view('Productos.create');
    }

    /* ^ 3. store() --> Mejorado para ZoneTech ^ */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
        ]);

        try {
            Producto::create([
                'nombre' => $request->nombre,
                'precio' => $request->precio,
            ]);

            // Redirigimos atrás con un mensaje de éxito que SweetAlert o un alert de Laravel pueda leer
            return redirect()->back()->with('success', 'Hardware sincronizado con el núcleo.');
        } catch (\Exception $e) {
            // En lugar de morir con dd(), volvemos con el error
            return redirect()->back()->withErrors(['error' => 'Fallo en la sincronización: ' . $e->getMessage()]);
        }
    }

    /* ^ 4. show() --> Muestra los detalles de un producto específico ^ */
    public function show(string $id)
    {
        $producto = Producto::findOrFail($id);
        return view('Productos.show', compact('producto'));
    }

    /* ^ 5. edit() --> Muestra el formulario para editar un producto ^ */
    public function edit(string $id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    /* ^ 6. update() --> Actualiza el producto en la base de datos ^ */
    // TODO: storage = Base de Datos
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
        ]);

        try {
            $producto = Producto::findOrFail($id);
            $producto->update([
                'nombre' => $request->nombre,
                'precio' => $request->precio,
            ]);

            return redirect()->route('Productos.index')
                ->with('success', 'Producto actualizado correctamente.');
        } catch (\Exception $e) {
            dd("FALLO CRÍTICO AL ACTUALIZAR PRODUCTO: " . $e->getMessage());
        }
    }

    /* ^ 7. destroy() --> Elimina un producto de la base de datos ^ */
    public function destroy(string $id)
    {
        try {
            $producto = Producto::findOrFail($id);
            $producto->delete();

            return redirect()->route('Productos.index')
                ->with('success', 'Producto eliminado correctamente.');
        } catch (\Exception $e) {
            dd("FALLO CRÍTICO AL ELIMINAR PRODUCTO: " . $e->getMessage());
        }
    }
}
