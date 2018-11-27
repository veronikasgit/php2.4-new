<?php

include "core/auth.php";

if (isset($_SESSION['login']) && !empty($_SESSION['login'])) {   
    echo '<h2>' . $_SESSION['login'] . "!" . '</h2>'; 

    if ($_SESSION['login'] === "guest") {
        echo "Вы вошли как НЕавторизованный пользователь " . '<br>'. '<br>';
        echo '<br>' . '<a href="list.php">Перейти к списку тестов</a>' . '<br>';
        echo '<a href="index.php">Вернуться на страницу авторизации</a>' . '<br>'. '<br>';
  		exit;
    } else {    
        echo "Вы вошли как авторизованный пользователь" . '<br>' . '<br>';  
		echo '<br>' . '<a href="list.php">Перейти к списку тестов</a>' . '<br>';
		echo '<a href = "core/logout.php">Выйти из учетной записи</a>' . '<br>' . '<br>' . '<hr>';
    }
} else {
    http_response_code(403);
    exit('<h1>403 Forbidden</h1><p>Перейти к <a href="index.php">форме авторизации</a></p>');
}


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