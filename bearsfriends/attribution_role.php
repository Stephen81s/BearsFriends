
<html>
<h1>Bear cub Search</h1>
    <?php include("entete.php"); ?>
    <?php include("lesmenus\menu.php"); ?><br/><br/>
    <hr>
    <body>
    <div id="corps">


<form action="changerole.php" method="post">
<?php
echo'<table>';
echo '<caption>role des membres</caption>';
// tete tableau graphique
echo'<thead>';
   echo'<tr>';
    echo '<th>pseudo</th>';
    echo '<th>role</th>';
    echo '<th>attribution</th>';
   echo'</tr>';

echo'</thead>';

$i = 0;
$lec = $bdd->query('SELECT * FROM utilisateur where role!="root"');
while ($donnees = $lec->fetch())
{
  $role = $bdd->query('SELECT roles FROM roles_utilisateurs where roles!="root"');
  echo'<tbody>';
  echo '<td>'.$donnees['pseudo'].'</td>';
  echo '<td>'.$donnees['role'].'</td>';
  $_SESSION['ppseudo'.$i] = $donnees['pseudo'];

  ?><td><form method="post" action="changerole.php">
  <select name="role<?php echo $i ?>"><?php

  while ($donneesroles = $role->fetch())
    {
      echo '<option selected="'.$donnees['role'].'" value="'.$donneesroles['roles'].'">'.$donneesroles['roles'].'</option>';
    }
    $i++;
  echo'</tbody>';
?></select>

<?php
}

?>
<input type="submit" value="S'enregistrer" />
</form></td>

<?php

include("pied_de_page.php");
?>
  <!-- <form action="changerole.php" method="post"> -->
<!-- <p><input type="submit" value="S'enregistrer" />
</p></form> -->

<!-- <form action="changerole.php" method="post">
<a href="changerole.php" target=popup onClick="window.open('changerole.php','popup','width=900,height=900,left=auto,top=auto,scrollbars=1')"><input type="submit" name="go" value="s'enregistrer"  style="width:100px"  /></a>
</form> -->

   </body>
</html>

</p>
