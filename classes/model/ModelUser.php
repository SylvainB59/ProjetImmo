<?php 
require_once 'connexion.php';
class ModelUser{
	public static function addUser($nom, $prenom, $mail, $pass, $tel, $token){
		$db = connexion();
		$reponse = $db->prepare('INSERT INTO user (nom, prenom, mail, pass, tel, token) VALUES (?,?,?,?,?,?)');
		$reponse->execute([$nom, $prenom, $mail, $pass, $tel, $token]);
	}

	public static function checkUser($mail, $token){
		$db=connexion();
		$reponse = $db->prepare('SELECT count(*) FROM user WHERE mail=? AND token=?');
		$reponse->execute([$mail, $token]);
		return $reponse->fetch(PDO::FETCH_ASSOC);
	}

	public static function confirmUser($mail){
		$db=connexion();
		$reponse=$db->prepare('UPDATE user SET confirme=?, actif=? WHERE mail=?');
		$reponse->execute([1,1,$mail]);
	}

	public static function userByMail($mail){
		$db=connexion();
		$reponse = $db->prepare('SELECT * FROM user WHERE mail=?');
		$reponse->execute([$mail]);
		return $reponse->fetch(PDO::FETCH_ASSOC);
	}

	public static function userById($id){
		$db=connexion();
		$reponse = $db->prepare('SELECT * FROM user WHERE id=?');
		$reponse->execute([$id]);
		return $reponse->fetch(PDO::FETCH_ASSOC);
	}
}
