<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Facturas</title>

  <!-- Favicons -->
 <!-- <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">-->

  <!-- Google Fonts -->
  <!--<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet"> -->

  <!-- Bootstrap CSS File -->
  <link href="<?php echo constant('URL');?>libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?php echo constant('URL');?>libs/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo constant('URL');?>libs/animate/animate.min.css" rel="stylesheet">
  <link href="<?php echo constant('URL');?>libs/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="<?php echo constant('URL');?>libs/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?php echo constant('URL');?>public/css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: EstateAgency
    Theme URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>
<body>

    <?php require_once "views/header.php"?>

    <section class="section-services section-t8">
    <div class="container">
        <div class="row">
          <div class="col-md-12" >
            <h1>Lista De Facturas</h1>
          </div>
        </div>

        <div class="container container-fluid align-content-center">
          <?php echo "<h2 class='text-center' style='color: limegreen'>".$this->mensaje."</h2>"?>
        </div>

        <div class="row">
          <div class="col-md-12 center">

              <table class="table table-striped shadow-lg">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Nombre Cliente</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Detalle</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  include_once 'models/FacturaModel.php';
                  foreach ($this->factura as $row) {
                    $factura = new FacturaModel();
                    $factura = $row; 
                    ?>
                  <tr>
                    <td><?php echo $factura->cod_factura?></td>
                    <td><?php echo $factura->cod_cliente?></td>
                    <td><?php echo $factura->fecha?></td>
                    <td><?php echo $factura->val_factura?></td>
                    <td>
                    <button type="button"  class="btn btn-success btn-block" data-toggle="modal" data-target="#P<?php echo $factura->cod_factura?>">Detalle</button>
                    <div class="modal fade" id="P<?php echo $factura->cod_factura?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Prendas</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            

                          <div class="container">

                              <div class="row">
                                <div class="col-md-12 center">
                                  <table class="table table-striped shadow-lg">
                                      <thead class="thead-dark">
                                        <tr>
                                          <th scope="col">Nombre</th>
                                          <th scope="col">Cantidad</th>
                                          <th scope="col">Valor</th>

                                        </tr>
                                      </thead>
                                      <tbody>
                                      <?php
                                        include_once 'models/DetalleModel.php';
                                        include_once 'controllers/Factura.php';
                                        $cF = new Factura();
                                        $detalles = $cF->listarDetalleC($factura->cod_factura);
                                        foreach ($detalles as $row) {
                                          $detalle = new DetalleModel();
                                          $detalle = $row; 
                                      ?>
                                        <tr>
                                          <td><?php echo $detalle->cod_prenda?></td>
                                          <td><?php echo $detalle->can_prenda?></td>
                                          <td><?php echo $detalle->val_factura?></td>
                                        </tr>
                                        <?php }?>
                                      </tbody>
                                    </table>
                                </div> 
                              
                              </div>
                            </div>


                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    </td>
                  </tr>
                  <?php }?>
                  <tr>
                    <td colspan="5"> <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#exampleModal">Añadir</button> </td>
                  </tr>
                </tbody>
              </table>
          </div> 
        </div>
      </div>
      <?php require_once "views/factura/factura.php";?>
    </section>

    <?php require_once "views/footer.php"?>


    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <div id="preloader"></div>




    <!-- JavaScript Libraries -->
    <script src="<?php echo constant('URL');?>libs/jquery/jquery.min.js"></script>
    <script src="<?php echo constant('URL');?>libs/jquery/jquery-migrate.min.js"></script>
    <script src="<?php echo constant('URL');?>libs/popper/popper.min.js"></script>
    <script src="<?php echo constant('URL');?>libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo constant('URL');?>libs/easing/easing.min.js"></script>
    <script src="<?php echo constant('URL');?>libs/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?php echo constant('URL');?>libs/scrollreveal/scrollreveal.min.js"></script>
    <!-- Contact Form JavaScript File -->
    <script src="<?php echo constant('URL');?>contactform/contactform.js"></script>

    <!-- Template Main Javascript File -->
    <script src="<?php echo constant('URL');?>public/js/main.js"></script>
</body>
</html>