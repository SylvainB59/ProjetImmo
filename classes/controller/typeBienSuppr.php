<?php 
require_once '../view/ViewTemplate.php';
require_once '../view/ViewtypeBien.php';
require_once '../model/ModelTypeBien.php';
require_once '../utils/Utils.php';
var_dump($_GET);
var_dump($_POST);
if(isset($_POST['confirmSupprTypeBien'])){
    ModelTypeBien::supprTypeBien($_POST['id']);
}else{
	ViewTypeBien::supprTypeBien($_GET['id']);
}
?>