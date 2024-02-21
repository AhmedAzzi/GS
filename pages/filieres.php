

<?php
 



  require_once("connexiondb.php");
 
 
  $nomf=isset($_GET['nomF'])?$_GET['nomF']:"";
  $niveau=isset($_GET['niveau'])?$_GET['niveau']:"all";
  
  $size=isset($_GET['size'])?$_GET['size']:5;
  $page=isset($_GET['page'])?$_GET['page']:1;
  $offset=($page-1)*$size;




  if($niveau=="all"){
    $requete="select * from filiere
            where nomFiliere like '%$nomf%'
            limit $size
            offset $offset";
    $requeteCount="select count(*) countF from filiere
    where nomFiliere like '%$nomf%'";        
            }else{
     $requete="select * from filiere
            where nomFiliere like '%$nomf%'
            and niveau='$niveau'
            limit $size
            offset $offset";
     $requeteCount="select count(*) countF from filiere
            where nomFiliere like '%$nomf%'  
            and niveau='$niveau'";      

  }

  $resultatF=$pdo->query($requete);
  $resultatCount=$pdo->query($requeteCount);
   $tabCount=$resultatCount->fetch();
   $nombreFiliere=$tabCount['countF'];

   $reste=$nombreFiliere % $size;  
    if($reste===0) 
        $nbrPage=$nombreFiliere/$size;   
    else
        $nbrPage=floor($nombreFiliere/$size)+1; 
       

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Scolarites</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    <script src="https://kit.fontawesome.com/1fafa1f3c8.js" crossorigin="anonymous"></script>
    
</head>
<body>
    <?php include("menu.php"); ?>
    
    <div class="container  col-lg-offset-2">
    <h1 class="text-center margetop"><strong> Liste des filières 2022-2023 </strong> </h1>
        <div class="panel panel-primary ">

            <div class="panel-heading">Listes des filière( <?php  echo $nombreFiliere ?> Filières)</div>
            <div class="panel-body">
    <form method="get" action="filieres.php" class="form-inline">
     <div class="form-group">
        <input type="text" name="nomF" placeholder="Taper le nom de la filière"   class="form-control" value="<?php echo $nomf ?>"/>
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
      <a class="btn btn-primary" href="nouvelleFiliere.php"><i class="fa-solid fa-plus"></i> Nouvelle Filière</a> 
        
      <?php } ?>     
        </form>
                



            </div>
        </div>
        
    
             <table class="table table-striped">
                <thead>
                    <tr>
                        <th> Nº</th> <th>Nom filière</th><th>Niveau</th><th>Classe</th><th>Frais D'inscription</th><th>Frais Mensuel</th> 
                        <?php if ($_SESSION['user']['role']=='ADMIN') {?><th>Action</th> <?php } ?>
                    </tr>
                 </thead>

                <tbody>
                    
                        <?php while($filiere=$resultatF->fetch()){ ?>
                            <tr>
                           <td><?php echo $filiere['idFiliere'] ?> </td>
                           <td><?php echo $filiere['nomFiliere'] ?> </td>
                           <td><?php echo $filiere['niveau'] ?> </td> 
                           <td><?php echo $filiere['classe'] ?> </td> 
                           <td><?php echo $filiere['fraisD'] ?> </td> 
                           <td><?php echo $filiere['fraisM'] ?> </td> 
                           <?php if ($_SESSION['user']['role']=='ADMIN') {?>
                           <td>
                           
                          <a class="btn btn-success btn-edit-delete" href="editerFiliere.php?idF=<?php echo $filiere['idFiliere'] ?>"> <span class="fa fa-pencil"></span></a> &nbsp
                          <a onclick="return confirm('Êtes vous sûr de vouloir supprimer la filière ?')" class="btn btn-danger btn-edit-delete"
                          href="supprimerFiliere.php?idF=<?php echo $filiere['idFiliere'] ?>"> <span class="glyphicon glyphicon-trash"></span></a>
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
            <a href="filieres.php?page=<?php echo $i;?>&nomF=<?php echo $nomf ?>&niveau=<?php echo $niveau ?>">
                                    <?php echo $i; ?>
                                </a> 
                             </li>
                        <?php } ?>
                       
                    </ul>
            
                </div>
                        
                     
                       
           
           

       
   
        
</body>
</html>