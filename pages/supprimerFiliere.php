
<?php
    require_once('identifier.php');

    require_once('connexiondb.php');
    $idf=isset($_GET['idF'])?$_GET['idF']:0;
    
    $requeteEtud="select count(*) countEtud from etudiant  where idFiliere=$idf";
    $resultatEtud=$pdo->query($requeteEtud);
    $tabCountEtud=$resultatEtud->fetch();
    $nbrEtud=$tabCountEtud['countEtud'];


    if($nbrEtud==0){
       $requete="delete from filiere  where idFiliere=?";
       $params=array($idf);
       $resultat=$pdo->prepare($requete);
       $resultat->execute($params);
       header('location:filieres.php');
    }else{
        $msg="Suppression impossible: Vous devez supprimer tous les étudiants inscris dans cette filière";
        header("location:alerte.php?message=$msg");

    }
    
   
?>