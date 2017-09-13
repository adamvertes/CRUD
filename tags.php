<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tags</title>
<style>
	.rename {
	background-color: #563F27;
    border: none;
    color: #FFF9F3;
    padding: 2px 2px;
    text-decoration: none;
    display: inline-block;
    font-size: 18px;
    margin: 4px 2px;
    cursor: pointer;
		
	}
	
	
	.button {
    background-color: #563F27;
    border: none;
    color: #FFF9F3;
    padding: 10px 22px;
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
<div>
	<h1>Image tags</h1>

	</div>
    <div>
            
            <form method="post" action="create-tag.php" >
                <input type="text" name="tag" placeholder="Create Tag:"/>
                <input type="submit" name="action" value="Create Tag"/>
            </form>
            
	</div>

    <div>
    <div>
    

<ul>
        <?php
			require_once 'dbcon2.php';
			$sql = 'SELECT ID, tag FROM tags';
			$stmt = $con->prepare($sql);
			$stmt->execute();
			$stmt->bind_result($id, $tag);
			while($stmt->fetch()){
				echo '<li>'.$tag.'</a><a href="edit-tag.php?id='.$id.'"><br><p class="rename">Rename</p></br></a></li>'.PHP_EOL;
			}
        ?>
    </ul>
	</div> 
	<div>
					 <form action="delete-tag.php" method="post">
						 <select name="id">
						 <?php
							 $sql = 'Select tag, id from tags;';
							 $stmt = $con->prepare($sql);
							 $stmt->execute();
							 $stmt->bind_result($tag, $id);
							 while ($stmt->fetch()){
							   echo '<option value="'.$id.'" >'.$tag.'</option>'.PHP_EOL;
							 }
						 ?>
						 <input type="submit" value="Delete Tag">
						 </select>
					 </form>

	</div>
	<br>
	<a href="viewimages.php" class="button">Back</a>
</body>
</html>