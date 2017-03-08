<?php 
session_start();
    if (!isset($_SESSION['usuario']) ) {
    header("Location:index.php");
}

$_SESSION['id'];
  ?>
<!-- Header -->
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" <?php echo 'src="'.$_SESSION['imagen'].'"';?> style="width: 200px; height: 200px;  border-radius: 50%;  position: relative; top: 2em; ">
                    <div class="intro-text">
                        <span class="name"><?php echo $_SESSION['nombre'];?> </span>
                        <span class="skills">Bienvenidom a Asesorias en linea UPIIZ-IPN</span>
                    </div>
                </div>
            </div>
        </div>
    </header>