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

if(isset($_POST['confirmModifTypeBien'])){
	if(!ModelTypeBien::existTypeBien($_POST['libelle'])){
		$donnees = [$_POST['id'], $_POST['libelle']];
        $types = ["id", "libelle"];

        $data = Utils::valider($donnees, $types);
        if($data){
        	ModelTypeBien::modifTypeBien($data['id'], $data['libelle']);
        }
	}else{
		ViewTemplate::alert('Type de bien déjà existant.', 'danger');
	}
}
if(isset($_GET['id']) && ModelTypeBien::typeBienById($_GET['id'])){
	ViewTypeBien::modifTypeBien($_GET['id']);
}else{
	ViewTemplate::alert('Erreur de données.', 'danger');
}
?>