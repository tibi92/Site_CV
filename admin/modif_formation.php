<?php require("../connexion/connexion.php"); ?>

<?php
//Mise a jour d'une formation
if(isset($_POST['titre_f'])){

	$titre_f = addslashes($_POST['titre_f']);
	$sous_titre_f = addslashes($_POST['sous_titre_f']);
	$date_f = addslashes($_POST['date_f']);
	$description_f = addslashes($_POST['description_f']);
	$id_utilisateur = $_POST['id_utilisateur'];
	$id_formation = $_POST['id_formation'];
	

	$pdo -> exec("UPDATE formation SET titre_f='$titre_f', sous_titre_f='$sous_titre_f', date_f='$date_f', description_f='$description_f' WHERE id_formation='$id_formation'");

		header('location:../admin/formations.php');//Le header pr revenir a la lste des formations de l'utilisateur
		exit();

}
	// Je récupère la formation
	$id_formation = $_GET['id_formation']; //par l'id_formation et $_GET
	$sql = $pdo -> query("SELECT * FROM formation WHERE id_formation = '$id_formation'");
	$ligne_formation = $sql->fetch();
?>		
<!DOCTYPE html>
<html>
<head>
	<?php
	$sql = $pdo->query("SELECT * FROM utilisateur") ;
	$ligne = $sql->fetch();
?>
	<title ><?php echo 'Formations | ' . $ligne['nom'].''.$ligne['prenom']; ?></title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Sansita" rel="stylesheet"> 
</head>
<body>
	<header>
		<?php require("../admin/admin_menu.php"); ?>
	</header>

	<div class="wrapper">
		<h1> Les expériences | modification </h1>
		<div id="menu">
			<h2>Connexion : déconnexion</h2>
		</div>
		<div id="contenuPrincipal">
			<div>
					<form action="modif_formation.php" method="POST">
					<label>Modification d'une formation</label>
						<input type="text" name="titre_f" value="<?= $ligne_formation['titre_f']; ?>" required>
						<input type="text" name="sous_titre_f" value="<?= $ligne_formation['sous_titre_f']; ?>" required>
						<input type="text" name="date_f" value="<?= $ligne_formation['date_f']; ?>" required>
						<input type="text" name="description_f" value="<?= $ligne_formation['description_f']; ?>" required>
						<input hidden name="id_utilisateur" value="<?= $ligne_formation['id_utilisateur']; ?>">
						<input hidden name="id_formation" value="<?= $ligne_formation['id_formation']; ?>">
						<input type="submit" value="mettre à jour">
					</form>
			</div>
		
		</div>

	</div>
</body>
</html>