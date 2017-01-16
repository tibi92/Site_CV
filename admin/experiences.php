<?php require("../connexion/connexion.php"); ?>

<?php
	if(isset($_POST['titre_e'])){ // On vérifie si on insert une nouvelle compétence
		if($_POST['titre_e']!='' && $_POST['sous_titre_e']!='' && $_POST['date_e']!='' && $_POST['description_e']!='' && $_POST['id_experience']!='' ){
			$titre_e = addslashes($_POST['titre_e']);
			$sous_titre_e = addslashes($_POST['sous_titre_e']);
			$date_e = addslashes($_POST['date_e']);
			$description_e = addslashes($_POST['description_e']);
			$id_experience = addslashes($_POST['id_experience']);

		$pdo->exec("INSERT INTO experience VALUES (NULL, '$titre_e', '$sous_titre_e	', '$date_e', '$description_e', '$id_experience', '1')");
			header('location: ../admin/experiences.php');
			exit();

	}// ferme le if
		} // ferme le isset

//on supprime experience

if(isset($_GET['id_experience'])){
	$suppression = $_GET['id_experience'];
	$sql = "DELETE FROM experience WHERE id_experience =
	 '$suppression'";
	$pdo -> query($sql);
}
	

//On modifie expérience
		
?>



<!DOCTYPE html>
<html>
<head>
	<?php
	$sql = $pdo->query("SELECT * FROM utilisateur") ;
	$ligne = $sql->fetch();
?>
	<title > <?php echo 'Expériences | ' . $ligne['nom'].' '.$ligne['prenom']; ?></title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
	<div id="wrapper">
		<header>
			<?php require("../admin/admin_menu.php"); ?>
		</header>
		<h1> Les expériences</h1>
		<div id="menu">
		
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
						
						</thead>
						<tr>
							<td><input type="text" name="id_experience"  size="25" required></td>
							<td><input type="text" name="titre_e"  size="25" required></td>
							<td><input type="text" name="sous_titre_e"  size="25" required></td>
							<td><input type="text" name="date_e"  size="25" required></td>
							<td><input type="text" name="description_e"  size="25" required></td>
					
							
						</tr>
						<tr>
							<td colspan="6"><input type="submit" value="Insérer une expérience"></td>
						</tr>
					</table>
				</form>
			</div>
				<?php 
					$sql = $pdo->prepare("SELECT * FROM experience");
					$sql->execute(); // execute la 
					$nbr_experience = $sql->rowCount(); // compte les lignes
				?>
				<p>Vous avez <?php echo $nbr_experience; ?> expériences   </p>
				<table border="2">
					<caption>Liste des expériences</caption>
						<thead>
							<th>Titre de l'experience</th>
							<th>Sous-titre</th>
							<th>Date</th>
							<th>Description</th>
							<th>Modifier</th>
							<th>Supprimer</th>
						</thead>
					<tr>
						<?php while($ligne = $sql->fetch()){ ?>
						<td> <?= $ligne['titre_e'].'<br>' ?></td>
						<td> <?= $ligne['sous_titre_e'].'<br>'?></td>
						<td> <?= $ligne['date_e'].'<br>'?></td>
						<td> <?= $ligne['description_e'].'<br>'?></td>	
						<td><a href="modif_experience.php?id_experience=<?= $ligne['id_experience']; ?>"><img src="../img/edit.png"></a></td>
						<td><a href="experiences.php?id_experience=<?= $ligne['id_experience']; ?>"><img src="../img/delete.png"></a></td>
						
                	</tr>	
                <?php };?>

						
						

					</tbody>	
					
				</table>
		</div>

	</div>
</body>
</html>