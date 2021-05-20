<?php 
require_once '../model/ModelUser.php';
if(isset($_GET['mail']) && isset($_GET['token'])){
	if (ModelUser::checkUser($_GET['mail'],$_GET['token'])) {
		ModelUser::confirmUser($_GET['mail']);
		?>
		<p>compte confirmé et activé <a href="inscription.php">retour</a></p>
		<?php
	}else{
		?>
		<p>Confirmation impossible! <a href="inscription.php">retour</a></p>
		<?php
	}
}else{
	?>
	<p>Rien a confirmer...  <a href="inscription.php">retour</a></p>
	<?php
}
?>