<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Delete tag</title>
</head>

<body>
<?php
            $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT) or die('Missing/illegal parameter');
            require_once 'dbcon2.php';
            $sql = 'Delete from tags where id=?';
            $stmt = $con->prepare($sql);
            $stmt->bind_param('i', $id);
            $stmt->execute();
            if ($stmt->affected_rows >0 ){
                echo 'Tag deleted from list';
				echo '<br><a href="tags.php">Go back</a>';
            }
            else {
                echo 'No tag deleted';
            //	echo $stmt->error;
            }
            ?>
</body>
</html>