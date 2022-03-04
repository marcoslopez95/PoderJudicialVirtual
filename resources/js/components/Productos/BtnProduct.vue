<template>
<div>
    <a title='Editar' :href="'/Producto/ver/'+id"><i class="nc-icon nc-settings-90"></i></a>
    <a title='Eliminar' :href="'/Producto/eliminar/'+id"><i class="ml-2 nc-icon nc-simple-delete"></i></a>
    <a title='Agregar Stock' :href="'/Producto/agregar_stock/'+id"><i class="ml-2 nc-icon nc-simple-agg"></i></a>
</div>
    
                                            
</template>

<script>
export default {
    props: {
        id : Number
    },
    data(){
    }
}
</script>

<style>

</style>