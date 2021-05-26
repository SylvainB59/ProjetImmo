<?php 
require_once '../view/ViewTemplate.php';
require_once '../view/ViewUser.php';
require_once '../model/ModelUser.php';
require_once '../utils/Utils.php';
?>
<!DOCTYPE html>
<html>
<?php
ViewTemplate::head();
?>
<body>
	<?php
	ViewTemplate::header();
	ViewTemplate::menu();



	if(isset($_POST['confirmResetMdp'])){ // si envoie du nouveau mdp, MAJ en bdd après vérif
		if(ModelUser::userByMail($_POST['mail'])){
			if(Utils::confirmationMdp($_POST['pass'],$_POST['confirmPass'])){
				$donnees = [$_POST['pass']];
		        $types = ["pass"];

		        $data = Utils::valider($donnees, $types);
		        if($data){
		        	$data['pass']=password_hash($data['pass'], PASSWORD_DEFAULT);
		        	modelUser::updateUserMDP($_POST['mail'], $data['pass']);
					ViewTemplate::alert('Nouveau mdp enregistré. ', 'success', 'userConnexion.php', 'Se connecter');
				}
			}else{
				ViewTemplate::alert('Erreur de Mdp.', 'danger');
			}

		}else{
			ViewTemplate::alert('Aucun user avec cet email.', 'danger');
		}

	}else if(isset($_GET['mail']) && isset($_GET['token'])){ // demande du nouveau mdp si confirmation du nouveau token
		if (ModelUser::checkUser($_GET['mail'],$_GET['token'])) {
			ViewUser::resetMdp($_GET['mail']);
		}else{
			ViewTemplate::alert('Ce user n\'existe pas', 'danger', 'userResetMdp.php', 'Retour');
		}


	}else if(isset($_POST['confirmTestUserMail'])){ // vérification du compte via le mail

		if(ModelUser::userByMail($_POST['mail'])){
			$user = ModelUser::userByMail($_POST['mail']);
			if($user['confirme']==1 && $user['actif']==1){
				$token = base_convert(hash('sha256', time() . mt_rand()), 16, 36);
				ModelUser::resetUserToken($user['mail'], $token);
				ViewTemplate::alert('Compte confirmé, veuillez suivre ce lien pour changer de mdp => ', 'warning', 'userResetMdp.php?mail='.$user['mail'].'&token='.$token, 'Continuer');
			}

		}else{
			ViewTemplate::alert('Aucun user avec cet email.', 'danger');
		}
	}else{ // demande du mail pour réinitialiser le mdp du compte
		ViewUser::testUserMail();
	}






	ViewTemplate::footer();
	ViewTemplate::script();
	?>
</body>
</html>
<?php