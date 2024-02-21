<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    $nom=isset($_POST['nom'])?$_POST['nom']:"";
    $prenom=isset($_POST['prenom'])?$_POST['prenom']:"";
    $civilite=isset($_POST['civilite'])?$_POST['civilite']:"F";
    $idFiliere=isset($_POST['idFiliere'])?$_POST['idFiliere']:1;

    $date_naissance=isset($_POST['date_naissance'])?$_POST['date_naissance']:"";
    $lieu_naissance=isset($_POST['lieu_naissance'])?$_POST['lieu_naissance']:"";
    $adresse=isset($_POST['adresse'])?$_POST['adresse']:"";
    $ville=isset($_POST['ville'])?$_POST['ville']:"";
    $cin=isset($_POST['cin'])?$_POST['cin']:"";
    $tel_domicile=isset($_POST['tel_domicile'])?$_POST['tel_domicile']:"";
    $tel_professionnel=isset($_POST['tel_professionnel'])?$_POST['tel_professionnel']:"";
    $niveau=isset($_POST['niveau'])?$_POST['niveau']:"";
    $classe=isset($_POST['classe'])?$_POST['classe']:"";
   

    $nomPhoto=isset($_FILES['photo']['name'])?$_FILES['photo']['name']:"";
    $imageTemp=$_FILES['photo']['tmp_name'];
    move_uploaded_file($imageTemp,"../images/".$nomPhoto);

    $requete="insert into stagiaire(nom,prenom,civilite,idFiliere,date_naissance ,lieu_naissance ,adresse,ville ,cin,tel_domicile ,tel_professionnel,niveau,classe,photo) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $params=array($nom,$prenom,$civilite,$idFiliere,$date_naissance,$lieu_naissance ,$adresse ,$ville,$cin,$tel_domicile ,$tel_professionnel,$niveau,$classe ,$nomPhoto);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:enseignant.php');

?>