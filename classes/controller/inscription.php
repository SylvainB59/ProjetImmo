<?php 
require_once '../view/ViewTemplate.php';
require_once '../view/ViewUser.php';
require_once '../model/ModelUser.php';
require_once '../utils/Utils.php';

ViewTemplate::head();
ViewTemplate::header();
ViewTemplate::menu();
?>
<body>
	<?php 
	if(isset($_POST['confirmAddUser'])){
		if(ModelUser::userByMail($_POST['mail'])){
			ViewTemplate::alert('Mail existe déjà.', 'warning', '#', 'Retour');
		}else{
			$donnees = [$_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['tel'], $_POST['pass']];
	        $types = "nom","prenom","email","tel","pass"];

	        $data = Utils::valider($donnees, $types);
	        if($data){
				$token = base_convert(hash('sha256', time() . mt_rand()), 16, 36);
				ModelUser::addUser($_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['pass'], $_POST['tel'], $token);
				ViewTemplate::alert('Inscription enregistrée, veuillez suivre le lien pour la valider.', 'success', 'confirmationMail.php?mail='.$_POST['mail'].'&token='.$token, 'Continuer');
	        }
		}
	}else{
		ViewUser::addUser();
	}
	?>
</body>
<?php 
ViewTemplate::footer();
ViewTemplate::script();