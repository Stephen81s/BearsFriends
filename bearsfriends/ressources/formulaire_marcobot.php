<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon super site</title>
    </head>

    <body>

    <!-- Le corps -->

    <div id="corps">
         <center>  <h1>marco_bot</h1>
           <?php

           require ('conn.php');
           echo '<form action="marcobot.php" method="post">';

           $res = $bdd->query("SHOW TABLES like '%'");//changer le ps_product% par la table rechercher


           echo '<select name="tableList2">';

           while ($row = $res->fetch(PDO::FETCH_NUM)) {
               $tableList1[] = $row[0];


              }
              var_dump($tableList1);
              for ($i=0; $i <Count($tableList1) ; $i++) {

                echo '<option value='.$tableList1[$i].'>'.$tableList1[$i].'</option>';


              }
                echo '</select>';
              echo '  <input type="submit" name="submit" value="valider" />
              </form>';
           ?>




</form>

    </div>
    <!-- Le pied de page -->


    </body>
</html>
