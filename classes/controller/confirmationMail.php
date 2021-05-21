<?php 
require_once '../model/ModelUser.php';
ViewTemplate::head();
ViewTemplate::header();
ViewTemplate::menu();
?>
<body>
	<?php 
	if(isset($_GET['mail']) && isset($_GET['token'])){
		if (ModelUser::checkUser($_GET['mail'],$_GET['token'])) {
			ModelUser::confirmUser($_GET['mail']);
			ViewTemplate::alert('Compte confirmé et activé!', 'success', 'connexion.php', 'Connexion');
		}else{
			ViewTemplate::alert('Confirmation impossible!', 'success', 'inscription.php', 'Retour');
		}
	}else{
		ViewTemplate::alert('Confirmation impossible!', 'success', 'inscription.php', 'Retour');
	}
	?>
</body>
<?php 
ViewTemplate::footer();
ViewTemplate::script();