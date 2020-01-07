<?php session_start ();

$i= 0;
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
