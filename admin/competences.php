<?php require("../connexion/connexion.php"); ?>

<?php // On insère une compétence
	if(isset($_POST['competence'])){ // On vérifie si on insert une nouvelle compétence
		if($_POST['competence']!=''){
			$competence = addslashes($_POST['competence']);

		$pdo->exec("INSERT INTO competence VALUES (NULL, '$competence')");
			header('location:../admin/competences.php');
			exit();

	}// ferme le if
		} // ferme le isset

//on supprime competence

if(isset($_GET['id_competence'])){
	$suppression = $_GET['id_competence'];
	$sql = "DELETE FROM competence WHERE id_competence = '$suppression'";
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

		<div id="contenuPrincipal">VOIR
			<div>
				<form action="competences.php" method="POST">
					<table width="200px" border="1">
						<tr>
							<td>Compétences</td>
							<td><input type="text" name="competence" id="competence" size="50" required></td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" value="insérer une compétence"></td>
						</tr>
					</table>
				</form>
			</div>
				<?php 
					$sql = $pdo->prepare("SELECT * FROM competence");
					$sql->execute(); // execute la 
					$nbr_competence = $sql->rowCount(); // compte les lignes
				?>
				<p>Il y a <?php echo $nbr_competence; ?> compétences   </p>
				<table border="2">
					<caption>Liste des compétences</caption>
					<thead>
						<th>compétences</th>
						<th>suppression</th>
					</thead>
					<tr>
						<?php while($ligne = $sql->fetch()){ ?>
						<td><?php echo $ligne['competence'].'<br>'; ?> </td>
						<td><a href="competences.php?id_competence=<?php echo $ligne['id_competence']; ?>">Delete</a></td>
					</tr>
					<?php } ?>
				</table>
		</div>

	</div>
</body>
</html>