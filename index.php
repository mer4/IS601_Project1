<html>
<body>

<form action="index.php" method="post" enctype="multipart/form-data">
Select image to upload:
<input type="file" name="fileToUpload" id="fileToUpload">
<input type="submit" value="Upload File" name="submit">
</form>

</body>
</html>

<?php 

if(isset($_POST["submit"])) {
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$file_ext= pathinfo($target_file,PATHINFO_EXTENSION);

	if ($file_ext!="csv") {
		echo "Please upload a CSV file";
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
         		echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	        } else {
		        echo "Sorry, there was an error uploading your file.";
		}
	}
}

?>