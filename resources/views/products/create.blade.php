<!-- resources/views/products/create.blade.php -->
@extends('layouts.app') 
{{-- Si tienes una plantilla base, si no, omite esta línea y escribe HTML completo --}}

@section('content')
<div style="max-width: 800px; margin: 0 auto;">
    <h1 style="font-size: 1.5rem; margin-bottom: 1rem;">Registrar nuevo producto</h1>
    
    <!-- Muestra errores de validación si existen -->
    @if ($errors->any())
        <div style="color: red; margin-bottom: 1rem;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>* {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" style="display: flex; flex-direction: column; gap: 1rem;">
        @csrf
        <div>
            <label for="nombre" style="display: block; margin-bottom: 0.5rem;">Nombre del producto *</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required
                   style="width: 100%; padding: 0.5rem;">
        </div>

        <div>
            <label for="descripcion" style="display: block; margin-bottom: 0.5rem;">Descripción/Modelo</label>
            <input type="text" name="descripcion" id="descripcion" value="{{ old('descripcion') }}"
                   style="width: 100%; padding: 0.5rem;">
        </div>

        <div>
            <label for="categoria" style="display: block; margin-bottom: 0.5rem;">Categoría</label>
            <select name="categoria" id="categoria" style="width: 100%; padding: 0.5rem;">
                <option value="">Seleccione categoría</option>
                <option value="Categoría A" {{ old('categoria') == 'Categoría A' ? 'selected' : '' }}>Categoría A</option>
                <option value="Categoría B" {{ old('categoria') == 'Categoría B' ? 'selected' : '' }}>Categoría B</option>
                <option value="Categoría C" {{ old('categoria') == 'Categoría C' ? 'selected' : '' }}>Categoría C</option>
            </select>
        </div>

        <div>
            <label for="precio_compra" style="display: block; margin-bottom: 0.5rem;">Precio por unidad *</label>
            <input type="number" step="0.01" name="precio_compra" id="precio_compra" 
                   value="{{ old('precio_compra') }}" required style="width: 100%; padding: 0.5rem;">
        </div>

        <div>
            <label for="precio_venta" style="display: block; margin-bottom: 0.5rem;">Precio a venta *</label>
            <input type="number" step="0.01" name="precio_venta" id="precio_venta" 
                   value="{{ old('precio_venta') }}" required style="width: 100%; padding: 0.5rem;">
        </div>

        <div>
            <label for="cantidad" style="display: block; margin-bottom: 0.5rem;">Cantidad *</label>
            <input type="number" name="cantidad" id="cantidad" value="{{ old('cantidad') }}" required
                   style="width: 100%; padding: 0.5rem;">
        </div>

        <div>
            <label for="proveedor" style="display: block; margin-bottom: 0.5rem;">Proveedor</label>
            <input type="text" name="proveedor" id="proveedor" value="{{ old('proveedor') }}"
                   style="width: 100%; padding: 0.5rem;">
        </div>

        <div style="display: flex; gap: 1rem;">
            <button type="submit" style="background-color: #2F3E9E; color: #fff; border: none; padding: 0.7rem 1rem; cursor: pointer;">
                Guardar
            </button>
            <a href="{{ route('products.index') }}" style="background-color: #333; color: #fff; text-decoration: none; padding: 0.7rem 1rem; display: inline-block;">
                Cancelar
            </a>
        </div>
    </form>
</div>
@endsection
