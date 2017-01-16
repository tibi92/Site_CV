<?php require("../connexion/connexion.php"); ?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	<?php
	$sql = $pdo->query("SELECT nom, prenom, ville, avatar FROM utilisateur") ;
	$ligne = $sql->fetch();
	?>
	<title >Bienvenue <?php echo $ligne['nom'].' '.$ligne['prenom']; ?></title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	</head>
	<body> 
		<header>

		</header>
		<div class="wrapper">

		<h1>Connexion</h1>
		<img src="../img/login.png">

			<form >
			
				<input class="formulaire1" type="text" name="pseudo" placeholder="pseudo"required width="433"></br></br>

				<input class="formulaire2" placeholder="mot de passe" type="password" name="mdp" required></br></br>

				<input class="bouton" type="submit" value="C'est parti !"></br></br>
				<input class="bouton" type="submit" value="Effacer"></br></br>

				<a href="#" class="bouton">Mot de passe oublié ?</a>

			</form>
		</div>

	</body>
</html>