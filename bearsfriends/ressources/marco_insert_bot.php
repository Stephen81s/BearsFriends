<?php

require ('conn.php');



$res = $bdd->query("SHOW TABLES like 'ps_product'");
//$res->execute($d);

while ($row = $res->fetch(PDO::FETCH_NUM)) {
echo '<strong><td>***************';
    echo '<strong><td>'.$tableList[] = $row[0];
    echo '<strong><td>***************<br/>';
    echo '</p></strong>';




    for ($i=0; $i <Count($tableList) ; $i++) {

        $select = $bdd->prepare('INSERT INTO '.$tableList[$i].'(');

     $total_column = $select->columnCount();



   echo'<div>';
     for ($counter = 0; $counter < $total_column; $counter ++) {
         $meta = $select->getColumnMeta($counter);
         $column[] = $meta['name'];
         //echo '<input type="checkbox" name="check_list[]" >'. $column[] = $meta['name'].'<br>';

//---------------------------
var_dump($column);
 echo $column[]=$meta['name'].' values ( : '.$column[]=$meta['name'].')\');<br/><br/>' ;

//---------------------


     }

       $res->execute (array($column[]=$meta['name']=> $_POST $column[]=$meta['name']));
     echo'<br/>';
    }
   }
     echo'</div><br>';

     echo '</form>';
     var_dump($_POST);
?>
