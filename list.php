<?php

include "core/auth.php";
$filelist = glob('example/*.json');
?>

<!DOCTYPE>
<html lang="ru">
    <head>
    	<title>Домашнее задание к лекции 2.2</title>
    	<meta charset="utf-8">
    </head>
    <body>
      <!--  <?php //if (isset($_SESSION['login']) && ($_SESSION['login'] !== "guest")): ?>
            
            <a href = "admin.php">Загрузить новый тест</a>
            <p><a href = "core/logout.php">Выйти из учетной записи</a></p>
        <?php //endif; ?>  -->

<?php if (isset($_SESSION['login']) && !empty($_SESSION['login'])) {   
    echo '<h2>' . $_SESSION['login'] . "!" . '</h2>'; 

    if ($_SESSION['login'] === "guest") {
        echo "Вы вошли как НЕавторизованный пользователь " . '<br>'. '<br>';
        echo '<a href="index.php">Вернуться на страницу авторизации</a>' . '<br>'. '<br>';
    } else {    
        echo "Вы вошли как авторизованный пользователь" . '<br>' . '<br>';  
        echo '<a href="admin.php">Загрузить новый тест</a>' . '<br>';
        echo '<a href = "core/logout.php">Выйти из учетной записи</a>' . '<br>' . '<hr>' ;
    }
} else {
    http_response_code(403);
    exit('<h1>403 Forbidden</h1><p>Перейти к <a href="index.php">форме авторизации</a></p>');
}

?>
        <hr>
    	<p>Выберите тест</p>
        <ol>
            
            <?php foreach ($filelist as $key => $filename): ?>

                <li>
                    <a href = "test.php?key=<?php echo $key; ?>"><?php  echo $filename . "<br>"; ?></a>

                    <?php if (isset($_SESSION['login']) && ($_SESSION['login'] !== "guest")):?>
                        <a href = "core/delete.php?delete=<?php echo $key; ?>">Удалить</a>
                    <?php endif; ?>
                </li>

            <?php endforeach; ?>            
           
        </ol>         

	</body>
</html>


