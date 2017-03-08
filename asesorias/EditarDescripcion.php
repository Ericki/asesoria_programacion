 <?php
 $id= $_POST['id'];
 echo'<div class="text-center">
        <form id="Edit" name="Edit" method="post" accept-charset="utf-8">
      <div class="form-group">
      <label for="exampleInputFile">Editar descripcion de documento</label>
       <input id="descripcion" name="descripcion" type="text" placeholder="Palbras claves sobre el archivo o descripcion del archivo" class="form-control">
       <br/>
<br/>
<button id="Editar" name="Editar" type="submit" onclick="editar1('.$id.')"  class="btn btn-primary btn-lg" ;>Editar</button> 
<div class="upload-msg" id="cambio"></div>
  </form>';
      ?>