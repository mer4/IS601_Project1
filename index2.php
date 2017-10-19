<?php

//set error reporting on
ini_set('display_errors', 'On');
error_reporting(E_ALL);

$obj = new main();

class main {

	public function __construct() {

		//gets name of file from URL
		$name = $_REQUEST['file'];

		$handle = fopen($name, "r");
		stringFunctions::printOut("<html><body><table>");
		//displays header row
		if (TRUE) {
			$filecontents = fgetcsv($handle);
			stringFunctions::printOut("<tr>");
			foreach ($filecontents as $headercolumn) {
				stringFunctions::printOut("<th>$headercolumn</th>");
			}
			stringFunctions::printOut("</tr>");
		}
		//displays other rows
		while ($filecontents = fgetcsv($handle)) {
			stringFunctions::printOut("<tr>");
			foreach ($filecontents as $column) {
				stringFunctions::printOut("<td>$column</td>");
			}
			stringFunctions::printOut("</tr>");
		}
		stringFunctions::printOut("</table></body></html>");
		fclose($handle);
	}
}

class stringFunctions {

        static public function printOut($string) {
		echo $string;
	}
}

/*
basic way of creating a table
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
