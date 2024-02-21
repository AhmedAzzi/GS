<?php

require_once("connexiondb.php");

	$idE=$_GET['idE'];
	
	
	
	$requete="DELETE from etudiant where idEtudiant=?";
	
	$valeur=array($idE);
					
	$resultat=$pdo->prepare($requete);
	$resultat->execute($valeur);
	
	$msg= "Etudiant supprimé avec succés";
	/*$url="etudiants.php";	*/	
    header('location:etudiants.php');
	header("location:../message.php?msg=$msg&color=v");
  ?>
