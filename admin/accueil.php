<?php require("../connexion/connexion.php"); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
	<title class="bienvenue">Admin | Site CV </title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Sansita" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 


</head>

<body>
<header> <?php require("../admin/admin_menu.php"); ?> </header>
	<div class="wrapper">
		<?php require("../connexion/connexion.php"); ?>


		<?php 
		$sql = $pdo->query("SELECT * FROM utilisateur") ;
			$utilisateur = $sql->fetch();
		?>

		<h1 class="hello">Bonjour <?php echo $utilisateur['prenom'].' '.$utilisateur['nom']; ?></h1>

		<!-- <?php
			echo $utilisateur['nom'].'<br>';
			echo $utilisateur['prenom'].'<br>';
			echo $utilisateur['email'].'<br>';
			echo $utilisateur['tel'].'<br>';
			echo $utilisateur['mdp'].'<br>';
			echo $utilisateur['pseudo'].'<br>';
			echo $utilisateur['age'].'<br>';
			echo $utilisateur['sexe'].'<br>';
			echo $utilisateur['adresse'].'<br>';
			echo $utilisateur['code_postal'].'<br>';
			echo $utilisateur['ville'].'<br>';
			echo $utilisateur['pays'].'<br>';
			echo $utilisateur['etat_civil'].'<br>';
			echo $utilisateur['avatar'].'<br>';
			echo $utilisateur['notes'].'<br>';
			echo $utilisateur['statut'].'<br>';
			echo $utilisateur['date_de_naissance'].'<br>';
			echo $utilisateur['civilite'].'<br>';
		var_dump($_SESSION);
		?> -->

		<table width="500px" border="1">
			<thead> 
				<th>Nom, prénom, etc...</th>
				<th>Etat civil</th>
			</thead>
			<tr>
				<td><?php echo '<img src ="../img/'.$utilisateur['avatar'].'" alt="" style="width:100px" class="image"><br>'.
				'<div class="identite">'.'<br>'.$utilisateur['etat_civil'].' '.$utilisateur['nom'].' '.$utilisateur['prenom'].'<br>'.$utilisateur['adresse'].'<br>'.$utilisateur['code_postal'].' '.$utilisateur['ville'].'<br><br>'.$utilisateur['email'].'<br><br>	'.'Pseudo: '.$utilisateur['pseudo'].'<br>'.'Mot de passe: '.$utilisateur['mdp'].'<br> 
				</div>'; ?></td>
				<td><?php echo '<div class="etat_civil">Age: '.$utilisateur['age'].'<br>'.'Date de naissance: '.$utilisateur['date_de_naissance'].'<br>'.$utilisateur['civilite'].'<br>'.$utilisateur['notes'].'<br></div>' ?>
					<a href="index.php" class="deco">Déconnexion</a>
				</td>
			</tr>
		
		</table>


	</div>	

</body>
</html>


