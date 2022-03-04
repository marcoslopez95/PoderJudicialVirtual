<template>
<div>
<div class="row">
    <div class="mb-4 col-sm-4">
        <label for="nombre" class="form-label">Nombre del Producto:</label>
        <input type="text" class="form-control" id="nombre" name='nombre' placeholder="Ingrese un producto">
    </div>
    <div class="mb-4 col-sm-4">
        <label for="precio_base" class="form-label">Precio Base:</label>
        <input type="number" class="form-control" id="precio_base" name='precio_base' v-model="base" placeholder="Ingrese el precio de costo o precio base">
    </div>
    <div class="mb-4 col-sm-4">
        <label for="impuesto" class="form-label">Precio Venta:</label>
        <input type="number" class="form-control" id="precio_venta" name='precio_venta' v-model="venta" min="0,1"  placeholder="Ingrese el precio de venta">
    </div>
</div>
<div class="row">
    <div class="mb-4 col-sm-4">
        <label for="precio_total" class="form-label">Ganancia x Unidad:</label>
        <input type="number" class="form-control" id="precio_total" name='ganancia' disabled :value="ganancia">
    </div>
    <div class="mb col-sm">
        <input type="submit" class="btn btn-primary" value='Guardar' />
    </div>
    
</div>
</div>
</template>

<script>
export default {
    data(){
        return {
            base: null,
            venta: null,
            ganancia: 0
        }
    },
    updated(){
        this.ganancia = this.venta - this.base
    },
    methods: {
        
    }
}
</script>

<style>

</style>