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
			ViewTemplate::alert('Mail existe déjà.', 'warning');
		}else{
			if(Utils::confirmationMdp($_POST['pass'],$_POST['confirmPass'])){
				$donnees = [$_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['tel'], $_POST['pass']];
		        $types = ["nom","prenom","mail","tel","pass"];

		        $data = Utils::valider($donnees, $types);
		        if($data){
					$token = base_convert(hash('sha256', time() . mt_rand()), 16, 36);
					$data['pass']=password_hash($data['pass'], PASSWORD_DEFAULT);
					ModelUser::addUser($data['nom'], $data['prenom'], $data['mail'], $data['pass'], $data['tel'], $token);
					ViewTemplate::alert('Inscription enregistrée, veuillez suivre le lien pour la valider => ', 'success', 'confirmationMail.php?mail='.$data['mail'].'&token='.$token, 'Continuer');
		        }
			}else{
				ViewTemplate::alert('Erreur de Mdp.', 'warning');
			}
		}
	}
	ViewUser::addUser();
	?>
</body>
<?php 
ViewTemplate::footer();
ViewTemplate::script();