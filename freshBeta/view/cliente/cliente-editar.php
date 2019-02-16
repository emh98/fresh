<h1 class="page-header">
    <?php echo $c->cod_cliente != null ? $c->nom_cliente : 'Registrar Cliente'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Prenda&a=IndexCliente">Clientes</a></li>
  <li class="active"><?php echo $c->cod_cliente != null ? $c->nom_cliente : 'Nuevo Registro Cliente'; ?></li>
</ol>

<form id="frm-prenda" action="?c=Prenda&a=GuardarCliente" method="post" enctype="multipart/form-data">
    <input type="hidden" name="cod_cliente" value="<?php echo $c->cod_cliente; ?>" />
    
    <div class="form-group">
        <label>Nombre y apellidos:</label>
        <input type="text" name="nom_cliente" value="<?php echo $c->nom_cliente; ?>" class="form-control" placeholder="Ingrese un nombre" data-validacion-tipo="requerido|min:3" />
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