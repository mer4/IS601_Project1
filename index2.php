<?php
//set error reporting on
ini_set('display_errors', 'On');
error_reporting(E_ALL);

//gets name of file from URL
$name = $_REQUEST['file'];

$handle = fopen($name, "r");
echo '<table>';
//displays header row
if (true) {
	$csvcontents = fgetcsv($handle);
	echo '<tr>';
	foreach ($csvcontents as $headercolumn) {
		echo "<th>$headercolumn</th>";
	}
	echo '</tr>';
}
//displays other rows
while ($csvcontents = fgetcsv($handle)) {
	echo '<tr>';
	foreach ($csvcontents as $column) {
		echo "<td>$column</td>";
	}
	echo '</tr>';
}
echo '</table>';
fclose($handle);

/*
echo "<html><body><table>\n\n";
$f = fopen($name, "r");
while (($line = fgetcsv($f)) !== false) {
        echo "<tr>";
	foreach ($line as $cell) {
		echo "<td>" . htmlspecialchars($cell) . "</td>";
	}
	echo "</tr>\n";
}
fclose($f);
echo "\n</table></body></html>";
*/

?>
