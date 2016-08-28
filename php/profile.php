<?php
$id=$_POST['profile_num'];

include("../bdd/bdd.php");
$profile_info = array();
$resultat = $bdd->query('SELECT * FROM profil WHERE id="'.$id.'"');
while ($donnees = $resultat->fetch()) {
  $profile_info['name']=$donnees['Prenom']." ".$donnees['Nom'];
  $profile_info['photo']=$donnees['Photo'];
  $profile_info['descrip']=$donnees['Description'];
  $profile_info['skill']=$donnees['Competences'];
  $profile_info['skill_stats']=$donnees['Competences_stats'];
  $profile_info['linkedin']=$donnees['Linkedin'];
  $profile_info['github']=$donnees['Github'];
  $profile_info['twitter']=$donnees['Twitter'];
  $profile_info['cv']=$donnees['CV'];
  $profile_info['state']=$donnees['State'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Portfolio Capprio - Profil</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Bootstrap -->
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <!-- <script src="https://use.fontawesome.com/52ab7fbddb.js"></script> -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.1/Chart.bundle.js"></script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link rel="stylesheet" href="../css/profile.css">
  <script src="../js/profile.js"></script>
</head>
<body>
  <header>

  </header>
  <section>
    <div class="col-lg-offset-1 col-lg-10 profile_padding">
      <div class="col-lg-12">
        <div class="col-lg-4">
          <div class="col-lg-12 profile_photo" title="Photo de <?php echo $profile_info['name'];?>" style="background-image:url('../images/<?php echo $profile_info['photo'];?>');">

          </div>
          <div class="col-lg-12 profile_skill no-padding">
            <?php
              if (($profile_info['skill'] != NULL && $profile_info['skill'] != " ") || ($profile_info['skill_stats']!= NULL && $profile_info['skill_stats'] != " ")) {
                echo '<h2 class="text-center">Mes compétences</h2>';
                echo '<canvas id="myChart" width="400" height="400"></canvas>';
                echo '<script>';
                echo 'var numuser = '.$id.';';
                echo 'skill_radar(numuser);';
                echo '</script>';
              }
            ?>
            </div>
            <div class="col-lg-12 profile_social">
              <?php
              if ($profile_info['linkedin'] != "" || $profile_info['github'] != "" || $profile_info['twitter'] != "") {
                echo "<h2 class='text-center'>Mon réseau</h2>";
                echo "<div class='flex-row'>";
                if ($profile_info['linkedin'] != "") {
                  echo '<a href="'.$profile_info['linkedin'].'" title="Linkedin de '.$profile_info['name'].'">';
                  echo '<img src="../images/linkedin.png" alt=""/>';
                  echo '</a>';
                }
                if ($profile_info['github'] != "") {
                  echo '<a href="'.$profile_info['github'].'" title="Github de '.$profile_info['name'].'">';
                  echo '<img src="../images/github.png" alt=""/>';
                  echo '</a>';
                }
                if ($profile_info['twitter'] != "") {
                  echo '<a href="'.$profile_info['twitter'].'" title="Twitter de '.$profile_info['name'].'">';
                  echo '<img src="../images/twitter.png" alt=""/>';
                  echo '</a>';
                }
                echo "</div>";
              }
              ?>
            </div>
          </div>
          <div class="col-lg-8 profile_descrip">
            <div class="col-lg-12">
              <h1 class="profile_id"><?php echo $profile_info['name'];?></h1>
              <?php
              $descrip = explode("<br>", $profile_info['descrip']);
              for ($i=0; $i < sizeof($descrip); $i++) {
                echo "<p class='profile_text'>";
                echo $descrip[$i];
                echo "</p>";
              }
              ?>
            </div>
            <div class="col-lg-12">
              <?php
              if ($profile_info['state'] == "hired") {
                echo '<p class="text-center hire_msg">';
                echo 'Je suis indisponible pour le moment.';
                echo '</p>';
              }
              else {
                if ($profile_info['state'] == "free") {
                  echo '<p class="text-center free_msg">';
                  echo 'Je suis disponible pour les opportunités d\'emploi.';
                  echo '</p>';
                }
              }
              ?>
            </div>
            <div class="col-lg-12">
              <div class="profile_form">
                <h2>Contactez-moi</h2>
                <form method="post" action="#">
                  <div class="col-lg-6">
                    <div class="input-group custom-input-size">
                      <label for="msg_nom">Nom</label>
                      <input id="msg_nom" class="form-control" type="text" name="message_nom" pattern="[a-zA-Z]+" value="" required placeholder="Nom"/>
                    </div>
                    <div class="input-group custom-input-size form-space">
                      <label for="msg_prenom">Prénom</label>
                      <input id="msg_prenom" class="form-control" type="text" name="message_prenom" pattern="[a-zA-Z]+"value="" required placeholder="Prénom"/>
                    </div>
                    <div class="input-group custom-input-size form-space">
                      <label class="row_label"for="msg_email">Email</label>
                      <input id="msg_email" class="form-control" type="text" name="message_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="" required placeholder="Email"/>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="input-group custom-input-size">
                      <label class="row_label" for="msg_text">Message</label>
                      <textarea id="msg_text" class="form-control" rows="9" name="message_msg" required placeholder="Message"></textarea>
                    </div>
                  </div>
                  <div class="col-lg-12 submit-container">
                    <button type="submit" class="btn btn-default">Envoyer</button>
                  </div>
                </form>
                <div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <footer>
      </footer>
    </body>
    </html>
