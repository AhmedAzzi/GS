<?php
  require_once('identifier.php');

    require_once('connexiondb.php');
    $idf=isset($_GET['idF'])?$_GET['idF']:0;
    $requete="select * from filiere where idFiliere=$idf";
    $resultat=$pdo->query($requete);
    $filiere=$resultat->fetch();
    $nomf=$filiere['nomFiliere'];
    $niveau=strtolower($filiere['niveau']);
    $Classe=$filiere['classe'];
    $FraisD=$filiere['fraisD'];
    $FraisM=$filiere['fraisM'];
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editer Filière</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    <script src="https://kit.fontawesome.com/1fafa1f3c8.js" crossorigin="anonymous"></script>
</head>
<body>
<?php include("menu.php"); ?>
<div class="container">
       
        <div class="panel panel-primary margetop ">
            <div class="panel-heading">Edition De La Filière</div>
            <div class="panel-body">
            <form method="post" action="updateFiliere.php" class="form">
            <div class="form-group">
        <label for="niveau">Nº: <?php echo $idf ?></label>
        <input type="hidden" name="idF"   class="form-control" value="<?php echo $idf ?>"/>
    </div>          
     <div class="form-group">
        <label for="niveau">Nom de la filière:</label>
        <input type="text" name="nomF"   class="form-control" value="<?php echo $nomf ?>"/>
    </div> 
   
          <label for="niveau">Niveau:</label>
          &nbsp
          <select name="niveau" class="form-control" id="niveau">
    
             <option value="Crèche" >Crèche</option>
            <option value="Maternelle">Maternelle</option>
            <option value="Collège" >Collège</option>
            <option value="Lycée" >Lycée </option>
            
          </select>
          &nbsp
          <div class="form-group">
        <label for="niveau">Classe:</label>
        <input type="text" name="Classe" placeholder="Taper le nom de la classe"   class="form-control" value="<?php echo $Classe ?>"/>
        &nbsp
           </div>
          <div class="form-group">
        <label for="niveau">Frais D'inscription::</label>
        <input type="text" name="FraisD"    class="form-control" value="<?php echo $FraisD?>"/>
    </div>  
    &nbsp
          <div class="form-group">
        <label for="niveau">Frais Mensuel:</label>
        <input type="text" name="FraisM"    class="form-control" value="<?php echo $FraisM ?>"/>
    </div>  
        <br>
          <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Enregistrer</button>
      
     
       
        </form>
            </div>
        </div>
    </div>
</body>
</html>