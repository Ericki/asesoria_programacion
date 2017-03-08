 <?php 
session_start();
    if (!isset($_SESSION['usuario']) ) {
    header("Location:index.php");
}
$_SESSION['id'];

  ?>
 
 <div class="row">
 
    <div class="col-md-12" ng-show="true">
    
    <nav class= "navbar navbar-default" role= "navigation" >
    <div class= "navbar-header" >
    <a class="btn btn-lg btn-success" href="#editar-comentario/0"><i class="glyphicon glyphicon-plus"></i>&nbsp;Comentar 
    </a> 
    </div><h4 class="grey-text text-lighten-1"> {{todos.length}} Comentarios</h4>

    </nav>
        
    </div>
    
<ul class="collapsible" data-collapsible="accordion" >
            <li ng-repeat="data in filteredComentario">
                <div class="collapsible-header"><i class="material-icons"></i>
                <div class="col s1">
                <img class="circle responsive-img" src="{{data.foto}}"> 
                </div>
                <span class="blue-text text-darken-2">{{data.usuario}}:</span>
                <span>{{lenguaje}}</span>
                <span am-time-ago="data.fecha_comentario"></span>
                </div>
                <div>
                <input name="name" value="{{session='<?php echo $_SESSION['id'];?>'}}" type= "hidden" class= "form-control" required/>
                <input name="name" value="{{tipo_usuario='<?php echo $_SESSION['tipo_usuario'];?>'}}" type= "hidden" class= "form-control" required/>
 
                <input name="name" value="{{comprueba=(session==data.id_usuario) || (tipo_usuario=='Administrador')}}" type= "hidden" class= "form-control" required/>
  
                </div>

                <div class="collapsible-body"><p class="flow-text" style="display: inline;">{{data.comentario}}</p>
                <input type="hidden" ng-model="comprueba" />
                <div ng-show="comprueba" style="display: inline;">
                <a href="#/editar-comentario/{{data.id_foro}}" class=""><i class="glyphicon glyphicon-edit"></i></a>
                </div>
                <a href="#/insertar-subcomentario/{{data.id_foro}}" class=""><i class="glyphicon glyphicon-plus"></i></a>
                    <ul class=" grey lighten-5 collection " >
                        <li ng-repeat="datas in subComentarios | filter :{id_foro : data.id_foro}" class="col s11 offset-s1 collection-item avatar">
                            <i class="material-icons"></i>
                            <img class="circle responsive-img" src="{{datas.foto}}"> 
                            
                            <span class="title">{{datas.usuario}}</span>
                            
                            <input name="name" value="{{session2='<?php echo $_SESSION['id'];?>'}}" type= "hidden" class= "form-control" required/>
                            <input name="name" value="{{comprueba2=(session==data.id_usuario) || (tipo_usuario=='Administrador')}}" type= "hidden" class= "form-control" required/>

                            <p class="flow-text">{{datas.comentario}}</p>
                            <input type="hidden" ng-model="comprueba2" />
                            <a ng-show="comprueba2" href="#/editar-subcomentario/{{datas.id_comentario}}" class=""><i class="glyphicon glyphicon-edit"></i></a>
                            <span class="grey-text" am-time-ago="datas.fecha_comentario"></span>
                            
                        </li>
                    </ul>
                </div>

                                </div>
                                </div>
                                </div>

                            </li>
                        </ul>

                </div>
            </li>
        </ul>
            
</div>
<div data-pagination="" data-num-pages="numPages()" 
      data-current-page="currentPage" data-max-size="maxSize"  
      data-boundary-links="true"></div>

    <div class="col-md-12" ng-show="comentarios.length == 0">
        <div class="col-md-12">
            <h4>No existen comentarios</h4>
        </div>
    </div>
