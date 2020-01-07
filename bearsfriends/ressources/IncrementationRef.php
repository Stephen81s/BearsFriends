<?php
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
?>
