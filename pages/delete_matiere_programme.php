<?php

require_once("connexiondb.php");

	$id_prog=$_GET['id_prog'];
	
	$id_filiere=$_GET['id_filiere'];
    $annee_scolaire=$_GET['annee_scolaire'];
    $index_classe=$_GET['index_classe'];
    
	$requete="DELETE from programme where id_prog=?";
	
	$valeur=array($id_prog);
					
	$resultat=$pdo->prepare($requete);
	$resultat->execute($valeur);
	
	$msg= "Matière retirée du programme avec succés";
	$url="programmes.php?annee_scolaire=$annee_scolaire&index_classe=$index_classe&id_filiere=$id_filiere";		
	header("location:../message.php?msg=$msg&color=v&url=$url");
	
	
?>