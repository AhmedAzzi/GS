<?php
session_start();
require_once('connexiondb.php');

$login = isset($_POST['login']) ? $_POST['login'] : "";
$pwd = isset($_POST['pwd']) ? $_POST['pwd'] : "";

$requete = "SELECT iduser, login, role FROM utilisateur WHERE login='$login' AND pwd=MD5('$pwd')";
$resultat = $pdo->query($requete);

if ($user = $resultat->fetch()) {
    $_SESSION['user'] = $user;

    // Check if the role is 'etudiant'
    if ($user['role'] == 'etudiant') {
        header('location:../pages/etudiant_dashboard.php');
    } else {
        header('location:../index.php');
    }
} else {
    $_SESSION['erreurLogin'] = "<strong>Erreur!!</strong> Login ou mot de passe incorrecte!!!";
    header('location:login.php');
}
