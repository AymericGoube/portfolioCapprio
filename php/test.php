<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Portfolio Capprio - Profil Card</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Bootstrap -->
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <!-- <script src="https://use.fontawesome.com/52ab7fbddb.js"></script> -->

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" href="../css/profile.css">
<script src="../js/profile.js"></script>
<body>
<?php
include("../bdd/bdd.php");
$resultat = $bdd->query('SELECT * FROM profil');
while ($donnees = $resultat->fetch()) {
  $id=$donnees['id'];
  $photo= $donnees['Photo'];
  $name= $donnees['Prenom']." ".$donnees['Nom'];
  $descrip= explode("<br>", $donnees['Description'], 2);
  $descrip= $descrip[0];
  $descrip= explode(" ", $descrip);
  $short_descrip="";
  for ($i=0; $i<30; $i++) {
    $short_descrip = $short_descrip." ".$descrip[$i];
  }
  $descrip = $short_descrip." ...";
  $state= $donnees['State'];
  echo '<div class="col-lg-3 card" onClick="viewProfile('.$id.');">';
    echo '<div class="col-lg-12">';
      echo '<div class="col-lg-12 card-header">'; // card header
        echo '<div class="col-lg-3 no-padding">'; // photo
          echo '<div class="col-lg-12 card-photo" title="Photo de '.$name.'" style="background-image:url(../images/'.$photo.');">';
          echo '</div>';
        echo '</div>';
        echo '<div class="col-lg-9">'; // prenom nom
          echo '<h3>'.$name.'</h3>';
        echo '</div>';
      echo '</div>';
      echo '<div class="col-lg-12">'; // description
        echo '<p class="descrip-box">';
        echo $descrip;
        echo '</p>';
      echo '</div>';
      echo '<div class="col-lg-12 card-footer">'; // card footer
        echo '<div class="col-lg-3">'; // voir le profil
          echo '<form id="profile_id'.$id.'" method="post" action="profile.php">';
            echo '<input hidden type="text" name="profile_num" value="'.$id.'"/>';
            echo '<button id="go_profile" type="send" class="btn btn-default">voir profil</button>';
          echo '</form>';
        echo '</div>';
        echo '<div class="col-lg-3">'; // disponible/non disponible
        if ($state == "hired"){
          echo '<div class="circle" title="Je suis indisponible pour le moment." style="background-color:red;">';
          echo '</div>';
        }
        else {
          if ($state == 'free') {
            echo '<div class="circle" title="Je suis disponible pour les opportunités d\'emploi." style="background-color:green;">';
            echo '</div>';
          }
        }
        echo '</div>';
      echo '</div>';
    echo '</div>';
  echo '</div>';
}

?>
</body>
</html>
