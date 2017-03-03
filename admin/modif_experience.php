<?php require("../connexion/connexion.php"); ?>

<?php
//Mise a jour d'une experience 


if(isset($_POST['titre_e'])){

	$titre_e = addslashes($_POST['titre_e']);
	$sous_titre_e = addslashes($_POST['sous_titre_e']);
	$date_e = addslashes($_POST['date_e']);
	$description_e = addslashes($_POST['description_e']);
	$id_experience = $_POST['id_experience'];

	$pdo -> exec("UPDATE experience SET titre_e='$titre_e', sous_titre_e='$sous_titre_e', date_e='$date_e', description_e='$description_e' WHERE id_experience='$id_experience'");

		header('location:../admin/experiences.php');//Le header pr revenir a la lste des experiences de l'utilisateur
		exit();

}
// Je récupère l'experience
$id_experience = $_GET['id_experience']; //par l'id_experience et $_GET
$sql = $pdo -> query("SELECT * FROM experience WHERE id_experience = '$id_experience'");
$ligne_experience = $sql->fetch();
?>		
<!DOCTYPE html>
<html>
<head>
	<?php
	$sql = $pdo->query("SELECT * FROM utilisateur") ;
	$ligne = $sql->fetch();
?>
	<title ><?php echo 'Expériences | ' . $ligne['nom'].''.$ligne['prenom']; ?></title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Sansita" rel="stylesheet"> 
</head>

<body>
	<div id="contenu">
		<header>
			<?php require("../admin/admin_menu.php"); ?>
		</header>
		<h1> Les expériences | modification </h1>
		<div id="menu">
			<h2>Connexion : déconnexion</h2>
		</div>

		<div id="contenuPrincipal">
			<div>
					<form action="modif_experience.php" method="POST">
					<label>Modification d'une formation</label>
						<input type="text" name="titre_e" value="<?= $ligne_experience['titre_e']; ?>" required>
						<input type="text" name="sous_titre_e" value="<?= $ligne_experience['sous_titre_e']; ?>" required>
						<input type="text" name="date_e" value="<?= $ligne_experience['date_e']; ?>" required>
						<input type="text" name="description_e" value="<?= $ligne_experience['description_e']; ?>" required>
						<input hidden name="id_experience" value="<?= $ligne_experience['id_experience']; ?>">
						<input type="submit" value="mettre à jour">
					</form>
			</div>
				
				<p> <?php echo $ligne_experience['id_experience']; ?>    </p>
		
		</div>

	</div>
</body>
</html>