<html>
<meta charset="utf-8" />
<form method="POST" action="importcsv.php" enctype="multipart/form-data">




    <!-- On limite le fichier à 1Go -->

    <input type="hidden" name="MAX_FILE_SIZE" value="1000000000">
    <br/>
    <div class="form-group">


        <center><p><h4>Sélectionner fichier CSV : </h4></p></center>
        <label class="col-md-4 control-label" for="csv"></label>
        <div class="col-md-4">
        <input id="csv" name="csv" class="input-file" type="file">
        </div>
    </div>

    <br/><br/>
    <center><input type="submit" name="envoyer" value="Envoyer le fichier"></center>
    </form>
    </html>
