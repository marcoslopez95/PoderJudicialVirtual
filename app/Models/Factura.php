<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $table = 'facturas';
    protected $fillable = [
        'user_id',
        'fecha',
        'base',
        'impuestos',
        'total'
    ];

    /**
     * Get all of the Compras for the Factura
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Compras()
    {
        return $this->hasMany(Compra::class, 'factura_id', 'id')->orderBy('fecha_compra','desc');
    }

    /**
     * Get the Cliente that owns the Factura
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Cliente()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
