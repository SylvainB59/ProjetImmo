<?php 
class ViewTypeBien {
	public static function ajoutTypeBien(){
		isset($_POST['confirmAddTypeBien']) ? $formSubmit = true : $formSubmit = false;
		?>
	<div>
		<div id="erreurs"></div>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" name="addTypeBien" class="addTypeBien" id="addTypeBien" target="_self">
			<div class="form-group">
				<!-- <label for="libelle">Type de bien</label> -->
				<input type="text" class="form-control" id="libelle" name="libelle" placeholder="Libelle" value="<?php echo $formSubmit?$_POST['libelle']:'';?>">
			</div>
		  		<button type="submit" id="confirmAddTypeBien" class="btn btn-primary">Ajouter</button>
		</form>
	</div>

	<?php
	}

	public static function listeTypeBiens($listeTypeBiens){
		?>
		<div>
			<!-- <button class="btn btn-primary" class="btnAddTypeBien" id="btnAddTypeBien" data-toggle="modal" data-target="#addTypeBien"> Ajouter un nouveau type de bien </button> -->
			<button class="btn btn-primary btnAddTypeBien" id="btnAddTypeBien" data-toggle="modal" data-target="#modalAddTypeBien"> Ajouter un nouveau type de bien </button>
		    <table class="table">
		        <thead>
		            <tr>
		                <th scope="col">#</th>
		                <th scope="col">Type de Bien</th>
		                <th scope="col">Action</th>
		            </tr>
		        </thead>
		        <tbody>
		            <?php
		            if($listeTypeBiens){
			            foreach($listeTypeBiens as $typeBien){
			                ?>
			                <tr>
			                    <th scope="row"><?php echo $typeBien['id']; ?></th>
			                    <td><?php echo $typeBien['libelle']; ?></td>
			                    <td>
		                            <!-- <a class="btn btn-info modifTypeBien" href="typeBienModif.php?id=<?php echo $typeBien['id'] ?>" role="button">Modif</a> -->
		                            <a class="btn btn-info modifTypeBien" data-toggle="modal" data-target="#modalModifTypeBien" data-href="typeBienModif.php?id=<?php echo $typeBien['id'] ?>">Modif</a>
		                            <!-- <a class="btn btn-danger supprTypeBien" href="typeBienSuppr.php?id=<?php echo $typeBien['id'] ?>" role="button">Suppr</a> -->
		                            <a class="btn btn-danger supprTypeBien" data-toggle="modal" data-target="#modalSupprTypeBien" data-href="typeBienSuppr.php?id=<?php echo $typeBien['id'] ?>">Suppr</a>
		                        </td>
			                </tr>
			                <?php
			            }
			        }else{
			        	?>
			        	<tr>
			        		<th>Aucun type de bien</th>
			        	</tr>
			        	<?php
			        }
		            ?>
		        </tbody>
		    </table>
		</div>
		<?php
    	ViewTemplate::modal('modalAddTypeBien', 'Ajouter un nouveau type de bien');
    	ViewTemplate::modal('modalModifTypeBien', 'Modifier le type de bien');
    	ViewTemplate::modal('modalSupprTypeBien', 'Supprimer le type de bien');
    }
	
	public static function modifTypeBien($id){
		isset($_POST['confirmModifTypeBien']) ? $formSubmit = true : $formSubmit = false;
		$donnees = ModelTypeBien::typeBienById($id);
		?>
	<div>
		<div id="erreurs"></div>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" name="modifTypeBien" class="modifTypeBien" id="modifTypeBien" target="_self">
			<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $donnees['id']; ?>">
			<div class="form-group">
				<input type="text" class="form-control" id="libelle" name="libelle" placeholder="Libelle" value="<?php echo $formSubmit?$_POST['libelle']:$donnees['libelle']; ?>">
			</div>
		  	<button type="submit" id="confirmModifTypeBien" class="btn btn-primary">valider</button>
		</form>
	</div>

	<?php
	}

	public static function supprTypeBien($id){
		$donnees = ModelTypeBien::typeBienById($id);
		?>
	<div>
		<p>Supprimer le type de bien "<?php echo $donnees['libelle']; ?>"</p>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" name="supprTypeBien" class="supprTypeBien" id="supprTypeBien" target="_self">
			<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $donnees['id']; ?>">
		  	<button type="submit" id="confirmSupprTypeBien" class="btn btn-primary">OK</button>
		</form>
	</div>

	<?php
	}
}
?>