<?php 
session_start();
if(!isset($_SESSION['id']) || $_SESSION['role']==0){
	header('Location: accueil.php');
	die;
}
require_once '../view/ViewTemplate.php';
require_once '../view/ViewtypeBien.php';
require_once '../model/ModelTypeBien.php';
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

	ViewTypeBien::listeTypeBiens(ModelTypeBien::listeTypeBiens());


	ViewTemplate::footer();
	ViewTemplate::script();
	?>
	<script>
		$('#btnAddTypeBien').click(function(e){
			let modalBody=$(this).data('target')+" .modal-body";
			console.log(modalBody);
			let request = $.ajax({
                type: "POST",
                url: "typeBienCreation.php",
                dataType: "html",
            });

            request.done(function (response) {
                $(modalBody).html(response);
            });

            request.fail(function (http_error) {
                let server_msg = http_error.responseText;
                let code = http_error.status;
                let code_label = http_error.statusText;
                alert("Erreur " + code + " (" + code_label + ") : " + server_msg);
            });
		});

		$('#modalAddTypeBien').submit(function(e){
			console.log(e);
			alert('oko');
			e.preventDefault();
		})
		// $(modalBody).submit(function(e){
		// 	console.log(e);
		// 	alert('oko');
		// 	e.preventDefault();
		// })


	</script>
</body>
</html>