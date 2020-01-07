
<?php
require 'conn.php';
$req = $bdd->prepare('INSERT INTO ps_product_shop(
  id_product,id_category_default,id_tax_rules_group,on_sale,online_only,ecotax,minimal_quantity,
    low_stock_threshold,low_stock_alert,price,wholesale_price,unity,unit_price_ratio,additional_shipping_cost,
    customizable,text_fields,uploadable_files,active,redirect_type,id_type_redirected,available_for_order,available_date,
    show_condition,condition,show_price,indexed,visibility,cache_default_attribute,advanced_stock_management,date_add,
    date_upd,pack_stock_type,id_shop)
  VALUES (
    :id_product,:id_category_default,:id_tax_rules_group,:on_sale,:online_only,:ecotax,:minimal_quantity,:
    low_stock_threshold,:low_stock_alert,:price,:wholesale_price,:unity,:unit_price_ratio,:additional_shipping_cost,:
    customizable,:text_fields,:uploadable_files,:active,:redirect_type,:id_type_redirected,:available_for_order,:available_date,:
    show_condition,:condition,:show_price,:indexed,:visibility,:cache_default_attribute,:advanced_stock_management,:date_add,:
    date_upd,:pack_stock_type,:id_shop)');



$req->execute (array(
  'id_product'=>$_POST['id_product'],
  'id_category_default'=>$_POST['id_category_default'],
  'id_tax_rules_group'=>$_POST['id_tax_rules_group'],
  'on_sale'=>$_POST['on_sale'],
  'online_only'=>$_POST['online_only'],
  'ecotax'=>$_POST['ecotax'],
  'minimal_quantity'=>$_POST['minimal_quantity'],
  'low_stock_threshold'=>$_POST['low_stock_threshold'],
  'low_stock_alert'=>$_POST['low_stock_alert'],
  'price'=>$_POST['price'],
  'wholesale_price'=>$_POST['wholesale_price'],
  'unity'=>$_POST['unity'],
  'unit_price_ratio'=>$_POST['unit_price_ratio'],
  'additional_shipping_cost'=>$_POST['additional_shipping_cost'],
  'customizable'=>$_POST['customizable'],
  'text_fields'=>$_POST['text_fields'],
  'uploadable_files'=>$_POST['uploadable_files'],
  'active'=>$_POST['active'],
  'redirect_type'=>$_POST['redirect_type'],
  'id_type_redirected'=>$_POST['id_type_redirected'],
  'available_for_order'=>$_POST['available_for_order'],
  'available_date'=>$_POST['available_date'],
  'show_condition'=>$_POST['show_condition'],
  'condition'=>$_POST['condition'],
  'show_price'=>$_POST['show_price'],
  'indexed'=>$_POST['indexed'],
  'visibility'=>$_POST['visibility'],
  'cache_default_attribute'=>$_POST['cache_default_attribute'],
  'advanced_stock_management'=>$_POST['advanced_stock_management'],
  'date_add'=>$_POST['date_add'],
  'date_upd'=>$_POST['date_upd'],
  'pack_stock_type'=>$_POST['pack_stock_type'],
  'id_shop'=>$_POST['id_shop']));


$req->closeCursor();
var_dump($_POST);

  ?>
