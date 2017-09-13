<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Image details</title>
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
	 <?php
	$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT)
		or die('Missing/illegal categoryid parameter');
?>
         <?php
			require_once 'dbcon2.php';
			$sql = 'select distinct tags.tag from tags, images_has_tags, images where tags.id = images_has_tags.tags_id and images_has_tags.images_id = ?';
			$stmt = $con->prepare($sql);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->bind_result($tags_id);
			while($stmt->fetch()){
				echo '<li>'.$tags_id.''.PHP_EOL;
			}
        ?>
	 
		 
		 
			 <?php
	require_once('dbcon2.php');
	$sql = 'SELECT title, url FROM images WHERE id=?';
	$stmt = $con->prepare($sql);
	$stmt->bind_param('i', $id);
	$stmt->execute();
	$stmt->bind_result($title, $url);
	
	while($stmt->fetch()){ ?>
		
	<h2><?=$id?>: <a href="tags.php?imagesid=<?=$id?>"><?=$title?></a></h2>
	<img src="<?=$url?>" width="20%" />
	
	
	
<?php } ?>
				 
					 <form action="tagdetails.php" method="post">
						 <select name="id">
						 <?php
							 require_once('dbcon2.php');
							 $sql = 'Select tag, ID from tags;';
							 $stmt = $con->prepare($sql);
							 $stmt->execute();
							 $stmt->bind_result($tag, $id);
							 while ($stmt->fetch()){
							   echo '<option value="'.$id.'" >'.$tag.'</option>'.PHP_EOL;
							 }
						 ?>
						 <input type="submit" value="Add Tag">
						 </select>
					 </form>
    
	</div> 


	</div>
	<br>
	<a href="viewimages.php" class="button">Back</a>
</body>
</html>