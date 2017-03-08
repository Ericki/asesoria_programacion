
  <?php 
session_start();
    if (!isset($_SESSION['usuario']) ) {
    header("Location:index.html");
}else{
    if ($_SESSION['tipo_usuario']!='Asesorado')  {
    header("Location:redireccion.php");
 }else{
    if ($_SESSION['estado']!= 'Alta')  {
    header("Location:espera.php");
 }
}
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
<!-- Bootstrap Core CSS -->
     <link href="css/menutemario.css" rel="stylesheet">
<!-- Bootstrap Core CSS -->
    <link href="css/freelancer.min.css" rel="stylesheet">

<link href="css/tamano.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
     <script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>
     <script type="text/javascript" src="temarioasesorado.js"></script>
     <script type="text/javascript" src="SuperTemario.js"></script>
 <script type="text/javascript" src="SuperTemario_2.js"></script>

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
        <a href="http://localhost/d/inicioAsesorado.php#/perfil/<?php echo $_SESSION['id']; ?>" ><img <?php echo 'src="'.$_SESSION['imagen'].'"';?> style="width: 30px; height: 30px; ">
          <span><?php echo $_SESSION['usuario'];?></span></a>
     </li>
     <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Foro<span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li><!--<a href="#foro" style=" color:#03225C;">Foro para Java</a>-->
        <a href="inicioAsesorado.php#/foro">Foro para Java</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="#" >Foro para C</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Programar<span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="#">En Java</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">En C</a></li>
            </ul>
        </li>
        
        <li class="page-scroll">
            <a href="#chat">Chat</a>
        </li>
        <li class="page-scroll">
            <a href="salir.php">Salir&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
        </li>
      
    </ul>
    </div>
</nav>
    <!-- Header -->
    <header style="  background-color: #193248;">
        <div class="container " >
       
 </div>
</header>
      <div class="container"  style="  background-color:#29C5D6;" >
    <div>
        
           <div class="col-md-6 col-md-offset-3">
            <div class="text-center">
     <h4>Temario</h4>
      </div>
        </div>
    </div>
    </div>
 
 <div class="container-fluid">
  <div  class="col-md-12" name="tem" id="tem"  style=" 
height: 500px;
overflow:scroll; 
overflow-x: hidden;
visibility: visible;
" >

  </div>
  

</div>

   <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Descricion</h4>
      </div>
      <div class="modal-body">
          <div style=""  class="col-md-12 col-md visible-desktop text-center" name="des" id="des" >
       
   
    </div>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>


   
    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-8">
                        <h3>Asesorias en linea UPIIZ-IPN</h3>
                        <p> plataforma web para facilitar las asesorías de programación C y Java</p>
                    </div>
                    <div>
                       
                    </div>
                </div>
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

   
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    
    
   

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
<script src="js/angular.min.js"></script>
<script src="js/angular-route.min.js"></script>
<script src="js/moment/moment.min.js"></script>
<script src="js/moment/angular-moment.js"></script>
<script src="https://unpkg.com/ng-table@2.0.2/bundles/ng-table.min.js"></script>
<script src="js/jquery-3.1.1.min.js"></script>
<script src="app/app.js"></script>
       
<script src="js/angular.min.js"></script>
<script src="js/angular-route.min.js"></script>
<script src="js/moment/moment.min.js"></script>
<script src="js/moment/angular-moment.js"></script>
<script src="js/jquery-3.1.1.min.js"></script>
<script src="app/app.js"></script>


</body>

</html>
 

