<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Gallery</title>
<style>
	body {
		background: #AA6C39; 
		font-family: 'Chalkduster', sans-serif; 
		color: #FFF9F3; 
		text-align: center;
		line-height: 300%;
	}
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
	</style>
</head>

<body>
	<h1>Gallery</h1>
	<a href="index.php" class=button>Back</a>
	<a href="tags.php" class=button>See image tags</a>
	<p>Click on the titles to see details of images</p>
	
<?php
	require_once('dbcon2.php');
	$sql = 'SELECT id, title, url FROM images';
	$stmt = $con->prepare($sql);
	$stmt->execute();
	$stmt->bind_result($id, $title, $url);
	
	while($stmt->fetch()){ ?>
		
	<h2><?=$id?>: <a href="imagedetails.php?id=<?=$id?>"><?=$title?></a></h2>
	<img src="<?=$url?>" width="20%" />
<?php } ?>
</body>
</html>