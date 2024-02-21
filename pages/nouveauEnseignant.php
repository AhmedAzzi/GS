<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    require_once('../les_fonctions/fonctions2.php');
	
   
    $requeteF="select * from filiere";
    $resultatF=$pdo->query($requeteF);
    
    

	if(isset($_GET['annee_scolaire']))
		$annee_scolaire=$_GET['annee_scolaire'];
	else
		$annee_scolaire=annee_scolaire_actuelle();



?>
<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Nouveau enseignant</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
                       
             <div class="panel panel-primary margetop">
                <div class="panel-heading">Les infos du nouveau Enseignant :</div>
                <div class="panel-body">
                    <form method="post" action="insertEnseignant.php" class="form"  enctype="multipart/form-data">
						
                       <!-- <div class="form-group">
                             <label for="nom">Nom :</label>
                            <input type="text" name="nom" placeholder="Nom" class="form-control"/>
                        </div>
                        <div class="form-group">
                             <label for="prenom">Prénom :</label>
                            <input type="text" name="prenom" placeholder="Prénom" class="form-control"/>
                        </div>-->
                        <div class="row my-row">
								<label for="nom" class="control-label col-sm-2"> Nom:  </label> 
									<div class="col-sm-4">
										<input type="text" name="nom" id="nom" class="form-control"/> 
									</div>
							

								<label for="prenom" class="control-label col-sm-2"> Prénom:  </label> 
                               
									<div class="col-sm-4" >
                                   
								<input type="text" name="prenom" id="prenom" class="form-control"/>
									</div>
                                    

							</div>
                            
                            &nbsp
                            <div class="row my-row">
								<label for="calendar1"class="control-label col-sm-2"> Date de naissance:  </label>
									<div class="col-sm-4">								
								<input type="date" name="date_naissance"  id="date_naissance" class="form-control "/> 
								
									</div>

								<label for="lieu_naissance"class="control-label col-sm-2">Lieu de naissance:  </label>
									<div class="col-sm-4">
								<input type="text" name="lieu_naissance" id="lieu_naissance"class="form-control"
									/> 
									</div>

							</div>
                            &nbsp
                            <div class="row my-row">
								<label for="adresse"class="control-label col-sm-2"> Adresse: </label>
									<div class="col-sm-4">
								<input type="text" name="adresse" id="adresse"class="form-control" 
								/>
									</div>

								<label for="ville"class="control-label col-sm-2"> Ville:   </label> 
									<div class="col-sm-4">
								<input type="text" name="ville" id="ville" class="form-control" 
								/> 
									</div>

							</div>

                            &nbsp
                            <div class="row my-row">
								<label for="cin"class="control-label col-sm-2"> Cin  </label>
									<div class="col-sm-4">
								<input type="text" name="cin" id="cin"class="form-control"
								/> 
									</div>
                                    <label for="gmail"class="control-label col-sm-2"> Gmail  </label>
									<div class="col-sm-4">
								<input type="email" name="gmail" id="gmail"class="form-control"
								/> 
									</div>
							 </div>
                             &nbsp
                             <div class="row my-row">
								<label for="tel_domicile"class="control-label col-sm-2"> Tél  Domicile:  </label>
									<div class="col-sm-4">
								<input type="text" name="tel_domicile" id="tel_domicile"class="form-control"
								/> 
									</div>

								<label for="tel_professionnel"class="control-label col-sm-2"> Tél Professionnel:  </label>
									<div class="col-sm-4">
								<input type="tel" name="tel_professionnel" id="tel_professionnel"class="form-control"
								/> 
									</div>

							 </div>
                             &nbsp
                             <div class="row my-row">
                            <label for="idFiliere" class="control-label col-sm-2">Filière:</label>
                            <div class="col-sm-4">
				            <select name="idFiliere" class="form-control" id="idFiliere">
                              <?php while($filiere=$resultatF->fetch()) { ?>
                                <option value="<?php echo $filiere['idFiliere'] ?>"> 
                                    <?php echo $filiere['nomFiliere'] ?>
                                </option>
                              <?php }?>
				            </select>
                        </div>
                       
                             <label for="photo" class="control-label col-sm-2">Photo :</label>
                             <div class="col-sm-4">
                            <input type="file" name="photo" />
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
&nbsp
                             <div class="row my-row">
                             <label class="control-label col-sm-2"> &nbsp &nbsp Année scolaire: &nbsp</label>
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
                            <label for="civilite" class="control-label col-sm-2">Civilité :</label>
                            <div class="col-sm-4">
                            <div class="radio" >
                                <label><input type="radio" name="civilite" value="F" checked/> F </label>
                                <label><input type="radio" name="civilite" value="M"/> M </label>
                            </div>
                        </div>
                                    </div>
                       <br>
				       &nbsp &nbsp &nbsp &nbsp   <button type="submit" class="btn btn-success">
                       <i class="fa-solid fa-floppy-disk"></i>
                            Enregistrer
                        </button> 
                      
					</form>
                </div>
            </div>   
        </div>      
    </body>
</HTML>