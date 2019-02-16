<h1 class="page-header">
    <?php echo $s->cod_servicio != null ? $s->nom_servicio : 'Registrar Servicio'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Prenda&a=IndexServicio">Servicios</a></li>
  <li class="active"><?php echo $s->cod_servicio != null ? $s->nom_servicio : 'Nuevo Registro Servicio'; ?></li>
</ol>

<form id="frm-prenda" action="?c=Prenda&a=GuardarServicio" method="post" enctype="multipart/form-data">
    <input type="hidden" name="cod_servicio" value="<?php echo $s->cod_servicio; ?>" />
    
    <div class="form-group">
        <label>Servicio:</label>
        <input type="text" name="nom_servicio" value="<?php echo $s->nom_servicio; ?>" class="form-control" placeholder="Ingrese un nombre" data-validacion-tipo="requerido|min:3" />
    </div>
    <div class="form-group">
        <label>Valor:</label>
        <input type="text" name="val_servicio" value="<?php echo $s->val_servicio; ?>" class="form-control" placeholder="Ingrese un valor" data-validacion-tipo="requerido|min:3" />
    </div>    
    
    <hr />
    
    <div class="text-right">
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