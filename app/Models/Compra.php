<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $table = 'compras';
    protected $fillable = [
        'user_id',
        'fecha_compra',
        'base',
        'impuestos',
        'total',
        'factura_id'
    ];

    /**
     * Get the Factura that owns the Compra
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Factura()
    {
        return $this->belongsTo(Factura::class, 'factura_id', 'id');
    }

    /**
     * Get the Cliente that owns the Compra
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Cliente()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * The Productos that belong to the Compra
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Productos()
    {
        return $this->belongsToMany(Producto::class, 'compra_producto', 'compra_id', 'producto_id')->withPivot(['base','impuesto','total']);
    }
}
