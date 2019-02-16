<?php
require_once 'model/prenda.php';

require_once 'model/cliente.php';

require_once 'model/factura.php';

require_once 'model/servicio.php';

require_once 'model/detalle.php';

class PrendaController
{
    
    private $modelPrenda;

    private $modelCliente;

    private $modelFactura;

    private $modelServicio;

    private $modelDetalle;
    


    public function __CONSTRUCT()
    {
        $this->modelPrenda = new Prenda();
        $this->modelCliente = new Cliente();
        $this->modelFactura = new Factura();        
        $this->modelServicio = new Servicio(); 
        $this->modelDetalle = new Detalle();  
    }
    
    public function IndexPrenda()
    {
        require_once 'view/header.php';
        require_once 'view/prenda/prenda.php';
        require_once 'view/footer.php';
    }
    public function IndexCliente()
    {
        require_once 'view/header.php';
        require_once 'view/cliente/cliente.php';
        require_once 'view/footer.php';
    }
    public function IndexFactura()
    {
        require_once 'view/header.php';
        require_once 'view/factura/factura.php';
        require_once 'view/footer.php';
    } 

    public function IndexServicio()
    {
        require_once 'view/header.php';
        require_once 'view/servicio/servicio.php';
        require_once 'view/footer.php';
    }    
    
    public function IndexDetalle()
    {
        require_once 'view/header.php';
        require_once 'view/detalle/detalle.php';
        require_once 'view/footer.php';
    }  
// ----------------------
// PARTE DE LAS PRENDAS  
// ----------------------

    public function Crud()
    {
        $p = new Prenda();
        
        if(isset($_REQUEST['cod_prenda']))
        {
            $p = $this->modelPrenda->Obtener($_REQUEST['cod_prenda']);
        }
        
        require_once 'view/header.php';
        require_once 'view/prenda/prenda-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar()
    {
        $p = new Prenda();
        
        $p->cod_prenda = $_REQUEST['cod_prenda'];
        $p->nom_prenda = $_REQUEST['nom_prenda'];


        $p->cod_prenda > 0 
            ? $this->modelPrenda->Actualizar($p)
            : $this->modelPrenda->Registrar($p);
        
        header('Location: index.php');
    }
    
    public function Eliminar()
    {
        $this->modelPrenda->Eliminar($_REQUEST['cod_prenda']);
        header('Location: index.php');
    }

// ----------------------
// PARTE DEL CLIENTE
// ----------------------

    public function CrudCliente()
    {
        $c = new Cliente();
        
        if(isset($_REQUEST['cod_cliente']))
        {
            $c = $this->modelCliente->ObtenerCliente($_REQUEST['cod_cliente']);
        }
        
        require_once 'view/header.php';
        require_once 'view/cliente/cliente-editar.php';
        require_once 'view/footer.php';
    }


    
    public function GuardarCliente()
    {
        $c = new Cliente();
        
        $c->cod_cliente = $_REQUEST['cod_cliente'];
        $c->nom_cliente = $_REQUEST['nom_cliente'];


        $c->cod_cliente > 0 
            ? $this->modelCliente->ActualizarCliente($c)
            : $this->modelCliente->RegistrarCliente($c);
        
        header('Location: index.php');
    }
    
    public function EliminarCliente()
    {
        $this->modelCliente->EliminarCliente($_REQUEST['cod_cliente']);
        header('Location: index.php');
    }
// ----------------------
// PARTE DE LA FACTURA
// ----------------------

    public function CrudFactura()
    {
        $f = new Factura();
        
        if(isset($_REQUEST['cod_factura']))
        {
            $f = $this->modelFactura->ObtenerFactura($_REQUEST['cod_factura']);
        }
        
        require_once 'view/header.php';
        require_once 'view/factura/factura-editar.php';
        require_once 'view/footer.php';
    }
    
    public function GuardarFactura()
    {
        $f = new Factura();
        
        $f->cod_factura = $_REQUEST['cod_factura'];
        $f->cod_cliente = $_REQUEST['cod_cliente'];
        $f->val_factura = $_REQUEST['val_factura'];
        $f->fecha = $_REQUEST['fecha'];


        $f->cod_factura > 0 
            ? $this->modelFactura->ActualizarFactura($f)
            : $this->modelFactura->RegistrarFactura($f);
        
        header('Location: index.php');
    }
    
    public function EliminarFactura()
    {
        $this->modelFactura->EliminarFactura($_REQUEST['cod_factura']);
        header('Location: index.php');
    }    




// ---------------------
// PARTE DEL SERVICIO
// ---------------------

public function CrudServicio()
{
    $s = new Servicio();
    
    if(isset($_REQUEST['cod_servicio']))
    {
        $s = $this->modelServicio->ObtenerServicio($_REQUEST['cod_servicio']);
    }
    
    require_once 'view/header.php';
    require_once 'view/servicio/servicio-editar.php';
    require_once 'view/footer.php';
}

public function GuardarServicio()
{
    $s = new Servicio();
    
    $s->cod_servicio = $_REQUEST['cod_servicio'];
    $s->nom_servicio = $_REQUEST['nom_servicio'];
    $s->val_servicio = $_REQUEST['val_servicio'];
    


    $s->cod_servicio > 0 
        ? $this->modelServicio->ActualizarServicio($s)
        : $this->modelServicio->RegistrarServicio($s);
    
    header('Location: index.php');
}

public function EliminarServicio()
{
    $this->modelServicio->EliminarServicio($_REQUEST['cod_servicio']);
    header('Location: index.php');
}



// ---------------------
// PARTE DEL DETALLE
// ---------------------

public function CrudDetalle()
{
    $d = new Detalle();
    
    if(isset($_REQUEST['cod_detalle']))
    {
        $d = $this->modelDetalle->ObtenerDetalle($_REQUEST['cod_detalle']);
    }
    
    require_once 'view/header.php';
    require_once 'view/detalle/detalle-editar.php';
    require_once 'view/footer.php';
}

public function GuardarDetalle()
{
    $d = new Detalle();
    
    $d->cod_detalle = $_REQUEST['cod_detalle'];
    $d->can_detalle = $_REQUEST['can_detalle'];
    $d->cod_factura = $_REQUEST['cod_factura'];
    $d->cod_prenda = $_REQUEST['cod_prenda'];
    $d->cod_servicio = $_REQUEST['cod_servicio'];


    $d->cod_detalle > 0 
        ? $this->modelDetalle->ActualizarDetalle($d)
        : $this->modelDetalle->RegistrarDetalle($d);
    
    header('Location: index.php');
}

public function EliminarDetalle()
{
    $this->modelDetalle->EliminarDetalle($_REQUEST['cod_detalle']);
    header('Location: index.php');
}

}