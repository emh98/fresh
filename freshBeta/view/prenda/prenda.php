<h1 class="page-header">Prendas</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Prenda&a=Crud">Nueva Prenda</a>
    <a class="btn btn-primary" href="?c=Prenda&a=IndexCliente">Lista Clientes</a>
    <a class="btn btn-primary" href="?c=Prenda&a=IndexFactura">Lista Facturas</a>    
    <a class="btn btn-primary" href="?c=Prenda&a=IndexServicio">Lista Servicios</a>
    <a class="btn btn-primary" href="?c=Prenda&a=IndexDetalle">Lista Detalles</a>      

</div>



<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Nombre</th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->modelPrenda->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->nom_prenda; ?></td>
            <td>
                <a href="?c=Prenda&a=Crud&cod_prenda=<?php echo $r->cod_prenda; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Prenda&a=Eliminar&cod_prenda=<?php echo $r->cod_prenda; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
