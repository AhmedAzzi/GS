<?php
require_once('identifier.php');
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changement de mot de passe</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    <script src="https://kit.fontawesome.com/1fafa1f3c8.js" crossorigin="anonymous"></script>
    <script src="../js/jquery-3.3.1.js"></script>
    <script src="../js/monjs.js"></script>
    <style>

.editPwd h1,h2{

color:#2e6da4;
}
.editPwd h1{

font-size: 50px;
font-weight: bold;
}
.editPwd h2{

font-size: 40px;
font-weight: bold;

}
.editPwd form{

width: 400px;
margin: auto;

}
.editPwd input{

margin-bottom: 20px;

}
.input-container {

position: relative;

}
.show-old-pwd,.show-new-pwd {
    position: absolute;
    top: 0px;
    right: -35px;
}
.clickable{
    cursor: pointer;
}
       </style> 
</head>
<body>

<div class="container editPwd" >
    <h1 class="text-center ">Changement de mot de passe</h1>

    <h2 class="text-center"> Compte :<?php echo $_SESSION['user']['login'] ?>    </h2>

    <form class="form-horizontal" method="post" action="updatePwd.php">


        <!-- ***************** Début Ancien mot de passe  ***************** -->
        <div class="input-container ">
            <input class="form-control oldpwd"
                   type="password"
                   name="oldpwd"
                   autocomplete="new-password"
                   placeholder="Taper votre Ancien Mot de passe"
                   required>
                   <i class="fa fa-eye fa-2x show-old-pwd clickable"></i>
        </div>


        <!-- ***************** Fin Ancien mot de passe ***************** -->

        <!--  *****************Début Nouveau  mot de passe  ***************** -->
        
        <div class="input-container">
            <input minlength=4
                    class="form-control newpwd"
                    type="password"
                    name="newpwd"
                    autocomplete="new-password"
                    placeholder="Taper votre Nouveau Mot de passe"
                    required>
           
                    <i class="fa fa-eye fa-2x show-new-pwd clickable"></i>
        </div>
        
        <div class="input-container">
            <input minlength=4
                    class="form-control newpwd"
                    type="password"
                    name="newpwd"
                    autocomplete="new-password"
                    placeholder="Retaper votre Nouveau Mot de passe"
                    required>
            
                    <i class="fa fa-eye fa-2x show-new-pwd clickable"></i>
        </div>
        <!--  *****************  Fin Nouveau  mot de passe   ***************** -->

        <!--  ***************** start submit field  ***************** -->
        
        <input
                type="submit"
                value="Enregistrer"
                class="btn btn-primary btn-block"/>

        <!--   ***************** end submit field  ***************** -->

    </form>
</div>

    
</body>
</html>