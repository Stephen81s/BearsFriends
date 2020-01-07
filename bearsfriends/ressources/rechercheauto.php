<html>
<head>
    <meta charset="utf-8" />


</head>
<?php

function string2url($titre)
 {
 $titre = trim($titre);
 $titre = strtr($titre, "ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ", "aaaaaaaaaaaaooooooooooooeeeeeeeecciiiiiiiiuuuuuuuuynn");
 $titre = strtr($titre,"ABCDEFGHIJKLMNOPQRSTUVWXYZ","abcdefghijklmnopqrstuvwxyz");
 $titre = preg_replace('#([^.a-z0-9]+)#i', '-', $titre);
 $titre = preg_replace('#-{2,}#','-',$titre);
 $titre = preg_replace('#-$#','',$titre);
 $titre = preg_replace('#^-#','',$titre);
 $titre = preg_replace('#";&#','',$titre);
 return $titre;
 }




    require 'conn.php';
    $req = $bdd->query('SELECT * FROM rb_robotsteph' );

$remplace =' €';
$remplace1 =',';
$remplace3 =' ';

    echo '<br><br><br>';
    echo'<table>';
    echo '<caption>Tableau avec grand nombre de donné ';//
    // tete tableau graphique
       echo'<thead>';
           echo'<tr>';
             echo '<th>code barre</th>';
               echo '<th>reference</th>';
               echo '<th>marque</th>';
              echo '<th>titre</th>';
              echo '<th>vendeur</th>';
              echo '<th>prix</th>';
              echo '<th>photo</th>';
              echo '<th>description</th>';
           echo'</tr>';
      echo'</thead>';

      echo'<tfoot>';
             echo'<tr>';
             echo '<th>code barre</th>';
               echo '<th>reference</th>';
               echo '<th>marque</th>';
                echo '<th>titre</th>';
                echo '<th>vendeur</th>';
                echo '<th>prix</th>';
                echo '<th>photo</th>';
                echo '<th>description</th>';
             echo'</tr>';
        echo'</tfoot>';


      while ($donnees = $req->fetch())
      {
          //echo  '<br/>reference : '.$donnees['reference'].' ean : '.$donnees['ean'];
          $ean = $donnees['ean'];
          $reference = $donnees['reference'];
          $marque = $donnees['marque'];
          $titre = $donnees['titre'];
          $ref = array ('ref' => $ean);



          // $adresse = ('https://www.google.fr/search?q='.$ref['ref'].'&safe=off&rlz=1C1CHBF_frFR791FR791&source=lnms&tbm=shop&sa=X&ved=0ahUKEwizo6q_5qjcAhWLDOwKHbrzAwgQ_AUIDCgD&biw=1745&bih=861#spd=16927029663448434382');
          // $page = file_get_contents ($adresse);
          // $page = utf8_encode ($page);
          // $goo1 = preg_match_all ('#</b></div><div>(.*?)</div>#', $page, $vendeur);
          // $goo2 = preg_match_all ('#<img alt=(.*?)src#', $page, $titre);
          // $goo3 = preg_match_all ('#<div class="A8OWCb"><div><b>(.*?)</b>#', $page, $prix);

          $adresse = ('http://www.leguide.com/search.htm?keywords='.$ref['ref']);
          $page = file_get_contents ($adresse);
          preg_match_all ('#class="item-seller-text gopt show">(.*?)</strong>#', $page, $vendeur);
          preg_match_all ('#<h4 class="item-title gopt" data-ot-r="O-C-PF-offer-title-MOSAIC-1"><span>(.*?)</span></h4>#', $page, $titre);
          preg_match_all ('#<span class="item-price-total">(.*?)</span>#', $page, $prix);
          preg_match_all ('#class="img-responsive" width="150" height="150"  src="(.*?)" alt=#', $page, $photo);
          preg_match_all('#class="item-text gopt" data-ot-r="O-C-PF-offer-description-1">(.*?)</p></div>#', $page, $description); // un preg_match pour récupérer la description




          // boucle pour trouver tout les prix des article

          for($j = 0; $j < count($prix[1]); $j++) // On parcourt le tableau $prix[1]

          {
            $prix[1][$j]=str_replace($remplace,'',$prix[1][$j]);
            $prix[1][$j]=str_replace($remplace1,'.',$prix[1][$j]);
            $prix[1][$j]=str_replace($remplace3,'',$prix[1][$j]);
            echo'<tbody>';
               echo'<tr>';
                  echo '<td> '.$ean.' </td>';
                  echo '<td> '.$reference.' </td>';
                  echo '<td> '.$marque.' </td>';
                  echo '<td> '.html_entity_decode($titre[1][$j]).' </td>';
                  echo '<td> '.$vendeur[1][$j].' </td>';
                  echo '<td> '.$prix[1][$j].' </td>';
                  echo '<td> <img src="http:'.$photo[1][$j].'"></td>';
                  echo '<td>'.$description[1][$j].'</td>'; //affiche la description

              echo'</tr>';
          echo'</tbody>';

          $reg = $bdd->prepare('insert into rb_prixweb(titre,marque,ean,reference,prix,vendeur,photo,description) values (:titre,:marque,:ean,:reference,:prix,:vendeur,:photo,:description)');
          $reg->execute (array(
            'titre' =>$titre[1][$j],
            'marque' =>$marque,
            'ean'=>$ean,
            'reference'=>$reference,
            'prix'=>$prix[1][$j],
            'vendeur'=>$vendeur[1][$j],
            'photo'=>'http:'.$photo[1][$j],
            'description' => $description[1][$j]));
//echo $prix[1][$i];
          $taxe = $prix[1][$j] * 0.2;
          $prixHT = $prix[1][$j] -  $taxe;
          $product_id='';
          $etat ='1';
          $quantite ='300';
          $photo = 'http:'.$photo[1][$j];

  $lignes[] = array($product_id,
                    $etat,
                    $quantite,
                    $prixHT,
                    $titre[1][$j],
                    $marque,
                    $ean,
                    $reference,
                    $prix[1][$j],
                    $vendeur[1][$j],
                    $photo,
                    $description[1][$j]);
                      echo $photo.' code barre '.$ean.'<br>';
          }

      }


      $req->closeCursor();



          $req = $bdd->query('SELECT distinct ean FROM rb_prixweb' );
          while ($donnees = $req->fetch())
          {
              $eancode[] = array($donnees['ean']);
            }
      $taille =sizeof($eancode);
      for ($i= 0;$i<$taille; $i++)
      {
          $req = $bdd->prepare("SELECT  ean , vendeur ,reference, MIN(prix) AS prix ,titre ,marque ,photo,description FROM rb_prixweb  WHERE ean = :ean AND prix IN(SELECT MIN(prix) FROM rb_prixweb WHERE ean = :ean);") ;
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
            $description =$donnees['description'];
            $ref = array ('ref' => $ean);
          //  echo  '<br/>  ean : ' .$ean2 . ' prix : '.$prix.' vendeur : '.$vendeur;

      }
      $req = $bdd->prepare('insert into rb_prixwebmin(titre,marque,ean,reference,prix,vendeur,photo,description) values (:titre,:marque,:ean,:reference,:prix,:vendeur,:photo,:description)');
      $req->execute (array(
        'titre' =>$titre,
        'marque' =>$marque,
        'ean'=>$ean,
        'reference'=>$reference,
        'prix'=>$prix,
        'vendeur'=>$vendeur,
        'photo'=>$photo,
        'description'=>$description));
      }

$req->closeCursor();



$date= date("Y-m-d H-i-s");// Paramétrage de l'écriture du futur fichier CSV
$chemin = 'presta.csv';
$delimiteur = ';'; // Pour une tabulation, utiliser $delimiteur = "t";
$fichier_csv = fopen($chemin, 'w+');  // Création du fichier csv (le fichier est vide pour le moment)
// Si votre fichier a vocation a être importé dans Excel,
// vous devez impérativement utiliser la ligne ci-dessous pour corriger
// les problèmes d'affichage des caractères internationaux (les accents par exemple)
fprintf($fichier_csv, chr(0xEF).chr(0xBB).chr(0xBF));
// Boucle foreach sur chaque ligne du tableau
foreach($lignes as $ligne)
{
  // chaque ligne en cours de lecture est insérée dans le fichier
  // les valeurs présentes dans chaque ligne seront séparées par $delimiteur
  fputcsv($fichier_csv, $ligne, $delimiteur);
}
// fermeture du fichier csv
fclose($fichier_csv);
echo 'sv creer!';


require('replace.php');
require('liageidproduct.php');
require('compareprix.php');
require('modifpresta.php');







      ?>
</html>
