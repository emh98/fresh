<h1 class="page-header">
    <?php echo $f->cod_factura != null ? $f->cod_factura : 'Registrar Factura'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Prenda&a=IndexFactura">Facturas</a></li>
  <li class="active"><?php echo $f->cod_cliente != null ? $f->nom_cliente : 'Nuevo Registro de una Factura'; ?></li>
</ol>

<form id="frm-prenda" action="?c=Prenda&a=GuardarFactura" method="post" enctype="multipart/form-data">
    <input type="hidden" name="cod_factura" value="<?php echo $f->cod_factura; ?>" />
    
    <div class="form-group">
        <label>Seleccionar cliente:</label>

		<select name="cod_cliente"
				class="form-control" id="iddesplegable" required>
					<?php

						foreach ($this->modelCliente->ListarCliente() as $r) {
                  
                     ?> <option value="<?php echo $r->cod_cliente?>"><?php echo $r->nom_cliente?></option>
															<?php	} ?> 
					</select>
			</div>


        
    
    </div>
    
    <hr />
    
    <div class="number-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-prenda").submit(function(){
            return $(this).validate();
        });
    })
</script>