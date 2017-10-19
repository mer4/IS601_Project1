<html>
<body>

<form action="index.php" method="post" enctype="multipart/form-data">
Select CSV file to upload:
<input type="file" name="fileToUpload" id="fileToUpload">
<input type="submit" value="Upload File" name="submit">
</form>

</body>
</html>

<?php 
//set error reporting on
ini_set('display_errors', 'On');
error_reporting(E_ALL);

if(isset($_POST["submit"])) {
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$file_ext = pathinfo($target_file,PATHINFO_EXTENSION);

	if ($file_ext!="csv") {
		echo "Please upload a CSV file.";
	} else {
		if(file_exists($target_file)) {
			echo "The file already exists.";
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
         			echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
				header("Location:index2.php?page=$pageName&file=$target_file");
			} else {
		        	echo "Sorry, there was an error uploading your file.";
			}
		}
	}
}

?>
