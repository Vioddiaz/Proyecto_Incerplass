<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products'; // si usas la tabla 'products'
    
    protected $fillable = [
        'nombre',
        'descripcion',
        'categoria',
        'precio_compra',
        'precio_venta',
        'cantidad',
        'proveedor'
    ];
}
