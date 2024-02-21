<?php
require_once('identifier.php');

require_once('connexiondb.php');
$idE = isset($_POST['idE']) ? $_POST['idE'] : 0;
$nom = isset($_POST['nom']) ? $_POST['nom'] : "";
$prenom = isset($_POST['prenom']) ? $_POST['prenom'] : "";

$idFiliere = isset($_POST['idFiliere']) ? $_POST['idFiliere'] : 1;
$date_naissance = isset($_POST['date_naissance']) ? $_POST['date_naissance'] : "";
$lieu_naissance = isset($_POST['lieu_naissance']) ? $_POST['lieu_naissance'] : "";
$adresse = isset($_POST['adresse']) ? $_POST['adresse'] : "";
$ville = isset($_POST['ville']) ? $_POST['ville'] : "";
$cin = isset($_POST['cin']) ? $_POST['cin'] : "";
$civilite = isset($_POST['civilite']) ? $_POST['civilite'] : "F";
$tel_domicile = isset($_POST['tel_domicile']) ? $_POST['tel_domicile'] : "";
$tel_professionnel = isset($_POST['tel_professionnel']) ? $_POST['tel_professionnel'] : "";
$gmail = isset($_POST['gmail']) ? $_POST['gmail'] : "";
$niveau_scolaire = isset($_POST['niveau_scolaire']) ? $_POST['niveau_scolaire'] : "";
$dernier_etablissement = isset($_POST['dernier_etablissement']) ? $_POST['dernier_etablissement'] : "";
$num_inscription = isset($_POST['num_inscription']) ? $_POST['num_inscription'] : "";
$date_inscription = isset($_POST['date_inscription']) ? $_POST['date_inscription'] : "";
$matricule = isset($_POST['matricule']) ? $_POST['matricule'] : "";
$anne_scolaire = isset($_POST['anne_scolaire']) ? $_POST['anne_scolaire'] : "";
$resultat = isset($_POST['resultat']) ? $_POST['resultat'] : "";


$nomPhoto = isset($_FILES['photo']['name']) ? $_FILES['photo']['name'] : "";
$imageTemp = $_FILES['photo']['tmp_name'];
move_uploaded_file($imageTemp, "../images/" . $nomPhoto);

echo $nomPhoto . "<br>";
echo $imageTemp;
if (!empty($nomPhoto)) {
    $requete = "update etudiant set nom=?,prenom=?,civilite=?,idFiliere=?,photo=?, date_naissance=? ,lieu_naissance=? ,adresse=?
         ,ville=? ,cin=?,tel_domicile=? ,tel_professionnel=?
          ,niveau_scolaire=? ,gmail=?  ,dernier_etablissement=? ,num_inscription=? 
          ,date_inscription=? ,matricule=? ,resultat=? ,annee_scolaire=?  where idEtudiant=?";
    $params = array(
        $nom, $prenom, $civilite, $idFiliere, $nomPhoto, $date_naissance, $lieu_naissance, $adresse, $ville, $cin, $tel_domicile, $tel_professionnel, $niveau_scolaire, $gmail, $dernier_etablissement, $num_inscription, $date_inscription, $matricule, $resultat, $annee_scolaire, $idE
    );
} else {
    $requete = "update etudiant set nom=?,prenom=?,civilite=?,idFiliere=?, date_naissance=? ,
        lieu_naissance=? ,adresse=? ,ville=? ,cin=?,tel_domicile=? ,tel_professionnel=? 
        ,niveau_scolaire=? ,gmail=?  ,dernier_etablissement=? ,num_inscription=?
         ,date_inscription=? ,matricule=? ,resultat=? ,annee_scolaire=?  where idEtudiant=?";
    $params = array(
        $nom, $prenom, $civilite, $idFiliere, $idS, $date_naissance, $lieu_naissance, $adresse, $ville, $cin, $tel_domicile, $tel_professionnel, $niveau_scolaire, $gmail, $dernier_etablissement, $num_inscription, $date_inscription, $matricule, $resultat, $annee_scolaire
    );
}

$resultat = $pdo->prepare($requete);
$resultat->execute($params);

header('location:etudiants.php');
