
<?php
    require 'conn.php';


    $req = $bdd->query('SELECT * FROM ps_product' );
    while ($donnees = $req->fetch())
    {
      $ean = $donnees['ean13'];

      $id_product= $donnees['id_product'];

      $req1 = $bdd->prepare('UPDATE rb_prixperso SET id_product =:id_product  WHERE ean =:ean');
      $req1->execute (array('id_product' => $id_product ,'ean' => $ean));
      var_dump($ean);
    }


    $req->closeCursor();
    $req1->closeCursor();









      ?>
