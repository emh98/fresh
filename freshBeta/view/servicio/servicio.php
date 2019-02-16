<h1 class="page-header">Servicios</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Prenda&a=CrudServicio">Nuevo Servicio</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Código</th>
            <th style="width:180px;">Nombre</th>
            <th style="width:180px;">Valor</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>   
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->modelServicio->ListarServicio() as $r): ?>
        <tr>
            <td><?php echo $r->cod_servicio; ?></td>
            <td><?php echo $r->nom_servicio; ?></td>
            <td><?php echo $r->val_servicio; ?></td>
            <td>
                <a href="?c=Prenda&a=CrudServicio&cod_servicio=<?php echo $r->cod_servicio; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Prenda&a=EliminarServicio&cod_servicio=<?php echo $r->cod_servicio; ?>">Eliminar Servicio</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 