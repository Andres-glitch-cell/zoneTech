<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /* 1. index() --> Lista todos los productos del catálogo */
    public function index()
    {
        $productos = Producto::all();
        return view('Productos.portatilesI', compact('productos'));
    }

    /* 2. create() --> Muestra el formulario para añadir un nuevo producto */
    public function create()
    {
        return view('Productos.create');
    }

    /* 3. store() --> Guardar nuevo Hardware */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            // Añadimos categoría si la usas en el formulario
            'categoria' => 'nullable|string' 
        ]);

        try {
            Producto::create([
                'nombre' => $request->nombre,
                'precio' => $request->precio,
                'categoria' => $request->categoria ?? 'portatil',
            ]);

            // REDIRECCIÓN CORREGIDA: Volvemos a la lista de portátiles
            return redirect()->route('portatiles')->with('success', 'Hardware sincronizado con el núcleo.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Fallo en la sincronización: ' . $e->getMessage()]);
        }
    }

    /* 4. show() */
    public function show(string $id)
    {
        $producto = Producto::findOrFail($id);
        return view('Productos.show', compact('producto'));
    }

    /* 5. edit() */
    public function edit(string $id)
    {
        $producto = Producto::findOrFail($id);
        return view('Productos.edit', compact('producto'));
    }

    /* 6. update() */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
        ]);

        try {
            $producto = Producto::findOrFail($id);
            $producto->update($request->all());

            // REDIRECCIÓN CORREGIDA
            return redirect()->route('portatiles')->with('success', 'Producto actualizado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al actualizar: ' . $e->getMessage()]);
        }
    }

    /* 7. destroy() --> ELIMINAR */
    public function destroy(string $id)
    {
        try {
            $producto = Producto::findOrFail($id);
            $producto->delete();

            // REDIRECCIÓN CORREGIDA: Cambiamos Productos.index por portatiles
            return redirect()->route('portatiles')->with('success', 'Hardware eliminado correctamente.');
        } catch (\Exception $e) {
            // Eliminamos el dd() para que la web no se rompa y mostramos el error elegantemente
            return redirect()->route('portatiles')->withErrors(['error' => 'Fallo al eliminar: ' . $e->getMessage()]);
        }
    }
}