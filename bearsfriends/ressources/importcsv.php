
<?php

require 'conn.php';
   //On ouvre le fichier à importer en lecture seule

      $fp = fopen($_FILES['csv']['name'], "r");

      $fichier = $_FILES['csv']['name'];

$csv = new SplFileObject($fichier);
$csv->setFlags(SplFileObject::READ_CSV);
$csv->setCsvControl(';');

$fichier = mb_convert_encoding($fichier,"UTF-8","Windows-1252");


foreach($csv as $liste){
  //On assigne les variables
  //$id = $liste[0];
  $titre = $liste[1];
  $marque = $liste[2];
  $ean = $liste[3];
  $reference = $liste[4];
  //On ajoute un nouvelle enregistrement dans la table
  $reg = $bdd->prepare('INSERT INTO rb_robotsteph (titre,marque,ean,reference) VALUES (:titre,:marque,:ean,:reference)');
  $reg->execute (array(
    'titre'=>$liste[1],
    'marque'=>$liste[2],
    'ean'=>$liste[3],
    'reference'=>$liste[4]));
}

        echo "<br>Importation terminée, avec succès.";

        //On ferme le fichier
        fclose($fp);

?>
