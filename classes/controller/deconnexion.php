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
	session_unset();
    session_destroy();
    viewTemplate::alert('Vous etes maintenant déconnecté', 'danger', 'accueil.php', 'Retour')
	?>
</body>
<?php 
ViewTemplate::footer();
ViewTemplate::script();