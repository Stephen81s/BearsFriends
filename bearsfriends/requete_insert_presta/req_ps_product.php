
<?php
require 'conn.php';
$req = $bdd->prepare('INSERT INTO ps_product(
id_shop_default,id_manufacturer, id_supplier, reference, supplier_reference, location, width, height, depth, weight, quantity_discount,
ean13, isbn, upc, cache_is_pack, cache_has_attachments, is_virtual, state, additional_delivery_times, id_category_default,
id_tax_rules_group, on_sale, online_only, ecotax, minimal_quantity, low_stock_threshold, low_stock_alert, price, wholesale_price,
unity, unit_price_ratio, additional_shipping_cost, customizable, text_fields, uploadable_files, active, redirect_type, id_type_redirected,
available_for_order, available_date, show_condition, condition, show_price, indexed, visibility, cache_default_attribute,
advanced_stock_management, date_add, date_upd, pack_stock_type)
VALUES (
id_shop_default,:id_manufacturer,:id_supplier,:reference,:supplier_reference,:location,:width,:height,:depth,:weight,:quantity_discount,
ean13,:isbn,:upc,:cache_is_pack,:cache_has_attachments,:is_virtual,:state,:additional_delivery_times,:id_category_default,
id_tax_rules_group,:on_sale,:online_only,:ecotax,:minimal_quantity,:low_stock_threshold,:low_stock_alert,:price,:wholesale_price,
unity,:unit_price_ratio,:additional_shipping_cost,:customizable,:text_fields,:uploadable_files,:active,:redirect_type,:id_type_redirected,
available_for_order,:available_date,:show_condition,:condition,:show_price,:indexed,:visibility,:cache_default_attribute,
advanced_stock_management,:date_add,:date_upd,:pack_stock_type)');


$req->execute (array(
'id_shop_default'=>$_POST ['id_shop_default'] ,
'id_manufacturer'=>$_POST ['id_manufacturer'] ,
'id_supplier'=>$_POST ['id_supplier'] ,
'reference'=>$_POST ['reference'] ,
'supplier_reference'=>$_POST ['supplier_reference'] ,
'location'=>$_POST ['location'] ,
'width'=>$_POST ['width'] ,
'height'=>$_POST ['height'] ,
'depth'=>$_POST ['depth'] ,
'weight'=>$_POST ['weight'] ,
'quantity_discount'=>$_POST ['quantity_discount'] ,
'ean13'=>$_POST ['ean13'] ,
'isbn'=>$_POST ['isbn'] ,
'upc'=>$_POST ['upc'] ,
'cache_is_pack'=>$_POST ['cache_is_pack'] ,
'cache_has_attachments'=>$_POST ['cache_has_attachments'] ,
'is_virtual'=>$_POST ['is_virtual'] ,
'state'=>$_POST ['state'] ,
'additional_delivery_times'=>$_POST ['additional_delivery_times'] ,
'id_category_default'=>$_POST ['id_category_default'] ,
'id_tax_rules_group'=>$_POST ['id_tax_rules_group'] ,
'on_sale'=>$_POST ['on_sale'] ,
'online_only'=>$_POST ['online_only'] ,
'ecotax'=>$_POST ['ecotax'] ,
'minimal_quantity'=>$_POST ['minimal_quantity'] ,
'low_stock_threshold'=>$_POST ['low_stock_threshold'] ,
'low_stock_alert'=>$_POST ['low_stock_alert'] ,
'price'=>$_POST ['price'] ,
'wholesale_price'=>$_POST ['wholesale_price'] ,
'unity'=>$_POST ['unity'] ,
'unit_price_ratio'=>$_POST ['unit_price_ratio'] ,
'additional_shipping_cost'=>$_POST ['additional_shipping_cost'] ,
'customizable'=>$_POST ['customizable'] ,
'text_fields'=>$_POST ['text_fields'] ,
'uploadable_files'=>$_POST ['uploadable_files'] ,
'active'=>$_POST ['active'] ,
'redirect_type'=>$_POST ['redirect_type'] ,
'id_type_redirected'=>$_POST ['id_type_redirected'] ,
'available_for_order'=>$_POST ['available_for_order'] ,
'available_date'=>$_POST ['available_date'] ,
'show_condition'=>$_POST ['show_condition'] ,
'condition'=>$_POST ['condition'] ,
'show_price'=>$_POST ['show_price'] ,
'indexed'=>$_POST ['indexed'] ,
'visibility'=>$_POST ['visibility'] ,
'cache_default_attribute'=>$_POST ['cache_default_attribute'] ,
'advanced_stock_management'=>$_POST ['advanced_stock_management'] ,
'date_add'=>$_POST ['date_add'] ,
'date_upd'=>$_POST ['date_upd'] ,
'pack_stock_type'=>$_POST ['pack_stock_type']));


$req->closeCursor();
var_dump($_POST);

  ?>
