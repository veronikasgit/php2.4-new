<?php
session_start();
$filelist = glob('/core/users/*.json');
echo '<h2>' . $_SESSION['login'] . "!" . '</h2>'; 
if (isset($_SESSION['login'])) {   
    
    if ($_SESSION['login'] === "guest") {
        echo "Вы вошли как НЕавторизованный пользователь " . '<br>'. '<br>';
        // echo '<br>' . '<a href="list.php">Перейти к списку тестов</a>' . '<br>';
        echo '<a href="index.php">Вернуться на страницу авторизации</a>' . '<br>'. '<br>';
  		
    } else {    
         echo "Вы вошли как авторизованный пользователь" . '<br>' . '<br>';  
        // echo '<a href="admin.php">Загрузить новый тест</a>' . '<br>';
		// echo '<br>' . '<a href="list.php">Перейти к списку тестов</a>' . '<br>';
		echo '<a href = "core/logout.php">Выйти из учетной записи</a>' . '<br>' ;
    }
} else {
    http_response_code(403);
    exit('<h1>403 Forbidden</h1><p>Перейти к <a href="index.php">форме авторизации</a></p>');
}
