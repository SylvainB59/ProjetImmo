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

	public static function typeBienById($id){
		$db = connexion();
		$reponse = $db->prepare('SELECT * FROM type_bien WHERE id=?');
		$reponse->execute([$id]);
		return $reponse->fetch(PDO::FETCH_ASSOC);
	}

	public static function existTypeBien($libelle){
		$db = connexion();
		$reponse = $db->prepare('SELECT * FROM type_bien WHERE libelle=?');
		$reponse->execute([$libelle]);
		return $reponse->fetchAll(PDO::FETCH_ASSOC);
	}

	public static function modifTypeBien($id, $libelle){
		$db = connexion();
		$reponse = $db->prepare('UPDATE type_bien SET libelle=? WHERE id=?');
		$reponse->execute([$libelle, $id]);
	}

	public static function supprTypeBien($id){
		$db = connexion();
		$reponse = $db->prepare('DELETE FROM type_bien WHERE id=?');
		$reponse->execute([$id]);
	}
}
?>