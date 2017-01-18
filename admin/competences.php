<?php require("../connexion/connexion.php"); ?>

<?php

session_start();

if(isset($_SESSION['connexion']) && $_SESSION['connexion'] == 'connecté'){//Si la personne est connecté et la valeur est bien celle de la page d'authentification
	$id_utilisateur = $_SESSION['id_utilisateur'];
	$prenom = $_SESSION['prenom'];
	$nom = $_SESSION['nom'];
}else{// l'utilisateur n'est pas connecté 
	header('location:authentification.php');
}

if(isset($_GET['deconnect'])){
	
	$_SESSION['connexion']= ''; // on vide les variables de session
	$_SESSION['id_utilisateur']= ''; 
	$_SESSION['prenom']= ''; 
	$_SESSION['nom']= ''; 

	unset($_SESSION['connexion']);// on supprime cette variable

	session_destroy();// on détruit la session
	header('location:../index.php');
}
?>

<?php // On insère une compétence
	if(isset($_POST['competence'])){ // On vérifie si on insert une nouvelle compétence
		if($_POST['competence']!='' && $_POST['titre_c']!=''){
			$competence = addslashes($_POST['competence']);
			$titre_c = addslashes($_POST['titre_c']);

		$pdo->exec("INSERT INTO competence VALUES (NULL, '$titre_c', '$competence','1')");
			header('location:../admin/competences.php');
			exit();

	}// ferme le if
		} // ferme le isset

//on supprime competence

if(isset($_GET['id_competence'])){
	$suppression = $_GET['id_competence'];
	$sql = "DELETE FROM competence WHERE id_competence =
	 '$suppression'";
	$pdo -> query($sql);
}

?>

<!DOCTYPE html>
<html>
<head>
	<?php
	$sql = $pdo->query("SELECT * FROM utilisateur") ;
	$ligne = $sql->fetch();
?>
	<title ><?php echo 'Compétences | ' . $ligne['nom'].''.$ligne['prenom']; ?></title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower|Raleway:300i,400,500|Ubuntu" rel="stylesheet"> 
</head>

<body>
	<header>
		<?php require("../admin/admin_menu.php"); ?>
	</header>

	<div class="wrapper">

		<h1> Les compétences numériques	</h1>
			<form action="competences.php" method="POST">
				<table width="200px" border="1">
				<thead>
					<th></th>
					<th>Titre </th>
					<th>Compétences</th>
				</thead>
					<tr>
						<td>Compétences</td>
						<td><input type="text" name="titre_c" id="titre_c" size="50" required></td>
						<td><input type="text" name="competence" id="competence" size="50" required></td>
					</tr>
					<tr>
						<td colspan="4"><input type="submit" value="Ajouter une compétence"></td>
					</tr>
				</table>
			</form>
		
			<?php 
				$sql = $pdo->prepare("SELECT * FROM competence");
				$sql->execute(); // execute la 
				$nbr_competence = $sql->rowCount(); // compte les lignes
			?>
		
			<table class="liste_competence" border="2">
				<caption >Liste des compétences</caption>
				<thead>
					<th>Titre de la compétences</th>
					<th>Compétences</th>
					<th>Suppression</th>
					<th>Modifier</th>
				</thead>
				<tr>
					<?php while($ligne = $sql->fetch()){ ?>
					<td><?php echo $ligne['titre_c'].'<br>'; ?> </td>
					<td><?php echo $ligne['competence'].'<br>'; ?> </td>
					<td><a href="competences.php?id_competence=<?php echo $ligne['id_competence']; ?>"> <img src="../img/delete.png"></a></td>
					<td><a href="modif_competence.php?id_competence=<?php echo $ligne['id_competence']; ?>"><img src="../img/edit.png">	</a></td>
					<!-- //On modifie competence (cf modif_competence.php) -->
				</tr>
				<?php } ?>
			</table>

	</div>
</body>
</html>