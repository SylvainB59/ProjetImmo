<?php 
class ViewTypeBien {
	public static function ajoutTypeBien(){
		?>
	<div>
		<div id="erreurs"></div>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" name="addTypeBien" class="addTypeBien" id="addTypeBien" target="_self">
			<div class="form-group">
				<!-- <label for="libelle">Type de bien</label> -->
				<input type="text" class="form-control" id="libelle" name="libelle" placeholder="Libelle">
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
			<button class="btn btn-primary" class="btnAddTypeBien" id="btnAddTypeBien" data-toggle="modal" data-target="#modalAddTypeBien"> Ajouter un nouveau type de bien </button>
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
			                    <!-- <td>
		                            <a class="btn btn-info" href="ModiftypeBien.php?id=<?php echo $typeBien['id'] ?>" role="button">Modif type de bien</a>
		                            <a class="btn btn-danger" href="SuppressiontypeBien.php?id=<?php echo $typeBien['id'] ?>" role="button">Suppression type de bien </a>
		                        </td> -->
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
    }
}
?>