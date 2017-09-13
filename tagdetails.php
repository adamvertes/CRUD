<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tag details</title>
</head>

<body>
<?php
        $id = filter_input(INPUT_POST, 'id') or die('missing parameter');

 
        
        require_once('dbcon2.php');
        $sql = 'INSERT INTO images_has_tags (images_id, tags_id) values (?, ?)';
        $stmt = $con->prepare($sql);
        $stmt->bind_param('s', $tag);
        $stmt->execute();
           echo $tag. 'added to DB';
	
         ?>
</body>
</html>