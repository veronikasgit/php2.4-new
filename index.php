<?php

session_start();

$data = $_POST;

$filelist = glob('core/users/*.json');

if (isset($_SESSION['login']) && (($_SESSION['login']) != "guest")) {
	echo "Вы уже авторизованы!";
	echo '<p><a href="admin.php">Загрузить новый тест</a></p>';
	echo '<p><a href="list.php">Перейти к списку тестов</a></p>';
	echo '<p><a href = "core/logout.php">Выйти из учетной записи</a></p>';
	exit;
}

if (isset($data['login'])) {

	if (trim($data['login']) == '')	{
		http_response_code(403);
		exit('<h1>403 Forbidden</h1><p>Перейти к <a href="index.php">форме авторизации</a></p>');
	} else {
	
		$directoryPath = "core/users/{$data['login']}.json";

		foreach ($filelist as $key => $filename) {
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
	
		if (isset($userLogin)) {
			$_SESSION['login'] = $userLogin;
			// var_dump($_SESSION['login']);
			header("Location: admin.php");	
		} else {
			$_SESSION['login'] = "guest";
			// var_dump($_SESSION['login']);
			header("Location: list.php");
		} 
		
	} 
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