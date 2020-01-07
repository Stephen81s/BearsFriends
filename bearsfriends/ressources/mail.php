<?php session_start (); ?>
<!DOCTYPE html>
<html>
<h1>Bear cub Search</h1>
		<?php include("entete.php"); ?>
		<?php include("lesmenus\menu.php"); ?><br/><br/>
		<hr>

	<body>



<?php

$headers = 'MIME-Version: 1.0'."\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8'."\r\n";
$message = $_SESSION['send'] ;

$destinataire = 'trahsounet@gmail.com,trahs.games@gmail.com, soupart.stephen@gmail.com';
// Adresse email du destinataire
$sujet = 'prix rdvc';
// Contenu du message de l'email
mail($destinataire, $sujet, $message,$headers);
// Fonction principale qui envoi l'email
echo 'Email envoyé!';
?>

</p>
</body>
</html>

<p><a href="formulairerobotrole.php">clique ici pour revenir à la page formulaire.php.</a> </p>
