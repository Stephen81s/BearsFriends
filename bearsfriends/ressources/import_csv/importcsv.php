
<?php

require '../conn.php';

   //On ouvre le fichier à importer en lecture seule
   $name = $_FILES['csv']['name'];
   $type = $_FILES['csv']['type'];
   $size = $_FILES['csv']['size'];
   $tmpName = $_FILES['csv']['tmp_name'];
   $error = $_FILES['csv']['error'];


   echo 'nom du fichier a upload : '.$name; echo '</br>';
   echo 'aucune idees de ce que c\'est : ' . $type; echo '</br>';
   echo 'poid du fichier : ' .$size; echo '</br>';
   echo 'heu che pas : ' .$tmpName ; echo '</br>';
   echo 'nonbre d\'erreur : ' .$error ; echo '</br>';


      $fp = fopen($tmpName,'r');


      $fichier = $tmpName;

$csv = new SplFileObject($fichier);
$csv->setFlags(SplFileObject::READ_CSV);
$csv->setCsvControl(';');

$fichier = mb_convert_encoding($fichier,"UTF-8","Windows-1252");


foreach($csv as $liste){
  if (!empty($liste[1]))
  {
var_dump($liste);
  //On assigne les variables
  //$id = $liste[0];
  $titre = $liste[1];
  $marque = $liste[2];
  $ean = $liste[3];
  $reference = $liste[4];
  //On ajoute un nouvelle enregistrement dans la table
  $reg = $bdd->prepare('INSERT INTO rb_robotsteph (titre,marque,ean,reference) VALUES (:titre,:marque,:ean,:reference)');
  $reg->execute (array(
    'titre'=>$titre,
    'marque'=>$marque,
    'ean'=>$ean,
    'reference'=>$reference));
}
}

        echo "<br>Importation terminée, avec succès.";

        //On ferme le fichier
      //  fclose($fp);

?>
