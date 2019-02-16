<h1 class="page-header">Clientes</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Prenda&a=CrudCliente">Nuevo Cliente</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Clientes Ingresados</th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->modelCliente->ListarCliente() as $r): ?>
        <tr>
            <td><?php echo $r->nom_cliente; ?></td>
            <td>
                <a href="?c=Prenda&a=CrudCliente&cod_cliente=<?php echo $r->cod_cliente; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Prenda&a=EliminarCliente&cod_cliente=<?php echo $r->cod_cliente; ?>">Eliminar Cliente</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 