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
            <div class="panel-heading">Nouvelle Filière</div>
            <div class="panel-body">
            <form method="post" action="insertFiliere.php" class="form">
     <div class="form-group">
        <label for="niveau">Nom de la filière:</label>
        <input type="text" name="nomF" placeholder="Taper le nom de la filière"   class="form-control"/>
    </div> 
   
          <label for="niveau">Niveau:</label>
          &nbsp
          <select name="niveau" class="form-control" id="niveau">
    
             <option value="Crèche" >Crèche</option>
            <option value="Maternelle">Maternelle</option>
            <option value="Collège" >Collège</option>
            <option value="Lycée" selected >Lycée </option>
            
          </select>
          &nbsp
          <div class="form-group">
        <label for="niveau">classe:</label>
        <input type="text" name="Classe" placeholder="Taper le nom de la classe"   class="form-control"/>
    </div>  
    &nbsp
          <div class="form-group">
        <label for="niveau">Frais D'inscription:</label>
        <input type="text" name="FraisD" placeholder=""   class="form-control"/>
    </div>  
    &nbsp
          <div class="form-group">
        <label for="niveau">Frais Mensuel:</label>
        <input type="text" name="FraisM" placeholder=""   class="form-control"/>
    </div>  
        <br>
          <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Enregistrer</button>
      
     
       
        </form>
            </div>
        </div>
    </div>
</body>
</html>