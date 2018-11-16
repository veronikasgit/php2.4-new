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
       <?php if (isset($_SESSION['login']) && ($_SESSION['login'] !== "guest")): ?>
            
            <a href = "admin.php">Загрузить новый тест</a>
            <!-- <p><a href = "core/logout.php">Выйти из учетной записи</a></p> -->
        <?php endif; ?> 
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


