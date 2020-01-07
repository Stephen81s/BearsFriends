
<?php
require 'conn.php';

$reg1 = $bdd->prepare('INSERT INTO ps_product_lang
(id_product,delivery_in_stock, delivery_out_stock, meta_description, meta_keywords, meta_title, link_rewrite, name, description,
description_short, available_now, available_later, id_lang, id_shop)
VALUES
(:id_product,:delivery_in_stock,:delivery_out_stock,:meta_description,:meta_keywords,:meta_title,:link_rewrite,:name,:description,
  :description_short,:available_now,:available_later,:id_lang,:id_shop)');


 $reg1->execute (array(
'id_product'=>$_POST[id_product],
'delivery_in_stock'=>$_POST[delivery_in_stock],
'delivery_out_stock'=>$_POST[delivery_out_stock],
'meta_description'=>$_POST[meta_description],
'meta_keyrds'=>$_POST[meta_keyrds],
'meta_title'=>$_POST[meta_title],
'link_rewrite'=>$_POST[link_rewrite],
'name'=>$_POST[name],
'description'=>$_POST[description],
'description_short'=>$_POST[description_short],
'available_now'=>$_POST[available_now],
'available_later'=>$_POST[available_later],
'id_lang'=>$_POST[id_lang],
'id_shop'=>$_POST[id_shop]));
$req1->closeCursor();

  ?>
