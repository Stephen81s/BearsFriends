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
$roro=false;
$lec = $bdd->query('SELECT * FROM utilisateur');
while ($donnees = $lec->fetch())
{
  //var_dump($donnees['mail']);
//echo $_POST['mail'].'</br>';
if ($_POST['mail'] != $donnees['mail'])
{
  //echo $_POST['mail'].' est diferent de '.$donnees['mail'].'</br>';
  $roro = false;
//var_dump($roro) ;
}
else {
  //echo $_POST['mail'].' est identique que '.$donnees['mail'].'</br>';
  $roro = true;
//var_dump($roro) ;
}
}


if ($roro != true)
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
  ?>  <meta http-equiv="refresh" content="5; URL=index.php" /><?php
}
else
{
echo 'ce mail est deja utilise </br>  vous allez etre redirigez automatiqument sur la page de connection ';
    ?><meta http-equiv="refresh" content="3; URL=senregistrer.php" /><?php
}


?>

    </body>
</html>
