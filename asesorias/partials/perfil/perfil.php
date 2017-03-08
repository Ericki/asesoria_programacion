<?php 
session_start();
    if (!isset($_SESSION['usuario']) ) {
    header("Location:redireccion.php");
}

$_SESSION['id'];
  ?>
  <input type="hidden" name='{{session="<?php echo $_SESSION["id"];?>"}}'>
  <input type="hidden" name="{{comprueba=session==customer.id_usuario}}">    
  <input type="hidden" name="{{customer.id_usuario}}">
  

<div ng-show="comprueba">

<style type="text/css">
  .form-horizontal input.ng-invalid.ng-dirty {
    border-color: #FA787E;
  }

  .form-horizontal input.ng-valid.ng-dirty {
    border-color: #78FA89;
  }
</style>
<div class="view">
    <div class="container">
        <div class="row">
        <nav class= "navbar navbar-default" role= "navigation" >
        <div class= "navbar-header" >
                <a ng-show="customer._id" class= "navbar-brand pull-right" href="#/editar-perfil/<?php echo $_SESSION['id']; ?>"><i class="glyphicon glyphicon-edit"></i>Editar mi perfil </a>
        </div>
        </nav>
        <header>
            <h3>Informacion de tu perfil</h3>
        
        </header>
        <div class="col-md-12">

<form role="form" name="myForm" class="form-horizontal">
<div class="row">

<div class= "form-group" ng-class="{error: myForm.name.$invalid}">
    <label class= "col-md-2"> Nombre </label>
    <div class="col-md-4">
    <h6>{{customer.nombre}}</h6>
    <span ng-show="myForm.name.$dirty && myForm.name.$invalid" class="help-inline">Nombre Requerido</span>
    </div>
</div>
<div class= "form-group" ng-class="{error: myForm.name.$invalid}">
    <label class= "col-md-2"> Apellido paterno </label>
    <div class="col-md-4">
    <h6> {{customer.apellido_paterno}}</h6>
    <span ng-show="myForm.name.$dirty && myForm.name.$invalid" class="help-inline">Apellido paterno Requerido</span>
    </div>
</div>
<div class= "form-group" ng-class="{error: myForm.name.$invalid}">
    <label class= "col-md-2"> Apellido materno </label>
    <div class="col-md-4">
    <h6>{{customer.apellido_materno}}</h6>
    <span ng-show="myForm.name.$dirty && myForm.name.$invalid" class="help-inline">Apellido materno Requerido</span>
    </div>
</div>
<div class= "form-group" ng-class="{error: myForm.name.$invalid}">
    <label class= "col-md-2"> Usuario </label>
    <div class="col-md-4">
    <h6>{{customer.usuario}}</h6>
    <span ng-show="myForm.name.$dirty && myForm.name.$invalid" class="help-inline">Usuario Requerido</span>
    </div>
</div>
<div class= "form-group" ng-class="{error: myForm.name.$invalid}">
    <label class= "col-md-2"> Correo </label>
    <div class="col-md-4">
    <h6>{{customer.correo}}</h6>
    <span ng-show="myForm.name.$dirty && myForm.name.$invalid" class="help-inline">Correo Requerido</span>
    </div>
</div>
<div class= "form-group" ng-class="{error: myForm.name.$invalid}">
    <label class= "col-md-2"> Foto </label>
    <div class="col-md-4">
    {{customer.foto}}
    <span ng-show="myForm.name.$dirty && myForm.name.$invalid" class="help-inline">Correo Requerido</span>
    </div>
</div>
<div class= "form-group" ng-class="{error: myForm.name.$invalid}">
    <label class= "col-md-2"> Foto </label>
    <div class="col-md-4">
    {{customer.password}}
    <span ng-show="myForm.name.$dirty && myForm.name.$invalid" class="help-inline">Correo Requerido</span>
    </div>
</div>

</div>
</form>
        </div></div>
    </div>
</div>

    
</div>
