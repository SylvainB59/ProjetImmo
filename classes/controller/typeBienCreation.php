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

if(isset($_POST['confirmAddTypeBien'])){
	if(!ModelTypeBien::existTypeBien($_POST['libelle'])){
		$donnees = [$_POST['libelle']];
        $types = ["libelle"];

        $data = Utils::valider($donnees, $types);
        if($data){
        	ModelTypeBien::addTypeBien($data['libelle']);
        }
	}else{
		ViewTemplate::alert('Type de bien déjà existant.', 'danger');
	}
}
ViewTypeBien::ajoutTypeBien();
?>