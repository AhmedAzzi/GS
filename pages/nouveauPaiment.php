<?php
	require_once('../les_fonctions/fonctions2.php');
	
    

	if(isset($_GET['annee_scolaire']))
		$annee_scolaire=$_GET['annee_scolaire'];
	else
		$annee_scolaire=annee_scolaire_actuelle();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle Filière</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    <script src="https://kit.fontawesome.com/1fafa1f3c8.js" crossorigin="anonymous"></script>
</head>
<body>

<div class="container">
       
        <div class="panel panel-primary margetop ">
            <div class="panel-heading">Nouveau Paiement</div>
            <div class="panel-body">
            <form method="post" action="insertPaiment.php" class="form">
     <div class="form-group">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" placeholder="Taper le nom "   class="form-control"/>
    </div> 
    <div class="form-group">
        <label for="prenom">Prenom :</label>
        <input type="text" name="prenom" placeholder="Taper le prenom "   class="form-control"/>
    </div> 
    <label> Année scolaire: </label>
						
						<select class="form-control" 
								name="annee_scolaire">

								<?php 
									$les_annees=les_annee_scolaire();
									foreach($les_annees as $annee_sc){ 
								?>
									<option <?php if($annee_sc===$annee_scolaire)  echo 'selected' ?>> 
										<?php echo $annee_sc; ?>
									</option>

								<?php } ?>
						</select>
   <!-- <label for="annee_scolaire">Annee Scolaire:</label>
          &nbsp
          <select name="annee_scolaire" class="form-control" id="annee_scolaire">
    
             <option value="2019/2020" >2019/2020</option>
            <option value="2020/2021">2020/2021</option>
            <option value="2021/2022" >2021/2022</option>
            <option value="2022/2023" selected >2022/2023 </option>
            
          </select> -->
    <br>
    <label for="classe">Classe:</label>
          &nbsp   
          <select name="Classe" class="form-control" id="Classe">
    
             <option value="Tronc Commun" >Tronc Commun</option>
            <option value=" 1ère Bac">1ère Bac</option>
            <option value="2ème Bac" >2ème Bac</option>
            <option value="Lycée" selected >2ème Bac Sciences Physiques</option>
            
          </select>
          <br>

          <label for="niveau">Niveau:</label>
          &nbsp
          <select name="niveau" class="form-control" id="niveau">
    
             <option value="Crèche" >Crèche</option>
            <option value="Maternelle">Maternelle</option>
            <option value="Collège" >Collège</option>
            <option value="Lycée" selected >Lycée </option>
            
          </select>
          
          <br>

    <label for="typeP">Type de paiement:</label>
          &nbsp
          <select name="typeP" class="form-control" id="typeP">
    
             <option value="Inscription" >Inscription</option>
            <option value="Paiement Mensuel">Paiement Mensuel</option>
            
            
          </select>
          <br>
          <div class="form-group">
        <label for="montantP">Montant á payé:</label>
        <input type="text" name="montantP" placeholder=""   class="form-control"/>
    </div> 
    <div class="form-group">
        <label for="dateP">Date:</label>
        <input type="datetime-local" name="dateP" placeholder=""   class="form-control"/> 
       
    </div>   
  
  
  
    
    <label for="mois">Mois:</label>
          &nbsp
          <select name="mois" class="form-control" id="mois">
          <option value=" Toutes l'année" selected> Toutes l'année</option>  
             <option value="Janvier" >Janvier</option>
            <option value="Février">Février</option>
            <option value="Mars" >Mars</option>
            <option value="Avril"  >Avril</option>
            <option value="Mai"  >Mai </option>
            <option value="Juin" >Juin </option>
            <option value="Juilet"  >Juilet </option>
            <option value="Août"  >Août </option>
            <option value="Septembre"  >Septembre </option>
            <option value="Octobre"  >Octobre </option>
            <option value="Novembre"  >Novembre </option>
            <option value="Décembre"  >Décembre </option>

            
          </select> 
        <br>
          <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Enregistrer</button>
       
        </form>
            </div>
        </div>
    </div>
</body>
</html>