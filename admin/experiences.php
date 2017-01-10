<?php require("../connexion/connexion.php"); ?>

<?php
	if(isset($_POST['titre_exp'])){ // On vérifie si on insert une nouvelle compétence
		if($_POST['titre_exp']!='' && $_POST['sous_titre_exp']!='' && $_POST['date']!='' && $_POST['description']!='' && $_POST['id_competence']!='' ){
			$titre_exp = addslashes($_POST['titre_exp']);
			$sous_titre_exp = addslashes($_POST['sous_titre_exp']);
			$date = addslashes($_POST['date']);
			$description = addslashes($_POST['description']);
			$id_competence = addslashes($_POST['id_competence']);

		$pdo->exec("INSERT INTO experience VALUES (NULL, '$titre_exp', '$sous_titre_exp', '$date', '$description', '$id_competence')");
			header('location: ../admin/experiences.php');
			exit();

	}// ferme le if
		} // ferme le isset

?>
<!DOCTYPE html>
<html>
<head>
	<?php
	$sql = $pdo->query("SELECT * FROM utilisateur") ;
	$ligne = $sql->fetch();
?>
	<title >Site CV: Compétences:  <?php echo $ligne['nom'].''.$ligne['prenom']; ?></title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
	<div id="contenu">
		<header>
			<?php require("../admin/admin_menu.php"); ?>
		</header>
		<h1> Les compétences</h1>
		<div id="menu">
			<h2>Connexion : déconnexion</h2>
		</div>

		<div id="contenuPrincipal">
			<div>
				<form action="experiences.php" method="POST">
					<table width="200px" border="1">
						<thead>
							<th>Experience</th>
							<th>Titre</th>
							<th>Sous-titre</th>
							<th>Date </th>
							<th>Description</th>
							<th>Compétence</th>
						</thead>
						<tr>
							<td><input type="text" name="experience"  size="25" required></td></td>
							<td><input type="text" name="titre_exp"  size="25" required></td></td>
							<td><input type="text" name="sous_titre_exp"  size="25" required></td></td>
							<td><input type="text" name="date"  size="25" required></td></td>
							<td><input type="text" name="description"  size="25" required></td></td>
							<td><input type="text" name="id_competence"  size="25" required></td></td>
							
						</tr>
						<tr>
							<td colspan="2"><input type="submit" value="Insérer une expériences"></td>
						</tr>
					</table>
				</form>
			</div>
				<?php 
					$sql = $pdo->prepare("SELECT * FROM experience");
					$sql->execute(); // execute la 
					$nbr_experience = $sql->rowCount(); // compte les lignes
				?>
				<p>Il y a <?php echo $nbr_experience; ?> expériences   </p>
				<table border="2">
					<caption>Liste des expériences</caption>
					<thead>
						<th>expériences</th>
						<th>suppression</th>
					</thead>
					<tr>
						<?php while($ligne = $sql->fetch()){ ?>
						<td><?php echo $ligne['titre_exp'].'<br>'.$ligne['sous_titre_exp'].'<br>'.$ligne['sous_titre_exp'].'<br>'.$ligne['date'].'<br>'.$ligne['description'].'<br>'.$ligne['id_competence'].'<br>'; ?> </td>
						<td><a href="#">----</a></td>
					</tr>
					<?php } ?>
				</table>
		</div>

	</div>
</body>
</html>