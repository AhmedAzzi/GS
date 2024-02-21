<?php

/*require_once('role.php');*/

require_once("connexiondb.php");
$login = isset($_GET['login']) ? $_GET['login'] : "";

$size = isset($_GET['size']) ? $_GET['size'] : 3;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $size;

$requeteUser = "select * from utilisateur where login like '%$login%'";
$requeteCount = "select count(*) countUser from utilisateur";
$requeteEtudiant = "select * from etudiant";
$resultatEtudiant = $pdo->query($requeteEtudiant);

$resultatUser = $pdo->query($requeteUser);
$resultatCount = $pdo->query($requeteCount);

$tabCount = $resultatCount->fetch();
$nbrUser = $tabCount['countUser'];
$reste = $nbrUser % $size;
if ($reste === 0)
    $nbrPage = $nbrUser / $size;
else
    $nbrPage = floor($nbrUser / $size) + 1;
?>
<!DOCTYPE HTML>
<HTML>

<head>
    <meta charset="utf-8">
    <title>Gestion des utilisateurs</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    <script src="https://kit.fontawesome.com/1fafa1f3c8.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include("menu.php"); ?>

    <div class="container col-lg-offset-2">
        &nbsp &nbsp
        <div class="panel panel-primary margetop">
            <div class="panel-heading">Rechercher des utilisateurs</div>
            <div class="panel-body">
                <form method="get" action="utilisateurs.php" class="form-inline">
                    <div class="form-group">
                        <input type="text" name="login" placeholder="Login" class="form-control" value="<?php echo $login ?>" />
                    </div>
                    <button type="submit" class="btn btn-success">
                        <span class="glyphicon glyphicon-search"></span>

                    </button>
                    <a class="btn btn-primary" href="nouvelUtilisateur.php"><i class="fa-solid fa-plus"></i> Créer un compte</a>
                </form>
            </div>
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading">Liste des utilisateurs (<?php echo $nbrUser ?> utilisateurs)</div>
            <div class="panel-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>login</th>
                            <th>nom</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($user = $resultatUser->fetch()) { ?>
                            <tr class="<?php echo 'success' ?>">
                                <td><?php echo $user['login'] ?> </td>
                                <td><?php if ($user['role'] == 'etudiant') {
                                        echo $resultatEtudiant->fetch()['nom'];
                                    } else {
                                    }
                                    ?> </td>
                                <td><?php echo $user['role'] ?> </td>
                                <td>
                                    <a href="editerUtilisateur.php?idUser=<?php echo $user['iduser'] ?>">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    &nbsp;&nbsp;
                                    <a onclick="return confirm('Etes vous sur de vouloir supprimer cet utilisateur')" href="supprimerUtilisateur.php?idUser=<?php echo $user['iduser'] ?>">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                    &nbsp;&nbsp;
                                    <a href="activerUtilisateur.php?idUser=<?php echo $user['iduser'] ?>">
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>

</HTML>