<?php /* Template Name: Profile */ ?>

<?php
    get_header( 'profile' );
?>

<!-- ouvrir header,php -->

<?php
$id=$_GET['id'];

$user_info = get_userdata($id);
$photo = get_avatar_url($id);
// Contrôler si ACF est actif
if ( !function_exists('get_field') ) return;
$linkedin = get_field('linkedin', "user_".$id);
$github = get_field('github', "user_".$id);
$twitter = get_field('twitter', "user_".$id);
$cv = get_field('cv', "user_".$id);
$citation = get_field('citation', "user_".$id);
$skills= [get_field('competence_1', "user_".$id), get_field('competence_2', "user_".$id), get_field('competence_3', "user_".$id), get_field('competence_4', "user_".$id), get_field('competence_5', "user_".$id), get_field('competence_6', "user_".$id)];
$skills_note= [get_field('note_competence_1', "user_".$id), get_field('note_competence_2', "user_".$id), get_field('note_competence_3', "user_".$id), get_field('note_competence_4', "user_".$id), get_field('note_competence_5', "user_".$id), get_field('note_competence_6', "user_".$id)];

if (isset($_POST['message_email'])) {
  $to = $user_info->user_email;
  $headers[] = 'From: '.$_POST['message_nom'].' '.$_POST['message_prenom'].' <'.$_POST['message_email'].'>';
  $subject = $_POST['message_nom']." ".$_POST['message_prenom']." a un message pour vous.";
  $message = $_POST['message_msg'];
  $send_mail= wp_mail( $to, $subject, $message, $headers);
  if ($send_mail==true) {
    echo "mail send";
  }
  else {
    echo "mail error";
  }
}
?>
<main role="main">
  <!-- section -->
  <section class="profile_section">
    <div class="col-lg-12 col-md-12 col-sm-12 no-padding">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="col-lg-offset-1 col-lg-3 col-md-offset-1 col-md-3 col-sm-offset-1 col-sm-4">
          <div class="col-lg-12 col-md-12 col-sm-12 profile_photo" title="Photo de <?php echo $user_info->user_nicename;?>" style="background-image:url(<?php echo $photo;?>);">

          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 profile_cv_button_container">
            <?php
            if ($cv != NULL || $cv != "") {
              echo '<a class="cv_link" href="'.$cv.'">';
                echo '<div class="profile_cv_button">';
                  echo '<span class="profile_cv_text">CV</span>';
                  echo '</div>';
                  echo "</a>";
                }
                ?>
              </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-7 profile_descrip">
              <div class="col-lg-12 col-md-12 col-sm-12">
                <h1 class="profile_id"><?php echo $user_info->user_nicename;?></h1>
                <p class="profile_descrip_text">
                  <?php
                  echo the_author_meta('description', $id);
                  ?>
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 profile_quote_container">
            <div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-12">
              <blackquote class="profile_quote"><q><?php echo $citation; ?></q></blackquote>
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="col-lg-offset-1 col-lg-3 col-md-offset-1 col-md-3 col-sm-offset-1 col-sm-3">
              <div class="col-lg-12 col-md-12 col-sm-12 profile_skill no-padding">
                <?php
                if (!empty($skills) && !empty($skills_note)) {
                  echo '<h2 class="text-center">Mes compétences</h2>';
                  echo '<canvas id="myChart" width="400" height="400"></canvas>';
                }
                ?>
                <script type="text/javascript">
                $(document).ready(function () {
                  var skill=<?php echo json_encode($skills); ?>;
                  var skill_rate=[<?php echo $skills_note[0]; ?>, <?php echo $skills_note[1]; ?>, <?php echo $skills_note[2]; ?>, <?php echo $skills_note[3]; ?> ,<?php echo $skills_note[4]; ?> , <?php echo $skills_note[5]; ?>];
                  var ctx = document.getElementById("myChart");
                  var myRadarChart = new Chart(ctx, {
                    type: 'radar',
                    data : {
                      labels: skill,
                      datasets: [
                        {
                          label: "Mes compétences",
                          backgroundColor: "rgba(192,86,102,0.2)",
                          borderColor: "rgba(190,10,38,1)",
                          pointBackgroundColor: "rgba(190,10,38,1)",
                          pointBorderColor: "#fff",
                          pointHoverBackgroundColor: "#fff",
                          pointHoverBorderColor: "rgba(190,10,38,1)",
                          data: skill_rate
                        }],
                      },
                      options: {
                        scale: {
                          reverse: false,
                          ticks: {
                            beginAtZero: true,
                            max: 5,
                          }
                        },
                        legend: {
                          display: false,
                        }
                      }
                    });
                  });
                  </script>
                </div>
              </div>
              <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="profile_form">
                    <h2>Me contacter</h2>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <div class="col-lg-offset-4 col-lg-4 col-md-offset-4 col-md-4 col-sm-offset-4 col-sm-4 profile_social">
                        <?php
                        if ($linkedin != "" || $github != "" || $twitter != "") {
                          // echo "<h2 class='text-center'>Mon réseau</h2>";
                          echo "<div class='flex-row social_icon_container'>";
                          if ($linkedin != "") {
                            echo '<a href="http://www.'.$linkedin.'" title="Linkedin de '.$user_info->user_nicename.'">';
                            // echo '<img src="'.get_stylesheet_directory_uri().'/images/linkedin2.png" alt=""/>';
                            echo '<i class="fa fa-linkedin fa-2x social_icon" aria-hidden="true"></i>';
                            echo '</a>';
                          }
                          if ($github != "") {
                            echo '<a href="http://www.'.$github.'" title="Github de '.$user_info->user_nicename.'">';
                            // echo '<img src="'.get_stylesheet_directory_uri().'/images/github2.png"  alt=""/>';
                            echo "<i class='fa fa-github fa-4x social_icon2' aria-hidden='true'></i>";
                            echo '</a>';
                          }
                          if ($twitter != "") {
                            echo '<a href="http://www.'.$twitter.'" title="Twitter de '.$user_info->user_nicename.'">';
                            // echo '<img src="'.get_stylesheet_directory_uri().'/images/twitter2.png"  alt=""/>';
                            echo '<i class="fa fa-twitter fa-2x social_icon" aria-hidden="true"></i>';
                            echo '</a>';
                          }
                          echo "</div>";
                        }
                        ?>
                      </div>
                    </div>
                    <form method="post" action="#">
                      <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="input-group custom-input-size">
                          <label for="msg_nom">Nom</label>
                          <input id="msg_nom" class="form-control profile_field" type="text" name="message_nom" pattern="[a-zA-Z]+" value="" required placeholder="Nom"/>
                        </div>
                        <div class="input-group custom-input-size form-space">
                          <label for="msg_prenom">Prénom</label>
                          <input id="msg_prenom" class="form-control profile_field" type="text" name="message_prenom" pattern="[a-zA-Z]+"value="" required placeholder="Prénom"/>
                        </div>
                        <div class="input-group custom-input-size form-space">
                          <label class="row_label"for="msg_email">Email</label>
                          <input id="msg_email" class="form-control profile_field" type="text" name="message_email"  value="" required placeholder="Email"/>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="input-group custom-input-size">
                          <label class="row_label" for="msg_text">Message</label>
                          <textarea id="msg_text" class="form-control profile_field" rows="9" name="message_msg" required placeholder="Message"></textarea>
                        </div>
                      </div>
                      <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 submit-container">
                        <button type="submit" class="profile_send_button">Envoyer</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

          </section>
          <!-- /section -->
        </main>
        <?php
            get_footer( 'profile' );
        ?>
