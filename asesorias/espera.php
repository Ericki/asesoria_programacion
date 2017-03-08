<?php 
session_start();
    if (!isset($_SESSION['usuario']) ) {
    header("Location:login.html");
}
  ?>
  <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Asesorias en linea UPIIZ-IPN</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/freelancer.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

</head>

<body id="page-top" class="index">

    <!-- Navigation -->

    <nav id="mainNav" role="navigation" class="navbar navbar-default navbar-fixed-top navbar-custom" >
  <!-- El logotipo y el icono que despliega el menú se agrupan
       para mostrarlos mejor en los dispositivos móviles -->
  <div class="navbar-header">
     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Asesorias en línea UPIIZ-IPN</span> Menu <i class="fa fa-bars"></i>
                </button>
                <div><img class="img-responsive" src="img/UPIIZ.png" style="width: 60px; height: 50px;   position: relative;
                  top: 10px;
                  left: 50px;"></div>
                <a class="navbar-brand responsive" href="#page-top"></a>
    </div>
 
  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
       otro elemento que se pueda ocultar al minimizar la barra -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav navbar-right">
      <li class="page-scroll">
        <a href="#perfil/<?php echo $_SESSION['id']; ?>" ><img <?php echo 'src="'.$_SESSION['imagen'].'"';?> style="width: 30px; height: 30px; ">
          <span><?php echo $_SESSION['usuario'];?></span></a>
     </li>
        
        <li class="page-scroll">
            <a href="salir.php">Salir&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
        </li>
      
    </ul>
    </div>
</nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                
                    <div class="intro-text">
                        <span class="name">BienvenidoAsesorias en linea UPIIZ-IPN</span>
                     
                        <span class="skills">Espera a que seas aceptado</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
   
    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-8">
                        <h3>Asesorias en linea UPIIZ-IPN</h3>
                        <p> plataforma web para facilitar las asesorías de programación C y Java</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        trabajo terminal 1
                    </div>
                </div>
            </div>
        </div>
    </footer>

   
 
    
    
   

   <!-- jQuery -->
    <script src="js/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/freelancer.min.js"></script>


</body>

</html>
 

