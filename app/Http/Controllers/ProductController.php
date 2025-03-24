<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Muestra el listado de productos.
     */
    public function index()
    {
        // Podrías listar todos los productos
        $productos = Product::all();
        return view('products.index', compact('productos'));
    }

    /**
     * Muestra el formulario para crear un nuevo producto.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Guarda un nuevo producto en la base de datos.
     */
    public function store(Request $request)
    {
        // Validación básica (puedes ajustarla a tus requisitos)
        $request->validate([
            'nombre'        => 'required|string|max:255',
            'descripcion'   => 'nullable|string|max:255',
            'categoria'     => 'nullable|string|max:255',
            'precio_compra' => 'required|numeric',
            'precio_venta'  => 'required|numeric',
            'cantidad'      => 'required|integer',
            'proveedor'     => 'nullable|string|max:255',
        ]);

        // Crear producto
        Product::create([
            'nombre'        => $request->nombre,
            'descripcion'   => $request->descripcion,
            'categoria'     => $request->categoria,
            'precio_compra' => $request->precio_compra,
            'precio_venta'  => $request->precio_venta,
            'cantidad'      => $request->cantidad,
            'proveedor'     => $request->proveedor,
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('products.index')
                         ->with('success', '¡Producto creado exitosamente!');
    }

    /**
     * Muestra un producto en específico (opcional).
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Muestra el formulario para editar un producto (opcional).
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Actualiza un producto en la base de datos (opcional).
     */
    public function update(Request $request, Product $product)
    {
        // Validar y actualizar...
    }

    /**
     * Elimina un producto de la base de datos (opcional).
     */
    public function destroy(Product $product)
    {
        // Eliminar...
    }
}
