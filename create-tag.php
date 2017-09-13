<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Create tag</title>
</head>

<body>
<?php
        $tag = filter_input(INPUT_POST, 'tag') or die('missing parameter');

 
        
        require_once 'dbcon2.php';
        $sql = 'INSERT INTO `tags`(`tag`) VALUES (?);';
        $stmt = $con->prepare($sql);
        $stmt->bind_param('s', $tag);
        $stmt->execute();
           echo 'Tag added to DB';
			echo '<br><a href="tags.php">Go back</a>';
         ?>
</body>
</html>