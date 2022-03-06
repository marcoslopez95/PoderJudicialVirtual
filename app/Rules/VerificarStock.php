<?php

namespace App\Rules;

use App\Models\Producto;
use Illuminate\Contracts\Validation\Rule;

class VerificarStock implements Rule
{
    private $producto;
    private $tipo;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($producto, $tipo)
    {
        //
        $this->tipo = $tipo;
        $this->producto = Producto::find($producto);
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        if( $this->tipo == 'quitar' && ( ( $this->producto->stock == 0 ) || ( $this->producto->stock - $value < 0 ) )){
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
