<?php
    session_start();

    require 'fonctionAdmin.php';
	$act = $_GET['act'];
	if($act==='log'){
		$email = $_POST["email"];
		$mdp = $_POST["mdp"];
		$admin = login($email, $mdp);
        if($admin!=null){
            $_SESSION['admin'] = $admin;
            header('Location: acceuil.php');
        }else{
            header('Location: index.php?er=0');
        }
	}
    if($act=='deconnect'){
        session_destroy();
        header('Location: index.php');
    }
?>