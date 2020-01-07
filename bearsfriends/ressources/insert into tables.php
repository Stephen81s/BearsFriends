
<?php
require 'conn.php';
var_dump($_POST);
$reg = $bdd->prepare('insert into ps_product(id_product,active,wholesale_price,ecotax,minimal_quantity,visibility,shipping_cost,unity,
                                              show_price,condition,customizable,uploadable_files,text_fields,Advanced_stock_management)

values (:id_product,
:active,
:wholesale_price,
:ecotax,
:minimal_quantity,
:visibility,
:shipping_cost,
:unity,
:show_price,
:condition,
:customizable,
:uploadable_files,
:text_fields,
:Advanced_stock_management)');

//  for ($i= 0;$i<58; $i++)
 //  {
 //    echo "'replace$i'=>$_POST['replace$i'];<br/>";
 // }
 $reg->execute (array(
'Product_ID'=>$_POST['Product_ID'],
'active'=>$_POST['active'],
'wholesale_price'=>$_POST['wholesale_price'],
'ecotax'=>$_POST['ecotax'],
'minimal_quantity'=>$_POST['minimal_quantity'],
'visibility'=>$_POST['visibility'],
'shipping_cost'=>$_POST['shipping_cost'],
'unity'=>$_POST['unity'],
'show_price'=>$_POST['show_price'],
'condition'=>$_POST['condition'],
'customizable'=>$_POST['customizable'],
'uploadable_files'=>$_POST['uploadable_files'],
'text_fields'=>$_POST['text_fields'],
'Advanced_stock_management'=>$_POST['Advanced_stock_management']));


  ?>
