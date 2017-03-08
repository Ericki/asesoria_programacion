<?php 
session_start();
    if (!isset($_SESSION['usuario']) ) {
    header("Location:redireccion.php");
}
//echo $_SESSION['id'];
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
        <a class= "navbar-brand" href= "#/foro"><i class="glyphicon glyphicon-th-large"></i> Comentarios 
        </a>
        <a ng-show="customer._id" class= "navbar-brand" href= "#/editar-comentario/0"><i class="glyphicon glyphicon-plus"></i> Hacer Comentario</a>
        <a ng-show="customer._id" class= "navbar-brand pull-right"><i class="glyphicon glyphicon-edit"></i> Comentario: {{customer._id}}</a>
        </div>
        </nav>
        <header>
            <h3>{{title}}</h3>
        </header>
        <div class="col-md-12">

<form role="form" name="myForm" class="form-horizontal">
<div class="row">
<div class= "form-group" ng-class="{error: myForm.name.$invalid}">
    <label class= "col-md-2"> Comentario </label>
    <div class="col-md-4">
    
    <textarea id="textarea1" class="materialize-textarea" name="name" ng-model="comentario" placeholder="Comentar" required/></textarea>
    
    <input type="hidden" name="" value="{{customer.comentario=comentario}}">
    <span ng-show="myForm.name.$dirty && myForm.name.$invalid" class="help-inline">Name Required</span>
    </div>
</div>
<div class= "form-group" ng-class="{error: myForm.name.$invalid}">
    <div class="col-md-4">

    <input name="name" value="{{customer.id_usuario='<?php echo $_SESSION['id'];?>'}}" type= "hidden" class= "form-control" required/>
    <input name="name" value="{{customer.fecha_comentario = message.time}}" type= "hidden" class= "form-control" required/>
    <input name="name" ng-model="customer.id_usuario" type= "hidden" class= "form-control" required/>
    <input name="time" ng-model="customer.fecha_comentario" type= "hidden" class= "form-control" required/>
    <input name="time" ng-model="customer.id_foro" type= "hidden" class= "form-control" required/>
    <span ng-show="myForm.name.$dirty && myForm.name.$invalid" class="help-inline">Name Required</span>
    </div>
</div>
<div class= "form-group">
    <label class= "col-md-2"></label>
    <div class="">
    <a href="#/foro" class="waves-effect waves-light btn-flat">Cancelar</a>
        <button ng-click="saveCustomer(customer);" 
                ng-disabled="isClean() || myForm.$invalid"
                class="btn btn-primary">{{buttonText}}</button>
        
    </div>
</div>
</div>
</form>
        </div></div>
    </div>
</div>