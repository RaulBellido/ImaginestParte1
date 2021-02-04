<?php
session_start();

// https://www.php.net/manual/es/function.array-push.php

include dirname(__FILE__) . "\\" . 'connect.php';
include dirname(__FILE__) . "\\" . 'functions.php';

$errors = array();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	if (isset($_POST['register'])) {

		$usuario = filter_input(INPUT_POST, 'username');
		$correo = filter_input(INPUT_POST, 'email');
		$nombre = filter_input(INPUT_POST, 'firstname');
		$apellido = filter_input(INPUT_POST, 'lastname');
		$contraseña = filter_input(INPUT_POST, 'password');
		$contraseñaV = filter_input(INPUT_POST, 'verificarpsw');

		// FALTA POR HACER LAS ALERTAS DE LOS ERRORES 
		
		/*if (existeCorreo($correo) > 0) {
			$_SESSION['errorEmail'] = "Este correo ya dispone de una cuenta";
		}

		if (existeUsuario($usuario) > 0) {
			$_SESSION['errorUserName'] = "Este nombre ya dispone de una cuenta";
		}

		if ($contraseña != $contraseñaV) {
			$_SESSION['errorPassword'] = "Las contraseñas no coinciden";
		}*/


		$password_hash = password_hash($contraseña, PASSWORD_DEFAULT);
		añadirUsuarioSQL($correo, $usuario, $password_hash, $nombre, $apellido);
		$_SESSION['success'] = "<p class='alert alert-success'>Registro Completado Con Exito!</p>";
		header('Location: index.php');
		exit;
	}
}
?>