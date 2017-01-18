<?php require("../connexion/connexion.php"); ?>

<?php // On insère une compétence
	if(isset($_POST['titre_l'])){ // On vérifie si on insert une nouvelle compétence
		if($_POST['titre_l']!=''){
			$titre_l = addslashes($_POST['titre_l']);
			$description_l = addslashes($_POST['description_l']);

		$pdo->exec("INSERT INTO loisir VALUES (NULL, '$titre_l','$description_l', '1')");
			header('location:../admin/a_propos.php');
			exit();

	}// ferme le if
		} // ferme le isset

//on supprime loisir

if(isset($_GET['id_loisir'])){
	$suppression = $_GET['id_loisir'];
	$sql = "DELETE FROM loisir WHERE id_loisir = '$suppression'";
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
	<title ><?php echo 'Loisirs | ' . $ligne['nom'].''.$ligne['prenom']; ?></title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
	<header>
		<?php require("../admin/admin_menu.php"); ?>
	</header>
	
	<div class="wrapper">
		<h1> Les loisirs</h1>
		<div id="menu">
			
		</div>

		<div id="contenuPrincipal">
			<div>
				<form action="loisir
				..


				.php" method="POST">
					<table width="200px" border="1">
						<tr>
							<td>Loisirs</td>
							<td><input type="text" name="titre_l" id="titre_l" size="50" required></td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" value="ajouter un loisir"></td>
						</tr>
					</table>
				</form>
			</div>
				<?php 
					$sql = $pdo->prepare("SELECT * FROM loisir");
					$sql->execute(); // execute la 
					$nbr_loisir = $sql->rowCount(); // compte les lignes
				?>
				<p>Il y a <?php echo $nbr_loisir; ?> loisir(s)   </p>
				<table border="2">
					<caption>Liste des loisirs</caption>
					<thead>
						<th>loisirs</th>
						<th>suppression</th>
						<th>modifier</th>
					</thead>
					<tr>
						<?php while($ligne = $sql->fetch()){ ?>
						<td><?php echo $ligne['titre_l'].'<br>'; ?> </td>
						<td><a href="a_propos.php?id_loisir=<?php echo $ligne['id_loisir']; ?>">Delete</a></td>
					</tr>
					<?php } ?>
				</table>
		</div>

	</div>
</body>
</html>