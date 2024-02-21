<?php

require_once("connexiondb.php");

	$idP=$_GET['idP'];
	
	
	
	$requete="DELETE from paiement where idPaiment=?";
	
	$valeur=array($idP);
					
	$resultat=$pdo->prepare($requete);
	$resultat->execute($valeur);
	
	$msg= "Etudiant supprimé avec succés";
	/*$url="etudiants.php";	*/	
    header('location:paiement.php');
	header("location:../message.php?msg=$msg&color=v");
  ?>
