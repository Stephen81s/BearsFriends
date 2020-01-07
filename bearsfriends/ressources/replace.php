
<?php
    require 'conn.php';


          $req = $bdd->query('SELECT  ean FROM rb_prixwebmin' );
          while ($donnees = $req->fetch())
          {
              $eancode[] = array($donnees['ean']);
            }
      $taille =sizeof($eancode);
      for ($i= 0;$i<$taille; $i++)
      {
          $req = $bdd->prepare("SELECT  ean , vendeur ,reference, MIN(prix) AS prix ,titre ,marque,photo,description FROM rb_prixweb  WHERE ean = :ean AND prix IN(SELECT MIN(prix) FROM rb_prixweb WHERE ean = :ean);") ;
          $ean= $eancode[$i][0];
          $req->execute (array('ean' => $ean ));
          while ($donnees = $req->fetch())
          {
            $ean2 = $donnees['ean'];
            $reference = $donnees['reference'];
            $marque = $donnees['marque'];
            $titre = $donnees['titre'];
            $prix = $donnees['prix'];
            $vendeur = $donnees['vendeur'];
            $photo = $donnees['photo'];
            $description = $donnees['description'];
            $ref = array ('ref' => $ean);
            //echo  '<br/>  ean : ' .$ean2 . ' prix : '.$prix.' vendeur : '.$vendeur;

      }
      $req = $bdd->prepare('insert into rb_prixperso (titre,marque,ean,reference,prix,vendeur,prixachat,margemin,photo,description) values (:titre,:marque,:ean,:reference,:prix,:vendeur,:prixachat,:margemin,:photo,:description)');
      $req->execute (array(
        'titre' =>$titre,
        'marque' =>$marque,
        'ean'=>$ean,
        'reference'=>$reference,
        'prix'=>$prix,
        'vendeur'=>'stephen',
        'prixachat' => $prixachat = $prix / 2,
        'margemin' => $margemin = $prixachat * 1.2,
        'photo'=> $photo,
        'description'=> $description));
      }

$req->closeCursor();









      ?>
