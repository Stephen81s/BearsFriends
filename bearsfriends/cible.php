<?php
if (empty ($_SESSION))
{
}
else {
  
  session_destroy();
}
?>
<html>
<h1>Bear cub Search</h1>
    <?php include("entete.php"); ?>
    <?php include("lesmenus\menu.php"); ?><br/><br/>
    <hr>
    <body>
    <div id="corps">
<?php

$ok = null;
$roro = null;
$roroa = array();

$lec = $bdd->query('SELECT * FROM utilisateur');

while ($donnees = $lec->fetch())
{
  if ($_POST['pseudo'] == $donnees['pseudo'] AND $_POST['password'] == $donnees['password'])
  {
    $roro = true;;
    $roroa[]=$roro;
    if(isset ($_SESSION))
    {
      $_SESSION['pseudo'] = $_POST['pseudo'];
      $_SESSION['password'] = $_POST['password'];
      $_SESSION['role'] = $donnees['role'];
    }
  }
  else
  {
    $roro = false;
      $roroa[]=$roro;
  }
}
  $lec->closeCursor();

if (in_array(true, $roroa))
{
    $ok = true;
}
else
{
    $ok = false;
}

if ($ok == true)
{
    switch($_SESSION['role'])
      {
        case $_SESSION['role'] =='admin':
          include ('pagesweb\cibleadmin.php');
        break;

        case $_SESSION['role'] =='membre':
          include ('pagesweb\ciblemembre.php');
        break;

        case $_SESSION['role'] =='root':
          include ('pagesweb\cibleroot.php');
        break;
  }
  $lec->closeCursor();
}
else
{
  $lec = $bdd->query('SELECT * FROM utilisateur');
    while ($donnees = $lec->fetch())
    {
      switch ($_SESSION)
      {
        case $_SESSION['pseudo'] == null and $_SESSION['password'] == null :
          echo '<body onLoad="alert(\'pseudo et/ou password incorect\')">';
          echo '<meta http-equiv="refresh" content="0;URL=index.php">';
        break;

        case  $_SESSION['pseudo'] == null:
          echo '<body onLoad="alert(\'pseudo et/ou password incorect\')">';
          echo '<meta http-equiv="refresh" content="0;URL=index.php">';
        break;

        case  $_SESSION['password'] == null:
          echo '<body onLoad="alert(\'pseudo et/ou password incorect\')">';
          echo '<meta http-equiv="refresh" content="0;URL=index.php">';
        break;

        case  $_SESSION['pseudo'] != $donnees['pseudo'] OR $_SESSION['password'] != $donnees['password']:
          echo '<body onLoad="alert(\'pseudo et/ou password incorect\')">';
          echo '<meta http-equiv="refresh" content="0;URL=index.php">';

        break;
    }

    }
}


include("pied_de_page.php");

?>

   </body>
</html>

</p>
