<?php
require_once('identifier.php');

require_once('connexiondb.php');
$idE = isset($_GET['idE']) ? $_GET['idE'] : 0;
$requete = "select * from etudiant where idEtudiant=$idE";
$resultat = $pdo->query($requete);
$etudiant = $resultat->fetch();
$nom = $etudiant['nom'];
$prenom = $etudiant['prenom'];
$date_naissance = $etudiant['date_naissance'];
$lieu_naissance = $etudiant['lieu_naissance'];
$adresse = $etudiant['adresse'];
$ville = $etudiant['ville'];
$cin = $etudiant['cin'];
$civilite = $etudiant['civilite'];
$tel_domicile = $etudiant['tel_domicile'];
$tel_professionnel = $etudiant['tel_professionnel'];
$gmail = $etudiant['gmail'];
$niveau_scolaire = $etudiant['niveau_scolaire'];
$dernier_etablissement = $etudiant['dernier_etablissement'];
$num_inscription = $etudiant['num_inscription'];
$date_inscription = $etudiant['date_inscription'];
$matricule = $etudiant['matricule'];
$photo = $etudiant['photo'];
$idFiliere = $etudiant['idFiliere'];
$anne_scolaire = $etudiant['num_inscription'];
$resultat = $etudiant['resultat'];

$requeteF = "select * from filiere ";
$resultatF = $pdo->query($requeteF);


?>





<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Editer Filière</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/monstyle.css">
	<script src="https://kit.fontawesome.com/1fafa1f3c8.js" crossorigin="anonymous"></script>

</head>

<body>

	<div class="container">

		<div class="panel panel-primary margetop ">
			<div class="panel-heading">Editer étudiant</div>
			<div class="panel-body">
				<form method="post" action="updateEtudiant.php" class="form">
					<div class="form-group">
						<label for="idE">Nº: <?php echo $idE ?></label>
						<input type="hidden" name="idE" class="form-control" value="<?php echo $idE ?>" />
					</div>
					<div class="row my-row">
						<label for="nom" class="control-label col-sm-2"> Nom: </label>
						<div class="col-sm-4">
							<input type="text" name="nom" id="nom" class="form-control" value="<?php echo $etudiant['nom'] ?>" />
						</div>


						<label for="prenom" class="control-label col-sm-2"> Prénom: </label>

						<div class="col-sm-4">

							<input type="text" name="prenom" id="prenom" class="form-control" value="<?php echo $etudiant['prenom'] ?>">
						</div>


					</div>

					&nbsp
					<div class="row my-row">
						<label for="date_naissance" class="control-label col-sm-2"> Date de naissance: </label>
						<div class="col-sm-4">
							<input type="date" name="date_naissance" id="date_naissance" class="form-control calendar" value="<?php echo $date_naissance ?>">
						</div>

						<label for="lieu_naissance" class="control-label col-sm-2">Lieu de naissance: </label>
						<div class="col-sm-4">
							<input type="text" name="lieu_naissance" id="lieu_naissance" class="form-control" value="<?php echo $lieu_naissance ?>">
						</div>

					</div>
					&nbsp
					<div class="row my-row">
						<label for="adresse" class="control-label col-sm-2"> Adresse: </label>
						<div class="col-sm-4">
							<input type="text" name="adresse" id="adresse" class="form-control" value="<?php echo $adresse ?>">
						</div>

						<label for="ville" class="control-label col-sm-2"> Ville: </label>
						<div class="col-sm-4">
							<input type="text" name="ville" id="ville" class="form-control" value="<?php echo $ville ?>">
						</div>

					</div>

					&nbsp
					<div class="row my-row">
						<label for="cin" class="control-label col-sm-2"> Cin </label>
						<div class="col-sm-4">
							<input type="text" name="cin" id="cin" class="form-control" value="<?php echo $cin ?>">
						</div>

						<label for="civilite" class="control-label col-sm-2"> Civilite: </label>
						<div class="col-sm-4">
							<select name="civilite" class="form-control" id="civlite">

								<option value="Homme">Homme</option>
								<option value="Femme">Femme</option>


							</select>

						</div>


					</div>
					&nbsp
					<div class="row my-row">
						<label for="tel_domicile" class="control-label col-sm-2"> Tél Domicile: </label>
						<div class="col-sm-4">
							<input type="text" name="tel_domicile" id="tel_domicile" class="form-control" value="<?php echo $tel_domicile ?>">
						</div>

						<label for="tel_professionnel" class="control-label col-sm-2"> Tél Professionnel: </label>
						<div class="col-sm-4">
							<input type="text" name="tel_professionnel" id="tel_professionnel" class="form-control" value="<?php echo $tel_professionnel ?>">
						</div>

					</div>
					&nbsp
					<div class="row my-row">
						<label for="gmail" class="control-label col-sm-2"> Gmail: </label>
						<div class="col-sm-4">
							<input type="text" name="gmail" id="gmail" class="form-control" value="<?php echo $gmail ?>">
						</div>

						<label for="niveau_scolaire" class="control-label col-sm-2"> Niveau Scolaire: </label>
						<div class="col-sm-4">
							<select name="niveau" class="form-control" id="niveau">

								<option value="Crèche">Crèche</option>
								<option value="Maternelle">Maternelle</option>
								<option value="Collège">Collège</option>
								<option value="Lycée">Lycée </option>

							</select>
						</div>

					</div>
					&nbsp
					<div class="row my-row">
						<label for="dernier_etablissement" class="control-label col-sm-2"> Dernier Etablissement: </label>
						<div class="col-sm-4">
							<input type="text" name="dernier_etablissement" id="dernier_etablissement" class="form-control" value="<?php echo $dernier_etablissement ?>">
						</div>

						<label for="num_inscription" class="control-label col-sm-2"> Nº inscription: </label>
						<div class="col-sm-4">
							<input type="text" name="num_inscription" id="num_inscription" class="form-control" value="<?php echo $num_inscription ?>">
						</div>

					</div>

					&nbsp
					<div class="row my-row">
						<label for="date_inscription" class="control-label col-sm-2"> Date inscription: </label>
						<div class="col-sm-4">
							<input type="text" name="date_inscription" id="date_inscription" class="form-control" value="<?php echo $date_inscription ?>">
						</div>

						<label for="matricule" class="control-label col-sm-2"> Code massar: </label>
						<div class="col-sm-4">
							<input type="text" name="matricule" id="matricule" class="form-control" value="<?php echo $matricule ?>">
						</div>

					</div>
					&nbsp
					<div class="row my-row">
						<label for="photo" class="control-label col-sm-2"> Photo: </label>
						<div class="col-sm-4">

							<input type="file" name="photo" />

						</div>

						<label for="idFiliere" class="control-label col-sm-2"> Filiere: </label>

						<div class="col-sm-4">

							<select name="idFiliere" class="form-control" id="idFiliere">
								<?php while ($filiere = $resultatF->fetch()) { ?>
									<option value="<?php echo $filiere['idFiliere'] ?>" <?php if ($idFiliere === $filiere['idFiliere']) echo "selected" ?>>
										<?php echo $filiere['nomFiliere'] ?>
									</option>
								<?php } ?>
							</select>

						</div>
						&nbsp
						<div class="row my-row">

							<label for="anne_scolaire" class="control-label col-sm-2"> &nbsp &nbsp Annee Scolaire: </label>
							<div class="col-sm-4">
								<select name="anne_scolaire" class="form-control" id="anne_scolaire">

									<option value="2018/2019">2018/2019</option>
									<option value="2019/2020">2019/2020</option>
									<option value="2020/2021">2020/2021</option>
									<option value="2021/2022">2021/2022 </option>
									<option value="2022/2023"> 2022/2023</option>

								</select>
							</div>
							<label for="gmail" class="control-label col-sm-2"> Gmail: </label>
							<div class="col-sm-4">
								<input type="text" name="gmail" id="gmail" class="form-control" value="<?php echo $gmail ?>">
							</div>

						</div>


						<br>
						&nbsp &nbsp <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Enregistrer</button>


					</div>
</body>

</html>