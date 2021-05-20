<?php 
require_once '../view/ViewTemplate.php';
require_once '../view/ViewUser.php';
require_once '../model/ModelUser.php';

ViewTemplate::head();
ViewTemplate::header();
?>
<body>
	<?php 
	if(isset($_POST['confirmAddUser'])){
		$token = base_convert(hash('sha256', time() . mt_rand()), 16, 36);
		ModelUser::addUser($_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['pass'], $_POST['tel'], $token);
		?>
		<p>inscription OK. Veuillez <a href="confirmationMail.php?mail=<?php echo $_POST['mail'] ?>&token=<?php echo $token ?>">cliquer ici</a> pour valider votre compte</p>
		<?php
	}else{
		ViewUser::addUser();
	}
	?>
</body>
<?php 
ViewTemplate::footer();
ViewTemplate::script();