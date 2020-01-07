<?php
session_start ();
date_default_timezone_set('Europe/Paris');
?>
<html>
<h1>Bear cub Search</h1>
    <?php include("entete.php"); ?>
    <?php include("menu.php"); ?><br/><br/>
    <hr>
    <body>
  Ma recherche reference:
<?php
if (isset($_SESSION['login']) && isset($_SESSION['password']))
{
  echo 'Bonjour '.$_SESSION['login'].' entrez vos references' ;
}
else
{
  echo 'Les variables ne sont pas déclarées.';
}

// On crée notre tableau de recherche
$ref = array (
    'ref1' => $_POST['refe1'],
    'ref2' => $_POST['refe2'],
    'ref3' => $_POST['refe3'],
    'ref4' => $_POST['refe4']
    );

//debut du tableau graphique
echo '<br><br><br>';
echo'<table>';
echo '<caption>Tableau avec grand nombre de donné google';
// tete tableau graphique
   echo'<thead>';
       echo'<tr>';
          echo '<th>titre</th>';
          echo '<th>reference</th>';
          echo '<th>vendeur</th>';
          echo '<th>prix</th>';
       echo'</tr>';
  echo'</thead>';

//variable d'incrementation de mes ref
$i= 0;

$message_mail =
  '<head><style>';
$message_mail.=
  'table
      {
      border: medium solid #6495ed;
      border-collapse: collapse;
      width: 50%;
      }

    th
      {
      font-family: monospace;
      border: thin solid #6495ed;
      width: 30%;
      padding: 5px;
      background-color: #D0E3FA;
      background-image: url(sky.jpg);
      }

    td
      {
      font-family: sans-serif;
      border: thin solid #6495ed;
      width: 30%;
      padding: 5px;
      text-align: center;
      background-color: #ffffff;
      }

    caption
      {
      font-family: sans-serif;
      }';
$message_mail.=
  '</style></head>';
$message_mail.=
  "<br><caption> Tableau des prix</caption>
    <center><table>google shopping</table></center>
      <tr>
        <th>produit cherche</th>
        <th>Reference</th>
        <th> Marchand </th>
        <th> Prix </th>
      </tr>";
//debut de ma boucle while
while ($i<count($ref))
{
  //on recherche les prix etc par page
$adresse = ('https://www.google.fr/search?q='.$ref['ref'.($i+1)].'&safe=off&rlz=1C1CHBF_frFR791FR791&source=lnms&tbm=shop&sa=X&ved=0ahUKEwizo6q_5qjcAhWLDOwKHbrzAwgQ_AUIDCgD&biw=1745&bih=861#spd=16927029663448434382');
$page = file_get_contents ($adresse);
$page = utf8_encode ($page);
$goo1 = preg_match_all ('#</b></div><div>(.*?)</div>#', $page, $vendeur);
$goo2 = preg_match_all ('#<img alt=(.*?)src#', $page, $titre);
$goo3 = preg_match_all ('#<div class="A8OWCb"><div><b>(.*?)</b>#', $page, $prix);


// boucle pour trouver tout les prix des article

    for($j = 0; $j < count($prix[1]); $j++) // On parcourt le tableau $prix[1]
      {
        echo'<tbody>';
           echo'<tr>';
              echo '<td> '.$titre[1][$j].' </td>';
              echo '<td> '.$ref['ref'.($i+1)].' </td>';
              echo '<td> '.$vendeur[1][$j].' </td>';
              echo '<td> '.$prix[1][$j].' </td>';
          echo'</tr>';
      echo'</tbody>';

      $message_mail .= '<tbody>';
       $message_mail .='<tr>';
           $message_mail .='<td> '.$titre[1][$j].' </td>';
           $message_mail .='<td> '.$ref['ref'.($i+1)].' </td>';
           $message_mail .='<td> '.$vendeur[1][$j].' </td>';
           $message_mail .='<td> '.$prix[1][$j].' </td>';
       $message_mail .='</tr>';

         // Les lignes du tableau
$lignes[] = array($titre[1][$j],$ref['ref'.($i+1)],$vendeur[1][$j],$prix[1][$j]);
      }

//on incremente si ..
$i++;
}
?>


<?php

echo '<br><br><br>';
echo'<table>';
   echo '<caption>Tableau avec grand nombre de donné le guide </caption>';

   echo'<thead>';
       echo'<tr>';
         echo '<th>titre</th>';
          echo '<th>reference</th>';
          echo '<th>vendeur</th>';
          echo '<th>prix</th>';
          echo '<th>photo</th>';
       echo'</tr>';
  echo'</thead>';

$i= 0;

while ($i<count($ref))

{

echo $ref['ref'.($i+1)];
$adresse = ('http://www.leguide.com/search.htm?keywords='.$ref['ref'.($i+1)]);
$page = file_get_contents ($adresse);
$gui1 = preg_match_all ('#class="item-seller-text gopt show">(.*?)</strong>#', $page, $vendeur);
$gui2 = preg_match_all ('#<h4 class="item-title gopt" data-ot-r="O-C-PF-offer-title-MOSAIC-1"><span>(.*?)</span></h4>#', $page, $titre);
$gui3 = preg_match_all ('#<span class="item-price-total">(.*?)</span>#', $page, $prix);
$gui4 = preg_match_all ('class="img-responsive" width="150" height="150" src=(.*?)" alt="', $page, $photo);
//var_dump($vendeur);
//var_dump($titre);
//var_dump($prix);

if  (isset($page))
{

if ($ref or $titre[1][0] != null)
  {

for($j = 0; $j < count($prix[1]); $j++) // On parcourt le tableau $prix[1]
{
   echo'<tbody>';
       echo'<tr>';
          echo '<td> '.$titre[1][0].' </td>';
          echo '<td> '.$ref['ref'.($i+1)].' </td>';
          echo '<td> '.$vendeur[1][$j].' </td>';
          echo '<td> '.$prix[1][$j].' </td>';
          echo '<td> '.$photo[1][$j].'</td>';
       echo'</tr>';
  echo'</tbody>';

    $message_mail .= '<tbody>';
       $message_mail .='<tr>';
          $message_mail .='<td> '.$titre[1][0].' </td>';
           $message_mail .='<td> '.$ref['ref'.($i+1)].' </td>';
           $message_mail .='<td> '.$vendeur[1][$j].' </td>';
           $message_mail .='<td> '.$prix[1][$j].' </td>';
       $message_mail .='</tr>';
  $message_mail .='</tbody>';

  // Les lignes du tableau
$lignes[] = array($titre[1][0],$ref['ref'.($i+1)],$vendeur[1][$j],$prix[1][$j]);

}


}
 else
  {
    echo'<tbody>';
       echo'<tr>';
          echo '<td> non trouver </td>';
          echo '<td> non trouver </td>';
          echo '<td> non trouver</td>';
          echo '<td> non trouver </td>';
       echo'</tr>';
  echo'</tbody>';
  }

}
$i++;
}

$date= date("Y-m-d H-i-s");
// Paramétrage de l'écriture du futur fichier CSV
$chemin = 'robot '.$date.'.csv';
$delimiteur = ';'; // Pour une tabulation, utiliser $delimiteur = "t";

// Création du fichier csv (le fichier est vide pour le moment)
// w+ : consulter http://php.net/manual/fr/function.fopen.php
$fichier_csv = fopen($chemin, 'w+');

// Si votre fichier a vocation a être importé dans Excel,
// vous devez impérativement utiliser la ligne ci-dessous pour corriger
// les problèmes d'affichage des caractères internationaux (les accents par exemple)
fprintf($fichier_csv, chr(0xEF).chr(0xBB).chr(0xBF));

// Boucle foreach sur chaque ligne du tableau
foreach($lignes as $ligne)
{
  // chaque ligne en cours de lecture est insérée dans le fichier
  // les valeurs présentes dans chaque ligne seront séparées par $delimiteur
  fputcsv($fichier_csv, $ligne, $delimiteur);
}


// fermeture du fichier csv
fclose($fichier_csv);
echo 'sv creer!';


$headers = 'MIME-Version: 1.0'."\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8'."\r\n";
$destinataire = 'trahsounet@gmail.com';
// Adresse email du destinataire
$sujet = 'prix rdvc';
// Titre de l'email
//$messages = 'Bonjour. Ceci est un automatique ';
// Contenu du message de l'email
 mail($destinataire, $sujet, $message_mail,$headers);
// Fonction principale qui envoi l'email
echo 'Email envoyé!';
echo'<tfoot>';
       echo'<tr>';
          echo '<th>titre</th>';
          echo '<th>reference</th>';
          echo '<th>vendeur</th>';
          echo '<th>prix</th>';
            echo '<th>photo</th>';
       echo'</tr>';
  echo'</tfoot>';
  echo'</table>';

//envoimail(mail($destinataire , $sujet , $message_mail, $headers));
  $_SESSION['send']= $message_mail;


?>


<form>
   <a href="mail.php"method="POST" TARGET="_BLANK"><input type="button" name="bouton"value="envoie de mail "/></a></p>
  <a href="fichiercsv.php"method="POST" TARGET="_BLANK"><input type="button" name="bouton"value="Creation CSV "/></a>
</form>

</body>
</html>

<p><a href="formulaire.php">clique ici pour revenir à la page formulaire.php.</a> </p>
