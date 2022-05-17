<?php
    session_start();

    require 'fonctionAdmin.php';

	$act = $_GET['con'];
	if($act==='suc'){
		$email = $_POST["email"];
		$mdp = $_POST["mdp"];
		$admin = login($email, $mdp);
        if($admin!=null){
            $_SESSION['admin'] = $admin;
            header('Location: index.php');
        }else{
            header('Location: ../php/login.php?er=0');
        }
	}
    if($act=='deconnect'){
        session_destroy();
        header('Location: ../php/login.php');
    }
?>