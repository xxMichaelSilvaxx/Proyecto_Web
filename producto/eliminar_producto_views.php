<div class="row d-flex justify-content-center">
   <div class="row">
     <div class="col-10">
       <form id="formulario" action="" method="post">
         <section class="form-row">
           <div class="form-group col-12">
             <label for="id">ID:</label>
             <input id="id" type="text" name="id" class="form-control">
           </div>
         </section>
        <section class="form-row">
          <div class="form-group col-6">
           <button type="submit" id="desabilitar" value="desabilitar" class="btn btn-primary btn-block" onmousedown="Desabilitar('desabilitar', 'formulario', 'final')">Eliminar</button>
          </div>
          <div class="form-group col-6">
             <button type="reset" class="btn btn-block">Cancelar</button>
          </div>
        </section>
      </form>
    </div>
  </div>
</div>
<div class="text-center" id="final">

</div>
