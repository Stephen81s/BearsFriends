<?php

require ('conn.php');
echo '<form action="formulaire_import_ecriture_presta.php" method="post">';

$choix = $_POST['tableList1'];

$res = $bdd->prepare("SHOW TABLES like :maliste");//changer le ps_product% par la table rechercher

$res->execute (array(
'maliste'=>$choix));

//$res->execute($d);

while ($row = $res->fetch(PDO::FETCH_NUM)) {
echo '<strong><td>***************';
    echo '<strong><td>'.$tableList[] = $row[0];
    echo '<strong><td>***************<br/>';
    echo '</p></strong>';

    for ($i=0; $i <Count($tableList) ; $i++) {

        $select = $bdd->query('SELECT * FROM '.$tableList[$i].'');

     $total_column = $select->columnCount();



   echo'<div>';
     for ($counter = 0; $counter < $total_column; $counter ++) {
         $meta = $select->getColumnMeta($counter);
         $column[] = $meta['name'];
    

 echo $column[]=$meta['name'].': <input type="text" name=" '.$column[]=$meta['name'].' " /><br/><br/>' ;
//---------------------


     }
     echo'<br/>';
    }
   }
     echo'</div><br>';

     echo '<input type="submit" value="Valider" />';
     echo '</form>';
?>
