<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Saisie des informations du produits</title>
    </head>

</head>
<body>

	<form action="formulaire_import_ecriture_presta.php" method="post" enctype="multipart/form-data">
	<p>
		Active :
		<input type="radio" name="active" value="oui" id="oui" checked="checked" /> <label for="oui">oui</label>
		<input type="radio" name="active" value="non" id="non" /> <label for="non">non</label></br></br>
		<label for="name">Name : </label><input type="text" name="name" ><br /><br/>
		<label for="name">Catégorie : </label><input type="text" name="categorie" ><br /><br/>
		<label for="name">Price taxe included : </label><input type="text" name="priceTaxeIncl" ><br /><br/>
		<label for="name">Tax rules ID : </label><input type="text" name="TaxRuleId" ><br /><br/>
		<label for="name">Wholesale price : </label><input type="text" name="wholePrice" ><br /><br/>
		On Sale :
		<input type="radio" name="onSale" value="oui" id="oui" checked="checked" /> <label for="oui">oui</label>
		<input type="radio" name="onSale" value="non" id="non" /> <label for="non">non</label></br></br>
		<label for="name">Discount amount : </label><input type="text" name="discountAmount" ><br /><br/>
		<label for="name">Discount percent : </label><input type="text" name="discountPercent" ><br /><br/>
		<label for="name">Discount from (yyyy-mm-dd)     : </label><input type="text" name="discountFrom" ><br /><br/>
		<label for="name">Discount to (yyyy-mm-dd)  : </label><input type="text" name="discountTo" ><br /><br/>
		<label for="name">Reference : </label><input type="text" name="ref" ><br /><br/>
		<label for="name">Supplier reference : </label><input type="supplRef" name="ref" ><br /><br/>
		<label for="name">Supplier : </label><input type="text" name="supplier" ><br /><br/>
		<label for="name">Manufacturer : </label><input type="text" name="manufacturer" ><br /><br/>
		<label for="name">EAN13 : </label><input type="text" name="ean13" ><br /><br/>
		<label for="name">UPC : </label><input type="text" name="upc" ><br /><br/>
		<label for="name">Ecotax : </label><input type="text" name="ecotax" ><br /><br/>
		<label for="name">Width : </label><input type="text" name="width" ><br /><br/>
		<label for="name">Height : </label><input type="text" name="height" ><br /><br/>
		<label for="name">Depth : </label><input type="text" name="depth" ><br /><br/>
		<label for="name">Weight : </label><input type="text" name="weight" ><br /><br/>
		<label for="name">Quantity : </label><input type="text" name="quantity" ><br /><br/>
		<label for="name">Minimal quantity : </label><input type="text" name="minQuantity" ><br /><br/>
		<label for="name">Low Stock level : </label><input type="text" name="lowStock" ><br /><br/>
		<label for="name">Visibility : </label><input type="text" name="visibility" ><br /><br/>
		<label for="name">Additional shipping cost : </label><input type="text" name="addShippCost" ><br /><br/>
		<label for="name">Unity : </label><input type="text" name="unity" ><br /><br/>
		<label for="name">Unit price : </label><input type="text" name="unitPrice" ><br /><br/>
		<label for="name">Short description  : </label><input type="text" name="shortDescr" ><br /><br/>
		<label for="name">Description : </label><input type="text" name="description" ><br /><br/>
		<label for="name">Tags : </label><input type="text" name="tags" ><br /><br/>
		<label for="name">Meta title : </label><input type="text" name="metaTitle" ><br /><br/>
		<label for="name">Meta keywords  : </label><input type="text" name="metaKey" ><br /><br/>
		<label for="name">Meta description  : </label><input type="text" name="metaDesc" ><br /><br/>
		<label for="name">URL rewritten : </label><input type="text" name="urlRewrit" ><br /><br/>
		<label for="name">Text when in stock  : </label><input type="text" name="TextWhenStock" ><br /><br/>
		<label for="name">Text when backorder allowed  : </label><input type="text" name="TextWhenBackAllo" ><br /><br/>
		Available for order :
		<input type="radio" name="availableOrder" value="oui" id="oui" checked="checked" /> <label for="oui">oui</label>
		<input type="radio" name="availableOrder" value="non" id="non" /> <label for="non">non</label></br></br>
		<label for="name">Product available date  : </label><input type="text" name="prodAvaiDate" ><br /><br/>
		<label for="name">Product creation date  : </label><input type="text" name="prodCreatDate" ><br /><br/>
		Show price :
		<input type="radio" name="showPrice" value="oui" id="oui" checked="checked" /> <label for="oui">oui</label>
		<input type="radio" name="showPrice" value="non" id="non" /> <label for="non">non</label></br></br>
		<label for="name">Image URLs  : </label><input type="text" name="imageUrl" ><br /><br/>
		<label for="name">Image alt texts : </label><input type="text" name="imageAltText" ><br /><br/>
		Delete existing images :
		<input type="radio" name="deleteExistImg" value="oui" id="oui" checked="checked" /> <label for="oui">oui</label>
		<input type="radio" name="deleteExistImg" value="non" id="non" /> <label for="non">non</label></br></br>
		<label for="name">Feature(Name:Value:Position) : </label><input type="text" name="feature" ><br /><br/>
		Available online only :
		<input type="radio" name="availableOnline" value="oui" id="oui" checked="checked" /> <label for="oui">oui</label>
		<input type="radio" name="availableOnline" value="non" id="non" /> <label for="non">non</label></br></br>
		Condition Customizable :
		<input type="radio" name="conditCusto" value="oui" id="oui" checked="checked" /> <label for="oui">oui</label>
		<input type="radio" name="conditCusto" value="non" id="non" /> <label for="non">non</label></br></br>
		Uploadable files :
		<input type="radio" name="uploadFile" value="oui" id="oui" checked="checked" /> <label for="oui">oui</label>
		<input type="radio" name="uploadFile" value="non" id="non" /> <label for="non">non</label></br></br>
		Text fields :
		<input type="radio" name="textField" value="oui" id="oui" checked="checked" /> <label for="oui">oui</label>
		<input type="radio" name="textField" value="non" id="non" /> <label for="non">non</label></br></br>
		<label for="name">Out of stock : </label><input type="text" name="outOfStock" ><br /><br/>
		<label for="name">ID / Name of shop  : </label><input type="text" name="idNameShop" ><br /><br/>
		<label for="name">Advanced stock management : </label><input type="text" name="advancedStockManag" ><br /><br/>
		<label for="name">Depends On Stock : </label><input type="text" name="dependOnStock" ><br /><br/>
		<label for="name">Warehouse : </label><input type="text" name="warehouse" ><br /><br/>
		<input type="submit" value="Valider" />

	</p></form>';





</body>
</html>
