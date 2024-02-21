<?php
session_start();
if (isset($_SESSION['erreurLogin']))
    $erreurLogin = $_SESSION['erreurLogin'];
else {
    $erreurLogin = "";
}
session_destroy();
?>
<!DOCTYPE HTML>
<HTML>
<head>
    <meta charset="utf-8">
    <title>Se connecter</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    <script src="https://kit.fontawesome.com/1fafa1f3c8.js" crossorigin="anonymous"></script>
    <style>

. input{
   position: absolute;
}



        </style>
    
</head>
<body>
<div class="container col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
    &nbsp &nbsp
    <div class="panel panel-primary ">
        <div class="panel-heading ">Se connecter :</div>
        <div class="panel-body">
            <form method="post" action="seConnecter.php" class="form">

                <?php if (!empty($erreurLogin)) { ?>
                    <div class="alert alert-danger">
                        <?php echo $erreurLogin ?>
                    </div>
                <?php } ?>

                <div class="form-group">
                    <label for="login">Login :</label>
                    <input type="text" name="login" placeholder="Login"
                           class="form-control" autocomplete="off"/>
                </div>

                <div class="form-group">
                    <label for="pwd">Mot de passe :</label>
                    <input type="password" name="pwd"  id="pwd"
                           placeholder="Mot de passe" class="form-control" />
<br>                           <input type="checkbox" onClick="changer()"/> <strong color="blue">Afficher mode passe</strong>
                </div>
                

                <button type='submit' class="btn btn-primary btn-block"> 
								 Se connecter 
							</button> 
                <!--<button type="submit" class="btn btn-success">
                    <span class="glyphicon glyphicon-log-in"></span>
                    Se connecter
                </button>-->
                &nbsp
                <p class="text">
                    <a href="initialiserPwd.php">Mot de passe Oublié</a>

                   
                </p>
            </form>
            <script>
               e=true;
               function changer(){
                    if(e){
                        document.getElementById("pwd").setAttribute("type","text");
                        e=false;
                    }
                    else{
                        document.getElementById("pwd").setAttribute("type","password");
                        e=true;
                    }

               }

                </script>
        </div>
    </div>
</div>
</body>
</HTML>