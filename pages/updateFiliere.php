
<?php
    require_once('identifier.php');

    require_once('connexiondb.php');
    $idf=isset($_POST['idF'])?$_POST['idF']:0;
    $nomf=isset($_POST['nomF'])?$_POST['nomF']:"";
    $niveau=isset($_POST['niveau'])?$_POST['niveau']:"";
    $Classe=isset($_POST['Classe'])?$_POST['Classe']:"";
    $FraisD=isset($_POST['FraisD'])?$_POST['FraisD']:"";
    $FraisM=isset($_POST['FraisM'])?$_POST['FraisM']:"";

   
    
    $requete="update filiere set nomFiliere=?,niveau=?,classe=?,fraisD=?,fraisM=? where idFiliere=?";
    $params=array($nomf,$niveau,$Classe,$FraisD,$FraisM,$idf);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:filieres.php');
?>