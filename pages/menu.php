<?php
require_once('identifier.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/1fafa1f3c8.js" crossorigin="anonymous"></script>
  <title>Menu</title>

  <style>
    /*@import url('https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap');*/

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      list-style: none;
      text-decoration: none;
      font-family: 'Josefin Sans', sans-serif;
    }

    body {
      padding-top: 60px;
      background-color: #f3f5f9;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a href="../index.php" class="navbar-brand"> Gestion de Scolarites</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="filieres.php"><i class="fas fa-tags"></i> Filières </a></li>
        <li><a href="etudiants.php"><i class="fa fa-id-card"></i> Etudiants</a></li>
        <li><a href="enseignant.php"><i class="fa fa-chalkboard-teacher"></i> Enseignants</a></li>
        <li><a href="matieres.php"><i class="fa-brands fa-markdown"></i> Matiéres</a></li>
        <li><a href="programmes.php"><i class="fa fa-product-hunt"></i> Programmes</a></li>
        <li><a href="emplois.php"><span class="glyphicon glyphicon-calendar"></span> Emplois</a></li>
        <li><a href="paiement.php"><i class="fa-solid fa-coins"></i> Paiement</a></li>
        <li><a href="utilisateurs.php"><i class="fa-solid fa-users"></i> Utilisateurs</a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="editerUtilisateur.php?idUser=<?php echo $_SESSION['user']['iduser'] ?>">
            <i class="fa fa-user-circle-o"></i>
            <?php echo  ' ' . $_SESSION['user']['login'] ?>
          </a>
        </li>
        <li>
          <a href="seDeconnecter.php">
            <i class="fa fa-sign-out"></i>
            &nbsp Se déconnecter
          </a>
        </li>
      </ul>
    </div>
  </nav>



</body>

</html>