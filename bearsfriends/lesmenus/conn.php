<?php session_start ();require 'conn.php'; ?>
<?php
$lec1 = $bdd->query('SELECT * FROM utilisateur');

      $_SESSION['role'] = $role;

      switch($role)
        {
          case $role=='admin':
            include ('admin.php');
          break;

          case $role=='membre':
            require ('membre.php');
          break;

          case $role=='root':
            require ('root.php');
          break;

          case $role==null:
            require ('visiteur.php');
          break;
  }



?>
