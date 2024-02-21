<?php
    require_once('identifier.php');
    
    require_once("connexiondb.php");
    require_once('../les_fonctions/fonctions2.php');
  
    $nomPrenom=isset($_GET['nomPrenom'])?$_GET['nomPrenom']:"";
    $idfiliere=isset($_GET['idfiliere'])?$_GET['idfiliere']:0;
    
    $size=isset($_GET['size'])?$_GET['size']:5;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;
    
    $requeteFiliere="select * from filiere";

    if($idfiliere==0){
        $requeteStagiaire="select idStagiaire,nom,prenom,nomFiliere,photo,civilite, date_naissance ,lieu_naissance ,adresse,ville ,cin,s.classe,s.niveau
                from filiere as f,stagiaire as s
                where f.idFiliere=s.idFiliere
                and (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%')
                order by idStagiaire
                limit $size
                offset $offset";
        
        $requeteCount="select count(*) countS from stagiaire
                where nom like '%$nomPrenom%' or prenom like '%$nomPrenom%'";
    }else{
         $requeteStagiaire="select idStagiaire,nom,prenom,nomFiliere,photo,civilite, date_naissance ,lieu_naissance ,adresse,ville ,cin,s.classe,s.niveau
                from filiere as f,stagiaire as s
                where f.idFiliere=s.idFiliere
                and (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%')
                and f.idFiliere=$idfiliere
                 order by idStagiaire
                limit $size
                offset $offset";
        
        $requeteCount="select count(*) countS from stagiaire
                where (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%')
                and idFiliere=$idfiliere";
    }

    $resultatFiliere=$pdo->query($requeteFiliere);
    $resultatStagiaire=$pdo->query($requeteStagiaire);
    $resultatCount=$pdo->query($requeteCount);

    $tabCount=$resultatCount->fetch();
    $nbrStagiaire=$tabCount['countS'];
    $reste=$nbrStagiaire % $size;   
    if($reste===0) 
        $nbrPage=$nbrStagiaire/$size;   
    else
        $nbrPage=floor($nbrStagiaire/$size)+1;  
?>
<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Gestion des stagiaires</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php require("menu.php"); ?>
        
        <div class="container col-lg-offset-2">
        <h1 class="text-center margetop"><strong> Liste des enseignants </strong> </h1>
            <div class="panel panel-primary ">
            
				<div class="panel-heading">Liste des Enseignants (<?php echo $nbrStagiaire ?> Enseignants)</div>
				
				<div class="panel-body">
					<form method="get" action="enseignant.php" class="form-inline">
						<div class="form-group">
						
                            <input type="text" name="nomPrenom" 
                                   placeholder="Nom et prénom"
                                   class="form-control"
                                   value="<?php echo $nomPrenom ?>"/>
                        </div>
                            <label for="idfiliere">Filière:</label>
                            
				            <select name="idfiliere" class="form-control" id="idfiliere"
                                    onchange="this.form.submit()">
                                    
                                    <option value=0>Toutes les filières</option>
                                    
                                <?php while ($filiere=$resultatFiliere->fetch()) { ?>
                                
                                    <option value="<?php echo $filiere['idFiliere'] ?>"
                                    
                                        <?php if($filiere['idFiliere']===$idfiliere) echo "selected" ?>>
                                        
                                        <?php echo $filiere['nomFiliere'] ?> 
                                        
                                    </option>
                                    
                                <?php } ?>
                                
				            </select>
				            
				        <button type="submit" class="btn btn-primary">
                            <span class="glyphicon glyphicon-search"></span>
                            
                        </button> 
                        
                        &nbsp;&nbsp;
                         <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
                         
                            <a class="btn btn-primary" href="nouveauEnseignant.php">
                            
                            <i class="fa-solid fa-plus"></i>
                                Nouveau Enseignat
                                
                            </a>
                            
                         <?php }?>
					</form>
				</div>
			</div>
            
           
                    <table class="table table-striped ">
                        <thead>
                            <tr>
                                <th>Id </th> <th>Nom</th> <th>Prénom</th> 
                                <th>Filière</th><th>Classe</th><th>Niveau</th> <th>Photo</th> 
                                <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
                                	<th>Actions</th>
                                <?php }?>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php while($stagiaire=$resultatStagiaire->fetch()){ ?>
                                <tr>
                                    <td><?php echo $stagiaire['idStagiaire'] ?> </td>
                                    <td><?php echo $stagiaire['nom'] ?> </td>
                                    <td><?php echo $stagiaire['prenom'] ?> </td> 
                                    <td><?php echo $stagiaire['nomFiliere'] ?> </td>
                                    <td><?php echo $stagiaire['classe'] ?> </td>
                                    <td><?php echo $stagiaire['niveau'] ?> </td>
                                    <td>
                                        <img src="../images/<?php echo $stagiaire['photo']?>"
                                        width="40px" height="40px" class="img-circle">
                                    </td> 
                                    
                                     <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
                                        <td>
                                            <a class="btn btn-success btn-edit-delete" href="editerEnseignant.php?idS=<?php echo $stagiaire['idStagiaire'] ?>">
                                            <span class="fa fa-pencil"></span>
                                            </a>
                                            &nbsp;
                                            <a onclick="return confirm('Etes vous sur de vouloir supprimer le stagiaire')" class="btn btn-danger btn-edit-delete"
                                            href="supprimerEnseignant.php?idS=<?php echo $stagiaire['idStagiaire'] ?>">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                            <a class="btn btn-info btn-edit-delete"
					href="../fpdf/page_document.php
					?id_stagiaire=<?php echo $stagiaire['idStagiaire'] ?>
					"> 
					<span class="fa fa-print"></span>
				</a>
                                    <?php }?>
                                    
                                 </tr>
                             <?php } ?>
                        </tbody>
                    </table>
                <div class="text-center">
                    <ul class="pagination">
                        <?php for($i=1;$i<=$nbrPage;$i++){ ?>
                            <li class="<?php if($i==$page) echo 'active' ?>"> 
            <a href="enseignant.php?page=<?php echo $i;?>&nomPrenom=<?php echo $nomPrenom ?>&idfiliere=<?php echo $idfiliere ?>">
                                    <?php echo $i; ?>
                                </a> 
                             </li>
                        <?php } ?>
                    </ul>
                </div>
             
    </body>
</HTML>