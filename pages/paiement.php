<?php
 

  require_once("connexiondb.php");

 
  $nomPrenom=isset($_GET['nomPrenom'])?$_GET['nomPrenom']:"";
  $niveau=isset($_GET['niveau'])?$_GET['niveau']:"all";
  
  $size=isset($_GET['size'])?$_GET['size']:5;
  $page=isset($_GET['page'])?$_GET['page']:1;
  $offset=($page-1)*$size;




  if($niveau=="all"){
    $requete="select * from paiement
            where (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%')
            limit $size
            offset $offset";
    $requeteCount="select count(*) countP from paiement
    where  (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%')";        
            }else{
     $requete="select * from paiement
            where  (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%')
            and niveau='$niveau'
            limit $size
            offset $offset";
     $requeteCount="select count(*) countP from paiement
            where  (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%')
            and niveau='$niveau'";      

  }

  $resultatP=$pdo->query($requete);
  $resultatCount=$pdo->query($requeteCount);
   $tabCount=$resultatCount->fetch();
   $nombrePaiement=$tabCount['countP'];

   $reste=$nombrePaiement % $size;  
    if($reste===0) 
        $nbrPage=$nombrePaiement/$size;   
    else
        $nbrPage=floor($nombrePaiement/$size)+1; 
       

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de paiements</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    <script src="https://kit.fontawesome.com/1fafa1f3c8.js" crossorigin="anonymous"></script>
    
</head>
<body>
    <?php include("menu.php"); ?>
    
    <div class="container col-lg-offset-2">
    <h1 class="text-center margetop"><strong> Liste des Paiements </strong> </h1>
        <div class="panel panel-primary ">

            <div class="panel-heading">Listes des Paiments( <?php  echo $nombrePaiement ?> étudiants)</div>
            <div class="panel-body">
    <form method="get" action="paiement.php" class="form-inline">
     <div class="form-group">
        <input type="text" name="nomPrenom" placeholder="Nom et Prenom"   class="form-control" value="<?php echo $nomPrenom ?>"/>
    </div>  
    &nbsp
          <label for="niveau">Niveau:</label>
          &nbsp
          <select name="niveau" class="form-control" id="niveau" onchange="this.form.submit()">
          <option value="all" <?php if($niveau=="all") echo "selected" ?>>Tous les niveaux</option>  
          <option value="Crèche" <?php if($niveau=="Crèche") echo "selected" ?>>Crèche</option>
            <option value="Maternelle" <?php if($niveau=="Maternelle") echo "selected" ?>>Maternelle</option>
            <option value="Collège" <?php if($niveau=="Collège") echo "selected" ?> >Collège</option>
            <option value="Lycée"<?php if($niveau=="Lycée") echo "selected" ?> >Lycée </option>
          </select>
          
        
          <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
      &nbsp 
      <?php if ($_SESSION['user']['role']=='ADMIN') {?>
      <a class="btn btn-primary" href="nouveauPaiment.php"><i class="fa-solid fa-plus"></i> Nouveau étudiant </a> 
        
      <?php } ?>     
        </form>
                



            </div>
        </div>
       

    
             <table class="table table-striped">
                <thead>
                    <tr>
                       <th></th> <th> Nº</th> <th>Nom</th><th>Prénom</th><th>Année scolaire</th><th>Classe</th><th>Niveau</th><th>Type de paiement</th><th>Montant á payé</th><th>Date</th><th>Mois</th> 
                        <?php if ($_SESSION['user']['role']=='ADMIN') {?><th>Action</th> <?php } ?>
                    </tr>
                 </thead>

                <tbody>
                    
                        <?php while($paiement=$resultatP->fetch()){ ?>
                            
                            <tr>
                            <td><input type="checkbox"/> </td>
                            <td><?php echo $paiement['idPaiment'] ?> </td>
                           <td><?php echo $paiement['nom'] ?> </td>
                           <td><?php echo $paiement['prenom'] ?> </td>
                           <td><?php echo $paiement['annee_scolaire'] ?> </td> 
                           <td><?php echo $paiement['classe'] ?> </td> 
                           <td><?php echo $paiement['niveau'] ?> </td> 
                           <td><?php echo $paiement['typeP'] ?> </td> 
                           <td><?php echo $paiement['montantP'] ?> </td> 
                           <td><?php echo $paiement['dateP']  ?> </td> 
                           <td><?php echo $paiement['mois'] ?> </td> 
                           <?php if ($_SESSION['user']['role']=='ADMIN') {?>
                           <td>
                           
                          <a class="btn btn-success btn-edit-delete" href="editerPaiement.php?idP=<?php echo $paiement['idPaiment'] ?>"> <span class="fa fa-pencil"></span></a> &nbsp
                          <a onclick="return confirm('Êtes vous sûr de vouloir supprimer  ?')" class="btn btn-danger btn-edit-delete"
                          href="supprimerPaiement.php?idP=<?php echo $paiement['idPaiment'] ?>"> <span class="glyphicon glyphicon-trash"></span></a>
                          <?php } ?>
                        </td>
                        <?php } ?>
                           </tr>
                          


                          
                   
                </tbody>
            
                        </table> 
                                     
                        
                        <div class="text-center">
    
                    <ul class="pagination">
                   
                        <?php for($i=1;$i<=$nbrPage;$i++){ ?>
                            <li class="<?php if($i==$page) echo 'active' ?>"> 
            <a href="paiement.php?page=<?php echo $i;?>&nomPrenom=<?php echo $nomPrenom ?>&niveau=<?php echo $niveau ?>">
                                    <?php echo $i; ?>
                                </a> 
                             </li>
                        <?php } ?>
                       
                    </ul>
            
                </div>
                        
                     
                       
           
           

       
   
        
</body>
</html>