


<?php

                  echo '<form action="tableauv3.php" method="post">';
                echo'<a href="attributionrole.php">clique ici pour attriburz les role de chaq\'un.</a> </p>';
                echo'<p>';
                echo'<input type="text" name="refe1"/></p>';
                echo'<input type="text" name="refe2"/></p>';
                echo'<input type="text" name="refe3"/></p>';
                echo'<input type="text" name="refe4"/></p>';
                echo'</p>';
                echo '<p><center><input type="submit" value="Valider" /></center></form></p>';

                echo '<form action="rechercheauto.php" method="post">
                        <input type="submit" value="recherche auto sur leguide" />
                      </form>';

                      echo '<form action="formulaireimport.php" method="post">
                              <input type="submit" value="importcsv" />
                            </form>';


include("pied_de_page.php");
?>

   
