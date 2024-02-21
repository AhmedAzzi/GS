<?php
require_once('identifier.php');
require_once("connexiondb.php");

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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <style>
        body {
            padding-top: 60px;
        }

        /* Slider */
        .slider-container {
            overflow: hidden;
            position: relative;
            width: 100%;
            margin: 30px auto;
        }

        .slides {
            display: flex;
            transition: transform 0.5s ease;
        }

        .slide {
            flex: 0 0 50%;
            padding: 10px;
        }

        /* Buttons */
        .slider-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: transparent;
            border: none;
            cursor: pointer;
            font-size: 1.5em;
            color: #555;
            transition: color 0.3s ease;
            z-index: 1;
        }

        .slider-btn:hover {
            color: #000;
        }

        .prev-btn {
            left: 10px;
        }

        .next-btn {
            right: 10px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand"> Gestion de Scolarites</a>
            </div>
            <ul class="nav navbar-nav">
                <!-- <li><a href="filieres.php"><i class="fas fa-tags"></i> Filières </a></li> -->
                <!-- <li><a href="etudiants.php"><i class="fa fa-id-card"></i> Etudiants</a></li> -->
                <!-- <li><a href="matieres.php"><i class="fa-brands fa-markdown"></i> Matiéres</a></li>
                <li><a href="programmes.php"><i class="fa fa-product-hunt"></i> Programmes</a></li>
                <li><a href="emplois.php"><span class="glyphicon glyphicon-calendar"></span> Emplois</a></li>
                <li><a href="paiement.php"><i class="fa-solid fa-coins"></i> Paiement</a></li>
                <li><a href="utilisateurs.php"><i class="fa-solid fa-users"></i> Utilisateurs</a></li> -->

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="profile.php">
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
    <div class="container">
        <h3>Etudiant Dashboard</h3>
        <p>Welcome, Etudiant! Here you can view your academic information.</p>

        <!-- Buttons for different requests -->
        <div class="btn-group" role="group" aria-label="Requests" style="display: flex; justify-content: space-between;">
            <a href="demande_inscription.php" class="btn btn-primary">Demande d'inscription</a>
            <a href="demande_diplome.php" class="btn btn-success">Demande de diplôme</a>
            <a href="demande_certificat.php" class="btn btn-info">Demande de certificat</a>
        </div>

        <!-- Slider for modules -->
        <div class="slider-container">
            <button id="prevBtn" class="slider-btn prev-btn"><i class="fas fa-chevron-left"></i></button>
            <div class="slides">
                <div class="slide">
                    <div class="w3-card-4" style="width:100%;">
                        <header class="w3-container w3-blue" style="height:100px;"></header>
                        <div class="w3-container">
                            <p>Analyse</p>
                        </div>
                    </div>
                </div>
                <div class="slide">
                    <div class="w3-card-4" style="width:100%;">
                        <header class="w3-container w3-blue" style="height:100px;"></header>
                        <div class="w3-container">
                            <p>Algebre</p>
                        </div>
                    </div>
                </div>
                <div class="slide">
                    <div class="w3-card-4" style="width:100%;">
                        <header class="w3-container w3-blue" style="height:100px;"></header>
                        <div class="w3-container">
                            <p>Algorithmique et Structure de données</p>
                        </div>
                    </div>
                </div>
                <div class="slide">
                    <div class="w3-card-4" style="width:100%;">
                        <header class="w3-container w3-blue" style="height:100px;"></header>
                        <div class="w3-container">
                            <p>Structure Machine</p>
                        </div>
                    </div>
                </div>
            </div>
            <button id="nextBtn" class="slider-btn next-btn"><i class="fas fa-chevron-right"></i></button>
        </div>
    </div>

    <!-- Google Maps iframe -->
    <iframe style="border:0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3231.3131420335235!2d0.0884027!3d35.9148345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12820209fe20c56b%3A0x5e8633c2989ef5fd!2sFaculty%20Of%20Science%20Accurate%20And%20Computer%20University%20De%20Mostaganem%20-%20Site%202%20-%20Zaghloul!5e0!3m2!1sen!2sdz!4v1707860221780!5m2!1sen!2sdz&z=100" width="800" height="450" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const slides = document.querySelector('.slides');
            let currentIndex = 0;

            // Event listener for previous button
            prevBtn.addEventListener('click', function() {
                currentIndex = Math.max(currentIndex - 1, 0);
                slides.style.transform = `translateX(${-currentIndex * 50}%)`;
            });

            // Event listener for next button
            nextBtn.addEventListener('click', function() {
                currentIndex = Math.min(currentIndex + 1, slides.children.length - 1);
                slides.style.transform = `translateX(${-currentIndex * 50}%)`;
            });
        });
    </script>
</body>

</html>