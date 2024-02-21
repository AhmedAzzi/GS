<?php

	
require_once("connexiondb.php");
		
	$nom=$_POST['nom_matiere'];
	$nombre_heure_total=$_POST['nombre_heure_total'];
	$nombre_heure_tp=$_POST['nombre_heure_tp'];
	$nombre_heure_th=$_POST['nombre_heure_th'];
	$coef=$_POST['coef'];

	$requete_insert_matiere="INSERT INTO matiere VALUES(?,?,?,?,?,?)";
	$valeurs_insert_matiere=array(
                        NULL,
                        $nom,
                        $nombre_heure_total,
                        $nombre_heure_tp,
                        $nombre_heure_th,
                        $coef);
					
	$resultat_insert_matiere=$pdo->prepare($requete_insert_matiere);
	$resultat_insert_matiere->execute($valeurs_insert_matiere);
	/*header('location:matieres.php');*/
	$msg= "Matiere ajoutée avec succès";
	/*$url= "matieres.php";*/
	header('location:matieres.php');   
	header("location:../message.php?msg=$msg&color=v");
	
	
?>