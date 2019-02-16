<h1 class="page-header">
    <?php echo $d->cod_detalle != null ? $d->cod_detalle : 'Registrar Detalle'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Prenda&a=IndexDetalle">Detalles</a></li>
  <li class="active"><?php echo $d->cod_detalle != null ? $d->cod_detalle : 'Nuevo Registro de un detalle'; ?></li>
</ol>

<form id="frm-prenda" action="?c=Prenda&a=GuardarDetalle" method="post" enctype="multipart/form-data">
    <input type="hidden" name="cod_detalle" value="<?php echo $d->cod_detalle; ?>" />
    
    
    <div class="form-group">
        <label>Cantidad Prendas:</label>
        <input type="text" name="can_detalle" value="<?php echo $d->can_detalle; ?>" class="form-control" placeholder="Ingrese cantidad de prendas del cliente" />
    </div>
    



    <div class="form-group">
        <label>Seleccionar factura:</label>

		<select name="cod_factura"
				class="form-control" id="iddesplegable" required>
					<?php

						foreach ($this->modelFactura->ListarFactura() as $f) {
                  
                     ?> <option value="<?php echo $f->cod_factura?>"><?php echo $f->cod_factura?></option>
															<?php	} ?> 
					</select>
			</div>
    
            <div class="form-group">
        <label>Seleccionar servicio:</label>

		<select name="cod_servicio"
				class="form-control" id="iddesplegable" required>
					<?php

						foreach ($this->modelServicio->ListarServicio() as $s) {
                  
                     ?> <option value="<?php echo $s->cod_servicio?>"><?php echo $s->nom_servicio?></option>
															<?php	} ?> 
					</select>
			</div>
          
    <div class="form-group">
        <label>Seleccionar prenda:</label>

		<select name="cod_prenda"
				class="form-control" id="iddesplegable" required>
					<?php

						foreach ($this->modelPrenda->Listar() as $p) {
                  
                     ?> <option value="<?php echo $p->cod_prenda?>"><?php echo $p->nom_prenda?></option>
															<?php	} ?> 
					</select>
			</div>
            <div class="number-right">
        <button class="btn btn-success">Guardar</button>
    </div>


           
            <hr />
</form>

<script>
    $(document).ready(function(){
        $("#frm-prenda").submit(function(){
            return $(this).validate();
        });
    })
</script>
   