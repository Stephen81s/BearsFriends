<?php
session_start();

require 'conn.php';
?>
<!DOCTYPE html>
<link href="stylebot.css" rel="stylesheet" type="text/css" />
<html>
    <head>
        <meta charset="utf-8" />
       <h2> <title>Bear cub Search</title>
    </head>
    <body>
<?php

$ok=null;
$roro = null;
$roroa = array();
$lec = $bdd->query('SELECT * FROM utilisateur');

while ($donnees = $lec->fetch())
{

  if ($_POST['mail'] == $donnees['mail'] or $_POST['pseudo'] == $donnees['pseudo'] OR $_POST['mail'] == $donnees['mail'] AND $_POST['pseudo'] == $donnees['pseudo'])
  {
    $roro = true;
    // var_dump($roro);
    $roroa[]=$roro;
  }
  else
  {
    $roro = false;
      // var_dump($roro);
      $roroa[]=$roro;
  }
}
$lec->closeCursor();


// var_dump(array($roroa));

if (in_array(true, $roroa))
{
    // echo "mail ou pseudo existant</br>";
    $ok = false;
}
else
{
    // echo "mail et pseudo inexistant</br>";
    $ok = true;
}


if ($ok == true)
{
  $req = $bdd->prepare('INSERT INTO utilisateur (nom,prenom,pseudo,mail,password,role) VALUE (:nom,:prenom,:pseudo,:mail,:password,:role)');
  $req->execute (array( 'nom'=>$_POST['nom'],
                        'prenom'=>$_POST['prenom'],
                        'pseudo'=>$_POST['pseudo'],
                        'mail'=>$_POST['mail'],
                        'password'=>$_POST['password'],
                        'role'=>$_POST['role']));
  $req->closeCursor();

  echo 'felicitation vous ete desormais '.$_POST['role'].' <p> vos identifients : </br>'.$_POST['pseudo']. '<p> et votre mot de passe : </br>'.$_POST['password']. ' <p><p> vous allez etre redirigez automatiqument sur la page de connection ';
  echo '<meta http-equiv="refresh" content="5; URL=index.php" />';
}
else
{
echo 'ce mail  ou pseudo est deja utilise </br>  vous allez etre redirigez automatiqument sur la page de connection ';

  echo '<meta http-equiv="refresh" content="3; URL=senregistrer.php" />';

}


session_destroy();

exit();
?>

    </body>
</html>
