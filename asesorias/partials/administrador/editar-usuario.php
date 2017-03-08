<?php 
session_start();
    if (!isset($_SESSION['usuario']) ) {
    header("Location:index.php");
}else{
    if ($_SESSION['tipo_usuario']!='Administrador')  {
    header("Location:redireccion.php");
 }else{
    if ($_SESSION['estado']!= 'Alta')  {
    header("Location:espera.php");
 }
}
}
$_SESSION['id'];
  ?>

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
        <a class= "navbar-brand" href= "#/customers"><i class="glyphicon glyphicon-th-large"></i> Lista de usuarios </a>
                <a ng-show="customer._id" class= "navbar-brand pull-right"><i class="glyphicon glyphicon-edit"></i>Editando usuario {{customer.usuario}}</a>
        </div>
        </nav>
        <header>
            <h3>Editar usuario</h3>
        </header>
        <div class="col-md-12">

<form role="form" name="myForm" class="form-horizontal">
<div class="row">

<div class= "form-group">
    <label class= "col-md-2">Estatus </label>
    <div class="col-md-4">
    <select ng-options="statu for statu in status" class= "form-control" ng-model="customer.estatus">Status de usuario</select>
    </div>
</div>
<div class= "form-group">
    <label class= "col-md-2">Tipo usuario </label>
    <div class="col-md-4">
    <select ng-options="tusuario for tusuario in tusuarios" class= "form-control" ng-model="customer.tipo_usuario">Tipo de usuario</select>
    </div>
</div>
<div class= "form-group">
    <label class= "col-md-2"></label>
    <div class="">
    <a href="#/" class="waves-effect waves-light btn-flat">Cancelar</a>
        <button ng-click="saveCustomer(customer);" 
                ng-disabled="isClean()"
                class="btn btn-primary">{{buttonText}}</button>
        <button ng-click="deleteCustomer(customer)"
                ng-show="customer._id" class="waves-effect waves-light btn red">Eliminar Usuario</button>
    </div>
</div>
</div>
</form>
        </div></div>
    </div>
</div>
