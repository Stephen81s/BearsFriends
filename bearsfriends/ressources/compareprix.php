<?php
    require 'conn.php';

//$req = $bdd->query('SELECT * FROM rb_prixwebmin WHERE NOT EXISTS (SELECT * FROM prixperso WHERE rb_prixwebmin.ean=prixperso.ean);
$req = $bdd->query('SELECT ean FROM rb_prixperso' );
$req2 = $bdd->query('SELECT ean FROM rb_prixperso' );



      $req1 = $bdd->query('SELECT rb_prixwebmin.ean, rb_prixwebmin.prix as concurent, rb_prixperso.prix as moi ,rb_prixperso.margemin as margemin ,rb_prixperso.prixachat as prixachat FROM rb_prixwebmin inner join rb_prixperso on rb_prixwebmin.ean = rb_prixperso.ean ' );
      while ($donnees = $req1->fetch())
      {
        $ean = $donnees['ean'];
        $prix = $donnees['moi'];
        $prixc = $donnees['concurent'];
        $margemin = $donnees['margemin'];
        $prixachat = $donnees['prixachat'];
        $diff = $prix - $prixc;
        $nprix = $prixc - 1;


switch($prix)
{
// si mon prix est superieur au meilleur prix des concurent et que celui ci est inferieur  a ma marge alors je met mon prix a ma marge
  case $prixc <= $margemin and $prix >= $prixc:
      echo ' case 1 pour le code barre '.$ean.'
            le prix concurent est de ' .$prixc.'
            et mon prix est de <strong>'.$prix.'</strong>
            la difference de prix est de '.$diff.'
            ma marge est a <strong>'.$margemin.'</strong>
            je doit donc metre le prix a '.$nprix.'<br/>';

            $req2 = $bdd->prepare('UPDATE rb_prixperso SET prix =:nprix  WHERE ean =:ean');
            $req2->execute (array('ean'=>$ean,'nprix'=>$nprix));
            $req2->closeCursor();
  break;


case $prixc <= $margemin and  $prix <= $prixc :
    echo 'case 2 pour le code barre '.$ean.'
          le prix concurent est de ' .$prixc.'
          et mon prix est de '.$prix.'
          la difference de prix est de '.$diff.'
          ma marge est a '.$margemin.'
          je doit donc descend le prix a '.$margemin.'<br/>';
    $req2 = $bdd->prepare('UPDATE rb_prixperso SET prix =:margemin  WHERE ean =:ean');
    $req2->execute (array('ean'=>$ean,'margemin'=>$margemin));
    $req2->closeCursor();
break;

case $prixc <= $margemin and  $prix = $prixc :
echo 'case 3 pour le code barre '.$ean.'
      le prix concurent est de ' .$prixc.'
      et mon prix est de '.$prix.'
      la difference de prix est de '.$diff.'
      ma marge est a '.$margemin.'
      je doit donc descend le prix a '.$margemin.'<br/>';
    $req2 = $bdd->prepare('UPDATE rb_prixperso SET prix =:margemin  WHERE ean =:ean');
    $req2->execute (array('ean'=>$ean,'margemin'=>$margemin));
    $req2->closeCursor();
break;

case $prixc >= $margemin and  $prix >= $prixc :
echo 'case 4 pour le code barre '.$ean.'
      le prix concurent est de ' .$prixc.'
      et mon prix est de '.$prix.'
      la difference de prix est de '.$diff.'
      ma marge est a '.$margemin.'
      je doit donc descend le prix a '.$nprix.'<br/>';
      $req2 = $bdd->prepare('UPDATE rb_prixperso SET prix =:nprix  WHERE ean =:ean');
      $req2->execute (array('ean'=>$ean,'nprix'=>$nprix));
      $req2->closeCursor();
break;




case  $prixc >= $margemin and  $prix <= $prixc :
echo 'case 5 pour le code barre '.$ean.'
      le prix concurent est de ' .$prixc.'
      et mon prix est de '.$prix.'
      la difference de prix est de '.$diff.'
      ma marge est a '.$margemin.'
      je doit donc descendre le prix a '.$nprix.'<br/>';
      $req2 = $bdd->prepare('UPDATE rb_prixperso SET prix =:nprix  WHERE ean =:ean');
      $req2->execute (array('ean'=>$ean,'nprix'=>$nprix));
      $req2->closeCursor();
break;

case $prixc >= $margemin and  $prix = $prixc :
echo 'case 6 pour le code barre '.$ean.'
      le prix concurent est de ' .$prixc.'
      et mon prix est de '.$prix.'
      la difference de prix est de '.$diff.'
      ma marge est a '.$margemin.'
      je doit donc descendre le prix a '.$margemin.'<br/>';
      $req2 = $bdd->prepare('UPDATE rb_prixperso SET prix =:margemin  WHERE ean =:ean');
     $req2->execute (array('ean'=>$ean,'margemin'=>$margemin));
     $req2->closeCursor();
break;


}
  }





      ?>
