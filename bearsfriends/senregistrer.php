
<!DOCTYPE html>

<html>
 <h1>Bear cub Search</h1>
        <?php include("entete.php"); ?>
        <?php include('lesmenus\visiteur.php'); ?><br/><br/>
<hr>
    <body>

        <!-- Le corps -->

        <div id="corps">


          <h1>Enregistrement :</h1></p>


            <form action="Import_Utilisateur.php" method="post">

                 entrez votre nom : </br>
                <input type="text" name="nom" placeholder='entrez votre nom'/></p>

                entrez votre prenom : </br>
               <input type="text" name="prenom" placeholder='entrez votre prenom'/></p>

               entrez votre mail : </br>
              <input type="text" name="mail" placeholder='entrez votre mail'/></p>

              creez votre pseudo : </br>
             <input type="text" name="pseudo" placeholder='entrez votre pseudo'/></br>votre pseudo vous servira pour vous idendifier</p>

                    entrez votre mot de passe</br>
                <input type="password" name="password"/></p>
                <input type="hidden" name="role" value ="membre"/>
                <p><input type="submit" value="S'enregistrer" />
              </p>

                </form>
        </div>
        <!-- Le pied de page -->
<?php include("pied_de_page.php"); ?>

    </body>
</html>
