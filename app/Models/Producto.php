<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';
    protected $fillable = [
        'nombre',
        'precio_base',
        'impuesto',
        'precio_total'
    ];

    /**
     * The Compras that belong to the Producto
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Compras()
    {
        return $this->belongsToMany(Compras::class, 'compra_producto', 'compra_id', 'producto_id');
    }
}
