<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Upload</title>
</head>

<body>

<?php
$title = filter_input(INPUT_POST, 'title')
	or die('Missing/illegal title parameter!!!');
	
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	echo $target_file;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// If you need unique names:
//$target_file = $target_dir . uniqid().'.'.$imageFileType;	
	
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		
		
		require_once('dbcon2.php');
		
		$sql = 'INSERT INTO images (url, title) VALUES (?, ?)';
		$stmt = $con->prepare($sql);
		$stmt->bind_param('ss', $target_file, $title);
		$stmt->execute();
		if ($stmt->affected_rows > 0) {
			echo 'Filedata added to the database :-)';
		}
		else {
			echo 'Could not add the file to the database :-(';
		}
		
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
<hr>
	<a href="index.php">Back</a><br>
	<a href="viewimages.php"> Gallery </a>
</body>
</html>