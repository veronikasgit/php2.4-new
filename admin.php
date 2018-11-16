<?php

include "core/auth.php";
echo '<a href="list.php">Перейти к списку тестов</a>' . '<br>';
echo '<hr>';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Lesson</title>
</head>
<body>

<form action="core/download.php" method="POST" enctype="multipart/form-data">
	
	<div>Тест</div>
	<div><input type="file" name="test"></div>

	<input type="submit" name="download">
</form>

</body>
</html>