<?php 
session_start();
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
					echo 'yo';

	if(isset($_POST['confirmConnectUser'])){
		if(ModelUser::userByMail($_POST['mail'])){
			$idUser = ModelUser::userByMail($_POST['mail'])['id'];
			$user = new ModelUser($idUser);
			if(Utils::verification($_POST['pass'], $user->getPass())){
				if($user->getConfirme()==1 && $user->getActif()==1){
					$_SESSION['id']=$user->getId();
					$_SESSION['nom']=$user->getNom().' '.$user->getPrenom();
					$_SESSION['mail']=$user->getMail();
					$_SESSION['role']=$user->getRole();
					header('Location: accueil.php');
					die;
				}else{
					ViewTemplate::alert('Compte pas encore confirmé, ni activé', 'warning', 'userConfirmation.php?mail='.$user->getMail().'&token='.$user->getToken(), 'Activer maintenant');
				}
			}else{
				ViewTemplate::alert('Mauvais mdp', 'danger', 'userConnexion.php', 'Retour');
			}
		}else{
			ViewTemplate::alert('Mail inexistant', 'danger', 'userConnexion.php', 'Retour');
		}
	}else{
		ViewUser::connectUser();
	}
	
	ViewTemplate::footer();
	ViewTemplate::script();
	?>
</body>
</html>
<?php 