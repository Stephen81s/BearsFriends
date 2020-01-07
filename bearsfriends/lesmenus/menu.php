
<!-- menu general qui va changer selon le role de l'utilisateur -->
<?php session_start ();require 'conn.php'; ?>
<?php
// si la variable session pseudo est vide
if(empty($_SESSION['pseudo']))
{
  // on la rempli avec les $_POST du formulaire (index.php)
  $_SESSION['pseudo'] = $_POST['pseudo'];
  $_SESSION['password'] = $_POST['password'];
}
// on lit notre base utilisateur
$lec = $bdd->query('SELECT * FROM utilisateur');
// tanqu'il y a des donne dans la BDD
while ($donnees = $lec->fetch())
{
  // avec le switch on regarde si nos sessions coresponde bien au donees de la bdd
  // si elle ne coresponde pas on n'affiche aucun menu
  switch ($_SESSION)
  {
    case $_SESSION['pseudo'] == null and $_SESSION['password'] == null:
      break;

    case $_SESSION['pseudo'] == null:
      break;

    case $_SESSION['password'] == null:
      break;

    case  $_SESSION['pseudo'] != $donnees['pseudo'] and $_SESSION['password'] != $donnees['password'] OR
          $_SESSION['pseudo'] != $donnees['pseudo'] or $_SESSION['password'] != $donnees['password']:
          
      break;
// quand les sessions corespondes on verifie son role
    case $_SESSION['pseudo'] == $donnees['pseudo'] and $_SESSION['password'] == $donnees['password']:

// on fait appel au pages concrener suivant les role defini par le switch
      switch($donnees['role'])
        {
          case $donnees['role'] =='admin':
            require ('admin.php');
          break;

          case $donnees['role'] =='membre':
            require ('membre.php');
          break;

          case $donnees['role'] =='root':
            require ('root.php');
          break;

          case $donnees['role'] ==null:
            require ('visiteur.php');
          break;
      }
}

}

?>
