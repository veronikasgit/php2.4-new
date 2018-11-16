<?php

session_start();

//unset($_SESSION['do_login']);
unset($_SESSION['login']);
header('Location: ../index.php');

?>