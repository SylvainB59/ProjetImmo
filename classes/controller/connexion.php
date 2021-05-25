<?php 
session_start();
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
	if(isset($_POST['confirmConnectUser'])){

		if(ModelUser::MdpConnexion($_POST['mail'])){
			$mdp1 = $_POST['pass'];
			$mdp2 = ModelUser::MdpConnexion($_POST['mail'])['pass'];
				var_dump(ModelUser::userByMail($_POST['mail']));
			if(Utils::verification($mdp1, $mdp2)){
				$_SESSION['id']=ModelUser::userByMail($_POST['mail'])['id'];
				$_SESSION['nom']=ModelUser::userByMail($_POST['mail'])['nom'];
				$_SESSION['mail']=$_POST['mail'];
			}else{
				ViewTemplate::alert('mauvais mdp', "danger", "Accueil.php");
			}
		}
	}else{
		ViewUser::connectUser();
	}
	?>
</body>
<?php 
ViewTemplate::footer();
ViewTemplate::script();