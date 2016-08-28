<?php
include("../../bdd/bdd.php");

$resultat = $bdd->query('SELECT * FROM profil WHERE id = "'.$_POST['userid'].'"');
$row= $resultat->rowCount();
if ($row != NULL && $row != 0) {
  while ($donnees = $resultat->fetch()) {
    $tab = array($donnees['Competences'], $donnees['Competences_stats']);
  }
  echo $tab[0].",". $tab[1];
}
else {
  echo "error";
}
?>
