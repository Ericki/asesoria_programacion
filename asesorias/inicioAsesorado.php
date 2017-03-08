<?php
session_start();
    if (!isset($_SESSION['usuario']) ) {
    header("Location:redireccion.php");
}else{
    if ($_SESSION['tipo_usuario']!= 'Asesorado')   {
    header("Location:redireccion.php");
 }else{
    if ($_SESSION['estado']!= 'Alta')  {
    header("Location:espera.php");
 }
}
}
$_SESSION['id'];
  ?>
 <!DOCTYPE html>
<html ng-app="myApp" ng-app lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link data-require="bootstrap-css@2.3.2" data-semver="2.3.2" rel="stylesheet" href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" />
    <script data-require="angular.js@1.1.5" data-semver="1.1.5" src="http://code.angularjs.org/1.1.5/angular.min.js"></script>
    <script data-require="angular-ui-bootstrap@0.3.0" data-semver="0.3.0" src="http://angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.3.0.min.js"></script>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Theme CSS -->
    <link href="css/freelancer.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/cs">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <!--ng-table-->
    <link rel="stylesheet"; href="https://unpkg.com/ng-table@2.0.2/bundles/ng-table.min.css">
    <link rel="stylesheet" href="chat/css/style.css">

  	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.3/handlebars.min.js"></script>
  	<script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>

    <link href="css/css/materialize.min.css" rel="stylesheet">
    <style type="text/css">
    ul>li, a{cursor: pointer;}
    </style>

    <title>Asesorias en linea UPIIZ-IPN</title>
</head>
<body id="page-top" class="index">
    <!-- Navigation -->

    <nav id="mainNav" role="navigation" class="navbar navbar-default navbar-fixed-top navbar-custom" >
  <!-- El logotipo y el icono que despliega el menú se agrupan
       para mostrarlos mejor en los dispositivos móviles -->
  <div class="navbar-header">
     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Asesorias en línea UPIIZ-IPN</span> Menú <i class="fa fa-bars"></i>
                </button>
                <div><img class="img-responsive" src="img/UPIIZ.png" style="width: 60px; height: 50px;   position: relative;
                  top: 10px;
                  left: 50px;"></div>
                <a class="navbar-brand" href="#page-top"></a>
    </div>

  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
       otro elemento que se pueda ocultar al minimizar la barra -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav navbar-right">
      <li class="page-scroll">
        <a href="#perfil/<?php echo $_SESSION['id']; ?>"><img <?php echo 'src="'.$_SESSION['imagen'].'"';?> style="width: 30px; height: 30px; ">
          <span><?php echo $_SESSION['usuario'];?></span></a>
     </li>
     <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Foro<span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li><!--<a href="#foro" style=" color:#03225C;">Foro para Java</a>-->
        <a href="#foro">Foro para Java</a></li>
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
            <a href="temarioasesorado.php" >Temario</a>
        </li>
        <li class="page-scroll">
            <a href="" id="join-chat"><i style="font-size: 20px; margin: auto;
padding: 0; " class="material-icons">chat_bubble</i></a>
        </li>
        <li class="page-scroll">
            <a href="salir.php">Salir&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
        </li>

    </ul>
    </div>
</nav>
<!-- Header -->

    <div class="navbar navbar-default" id="navbar">
        <div class="container" id="navbar-container">
            <div class="navbar-header">
            </div><!-- /.navbar-header -->
             <!-- Modal Trigger -->
        </div>
    </div>

    <div>
        <div class="container-fluid">


            <div ng-view="" id="ng-view"></div>
        </div>
    </div>

    <input type="text" id="user" name="user"value="<?php echo $_SESSION['usuario'];?>">

<div class="conteiner">
<div class="row">
    <div id="wrapper" class="">
      <div id="user-container" >
      </div>

      <div id="main-container" class="hidden">
        <button type="button" id="leave-room">x</button>
        <div id="messages">

        </div>
    <div class="input-field">
      <input id="msg" name="msg" type="text" class="validate " placeholder="Escribe un mensaje..." onkeypress="return runScript(event)">

    </div>

  </div>
</div>


        </div>

      </div>


    </div>

    <script id="messages-template" type="text/x-handlebars-template">
      {{#each messages}}
      <div class="msg">
        <div class="time">{{time}}</div>
        <div class="details">
          <span class="user">{{user}}</span>: <span class="text">{{text}}</span>
        </div>
      </div>
      {{/each}}
    </script>

    <script src="js/main.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
      $("#enviar").click(function(){
        var formulario = $("#frminformacion").serializeArray();
        $.ajax({
          type: "POST",
          dataType: 'json',
            url: "guardar.php",
            data: formulario,
        }).done(function(respuesta){
          $("#mensaje").html(respuesta.mensaje);
          limpiarformulario("#frminformacion");
        });
      });


      function limpiarformulario(formulario){

        $(formulario).find('input').each(function() {
              switch(this.type) {
                  case 'password':
                  case 'text':
                    $(this).val('');
                      break;
                  case 'checkbox':
                  case 'radio':
                      this.checked = false;
                }
          });

          $(formulario).find('select').each(function() {
              $("#"+this.id + " option[value=0]").attr("selected",true);

          });
      }
    });
    </script>
    <form id="frminformacion">
        <label> Nombre: </label>
        <input type="text" name="nombre" /> <br/>
        <label> Apellidos: </label>
        <input type="text" name="apellidos"  /> <br/>
        <label> Sexo: </label>
        <input type="radio" name="sexo" value="f" /> Femenino
        <input type="radio" name="sexo" value="m" /> Masculino <br/>
        <label> Grado: </label>
        <select id = "grado" name="grado">
          <option value = "0" > Elige un grado </option>
            <option value = "1" > Primero </option>
            <option value = "2" > Segundo </option>
            <option value = "2" > Tercero </option>
        </select> <br/>
        <input type="button" id="enviar" value="Enviar" name="enviar" />
    </form>

    <div id="mensaje"></div>
    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-12">
                        <h3>Asesorias en linea UPIIZ-IPN</h3>
                        <p> Plataforma web para facilitar las asesorías de programación C y Java</p>
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
<script src="js/angular.min.js"></script>
<script src="js/angular-route.min.js"></script>
<script src="js/moment/moment.min.js"></script>
<script src="js/moment/angular-moment.js"></script>
<script src="https://unpkg.com/ng-table@2.0.2/bundles/ng-table.min.js"></script>
<script src="js/jquery-3.1.1.min.js"></script>
<script src="css/js/materialize.min.js"></script>
<script src="app/app.js"></script>

<script src="js/angular.min.js"></script>
<script src="js/angular-route.min.js"></script>
<script src="js/moment/moment.min.js"></script>
<script src="js/moment/angular-moment.js"></script>
<script src="js/jquery-3.1.1.min.js"></script>
<script src="css/js/materialize.min.js"></script>

<script src="app/app.js"></script>
<script src="chat/js/main.js"></script>

</body>
</html>
