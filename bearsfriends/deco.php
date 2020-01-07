<?php
date_default_timezone_set('Europe/Paris'); session_start (); ?>
<!DOCTYPE html>
<html>
<meta http-equiv="refresh" content="3; URL=index.php" />
    <?php include("entete.php"); ?>

    <hr>
<body>

    <div id="corps">
<?php


$date= date("Y-m-d H-i-s");
$heure = date("H");
$minute = date("i");
$jours = date('D');
$jour = date("d");
$mois =date('m');
$ans =date('Y');

$search  = array('mon', 'tue', 'wed', 'thu', 'fri','sat','sun');
$replace = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi','Samedi','Dimanche');
$subject = 'mon';
echo 'nous somme le ';
echo str_replace($search, $replace, $subject);
echo " $jour $mois $ans il est $heure h $minute.<p/>";
if ($heure >= 18)
{
  echo "bonne soirée";
}
else{
  echo "bonne journee";
}


session_destroy();

exit();
?>
    </div>
<?php include("pied_de_page.php"); ?>

  </body>
</html>
