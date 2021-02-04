<?php

session_start();

include dirname(__FILE__) . "\\" . 'connect.php';
include dirname(__FILE__) . "\\" . 'functions.php';

$errors = array();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

	if (isset($_POST['login'])) {

		$usernameMail = filter_input(INPUT_POST, 'NameOrMail');
		$password = filter_input(INPUT_POST, 'psswd');

		if ((compruebaUsuMail($usernameMail) > 0) && (compruebaPswd($usernameMail, $password))) {

			actualitzarIniciSessio($usernameMail);

			if (filter_var($usernameMail, FILTER_VALIDATE_EMAIL)) {
				$_SESSION['username'] = getUsername($usernameMail);
			} else {
				$_SESSION['username'] = $usernameMail;
				
			}
			header('Location: home.php');
			exit;
		}else $_SESSION['noLogin'] = "<p class='alert alert-danger'>Credenciales Incorrectas</p>";
	}
}else {
	
}
?>