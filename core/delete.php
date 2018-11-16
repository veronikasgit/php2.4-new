<?php
//echo '$_GET[delete]' . '<br>' . $_GET['delete']. '<br>';

$filelist = glob('../example/*.json');
 	// echo '$filelist ' . '<br>';
		// var_dump($filelist );
//session_start();
if (isset($_GET['delete'])) {

    $id = $_GET['delete'];
    foreach ($filelist as  $key => $filename) {
  //   	echo '$filename' . '<br>';
		// var_dump($filename);
        if ($key == $id) {  
            unlink($filename);
            header('Location: ../list.php');
        } 

    }

}

