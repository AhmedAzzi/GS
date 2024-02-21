<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    $nom=isset($_POST['nom'])?$_POST['nom']:"";
    
   

   
    $niveau=isset($_POST['niveau'])?$_POST['niveau']:"";
    $classe=isset($_POST['classe'])?$_POST['classe']:"";

    $annee_scolaire=isset($_POST['annee_scolaire'])?$_POST['annee_scolaire']:"";
   

    

    $requete="insert into emplois(nom,niveau,classe,annee_scolaire) values(?,?,?,?)";
    $params=array($nom,$niveau,$classe,$annee_scolaire);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:emplois.php');

?>