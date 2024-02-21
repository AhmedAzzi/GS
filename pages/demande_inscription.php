<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 well">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">FACULTE DES SCIENCES EXACTES ET DE L'INFORMATIQUE</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="insertEtudiant.php" class="form-horizontal">
                            <legend class="text-center">Information Personnelle</legend>
                            <div class="form-group">
                                <label for="nom" class="control-label col-sm-3">Nom:</label>
                                <div class="col-sm-7">
                                    <input type="text" name="nom" id="nom" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="prenom" class="control-label col-sm-3">Prenom :</label>
                                <div class="col-sm-7">
                                    <input type="text" name="prenom" id="prenom" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="matricule" class="control-label col-sm-3">Matricule :</label>
                                <div class="col-sm-7">
                                    <input type="number" name="matricule" id="matricule" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="date_naissance" class="control-label col-sm-3">Date de Naissance :</label>
                                <div class="col-sm-7">
                                    <input type="date" name="date_naissance" id="date_naissance" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lieu_naissance" class="control-label col-sm-3">Lieu de Naissance :</label>
                                <div class="col-sm-7">
                                    <input type="text" name="lieu_naissance" id="lieu_naissance" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="civilite" class="control-label col-sm-3">Sexe :</label>
                                <div class="col-sm-7">
                                    <select name="civilite" id="civilite" class="form-control">
                                        <option value="M">Male</option>
                                        <option value="H">Female</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <legend class="text-center">Information Parentale</legend>
                            <div class="form-group">
                                <label for="prenom_pere" class="control-label col-sm-3">Prenom de Pere :</label>
                                <div class="col-sm-7">
                                    <input type="text" name="prenom_pere" id="prenom_pere" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nom_mere" class="control-label col-sm-3">Nom Mere :</label>
                                <div class="col-sm-7">
                                    <input type="text" name="nom_mere" id="nom_mere" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="prenom_mere" class="control-label col-sm-3">Prenom Mere :</label>
                                <div class="col-sm-7">
                                    <input type="text" name="prenom_mere" id="prenom_mere" class="form-control">
                                </div>
                            </div>
                            <hr>
                            <legend class="text-center">Information Contact</legend>
                            <div class="form-group">
                                <label for="email" class="control-label col-sm-3">Email :</label>
                                <div class="col-sm-7">
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="adresse" class="control-label col-sm-3">Address :</label>
                                <div class="col-sm-7">
                                    <textarea name="adresse" id="adresse" class="form-control" rows="3"></textarea>
                                </div>
                            </div>
                            <hr>
                            <legend class="text-center">Information Academique</legend>
                            <div class="form-group">
                                <label for="specialite_bac" class="control-label col-sm-3">Specialite de Bac:</label>
                                <div class="col-sm-7">
                                    <select name="specialite_bac" id="specialite_bac" class="form-control">
                                        <option value="math">Mathematique</option>
                                        <option value="science">Scientifique</option>
                                        <option value="tm">Technique Mathematique</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="idFiliere" class="control-label col-sm-3">Filiere:</label>
                                <div class="col-sm-7">
                                    <select name="idFiliere" id="idFiliere" class="form-control">
                                        <option value="1">Mathematique</option>
                                        <option value="2">Informatique</option>
                                        <option value="3">SM</option>
                                        <!-- Adjust option values based on your database -->
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="resultat" class="control-label col-sm-3">Niveau Universitaire :</label>
                                <div class="col-sm-7" style="display: flex; justify-content: space-evenly; ">
                                    <input type="checkbox" value="admis"> Admis
                                    <input type="checkbox" value="ajournis"> Ajournis
                                    <input type="checkbox" value="admis_avec_dete"> Admis Avec Déte
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="niveau_universitaire" class="control-label col-sm-3">Niveau Universitaire :</label>
                                <div class="col-sm-7" style="display: flex; justify-content: space-evenly; ">
                                    <input type="checkbox" name="niveau_universitaire[]" value="l1"> L1
                                    <input type="checkbox" name="niveau_universitaire[]" value="l2"> L2
                                    <input type="checkbox" name="niveau_universitaire[]" value="l3"> L3
                                    <input type="checkbox" name="niveau_universitaire[]" value="m1"> M1
                                    <input type="checkbox" name="niveau_universitaire[]" value="m2"> M3
                                </div>
                            </div>
                            <div class="panel-footer">

                                <div class="row">
                                    <div class="col-lg-2 col-lg-offset-5">
                                        <button type="submit" class="btn btn-success btn-lg btn-block">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>