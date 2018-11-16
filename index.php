<?php

session_start();

$data = $_POST;

$filelist = glob('core/users/*.json');

if (isset($data['do_login'])) {

	 if (trim($data['login']) == '')
	{
		http_response_code(403);
		exit('<h1>403 Forbidden</h1><p>Перейти к <a href="index.php">форме авторизации</a></p>');
	}
	
	$directoryPath = "core/users/{$data['login']}.json";
// 	var_dump($directoryPath);
// echo '<br>';
	foreach ($filelist as $key => $filename) {
		// var_dump($filename);
		// echo '<br>';
		if ($filename === $directoryPath) {
			$file = file_get_contents($directoryPath);
			$json = json_decode($file, true);
			foreach ($json as $user) {
				if (($user['login'] === $data['login']) && ($user['password'] ===  $data['password'])) {
					$userLogin = $user['login'];
				} 
			}

			
		} 
	}
	if ($data['login'] != '') {
		if (isset($userLogin)) {
			$_SESSION['login'] = $userLogin;
			header("Location: admin.php");	
		} else {
			$_SESSION['login'] = "guest";
			header("Location: list.php");
		} 
	}
// var_dump($filelist );
	
} 

if (isset($_SESSION['login']) && (($_SESSION['login']) != "guest")) {
	echo "Вы уже авторизованы!";
	echo '<p><a href="admin.php">Загрузить новый тест</a></p>';
	echo '<p><a href="list.php">Перейти к списку тестов</a></p>';
	echo '<p><a href = "core/logout.php">Выйти из учетной записи</a></p>';
	exit;
}

?>
 
<form action="index.php" method="POST">
	
	<p>
		<p><strong>Логин</strong></p>
		<input type="text" name="login" value="<?php echo @$data['login']; ?>">
	</p>

	<p>
		<p><strong>Пароль</strong></p>
		<input type="password" name="password">
	</p>

	<p>
		<button type="submit" name="do_login">Войти</button>
	</p>

</form> 