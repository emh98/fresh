<h1 class="page-header">Detalle</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Prenda&a=CrudDetalle">Nuevo detalle</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Cantidad de Prendas</th>
            <th style="width:180px;">Codigo factura</th>
            <th style="width:180px;">Prenda</th>
            <th style="width:180px;">Tipo sevicio</th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->modelDetalle->ListarDetalle() as $r): ?>
        <tr>
            <td><?php echo $r->can_detalle; ?></td>
            <td><?php echo $r->cod_factura; ?></td>
           
            <?php  
           
           $hostname="192.168.56.1";
           $username="root";
           $password="";
           $dbname="fresh";

           
           $conexion= mysql_connect($hostname,$username, $password,$dbname);
          
           $sql="select * from prenda where cod_prenda =  $r->cod_prenda";
           $resultado=mysql_query($conexion,$sql);
           $sql2="select * from servicio where cod_servicio =  $r->cod_servicio";
           $resultado2=mysql_query($conexion,$sql2);
          
           while ($columna = mysql_fetch_array( $resultado ))
           {
               ?>   
           <td><?php echo $columna['nom_prenda']; ?></td>
           <?php
}
           ?>
 <?php          
while ($columna2 = mysqli_fetch_array( $resultado2 ))
{
    ?>
 <td><?php echo $columna2['nom_servicio'];?></td>
 <?php
}
           ?>
           


            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Prenda&a=EliminarDetalle&cod_detalle=<?php echo $r->cod_detalle; ?>">Eliminar detalle</a>
            </td>
        </tr>
    
    <?php endforeach; ?>


    </tbody>
</table> 