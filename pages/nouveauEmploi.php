<?php    



require_once('../les_fonctions/fonctions2.php');
require_once('connexiondb.php');

if(isset($_GET['annee_scolaire']))
		$annee_scolaire=$_GET['annee_scolaire'];
	else
		$annee_scolaire=annee_scolaire_actuelle();

    $requeteM="select * from matiere";
    $resultatM=$pdo->query($requeteM);
     




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
   <!-- <style>
        table{
            
  border-collapse: collapse;
 }

th, td {
  border: 1px solid #808080;
  padding: 7px;
  text-align: left;
}

th {
  color: black;
  background-color: #808080;
}



tr th:first-child, tr td:first-child {
  background-color:  #808080 ;
  color: black;
  font-weight: bold;
  text-align: right;
}

tr td:nth-last-child(2){
  background-color: White;
}

tr td:last-child{
  background-color: White;
}


        </style> -->
        <style>
        th {
  color: black;
  background-color: #808080;
}


</style>
</head>
<body>
    <?php include("menu.php"); ?>

    
    
    <div class="container col-lg-offset-2">
    <h1 class="text-center margetop"><strong> Emplois du Temps </strong> </h1>
    <br> <br> 
   <!-- <div class="panel panel-primary margetop">
                <div class="panel-heading">Emplois du Temps:</div>
                <div class="panel-body">-->
    <form method="post" action="insertEmploi.php" class="form" >
    <div class="row my-row">
								<label for="nom"class="control-label col-sm-2">Nom:  </label>
									<div class="col-sm-4">
								<input type="nom" name="nom" id="nom"class="form-control"
								/> 
									</div>

                  <label class="control-label col-sm-2">  Année scolaire: </label>
                             <div class="col-sm-4">
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
                                    </div>
     
                  </div>

&nbsp


    <div class="row my-row">
								<label for="classe"class="control-label col-sm-2">Classe:  </label>
									<div class="col-sm-4">
								<input type="text" name="classe" id="classe"class="form-control"
								/> 
									</div>

                                    <label for="niveau" class="control-label col-sm-2">Niveau:</label>
                                    <div class="col-sm-4">
                                    <select name="niveau" class="form-control" id="niveau" >
          <option value="all" >Tous les niveaux</option>  
          <option value="Crèche" >Crèche</option>
            <option value="Maternelle" >Maternelle</option>
            <option value="Collège" >Collège</option>
            <option value="Lycée" >Lycée </option>
          </select>

							 </div>
     
              
    <br> <br> <br> <br> <br> 

    

             <table class="table table-bordered " >
                <tr>
                <td font-weight: bold >  </td>  
                <th colspan="4" bgcolor="#808080" ><center><strong>MATIN</strong><center>  </th> <th colspan="4" bgcolor="#808080"><center><strong>APRES MIDI</strong><center>  </th>
</tr>
                    <tr>
                    <td  >  </td>    <th bgcolor="#808080"> <center><strong>08H30 à 09H30</strong></center></th bgcolor="#808080"> <th bgcolor="#808080"><center><strong>09H30 à 10H30</strong></center></th><th bgcolor="#808080"><center><strong>10H30 à 11H30</strong></center></th><th bgcolor="#808080"><center><strong>11H30 à 12H30</strong></center></th>
                    <th bgcolor="#808080"> <center><strong>14H30 à 15H30</strong></center></th> <th bgcolor="#808080"><center><strong>15H30 à 16H30</strong></center></th><th bgcolor="#808080"><center><strong>16H30 à 17H30</strong></center></th><th bgcolor="#808080"><center><strong>17H30 à 18H30</strong></center></th>
                      
</tr>
                           
                           
                           <tr>  <th bgcolor="#808080"><center><strong>LUNDI</strong></center> </th>  <td> 
                           <select name="id_matiere" class="form-control" id="id_matiere">
                              <?php while($matiere=$resultatM->fetch()) { ?>
                                <option value="<?php echo $matiere['id_matiere'] ?>"> 
                                    <?php echo $matiere['nom'] ?>
                                </option>
                              <?php }?>
				            </select>

                 
				          </td> <td>   
                     </td> <td></td> <td></td><td></td> <td></td> <td></td> <td></td> </tr>
                           <tr><th bgcolor="#808080"><center><strong>MARDI</strong></center>  </th> <td>         </td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> </tr>
                           <tr><th bgcolor="#808080"><center><strong>MERCREDI</strong></center>  </th> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> </tr>
                           <tr><th bgcolor="#808080"><center><strong>JEUDI</strong></center>  </th> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td></tr>
                           <tr> <th bgcolor="#808080"><center><strong>VENDREDI</strong></center>  </th> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td></tr>
                           <tr><th bgcolor="#808080"><center><strong>SAMEDI</strong></center>  </th> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td></tr>
                          

                          
                          


                          
                   
               
            
                        </table> 
                        <button type="submit" class="btn btn-success">
                       <i class="fa-solid fa-floppy-disk"></i>
                            Enregistrer
                        </button> 
                       
           
                             </form>
                               <!--</div>
                              </div>-->
       
   
        
</body>
</html>