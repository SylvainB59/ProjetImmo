<?php 
require_once '../model/ModelUser.php';
require_once '../view/ViewTemplate.php';

ViewTemplate::head();
ViewTemplate::header();
ViewTemplate::menu();
?>
<body>
	<?php 
	if(isset($_GET['mail']) && isset($_GET['token'])){
		if (ModelUser::checkUser($_GET['mail'],$_GET['token'])) {
			ModelUser::confirmUser($_GET['mail']); // maj en bdd de confirmé et actif -> 1
			ViewTemplate::alert('Compte confirmé et activé!', 'success', 'userConnexion.php', 'Connexion');
		}else{
			ViewTemplate::alert('Confirmation impossible!', 'success', 'userInscription.php', 'Retour');
		}
	}else{
		ViewTemplate::alert('Confirmation impossible!', 'success', 'userInscription.php', 'Retour');
	}
	?>
</body>
<?php 
ViewTemplate::footer();
ViewTemplate::script();