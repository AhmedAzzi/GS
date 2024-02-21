<?php
require_once('identifier.php');

$message=isset($_GET['message'])?$_GET['message']:"Erreur";
    
$url=isset($_GET['url'])?$_GET['url']:"filieres.php";





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alerte</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    <script src="https://kit.fontawesome.com/1fafa1f3c8.js" crossorigin="anonymous"></script>
</head>
<body>
<?php include("menu.php"); ?>
<div class="container margetop">
           
           <div class="alert alert-danger ">
        <p> <h3> <i class="fas fa-exclamation-triangle" > </i>  <?php echo $message ?> </h3></p>
          
          
            
                                 
           </div>
           
           
           
           <div class="alert alert-info">
           
               <h4>Vous serez redireger dans 3 secondes...</h4>
               
                  <?php  header("refresh:3;url=$url"); ?>
                  
           </div>
   
   </div>  
</body>
</html>