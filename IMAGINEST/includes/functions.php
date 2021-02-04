<?php

// https://www.php.net/manual/es/book.pdo.php
// https://www.php.net/manual/es/pdostatement.bindparam.php
// https://www.php.net/manual/es/pdostatement.fetchcolumn.php

function compruebaUsuMail($usernameMail)
{
    global $db;
    $sql = "SELECT * FROM users WHERE (username = ? or mail = ?) and (active = 1)";
    $usumail = $db->prepare($sql);
    $usumail->bindParam(1, $usernameMail, PDO::PARAM_STR);
    $usumail->bindParam(2, $usernameMail, PDO::PARAM_STR);
    $usumail->execute();

    return $usumail->rowCount();
}

function compruebaPswd($usernameMail, $password)
{
    global $db;
    $sql = "SELECT passHash FROM users WHERE (username = ? or mail = ?)";
    $sentencia = $db->prepare($sql);
    $sentencia->bindParam(1, $usernameMail, PDO::PARAM_STR);
    $sentencia->bindParam(2, $usernameMail, PDO::PARAM_STR);
    $sentencia->execute();
    $pswd = $sentencia->fetchColumn();

    return password_verify($password, $pswd);
}

function actualitzarIniciSessio($usernameMail)
{
	global $db;
	$sql = "UPDATE users SET lastSignIn = NOW() WHERE (username = ? or mail = ?)";
	$actualizarLastSignIn = $db->prepare($sql);
    $actualizarLastSignIn->bindParam(1, $usernameMail, PDO::PARAM_STR);
    $actualizarLastSignIn->bindParam(2, $usernameMail, PDO::PARAM_STR);
    $actualizarLastSignIn->execute();	
}




function existeCorreo($email)
{
    global $db;
    $sql = "SELECT * FROM users WHERE mail = ?";
    $mailExist = $db->prepare($sql);
    $mailExist->bindParam(1, $email, PDO::PARAM_STR);
    $mailExist->execute();

    return $mailExist->rowCount();
}

function existeUsuario($username)
{
    global $db;
    $sql = "SELECT * FROM users WHERE username = ?";
    $UsuExist = $db->prepare($sql);
    $UsuExist->bindParam(1, $username, PDO::PARAM_STR);
    $UsuExist->execute();

    return $UsuExist->rowCount();
}

function añadirUsuarioSQL($email, $username, $password_hash, $firstname, $lastname)
{
    global $db;
    $sql = "INSERT INTO users VALUES (NULL,? ,? ,? ,? ,?,NOW(),NOW(),NULL,1)";
    $añadirUsu = $db->prepare($sql);
    $añadirUsu->bindParam(1, $email, PDO::PARAM_STR);
    $añadirUsu->bindParam(2, $username, PDO::PARAM_STR);
    $añadirUsu->bindParam(3, $password_hash, PDO::PARAM_STR);
    $añadirUsu->bindParam(4, $firstname, PDO::PARAM_STR);
    $añadirUsu->bindParam(5, $lastname, PDO::PARAM_STR);
    $añadirUsu->execute();
}