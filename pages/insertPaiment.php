<?php
    require_once('identifier.php');

    require_once('connexiondb.php');
    
    $nom=isset($_POST['nom'])?$_POST['nom']:"";
    $prenom=isset($_POST['prenom'])?$_POST['prenom']:"";
    $annee_scolaire=isset($_POST['annee_scolaire'])?$_POST['annee_scolaire']:"";
    $Classe=isset($_POST['Classe'])?$_POST['Classe']:"";
    $niveau=isset($_POST['niveau'])?$_POST['niveau']:"";
    $typeP=isset($_POST['typeP'])?$_POST['typeP']:"";

    $montantP=isset($_POST['montantP'])?$_POST['montantP']:"";
    $dateP=isset($_POST['dateP'])?$_POST['dateP']:"";

    $mois=isset($_POST['mois'])?$_POST['mois']:"";


   
    
   
   
    
    $requete="insert into paiement(nom,prenom,annee_scolaire,classe,niveau,typeP,montantP,dateP,mois) values(?,?,?,?,?,?,?,?,?)";
    $params=array($nom,$prenom, $annee_scolaire,$Classe,$niveau,$typeP,$montantP, $dateP,$mois);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:paiement.php');
?>