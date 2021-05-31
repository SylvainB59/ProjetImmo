<?php 
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
        	ModelTypeBien::ModifTypeBien($data['id'], $data['libelle']);
        }
	}else{
		ViewTemplate::alert('Type de bien déjà existant.', 'danger');
	}
}
ViewTypeBien::modifTypeBien($_GET['id']);
?>