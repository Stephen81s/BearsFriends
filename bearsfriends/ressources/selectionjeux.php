<?php
require 'conn.php';
$req = $bdd->prepare('SELECT nom, prix FROM jeux_video WHERE possesseur = :possesseur AND prix <= :prixmax order by prix');
$req->execute(array('possesseur' => $_GET['possesseur'], 'prixmax' => $_GET['prix_max']));

echo '<ul>';
while ($donnees = $req->fetch())
{
    echo '<li>' . $donnees['nom'] . ' (' . $donnees['prix'] . ' EUR)</li>';
}
echo '</ul>';

$req->closeCursor();

?>