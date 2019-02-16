<h1 class="page-header">Factura</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Prenda&a=CrudFactura">Nueva Factura</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Codigo factura</th>
            <th style="width:180px;">Nombre cliente</th>
            <th style="width:180px;">Valor</th>
            <th style="width:180px;">Fecha</th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->modelFactura->ListarFactura() as $r): ?>
        <tr>
            <td><?php echo $r->cod_factura; ?></td>
            <?php  
           
           $hostname="192.168.56.1";
           $username="root";
           $password="";
           $dbname="fresh";

           
           $conexion= mysql_connect($hostname,$username, $password,$dbname);
        
           $sql="select * from cliente where cod_cliente =  $r->cod_cliente";
           $resultado=mysql_query($conexion,$sql);
           

while ($columna = mysql_fetch_array($resultado ))
{
    ?>
 <td><?php echo $columna['nom_cliente'];?></td>
 <?php
}
           ?>

            <td><?php echo $r->val_factura; ?></td>
            <td><?php echo $r->fecha; ?></td>

            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Prenda&a=EliminarFactura&cod_factura=<?php echo $r->cod_factura; ?>">Eliminar Factura</a>
            </td>
        </tr>
    
    <?php endforeach; ?>


    </tbody>
</table> 