<h1 class="page-header">
    <?php echo $p->cod_prenda != null ? $p->nom_prenda : 'Nueva Prenda'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Prenda&a=IndexPrenda">Prendas</a></li>
  <li class="active"><?php echo $p->cod_prenda != null ? $p->nom_prenda : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-prenda" action="?c=Prenda&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="cod_prenda" value="<?php echo $p->cod_prenda; ?>" />
    
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nom_prenda" value="<?php echo $p->nom_prenda; ?>" class="form-control" placeholder="Ingrese un nombre" data-validacion-tipo="requerido|min:3" />
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