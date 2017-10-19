<?php

//set error reporting on
ini_set('display_errors', 'On');
error_reporting(E_ALL);

//Class to load classes it finds the file when the progrm starts to fail for calling a missing class
class Manage {
	public static function autoload($class) {
		//you can put any file name or directory here
		include $class . '.php';
	}
}

spl_autoload_register(array('Manage', 'autoload'));

$obj = new main();

class main {

	public function __construct() {
		//displays HTML form
		htmlFunctions::htmlForm();
		//handles file and exceptions
		if(isset($_POST["submit"])) {
			$target_dir = "uploads/";
			$file_only = basename($_FILES["fileToUpload"]["name"]);
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$file_ext = pathinfo($target_file,PATHINFO_EXTENSION);

			if ($file_ext!="csv") {
				stringFunctions::printOut('Please upload a CSV file.');
			} else {
				if (file_exists($target_file)) {
					stringFunctions::printOut('The file already exists.');
				} else {
					if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
         					stringFunctions::printOut('The file ' .
						basename($_FILES["fileToUpload"]["name"]) . ' has been uploaded.');
						$pageName = "2";
						//URL that contains file HTML table
						header("Location:index2.php?page=$pageName&file=$target_file");
					} else {
						stringFunctions::printOut('Sorry, there was an error uploading your
						file.');
					}
				}
			}
		}
	}
}

class htmlFunctions {

        static public function htmlForm() {
		$form = '<html><body>'; 
		$form.= '<form action="index.php" method="post" enctype="multipart/form-data">';
		$form.= 'Select CSV file to upload: ';
		$form.= '<input type="file" name="fileToUpload" id="fileToUpload"><input type="submit" value="Upload File" name="submit">';
		$form.= '</form></body></html>';
		stringFunctions::printOut($form);
	}
}

class stringFunctions {

	static public function printOut($string) {
		echo $string;
	}
}

?>
