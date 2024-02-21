<?php
	
	require_once("connexiondb.php");

	$id_matiere=$_GET['id_matiere'];		
	
	$requete="DELETE FROM matiere where id_matiere=?";
	
	$valeur=array($id_matiere);
	
	$resultat=$pdo->prepare($requete);
	
	$resultat->execute($valeur);
	
	$msg= "Matiere supprimée avec succès";
	/*$url="matieres.php";*/	
	header('location:matieres.php');  	
	header("location:../message.php?msg=$msg&color=v");
	
?>