<?php
session_start();
require_once('connexiondb.php');

$login = isset($_POST['login']) ? $_POST['login'] : "";

$pwd = isset($_POST['pwd']) ? $_POST['pwd'] : "";

$requete = "select iduser,login,role 
                from utilisateur where login='$login' 
                and pwd=MD5('$pwd')";

$resultat = $pdo->query($requete);

if ($user = $resultat->fetch()) {


    $_SESSION['user'] = $user;
    header('location:../index.php');
} else {
    $_SESSION['erreurLogin'] = "<strong>Erreur!!</strong> Login ou mot de passe incorrecte!!!";
    header('location:login.php');
}
