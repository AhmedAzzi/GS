<?php
 

  require_once("connexiondb.php");

  $nomMatiere=isset($_GET['nomMatiere'])?$_GET['nomMatiere']:"";
  $nomMatiere1=isset($_GET['nomMatiere1'])?$_GET['nomMatiere1']:"";


  
   
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
<h1 class="text-center margetop"><strong>  Emploi du Temps </strong> </h1>

<form method="post" action="emplois.php" class="form" >


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
                           <center> <?php echo $_GET["nomMatiere"] ?></center>
				            
                        </td> <td><center> <?php echo $_GET["nomMatiere1"] ?></center></td> <td></td> <td></td><td></td> <td></td> <td></td> <td></td> </tr>
                           <tr><th bgcolor="#808080"><center><strong>MARDI</strong></center>  </th> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> </tr>
                           <tr><th bgcolor="#808080"><center><strong>MERCREDI</strong></center>  </th> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> </tr>
                           <tr><th bgcolor="#808080"><center><strong>JEUDI</strong></center>  </th> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td></tr>
                           <tr> <th bgcolor="#808080"><center><strong>VENDREDI</strong></center>  </th> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td></tr>
                           <tr><th bgcolor="#808080"><center><strong>SAMEDI</strong></center>  </th> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td></tr>
                          

                          
                          

                          
                   
               
            
                        </table> 
       

    
</form>
           

       
   
        
</body>
</html>