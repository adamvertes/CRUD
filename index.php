<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Image upload</title>
<style>
	.button {
    background-color: #563F27;
    border: none;
    color: #FFF9F3;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 18px;
    margin: 4px 2px;
    cursor: pointer;
}
	body {
		background: #AA6C39; 
		font-family: 'Chalkduster', sans-serif; 
		color: #FFF9F3; 
		text-align: center;
		line-height: 300%;
	}
	
</style>
</head>

<body>
	<h1>Welcome to your image uploader!</h1>
	<a href="viewimages.php" class="button">Check uploaded images</a>
	<h2>Select an image to upload:</h2>
	<form action="upload.php" method="post" enctype="multipart/form-data">
    Add a title:<input type="text" name="title" id="title"><br>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
</body>
</html>