<!-- permet de lire la bdd rb_prixperso -->

<html>
  <head>
    <meta charset="utf-8" />
  </head>
<?php


require 'C:/wamp64/www/presta/robot/conn.php';
  $req = $bdd->query('SELECT * FROM rb_prixperso' );
    $remplace =' €';
    $remplace1 =',';
    $remplace3 =' ';

while ($donnees = $req->fetch())
  {
    var_dump($donnees);
  }
$req->closeCursor();
?>
</html>
