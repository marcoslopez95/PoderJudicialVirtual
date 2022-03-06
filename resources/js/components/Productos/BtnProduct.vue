<template>
<div class="container-fluid justify-content-between">
    <a class="btn btn-primary  text-white" title='Editar' :href="'/Producto/ver/'+producto.id"><i class="nc-icon nc-settings-90"></i></a>
    <a class="btn btn-danger   text-white" title='Eliminar' :href="'/Producto/eliminar/'+producto.id"><i class="nc-icon nc-simple-remove"></i></a>
    
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" :data-bs-target="'#Stock'+producto.id">
  Stock
</button>

<!-- Modal -->
<div class="modal fade" :id="'Stock'+producto.id" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <AgregarStockVue
    :id="producto.id"
    :nombre="producto.nombre"
    :stock="producto.stock"> 
    <slot></slot>
  </AgregarStockVue>
</div>
</div>                                            
</template>

<script>
import AgregarStockVue from "./AgregarStock.vue"
export default {
    components:{
        AgregarStockVue
    },
    props: {
        
        producto : Object,
        
    }
}
</script>

<style>

</style>