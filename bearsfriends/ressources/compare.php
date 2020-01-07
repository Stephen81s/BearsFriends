<!DOCTYPE html>
<html>
  <body>
    <?php

    // on lit tout B
$handle = fopen("robot.csv", "r");
while (($data = fgetcsv($handle, 1000, ";")) !== FALSE)
{
  $notesA[$data[0]] = $data;
}
fclose($handle);

// on lit A et on compare avec les données de B
$handle = fopen("mesprix.csv", "r");
while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
  $line[0] = $data[0];
  $line[1] = $data[1]
  for ($i = 2; $i < 5; $i++) {
      $line[$i] = max($data[$i], $notesA[$data[0]][$i]);
  }
  $output[] = $ligne;
}
fclose($handle);

// on réecrit A avec les nouvelles valeurs
$handle = fopen('A.csv', 'w');
foreach ($output as $line) {
    fputcsv($handle, $line, ';');
}
fclose($handle);
?>
  </body>
</html>
