
<!DOCTYPE html>

<html>
 <h1>Bear cub Search</h1>
<?php include("entete.php");
      include("lesmenus\menu.php");
?><br/><br/>
        <hr>

    <body>

        <!-- Le corps -->
        <div id="corps">
<?php
$i=0;
var_dump($_POST);
var_dump($_SESSION);


$lec = $bdd->query('SELECT * FROM utilisateur where role!="root"');
while ($donnees = $lec->fetch())
{
$req = $bdd->prepare('UPDATE utilisateur SET role =:role'.$i.' WHERE pseudo =:pseudo'.$i);
$req->execute (array( 'pseudo'.$i=>$_SESSION['ppseudo'.$i],
                      'role'.$i=>$_POST['role'.$i]));
                      $i++;
                    }
$req->closeCursor();
?>
        </div>
        <!-- Le pied de page -->
<?php include("pied_de_page.php"); ?>

    </body>
</html>
