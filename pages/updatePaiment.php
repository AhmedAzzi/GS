<?php
    require_once('identifier.php');

    require_once('connexiondb.php');

    $idP=isset($_GET['idP'])?$_GET['idP']:1;
    $nom=isset($_POST['nom'])?$_POST['nom']:"";
    $prenom=isset($_POST['prenom'])?$_POST['prenom']:"";
    $annee_scolaire=isset($_POST['annee_scolaire'])?$_POST['annee_scolaire']:"";
    $Classe=isset($_POST['Classe'])?$_POST['Classe']:"";
    $niveau=isset($_POST['niveau'])?$_POST['niveau']:"";
    $typeP=isset($_POST['typeP'])?$_POST['typeP']:"";

    $montantP=isset($_POST['montantP'])?$_POST['montantP']:"";
    $dateP=isset($_POST['dateP'])?$_POST['dateP']:"";

    $mois=isset($_POST['mois'])?$_POST['mois']:"";


   
    
   
   
    
    $requete="update paiement set nom=?,prenom=?,annee_scolaire=?,classe=?,niveau=?,typeP=?,montantP=?,dateP=?,mois=?,idPaiment=?";
    $params=array($nom,$prenom, $annee_scolaire,$Classe,$niveau,$typeP,$montantP, $dateP,$mois,$idP);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:paiement.php');
?>