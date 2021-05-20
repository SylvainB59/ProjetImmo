<?php 
require_once 'connexion.php';
class ModelUser{
	public static function addUser($nom, $prenom, $mail, $pass, $tel, $token){
		$db = connexion();
		$reponse = $db->prepare('INSERT INTO user (nom, prenom, mail, pass, tel, token) VALUES (?,?,?,?,?,?)');
		$reponse->execute([$nom, $prenom, $mail, $pass, $tel, $token]);
	}
}
