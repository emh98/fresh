<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte</title>

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
</head>
<body>

    <?php require_once "views/header.php"?>
    
    <section class="section-services section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1>Generar Reporte</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <form action="<?php echo constant('URL')?>reporte/renderBus" method="POST">

            <div class="row">
              <div class="form-group">
                <label for="fecha">Fecha Inicial</label>
                <input type="date" class="form-control form-control-lg" id="fecha" name="fecha">
              </div>
            </div>
            <div class="row">
              <button type="submit" class="btn btn-block btn-success">Buscar</button>
            </div>
            </form>
            <div class="row">
            <table class="table table-striped shadow-lg">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Nombre Cliente</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  include_once 'models/facturaModel.php';
                  foreach ($this->reporte as $row) {
                    $factura = new FacturaModel();
                    $factura = $row; 
                ?>
                  <tr>
                    <td><?php echo $factura->cod_factura?></td>
                    <td><?php echo $factura->val_factura?></td>
                  </tr>
                  <?php }?>
                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
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