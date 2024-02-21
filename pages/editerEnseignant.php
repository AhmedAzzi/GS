<?php
require_once('identifier.php');
require_once('connexiondb.php');
require_once('../les_fonctions/fonctions2.php');


$idS = isset($_GET['idS']) ? $_GET['idS'] : 0;
$requeteS = "select * from stagiaire where idStagiaire=$idS";
$resultatS = $pdo->query($requeteS);
$stagiaire = $resultatS->fetch();
$nom = $stagiaire['nom'];
$prenom = $stagiaire['prenom'];
$civilite = strtoupper($stagiaire['civilite']);
$idFiliere = $stagiaire['idFiliere'];
$nomPhoto = $stagiaire['photo'];

$niveau = $stagiaire['niveau'];
$classe = $stagiaire['classe'];
$date_naissance = $stagiaire['date_naissance'];
$lieu_naissance = $stagiaire['lieu_naissance'];
$adresse = $stagiaire['adresse'];
$ville = $stagiaire['ville'];
$cin = $stagiaire['cin'];

$tel_domicile = $stagiaire['tel_domicile'];
$tel_professionnel = $stagiaire['tel_professionnel'];


if (isset($_GET['annee_scolaire']))
    $annee_scolaire = $_GET['annee_scolaire'];
else
    $annee_scolaire = annee_scolaire_actuelle();



$requeteF = "select * from filiere";
$resultatF = $pdo->query($requeteF);

?>
<!DOCTYPE HTML>
<HTML>

<head>
    <meta charset="utf-8">
    <title>Edition d'un enseignant</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    <script src="https://kit.fontawesome.com/1fafa1f3c8.js" crossorigin="anonymous"></script>

</head>

<body>


    <div class="container">

        <div class="panel panel-primary margetop">
            <div class="panel-heading">Les infos du nouveau Enseignant :</div>
            <div class="panel-body">
                <form method="post" action="updateEnseignant.php" class="form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="idS">id: <?php echo $idS ?></label>
                        <input type="hidden" name="idS" class="form-control" value="<?php echo $idS ?>" />
                    </div>
                    <!-- <div class="form-group">
                                       <label for="nom">Nom :</label>
                                      <input type="text" name="nom" placeholder="Nom" class="form-control"/>
                                  </div>
                                  <div class="form-group">
                                       <label for="prenom">Prénom :</label>
                                      <input type="text" name="prenom" placeholder="Prénom" class="form-control"/>
                                  </div>-->
                    <div class="row my-row">
                        <label for="nom" class="control-label col-sm-2"> Nom: </label>
                        <div class="col-sm-4">
                            <input type="text" name="nom" id="nom" class="form-control" value="<?php echo $nom ?>" />
                        </div>


                        <label for="prenom" class="control-label col-sm-2"> Prénom: </label>

                        <div class="col-sm-4">

                            <input type="text" name="prenom" id="prenom" class="form-control" value="<?php echo $prenom ?>" />
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
                        <label for="gmail" class="control-label col-sm-2"> Gmail </label>
                        <div class="col-sm-4">
                            <input type="email" name="gmail" id="gmail" class="form-control" />
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
                            <input type="tel" name="tel_professionnel" id="tel_professionnel" class="form-control" />
                        </div>

                    </div>
                    &nbsp
                    <div class="row my-row">
                        <label for="idFiliere" class="control-label col-sm-2">Filière:</label>
                        <div class="col-sm-4">
                            <select name="idFiliere" class="form-control" id="idFiliere">
                                <?php while ($filiere = $resultatF->fetch()) { ?>
                                    <option value="<?php echo $filiere['idFiliere'] ?>" <?php if ($idFiliere === $filiere['idFiliere']) echo "selected" ?>>
                                        <?php echo $filiere['nomFiliere'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <label for="photo" class="control-label col-sm-2">Photo :</label>
                        <div class="col-sm-4">
                            <input type="file" name="photo" />
                        </div>
                    </div>
                    &nbsp
                    <div class="row my-row">
                        <label for="classe" class="control-label col-sm-2">Classe: </label>
                        <div class="col-sm-4">
                            <input type="text" name="classe" id="classe" class="form-control" value="<?php echo $classe ?>" />
                        </div>

                        <label for="niveau" class="control-label col-sm-2">Niveau:</label>
                        <div class="col-sm-4">



                            <select name="niveau" class="form-control" id="niveau">
                                <option value="all" <?php if ($niveau == "all") echo "selected" ?>>Tous les niveaux</option>
                                <option value="Crèche" <?php if ($niveau == "Crèche") echo "selected" ?>>Crèche</option>
                                <option value="Maternelle" <?php if ($niveau == "Maternelle") echo "selected" ?>>Maternelle</option>
                                <option value="Collège" <?php if ($niveau == "Collège") echo "selected" ?>>Collège</option>
                                <option value="Lycée" <?php if ($niveau == "Lycée") echo "selected" ?>>Lycée </option>
                            </select>
                        </div>
                        &nbsp
                        <div class="row my-row">
                            <label class="control-label col-sm-2"> &nbsp &nbsp Année scolaire: &nbsp</label>
                            <div class="col-sm-4">
                                <select class="form-control" value="<?php echo $annee_scolaire ?>" name="annee_scolaire">

                                    <?php
                                    $les_annees = les_annee_scolaire();
                                    foreach ($les_annees as $annee_sc) {
                                    ?>
                                        <option <?php if ($annee_sc === $annee_scolaire)  echo 'selected' ?>>
                                            <?php echo $annee_sc; ?>
                                        </option>

                                    <?php } ?>
                                </select>
                            </div>
                            <label for="civilite" class="control-label col-sm-2">Civilité :</label>
                            <div class="col-sm-4">
                                <div class="radio">
                                    <label><input type="radio" name="civilite" value="F" checked /> F </label>
                                    <label><input type="radio" name="civilite" value="M" /> M </label>
                                </div>
                            </div>
                        </div>
                        <br>
                        &nbsp &nbsp &nbsp &nbsp <button type="submit" class="btn btn-success">
                            <i class="fa-solid fa-floppy-disk"></i>
                            Enregistrer
                        </button>
                </form>

            </div>
        </div>
    </div>
</body>

</HTML>