<template>
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar / Quitar Productos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form :action="'/Producto/agregar_quitar_stock/'+id" method="post">
          <slot></slot>
            <span><b>Producto:</b> {{nombre}} - <b>En Almacen:</b> {{stock}}</span>
            <label for="tipo" class="form-label">¿Qué accion desea realizar?</label>
            <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="tipo" id="agregar" value="agregar" v-model="tipo">
              <label class="form-check-label pl-0" for="agregar">Agregar</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="tipo" id="quitar" value="quitar" :disabled="stock == 0" v-model="tipo">
              <label class="form-check-label pl-0" for="quitar">Quitar</label>
            </div>
            
            <div class="input-group">
              <span for='cantidad' class="input-group-text"> Cantidad: </span>
              <input class="form-control" type="number" name='cantidad' step="1" min="1" placeholder="10"  v-model="cantidad">
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" :class="{disabled: !(this.cantidad && this.tipo)}">Guardar</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    name: 'AgregarStock',
    props:{
        nombre: String,
        stock: Number,
        id: Number
    },
    mounted(){
      console.log(this.nombre);
    },
    data(){
      return {
        tipo : null,
        cantidad : null
      }
    },
    destroyed(){
      this.tipo = null
      this.cantidad = null
    }
}
</script>

<style>

</style>