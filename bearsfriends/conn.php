<?php
$varconn = getcwd();
$varconn = $varconn.'\conn.php';
//echo $varconn;
try
{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host=localhost;dbname=bearsfriends;charset=utf8', 'root', 'Monvirus81', $pdo_options);
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
