<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Servicios</title>

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
          <div class="col-md-12">
            <h1>Lista De Servicios</h1>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 center">

		<div>
			<form action="<?php echo constant('URL')?>Servicio/buscarS" method="POST">
				<input type="number" class="form-control" id="parametro" placeholder="Parametro" name="parametro">
				<button type="submit" class="btn btn-secondary" data-dismiss="modal">Buscar</button>
				
			</form>
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