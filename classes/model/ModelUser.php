<?php 
require_once 'Connexion.php';
class ModelUser{

	private $id;
	private $nom;
	private $prenom;
	private $mail;
	private $pass;
	private $tel;
	private $role;
	private $confirme;
	private $actif;
	private $token;

	////////////////////////////////////
	// SETTERS

	private function setId($id){
		$this->id=$id;
		return $this;
	}

	private function setNom($nom){
		$this->nom=$nom;
		return $this;
	}

	private function setPrenom($prenom){
		$this->prenom=$prenom;
		return $this;
	}

	private function setMail($mail){
		$this->mail=$mail;
		return $this;
	}

	private function setPass($pass){
		$this->pass=$pass;
		return $this;
	}

	private function setTel($tel){
		$this->tel=$tel;
		return $this;
	}

	private function setRole($role){
		$this->role=$role;
		return $this;
	}

	private function setConfirme($confirme){
		$this->confirme=$confirme;
		return $this;
	}

	private function setActif($actif){
		$this->actif=$actif;
		return $this;
	}

	private function setToken($token){
		$this->token=$token;
		return $this;
	}

	////////////////////////////////////
	// SETTERS

	public function getId(){
		return $this->id;
	}

	public function getNom(){
		return $this->nom;
	}

	public function getPrenom(){
		return $this->prenom;
	}

	public function getMail(){
		return $this->mail;
	}

	public function getPass(){
		return $this->pass;
	}

	public function getTel(){
		return $this->tel;
	}

	public function getRole(){
		return $this->role;
	}

	public function getConfirme(){
		return $this->confirme;
	}

	public function getActif(){
		return $this->actif;
	}

	public function getToken(){
		return $this->token;
	}


	////////////////////////////////////
	// CONSTRUCT

	public function __construct($mail){
		$dataUser = self::userByMail($mail);
		$this
			->setId($dataUser['id'])
			->setNom($dataUser['nom'])
			->setPrenom($dataUser['prenom'])
			->setMail($dataUser['mail'])
			->setPass($dataUser['pass'])
			->setTel($dataUser['tel'])
			->setRole($dataUser['role'])
			->setConfirme($dataUser['confirme'])
			->setActif($dataUser['actif'])
			->setToken($dataUser['token'])
			;
	}





	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



	public static function addUser($nom, $prenom, $mail, $pass, $tel, $token){
		$db = connexion();
		$reponse = $db->prepare('INSERT INTO user (nom, prenom, mail, pass, tel, token) VALUES (?,?,?,?,?,?)');
		$reponse->execute([$nom, $prenom, $mail, $pass, $tel, $token]);
	}

	public static function checkUser($mail, $token){
		$db = connexion();
		$reponse = $db->prepare('SELECT count(*) FROM user WHERE mail=? AND token=?');
		$reponse->execute([$mail, $token]);
		return $reponse->fetch(PDO::FETCH_ASSOC);
	}

	public static function confirmUser($mail){
		$db = connexion();
		$reponse = $db->prepare('UPDATE user SET confirme=?, actif=? WHERE mail=?');
		$reponse->execute([1,1,$mail]);
	}

	public static function userByMail($mail){
		$db = connexion();
		$reponse = $db->prepare('SELECT * FROM user WHERE mail=?');
		$reponse->execute([$mail]);
		return $reponse->fetch(PDO::FETCH_ASSOC);
	}

	public static function userById($id){
		$db = connexion();
		$reponse = $db->prepare('SELECT * FROM user WHERE id=?');
		$reponse->execute([$id]);
		return $reponse->fetch(PDO::FETCH_ASSOC);
	}

	public static function resetUserToken($mail, $token){
		$db = connexion();
		$reponse = $db->prepare('UPDATE user SET token=? WHERE mail=?');
		$reponse->execute([$token,$mail]);
	}

	public static function updateUserMDP($mail, $pass){
		$db = connexion();
		$reponse = $db->prepare('UPDATE user SET pass=? WHERE mail=?');
		$reponse->execute([$pass,$mail]);
	}

	public static function MdpConnexion($mail){
        $db = connexion();
        $reponse = $db->prepare("SELECT pass FROM user WHERE mail=? ");
        $reponse->execute([$mail]);
        return $reponse->fetch(PDO::FETCH_ASSOC);
    }
}
