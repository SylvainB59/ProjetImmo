<?php 
require_once 'Connexion.php';
class ModelTypeBien {
	public static function addTypeBien($libelle){
		$db = connexion();
		$reponse = $db->prepare('INSERT INTO type_bien (libelle) VALUES (?)');
		$reponse->execute([$libelle]);
	}

	public static function listeTypeBiens(){
		$db = connexion();
		$reponse = $db->prepare('SELECT * FROM type_bien ORDER BY id ASC');
		$reponse->execute();
		return $reponse->fetchAll(PDO::FETCH_ASSOC);
	}
}
?>