<?php 
session_start();
session_unset();
session_destroy();
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

	// session_unset();
    // session_destroy();
    viewTemplate::alert('Vous etes maintenant déconnecté', 'danger', 'accueil.php', 'Retour');
	
	ViewTemplate::footer();
	ViewTemplate::script();
	?>
</body>
</html>
<?php 