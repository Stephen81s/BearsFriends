<!-- permet de lire la bdd rb_prixweb -->

<html>
  <head>
    <meta charset="utf-8" />
  </head>
<?php
require '../../conn.php';
  $req = $bdd->query('SELECT * FROM rb_prixweb' );
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
