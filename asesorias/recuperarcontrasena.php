<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/login.css" rel="stylesheet">
    
        <script src="js/jquery.js"></script>
    <script src="js/jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="validaremail.js"></script>


</head>

<body>

    <div class="container">
        <div class="card card-container">
            <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> 
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" id="frmRestablecer">
                <input type="text" name="email" id="email" class="form-control" placeholder="E-mail"  required autofocus>
                <div id="mensaje" ><br/></div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" id="campo3" name="login" type="submit" value="Recuperar">Recuperar</button>
            </form><!-- /form -->
        </div><!-- /card-container -->
    </div><!-- /container -->

</body>

</html>
