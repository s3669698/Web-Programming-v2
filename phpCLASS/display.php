<?php
  function read_categories($file_name, $name) {
    $fp = fopen($file_name, 'r');
    $all = [];
    while ($row = fgetcsv($fp)) {
      if ($row[1] == $name) {
        $all[] = $row;
      }
    }
    fclose($fp);
    return $all;
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Browse</title>
  </head>
  <body>

<?php
<<<<<<< Updated upstream
  $file_name = "csv/categories.csv";
=======
  $file_name = "../csv/categories.csv";
>>>>>>> Stashed changes
  $catename = "Department stores";
  $all = read_categories($file_name, $catename);

  $table = '<table>';
  if ($_GET['category'] == 'Department') {
      $table .= '<tr>';
      $table .= '<td>' . $row[0] . '</td>';
      $table .= '<td>' . $row[1] . '</td>';
      $table .= '</tr>';
  }
  $table .= '</table>';
  echo $table;
?>
  </body>
</html>
