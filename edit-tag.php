<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit tag</title>
<style>
	.button {
    background-color: #563F27;
    border: none;
    color: #FFF9F3;
    padding: 15px 32px;
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
		line-height: 300%;
		margin-left: 5%;
	}
	</style>
</head>

<body>

<?php
	
if($cmd = filter_input(INPUT_POST, 'cmd')){
	if($cmd == 'rename_tag'){
		
		$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT)
			or die('Missing/illegal id parameter');
		$tag = filter_input(INPUT_POST, 'tag')
			or die('Missing/illegal name parameter');
		
		require_once('dbcon2.php');
		$sql = 'UPDATE tags SET tag=? WHERE id=?';
		$stmt = $con->prepare($sql);
		$stmt->bind_param('si', $tag, $id);
		$stmt->execute();
		
		if($stmt->affected_rows > 0){
			echo 'Tag name changed';
		}
		else{
			echo 'Nothing was changed';
		}
		
	}
	else {
		die('Unknown cmd parameter');
	}
}
?>


	<h1>Rename category</h1>
<?php
	
	if(empty($id)){
		$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT)
			or die('Missing/illegal id parameter');
	}
	
	require_once('dbcon2.php');
	$sql = 'SELECT tag FROM tags WHERE id=?';
	$stmt = $con->prepare($sql);
	$stmt->bind_param('i', $id);
	$stmt->execute();
	$stmt->bind_result($tag);
	while($stmt->fetch()) {}
	
	?>
	
<p>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
    	<legend>Rename tag</legend>
    	<input name="id" type="hidden" value="<?=$id?>" />
    	<input name="tag" type="text" value="<?=$tag?>" placeholder="Categoryname" required />
		<button name="cmd" value="rename_tag" type="submit">Update tag</button>
</form>
</p>
	
	<hr>
	<a href="tags.php?imagesid=<?=$id?>" class="button">Go Back</a>
</body>
</html>