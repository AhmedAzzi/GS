<?php
 

  require_once("connexiondb.php");

 
  $nom=isset($_GET['nom'])?$_GET['nom']:"";
  $niveau=isset($_GET['niveau'])?$_GET['niveau']:"all";
  
  $size=isset($_GET['size'])?$_GET['size']:5;
  $page=isset($_GET['page'])?$_GET['page']:1;
  $offset=($page-1)*$size;




  if($niveau=="all"){
    $requete="select * from emplois
            where nom like '%$nom%' 
            limit $size
            offset $offset";
    $requeteCount="select count(*) countE from emplois
    where  nom like '%$nom%' ";        
            }else{
     $requete="select * from emplois
            where  nom like '%$nom%'
            and niveau='$niveau'
            limit $size
            offset $offset";
     $requeteCount="select count(*) countE from emplois
            where  nom like '%$nom%'
            and niveau='$niveau'";      

  }

  $resultatE=$pdo->query($requete);
  $resultatCount=$pdo->query($requeteCount);
   $tabCount=$resultatCount->fetch();
   $nombreEmploi=$tabCount['countE'];

   $reste=$nombreEmploi % $size;  
    if($reste===0) 
        $nbrPage=$nombreEmploi/$size;   
    else
        $nbrPage=floor($nombreEmploi/$size)+1; 
       

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des emplois</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    <script src="https://kit.fontawesome.com/1fafa1f3c8.js" crossorigin="anonymous"></script>
    
</head>
<body>
    <?php include("menu.php"); ?>
    
    <div class="container col-lg-offset-2">
    <h1 class="text-center margetop"><strong> Liste des Emplois </strong> </h1>
        <div class="panel panel-primary ">

            <div class="panel-heading">Listes des Emplois( <?php  echo $nombreEmploi ?> emplois)</div>
            <div class="panel-body">
    <form method="get" action="emplois.php" class="form-inline">
     <div class="form-group">
        <input type="text" name="nom" placeholder="Taper le nom"   class="form-control" value="<?php echo $nom ?>"/>
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
      <a class="btn btn-primary" href="nouveauEmploi.php"><i class="fa-solid fa-plus"></i> Nouveau Emploi </a> 
        
      <?php } ?>     
        </form>
                



            </div>
        </div>
       

    
             <table class="table table-striped">
                <thead>
                    <tr>
                        <th> Nº</th> <th>Nom</th><th>Année scolaire</th><th>Classe</th><th>Niveau</th>
                        <?php if ($_SESSION['user']['role']=='ADMIN') {?><th>Action</th> <?php } ?>
                    </tr>
                 </thead>

                <tbody>
                    
                        <?php while($emplois=$resultatE->fetch()){ ?>
                            
                            <tr>
                           
                            <td><?php echo $emplois['idEmploi'] ?> </td>
                           <td><?php echo $emplois['nom'] ?> </td>
                           
                           <td><?php echo $emplois['annee_scolaire'] ?> </td> 
                           <td><?php echo $emplois['classe'] ?> </td> 
                           <td><?php echo $emplois['niveau'] ?> </td> 
                          
                           <?php if ($_SESSION['user']['role']=='ADMIN') {?>
                           <td>
                            
                          <a class="btn btn-primary btn-edit-delete" href="voirEmploi.php?idE=<?php echo $emplois['idEmploi'] ?>">  <i class="fa-sharp fa-solid fa-eye"></i></a>&nbsp
                        
                        
                          <a class="btn btn-success btn-edit-delete" href="editerEmplois.php?idE=<?php echo $emplois['idEmploi'] ?>"> <span class="fa fa-pencil"></span></a> &nbsp
                          <a onclick="return confirm('Êtes vous sûr de vouloir supprimer  ?')" class="btn btn-danger btn-edit-delete"
                          href="supprimerEmplois.php?idE=<?php echo $emplois['idEmploi'] ?>"> <span class="glyphicon glyphicon-trash"></span></a>
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
            <a href="emplois.php?page=<?php echo $i;?>&nom=<?php echo $nom ?>&niveau=<?php echo $niveau ?>">
                                    <?php echo $i; ?>
                                </a> 
                             </li>
                        <?php } ?>
                       
                    </ul>
            
                </div>
                        
                     
                       
           
           

       
   
        
</body>
</html>