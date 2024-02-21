<?php
require_once('identifier.php');
require_once('connexiondb.php');

$nom = isset($_POST['nom']) ? $_POST['nom'] : "";
$prenom = isset($_POST['prenom']) ? $_POST['prenom'] : "";
$matricule = isset($_POST['matricule']) ? $_POST['matricule'] : "";
$civilite = isset($_POST['civilite']) ? $_POST['civilite'] : "";
$annee_scolaire = isset($_POST['annee_scolaire']) ? $_POST['annee_scolaire'] : "";
$idFiliere = isset($_POST['idFiliere']) ? $_POST['idFiliere'] : "";
$resultat = isset($_POST['resultat']) ? $_POST['resultat'] : "";
$photo = isset($_FILES['photo']['name']) ? $_FILES['photo']['name'] : "";
$imageTemp = isset($_FILES['photo']['tmp_name']) ? $_FILES['photo']['tmp_name'] : "";
move_uploaded_file($imageTemp, "../images/" . $photo);
// Data to be inserted into the etudiant table
$data = array(
    array($nom, $prenom, $matricule, $civilite, $annee_scolaire, $idFiliere, $resultat, $photo),
);

// SQL query template
$requete = "INSERT INTO etudiant (nom, prenom, matricule, civilite, annee_scolaire, idFiliere, resultat, photo) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

// Prepare the statement
$resultat = $pdo->prepare($requete);

// Execute the insertion for each row of data
foreach ($data as $row) {
    $resultat->execute($row);
}

// Redirect to etudiants.php after insertion
header('location:etudiants.php');
exit(); // Ensure script execution stops after redirection
