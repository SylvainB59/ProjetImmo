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
	?>


	<h1>BIENVENU</h1>


	<?php
	ViewTemplate::footer();
	ViewTemplate::script();
	?>
</body>
</html>