<html>
<?php
 $var = array(
'var1' =>'active',
'var2' =>'name',
'var3' =>'categories',
'var4' =>'price_tax_included',
'var5' =>'tax_rules_ID',
'var6' =>'wholesale_price',
'var7' =>'on_sale',
'var8' =>'discount_amount',
'var9' =>'discount_percent',
'var10' =>'discount_from_(yyyy-mm-dd)',
'var11' =>'discount_to_(yyyy-mm-dd)',
'var12' =>'reference',
'var13' =>'supplier_reference',
'var14' =>'supplier',
'var15' =>'manufacturer',
'var16' =>'ean13',
'var17' =>'upc',
'var18' =>'ecotax',
'var19' =>'width',
'var20' =>'height',
'var21' =>'depth',
'var22' =>'weight',
'var23' =>'quantity',
'var24' =>'minimal_quantity',
'var25' =>'low_stock_level',
'var26' =>'additional_shipping_cost',
'var27' =>'unity',
'var28' =>'unit_price',
'var29' =>'description_short',
'var30' =>'description',
'var31' =>'tags_(x,y,z...)',
'var32' =>'meta_title',
'var33' =>'meta_keywords',
'var34' =>'meta_description',
'var35' =>'URL_rewritten',
'var36' =>'text_when_in_stock',
'var37' =>'text_when_backorder_allowed',
'var38' =>'available_for_order_(0_=_No,_1_=_Yes)',
'var39' =>'product_available_date',
'var40' =>'product_creation_date',
'var41' =>'show_price',
'var42' =>'image_URLs_(x,y,z...)',
'var43' =>'image_alt_texts_(x,y,z...)',
'var44' =>'delete_existing_images_(0_=_No,_1_=_Yes)',
'var45' =>'feature(Name:Value:Position)',
'var46' =>'available_online_only_(0_=_No,_1_=_Yes)',
'var47' =>'condition',
'var48' =>'customizable',
'var49' =>'uploadable_files',
'var50' =>'text_fields',
'var51' =>'out_of_stock',
'var52' =>'id_shop',
'var53' =>'advanced_stock_management',
'var54' =>'depends_On_Stock',
'var55' =>'warehouse',
'var56' =>'visibility');
                ?>

<form action="formulaire_import_ecriture_presta.php" method="post">
  <?php
  for ($i= 1;$i<57; $i++)
 {
     //echo " 'var$i' =>'',</p>"
    echo $var['var'.($i)]. " <input type=\"text\" name=\"".$var['var'.($i)]."\" /></p>";


}
?>
<input type="submit" value="Valider" />
</form>





</html>
