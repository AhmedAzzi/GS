<?php
    require_once('identifier.php');

    require_once('connexiondb.php');

    $idUser=isset($_GET['idUser'])?$_GET['idUser']:0;

    $requete="select * from utilisateur where iduser=$idUser";

    $resultat=$pdo->query($requete);
    $utilisateur=$resultat->fetch();
    $login=$utilisateur['login'];
    $email=$utilisateur['email'];
    $role=strtoupper($utilisateur['role']);

?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Edition d'un utilisateur</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
    <?php include("menu.php"); ?>
        
        <div class="container col-lg-offset-2">
                       &nbsp &nbsp
             <div class="panel panel-primary margetop">
                <div class="panel-heading">Edition de l'utilisateur :</div>
                <div class="panel-body">
                    <form method="post" action="updateUtilisateur.php" class="form">
						<div class="form-group">
                            <label for="idUser">id:<?php echo $idUser ?></label>
                            <input type="hidden" name="idUser" class="form-control" value="<?php echo $idUser ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="login">Login :</label>
                            <input type="text" name="login" placeholder="Login" class="form-control" value="<?php echo $login ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="email">Email :</label>
                            <input type="email" name="email" placeholder="email" class="form-control"
                                   value="<?php echo $email ?>"/>
                        </div>
                        <div class="form-group">
                        <label for="login">Rôle:</label>
                        <select name="role" class="form-control">
         
          <option value="ADMIN" <?php if($role=="ADMIN") echo "selected" ?>>Admin</option>
            <option value="DIRECTUER" <?php if($role=="DIRECTUER") echo "selected" ?>>Directeur</option>
            <option value="SECRAITAIRE" <?php if($role=="SECRAITAIRE") echo "selected" ?> >Secraitaire</option>
            <option value="ENSEIGNANT"<?php if($role=="ENSEIGNANT") echo "selected" ?> >Enseignant </option>
          </select>

                           </div>

				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-save"></span>
                            Enregistrer
                        </button>

                        <a href="editPwd.php">Changer le mot de passe</a>
                      
					</form>
                </div>
            </div>   
        </div>      
    </body>
</HTML>