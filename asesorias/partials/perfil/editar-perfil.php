<?php 
session_start();
    if (!isset($_SESSION['usuario']) ) {
    header("Location:redireccion.php");
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
       
        <header>
            <h3>Editar perfil</h3>
        </header>
        <div class="row">
      <div class="col s6 push-s6"><form name="upload" ng-submit="uploadFile(customer)">
                <div class="file-field input-field">
                    <div class=" waves-effect waves-light btn">
                        <span>Foto</span>
                    <input type="file" name="file" uploader-model="file" />
                    </div>

                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
                <img class="responsive-img" src="{{customer.foto}}">
                    <input type="submit" value="Cambiar Imagen" class="col s12 waves-effect waves-teal btn-flat"> 
                </form>
                <div class= "form-group">
                    <label class= "s12"></label>
                    <div class="s12">
                    <a href="#/perfil/<?php echo $_SESSION['id']; ?>" class="waves-effect waves-light btn-flat">Cancelar</a>
                        <button ng-click="saveCustomer(customer);" 
                                ng-disabled="isClean()"
                                class="btn btn-primary">{{buttonText}}</button>

                    </div>
                </div>
                </div>
      <div class="col s6 pull-s6">
          <form role="form" name="myForm" class="">
                <div class= "form-group" ng-class="{error: myForm.name.$invalid}">                
                    <div class="s12">
                    <input name="nombre" ng-model="customer.nombre" type= "text" class= "form-control" placeholder="Nombre" required/>
                    <span ng-show="myForm.name.$dirty && myForm.name.$invalid" class="help-inline">Nombre Requerido</span>
                    </div>
                </div>
                <div class= "form-group" ng-class="{error: myForm.name.$invalid}">
                    <div class="s12">
                    <input name="apellidoPaterno" ng-model="customer.apellido_paterno" type= "text" class= "form-control" placeholder="Apellido paterno" required/>
                    <span ng-show="myForm.name.$dirty && myForm.name.$invalid" class="help-inline">Apellido paterno Requerido</span>
    </div>
</div>
<div class= "form-group" ng-class="{error: myForm.name.$invalid}">
    <div class="s12">
    <input name="apellidoMaterno" ng-model="customer.apellido_materno" type= "text" class= "form-control" placeholder="Apellido materno" required/>
    <span ng-show="myForm.name.$dirty && myForm.name.$invalid" class="help-inline">Apellido materno Requerido</span>
    </div>
</div>
<div class= "form-group" ng-class="{error: myForm.name.$invalid}">
    <div class="s12">
    <input name="usuario" ng-model="customer.usuario" type= "text" class= "form-control" placeholder="Usuario" required/>
    <span ng-show="myForm.name.$dirty && myForm.name.$invalid" class="help-inline">Usuario Requerido</span>
    </div>
</div>
<div class= "form-group" ng-class="{error: myForm.name.$invalid}">
    <div class="s12">
    <input name="correo" ng-model="customer.correo" type= "text" class= "form-control" placeholder="Correo" required/>
    <span ng-show="myForm.name.$dirty && myForm.name.$invalid" class="help-inline">Correo Requerido</span>
    </div>
</div>
<div class= "form-group" ng-class="">
    <div class="s12">
    <input name="correo" ng-model="customer.password" type= "password" class= "form-control" placeholder="Contraseña" required/>
    <span ng-show="myForm.name.$dirty && myForm.name.$invalid" class="help-inline">Contraseña requerida</span>
    </div>
</div>
</form>
      </div>
    </div>
        
    </div>
</div>




