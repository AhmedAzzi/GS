<?php
require_once('identifier.php');

require_once('connexiondb.php');

$requeteF = "select * from filiere ";
$resultatF = $pdo->query($requeteF);


?>





<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Nouveau Etudiant </title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/monstyle.css">
	<script src="https://kit.fontawesome.com/1fafa1f3c8.js" crossorigin="anonymous"></script>

</head>

<body style="margin: 100px;">

	<div class="container">

		<div class="panel panel-primary">
			<div class="panel-heading">Ajouter étudiant</div>
			<div class="panel-body">
				<form method="post" action="insertEtudiant.php" class="form">
					<div class="row my-row">
						<label for="nom" class="control-label col-sm-2"> Nom: </label>
						<div class="col-sm-4">
							<input type="text" name="nom" id="nom" class="form-control" />
						</div>
						<label for="prenom" class="control-label col-sm-2"> Prénom: </label>
						<div class="col-sm-4">
							<input type="text" name="prenom" id="prenom" class="form-control" />
						</div>
					</div>
					&nbsp
					<div class="row my-row">
						<label for="calendar1" class="control-label col-sm-2"> Date de naissance: </label>
						<div class="col-sm-4">
							<input type="date" name="date_naissance" id="date_naissance" class="form-control " />
						</div>
						<label for="lieu_naissance" class="control-label col-sm-2">Lieu de naissance: </label>
						<div class="col-sm-4">
							<input type="text" name="lieu_naissance" id="lieu_naissance" class="form-control" />
						</div>
					</div>
					&nbsp
					<div class="row my-row">
						<label for="adresse" class="control-label col-sm-2"> Adresse: </label>
						<div class="col-sm-4">
							<input type="text" name="adresse" id="adresse" class="form-control" />
						</div>

						<label for="ville" class="control-label col-sm-2"> Ville: </label>
						<div class="col-sm-4">
							<input type="text" name="ville" id="ville" class="form-control" />
						</div>
					</div>
					&nbsp
					<div class="row my-row">
						<label for="cin" class="control-label col-sm-2"> Cin </label>
						<div class="col-sm-4">
							<input type="text" name="cin" id="cin" class="form-control" />
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
							<input type="text" name="tel_domicile" id="tel_domicile" class="form-control" />
						</div>

						<label for="tel_professionnel" class="control-label col-sm-2"> Tél Professionnel: </label>
						<div class="col-sm-4">
							<input type="text" name="tel_professionnel" id="tel_professionnel" class="form-control" />
						</div>

					</div>
					&nbsp
					<div class="row my-row">
						<label for="gmail" class="control-label col-sm-2"> Gmail: </label>
						<div class="col-sm-4">
							<input type="text" name="gmail" id="gmail" class="form-control" />
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
							<input type="text" name="dernier_etablissement" id="dernier_etablissement" class="form-control" />
						</div>

						<label for="num_inscription" class="control-label col-sm-2"> Nº inscription: </label>
						<div class="col-sm-4">
							<input type="text" name="num_inscription" id="num_inscription" class="form-control" />
						</div>

					</div>
					&nbsp
					<div class="row my-row">
						<label for="date_inscription" class="control-label col-sm-2"> Date inscription: </label>
						<div class="col-sm-4">
							<input type="text" name="date_inscription" id="date_inscription" class="form-control" />
						</div>

						<label for="matricule" class="control-label col-sm-2"> Matricule: </label>
						<div class="col-sm-4">
							<input type="text" name="matricule" id="matricule" class="form-control" />
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
									<option value="<?php echo $filiere['idFiliere'] ?>" |>

										<?php echo $filiere['nomFiliere'] ?>
									</option>
								<?php } ?>
							</select>

						</div>
						&nbsp
						<div class="row my-row">
							<label for="anne_scolaire" class="control-label col-sm-2"> &nbsp &nbsp Annee Scolaire: </label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="anne_scolaire" id="anne_scolaire">
							</div>

						</div>
						<br>
						&nbsp &nbsp <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Enregistrer</button>

</body>

</html>