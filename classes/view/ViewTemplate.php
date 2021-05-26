<?php
class ViewTemplate{
	public static function head(){
		?>
		<head>
		    <meta charset="utf-8" />
		    <meta name="viewport" content="width=device-width, initial-scale=1  shrink-to-fit=no" />
		    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
		    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		    <link rel="stylesheet" href="../../css/styles.css" />
		    <title>HTML</title>
		</head>
		<?php
	}

	public static function header(){
		?>
		<header>
			
		</header>
		<?php
	}

	public static function menu(){
		?>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
			    		<a class="nav-link" href="#">TEST</a>
			  		</li>
				</ul>
				<div>
					<?php
					if(isset($_SESSION['id'])){
						?>
						<p>Bonjour M/Mme <?php echo $_SESSION['nom']; ?></p>
						<a href="userDeconnexion.php" class="btn btn-danger">deconnexion</a>
						<?php
					}else{
						?>
						<a href="userConnexion.php" class="btn btn-success">Connexion</a>
						<a href="userInscription.php" class="btn btn-primary">Inscription</a>
						<?php
					}
					?>
				</div>
			</div>
		</nav>
		<?php
	}

	public static function footer(){
		?>
		<footer>
			
		</footer>
		<?php
	}

	public static function script(){
		?>
		<script src="https://code.jquery.com/jquery-3.5.1.js"
          integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
          crossorigin="anonymous"></script>
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
	    <script src="../../js/ctrl.js"></script>
		<?php
	}

	public static function alert($message, $type, $lien=null, $textLien=null){
		?>
		<div class="alert alert-<?php echo $type; ?>" role="alert">
            <p><?php echo $message;
	            if($lien!=null){ 
	              	?>
	              	<a href="<?php echo $lien; ?>"><?php echo $textLien; ?></a>
	            <?php } ?>
	        </p>
        </div>
        <?php
	}
}