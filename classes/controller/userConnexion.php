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

	if(isset($_POST['confirmConnectUser'])){
		if(ModelUser::userByMail($_POST['mail'])){
			$utilisateur = new ModelUser($_POST['mail']);
			var_dump($utilisateur);

			$user = ModelUser::userByMail($_POST['mail']);
			$mdp1 = $_POST['pass'];
			$mdp2 = $user['pass'];
			if(Utils::verification($mdp1, $mdp2)){
				if($user['confirme']==1 && $user['actif']==1){
					$_SESSION['id']=$user['id'];
					$_SESSION['nom']=$user['nom'];
					$_SESSION['mail']=$user['mail'];
					$_SESSION['role']=$user['role'];
					ViewTemplate::alert('Vous etes maintenant connecté.', 'success', 'accueil.php', 'Accueil');
				}else{
					ViewTemplate::alert('Compte pas encore confirmé, ni activé', 'warning', 'userConfirmation.php?mail='.$user['mail'].'&token='.$user['token'], 'Activer maintenant');
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