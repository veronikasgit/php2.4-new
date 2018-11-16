<?php 

$filelist = glob('../example/*.json');

if(isset($_POST['download'])) {
	if (!empty($_FILES) && array_key_exists('test', $_FILES)) {
	
		$f_type = $_FILES['test']['type'];
	
		if ($f_type === "application/json")	 {
			$hash = ($_FILES['test']['name'].time());
			move_uploaded_file($_FILES['test']['tmp_name'], "../example/$hash.json");
	        header('Location: ../list.php');	 
	        exit;
		} elseif ($f_type !== "application/json") {
			echo "Неверный формат файла! Попробуйте еще раз!";
		}

	} 
}