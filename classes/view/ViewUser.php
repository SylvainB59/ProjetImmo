<?php
class ViewUser{
	public static function addUser(){
		isset($_POST['confirmAddUser']) ? $formSubmit = true : $formSubmit = false;
		?>
		<div>
			<div id="erreurs"></div>
			<form name="addUser" id="addUser" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" target="_self"  enctype="multipart/form-data">
				<div class="form-group">
					<label for="nom">nom</label>
					<input type="text" class="form-control" id="nom" name="nom" value="<?php echo $formSubmit?$_POST['nom']:'';?>">
				</div>
				<div class="form-group">
					<label for="prenom">prenom</label>
					<input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $formSubmit?$_POST['prenom']:'';?>">
				</div>
				<div class="form-group">
					<label for="mail">mail</label>
					<input type="email" class="form-control" id="mail" name="mail" value="<?php echo $formSubmit?$_POST['mail']:'';?>">
				</div>
				<div class="form-group">
					<label for="pass">mot de pass <span class="small">(doit contenir au moins 1maj, 1min, 1chiffre et 1[$ @ % * + - _ !])</span></label>
	                <input type="password" name="pass" id="pass" class="form-control" aria-describedby="pass" placeholder="mot de passe" required>
	            </div>
	            <div class="form-group">
					<label for="pass">confirm mot de pass</label>
	                <input type="password" name="confirmPass" id="confirmPass" class="form-control" aria-describedby="confirmPass" placeholder="mot de passe" required>
	            </div>
				<div class="form-group">
					<label for="tel">tel</label>
					<input type="text" class="form-control" id="tel" name="tel" value="<?php echo $formSubmit?$_POST['tel']:'';?>">
				</div>
				<!-- <div class="form-group"> -->
			  		<button type="submit" name="confirmAddUser" class="btn btn-primary">valider</button>
			  		<!-- <button type="reset" name="annuler" class="btn btn-danger">Annuler</button> -->
			  	<!-- </div> -->
			</form>
		</div>
		<?php
	}

	public static function connectUser(){
		isset($_POST['confirmConnectUser']) ? $formSubmit = true : $formSubmit = false;
		?>
		<div>
			<div id="erreurs"></div>
			<form name="connectUser" id="connectUser" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" target="_self"  enctype="multipart/form-data">
				<div class="form-group">
					<label for="mail">mail</label>
					<input type="email" class="form-control" id="mail" name="mail" value="<?php echo $formSubmit?$_POST['mail']:'';?>">
				</div>
				<div class="form-group">
					<label for="pass">mot de pass</label>
	                <input type="password" name="pass" id="pass" class="form-control" aria-describedby="pass" placeholder="mot de passe" required>
	            </div>
				<!-- <div class="form-group"> -->
			  		<button type="submit" name="confirmConnectUser" class="btn btn-primary">valider</button>
			  		<!-- <button type="reset" name="annuler" class="btn btn-danger">Annuler</button> -->
			  	<!-- </div> -->
			</form>
		</div>
		<?php
	}

}