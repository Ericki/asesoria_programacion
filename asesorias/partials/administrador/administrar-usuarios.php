<?php 
session_start();
    if (!isset($_SESSION['usuario']) ) {
    header("Location:index.php");
}else{
    if (($_SESSION['tipo_usuario']!='Administrador'))   {
    header("Location:redireccion.php");
 }else{
    if ($_SESSION['estado']!= 'Alta')  {
    header("Location:espera.php");
 }
}
}
$_SESSION['id'];
  ?>


<input type="hidden" name='{{session="<?php echo $_SESSION["tipo_usuario"];?>"}}'>
<input type="hidden" name='{{comprueba=session=="Administrador"}}'>  
  
<div class="col-md-12" ng-show="comprueba">
 <div class="row">
    <div class="col-md-12" ng-show="customers.length > 0">
    
   
        <table class="table table-striped table-bordered">
        <thead>
        <th>Nombre&nbsp;</th>
        <th>Apellido paterno&nbsp;</th>
        <th>Apellido materno&nbsp;</th>
        <th>Tipo usuario&nbsp;</th>
        <th>Usuario&nbsp;</th>
        <th>Correo&nbsp;</th>
        <th>Status&nbsp;</th>
        </thead>
        <tbody>
            <tr ng-repeat="data in customers">
                <td>{{data.nombre}}</td>
                <td>{{data.apellido_paterno}}</td>
                <td>{{data.apellido_materno}}</td>
                <td>{{data.tipo_usuario}}</td>
                <td>{{data.usuario}}</td>
                <td>{{data.correo}}</td>
                <td>{{data.estatus}}</td>

                <td><a href="#/editar-usuario/{{data.id_usuario}}" class="btn">&nbsp;<i class="glyphicon glyphicon-edit"></i>&nbsp; Editar Usuario</a></td>
            </tr>
        </tbody>
        </table>
    </div>
    <div class="col-md-12" ng-show="customers.length == 0">
        <div class="col-md-12">
            <h4>No existen usuarios</h4>
        </div>
    </div>
</div>   
</div>
