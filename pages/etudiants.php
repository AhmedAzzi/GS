<?php
require_once('identifier.php');
require_once("connexiondb.php");

$nomPrenom = isset($_GET['nomPrenom']) ? $_GET['nomPrenom'] : "";
$idfiliere = isset($_GET['idfiliere']) ? $_GET['idfiliere'] : 0;

$size = isset($_GET['size']) ? $_GET['size'] : 3;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $size;


$requeteFiliere = "select * from filiere";

if ($idfiliere == 0) {
    $requeteEtudiant = "select  idEtudiant,nom,prenom,matricule,civilite,annee_scolaire,nomFiliere,resultat,photo
            from filiere as f,etudiant as e
            where f.idFiliere=e.idFiliere
            and (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%')
            order by idEtudiant
            limit $size
            offset $offset";

    $requeteCount = "select count(*) countE from etudiant
                where nom like '%$nomPrenom%' or prenom like '%$nomPrenom%'";
} else {
    $requeteEtudiant = "select idEtudiant,nom,prenom, matricule,civilite,annee_scolaire,nomFiliere,resultat,photo
                from filiere as f,etudiant as e
                where f.idFiliere=e.idFiliere
                and (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%')
                and f.idFiliere=$idfiliere
                order by idEtudiant
                limit $size
                offset $offset";

    $requeteCount = "select count(*) countE from etudiant
                where (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%')
                and idFiliere=$idfiliere";
}

$resultatFiliere = $pdo->query($requeteFiliere);
$resultatEtudiant = $pdo->query($requeteEtudiant);
$resultatCount = $pdo->query($requeteCount);

$tabCount = $resultatCount->fetch();
$nombreEtudiant = $tabCount['countE'];
$reste = $nombreEtudiant % $size;
if ($reste === 0)
    $nbrPage = $nombreEtudiant / $size;
else
    $nbrPage = floor($nombreEtudiant / $size) + 1;

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des etudiants</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    <script src="https://kit.fontawesome.com/1fafa1f3c8.js" crossorigin="anonymous"></script>

</head>

<body>

    <?php include("menu.php"); ?>
    <div class="container col-lg-offset-2">
        <h1 class="text-center margetop"><strong> Liste des étudiants </strong> </h1>
        <div class="panel panel-primary ">
            <div class="panel-heading">Listes des étudiants( <?php echo $nombreEtudiant ?> Etudiants)</div>
            <div class="panel-body">
                <form method="get" action="etudiants.php" class="form-inline">
                    <div class="form-group">
                        <input type="text" name="nomPrenom" placeholder="Nom et Prenom" class="form-control" />
                    </div>
                    &nbsp
                    <label for="idfiliere">Filière:</label>
                    &nbsp
                    <select name="idfiliere" class="form-control" id="idfiliere" onchange="this.form.submit()">
                        <option value=0>Toutes les filières</option>
                        <?php while ($filiere = $resultatFiliere->fetch()) { ?>
                            <option value="<?php echo $filiere['idFiliere'] ?>" <?php if ($filiere['idFiliere'] === $idfiliere) echo "selected" ?>>
                                <?php echo $filiere['nomFiliere'] ?>
                            </option>
                        <?php } ?>
                    </select>
                    &nbsp
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
                    &nbsp
                    <?php if ($_SESSION['user']['role'] == 'ADMIN') { ?>
                        <a class="btn btn-primary" href="nouveauEtudiant.php"><i class="fa-solid fa-plus"></i> Nouveau Etudiant</a>
                    <?php } ?>
                </form>
            </div>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nº</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Matricule</th>
                    <th>Civilite</th>
                    <th>Année scolaire</th>
                    <th>Filière</th>
                    <th>Résultat</th>
                    <th>Photos</th>
                    <!-- <?php if ($_SESSION['user']['role'] == 'ADMIN') { ?><th>Action</th><?php } ?> -->
                </tr>
            </thead>

            <tbody>
                <?php while ($etudiant = $resultatEtudiant->fetch()) { ?>
                    <tr>
                        <td><?php echo $etudiant['idEtudiant'] ?> </td>
                        <td><?php echo $etudiant['nom'] ?> </td>
                        <td><?php echo $etudiant['prenom'] ?> </td>
                        <td><?php echo $etudiant['matricule'] ?> </td>
                        <td><?php echo $etudiant['civilite'] ?> </td>
                        <td><?php echo $etudiant['annee_scolaire'] ?> </td>
                        <td><?php echo $etudiant['nomFiliere'] ?> </td>
                        <td><?php echo $etudiant['resultat'] ?> </td>
                        <td><img src="../images/<?php echo $etudiant['photo'] ?>" width="40px" height="40px" class="img-circle"> </td>
                        <?php if ($_SESSION['user']['role'] == 'ADMIN') { ?>
                            <td>
                                <a class="btn btn-success btn-edit-delete" href="editerEtudiant.php?idE=<?php echo $etudiant['idEtudiant'] ?>"> <i class="fa fa-edit"></i></a> &nbsp
                                <a onclick="return confirm('Etes vous sur de vouloir supprimer ce etudiant?')" class="btn btn-danger btn-edit-delete" href="supprimerEtudiant.php?idE=<?php echo $etudiant['idEtudiant'] ?>"> <span class="glyphicon glyphicon-trash"></span></a> &nbsp
                                <a class="btn btn-primary btn-edit-delete" href="imprimerEtudiant.php"> <i class="fa-solid fa-print"></i></a>
                            </td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="text-center">
            <ul class="pagination">
                <?php for ($i = 1; $i <= $nbrPage; $i++) { ?>
                    <li class="<?php if ($i == $page) echo 'active' ?>">
                        <a href="etudiants.php?page=<?php echo $i; ?>&nomPrenom=<?php echo $nomPrenom ?>&idfiliere=<?php echo $idfiliere ?>">
                            <?php echo $i; ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
</body>

</html>