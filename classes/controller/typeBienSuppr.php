<?php 
session_start();
if(!isset($_SESSION['id']) || $_SESSION['role']==0){
	header('Location: accueil.php');
	die;
}

require_once '../view/ViewTemplate.php';
require_once '../view/ViewtypeBien.php';
require_once '../model/ModelTypeBien.php';
require_once '../utils/Utils.php';

if(isset($_GET['id']) && ModelTypeBien::typeBienById($_GET['id'])){
	if(isset($_POST['confirmSupprTypeBien'])){
	    ModelTypeBien::supprTypeBien($_POST['id']);
	}else{
		ViewTypeBien::supprTypeBien($_GET['id']);
	}
}else{
	ViewTemplate::alert('Type de bien inexistant.', 'danger');
}
?>