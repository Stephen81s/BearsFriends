
<?php
    require 'conn.php';

$req = $bdd->query('SELECT * FROM rb_prixperso' );
while ($donnees = $req->fetch())
{
  $ean13 = $donnees['ean'];
  $reference =$donnees['reference'];
  $price= $donnees['prix'];

  $req1 = $bdd->prepare('UPDATE ps_product SET price =:price ,reference =:reference WHERE ean13 =:ean13');
  $req1->execute (array('price' => $price ,'reference'=>$reference,'ean13' => $ean13));
}


$req->closeCursor();
$req1->closeCursor();
//----------------------------------------------------------------------------------------------------------------------------------
$req = $bdd->query('SELECT * FROM ps_product' );
  while ($donnees = $req->fetch())
  {
    $ean13 = $donnees['ean13'];
    $id_product = $donnees['id_product'];
    $price = $donnees['price'];

    $req1 = $bdd->prepare('UPDATE ps_product_shop SET price =:price WHERE id_product =:id_product');
    $req1->execute (array('price' => $price ,'id_product' => $id_product));
}



$req->closeCursor();
$req1->closeCursor();
//--------------------------------------------------------------------------------------


    $req = $bdd->query('SELECT * FROM rb_prixperso' );
      while ($donnees = $req->fetch())
      {
        $id_product = $donnees['id_product'];
        $name = $donnees['titre'];
        $description = $donnees['description'];

        $req1 = $bdd->prepare('UPDATE ps_product_lang SET description =:description,meta_title =:meta_title,name =:name,meta_description =:meta_description WHERE id_product =:id_product');
        $req1->execute (array ('id_product' => $id_product,
                              'meta_description'=> $description,
                              'name'=> $name,
                              'meta_title'=> $name,
                              'description'=> $description
                            ));
      }


      $req->closeCursor();
      $req1->closeCursor();



//-----------------------------------------------------------------------------------------


      ?>
