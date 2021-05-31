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
	<script> // AJOUT D'UN NOUVEAU TYPE DE BIEN //
		$('#btnAddTypeBien').click(function(e){ // ouverture du modal pour l'ajout d'un nouveau type de bien
			let modalBody=$(this).data('target')+" .modal-body";
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

		$('#modalAddTypeBien').submit(function(e){ // vérif type de bien quand on clique sur le bouton du formulaire
			e.preventDefault();
			console.log($("#erreurs").html());
			if($("#erreurs").html()){
				$("#erreurs").html('');
			}
			if($('.alert').length!=0){
				$('.alert').remove();
			}
			let donnee=[
				$('#addTypeBien #libelle').val()
			];
			let type = ['libelle'];
			valider(donnee, type, e);

            if ($("#erreurs").is(":empty")) {
                data = tabToObject($('.addTypeBien').serializeArray());
                data.confirmAddTypeBien = "";
                modifTypeBien(data);
            }
		});

        function tabToObject(tab) {
            obj = {};

            for (i = 0; i < tab.length; i++) {
                cle = tab[i].name;
                valeur = tab[i].value;
                obj[cle] = valeur;
            }
            return obj;
        }

		function modifTypeBien(data) { // envoie du formulaire a typeBienCreation + appel de actualiseTypeBienListe
            let request = $.ajax({
                type: "POST",
                url: "TypeBienCreation.php",
                data: data,
                dataType: "html",
            });

            request.done(function (response) {
                $("#modalAddTypeBien .modal-body").html(response);
                if($('.alert').length==0){
                	actualiseTypeBienListe();
                }
            });

            request.fail(function (http_error) {
                let server_msg = http_error.responseText;
                let code = http_error.status;
                let code_label = http_error.statusText;
                alert("Erreur " + code + " (" + code_label + ") : " + server_msg);
            });
        }

        function actualiseTypeBienListe(){
			let request = $.ajax({
                type: "GET",
                url: "typeBienListe.php",
                dataType: "html",
            });

            request.done(function (response) {
                $("body").html(response);
            });

            request.fail(function (http_error) {
                let server_msg = http_error.responseText;
                let code = http_error.status;
                let code_label = http_error.statusText;
                alert("Erreur " + code + " (" + code_label + ") : " + server_msg);
            });
		};
	</script>
</body>
</html>