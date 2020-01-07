<!-- permet de lire la bdd rb_robotsteph -->

<html>
  <head>
    <meta charset="utf-8" />
  </head>
<?php
require '../../conn.php';
  $req = $bdd->query('SELECT * FROM rb_robotsteph' );
    $remplace =' €';
    $remplace1 =',';
    $remplace3 =' ';

while ($donnees = $req->fetch())
  {
    //echo  '<br/>reference : '.$donnees['reference'].' ean : '.$donnees['ean'];
    //$ean = $donnees['ean'];
    //$reference = $donnees['reference'];
    //$marque = $donnees['marque'];
    //$titre = $donnees['titre'];
    //$ref = array ('ref' => $ean);
    var_dump($donnees);
  }
$req->closeCursor();
?>
</html>
