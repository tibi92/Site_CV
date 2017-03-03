<?php require("../connexion/connexion.php"); ?>

<?php
//Mise a jour d'une compétence 

if(isset($_POST['competence'])){
	$competence = adsslashes($_POST['competence']);
	$titre_c = adsslashes($_POST['titre_c']);
	$pdo -> exect('UPDATE competence SET competence="$competence", titre_c="$titre_c" WHERE id_competence="$id_competence"');

		header('location:../admin/competences.php');//Le header pr revenir a la lste des competences de l'utilisateur
		exit();




}
// Je récupère la compétence
 $id_competence = $_GET['id_competence']; //par l'id_competence et $_GET
$sql = $pdo -> query("SELECT * FROM competence WHERE id_competence = '$id_competence'");
$ligne_competence = $sql->fetch();
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
	<link href="https://fonts.googleapis.com/css?family=Sansita" rel="stylesheet"> 
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
					<form action="competences.php" method="POST">
					<label>Modification d'une compétences</label>
						<input type="text" name="titre_c" value="<?= $ligne_competence['titre_c']; ?>" required>
						<input type="text" name="competence" value="<?= $ligne_competence['competence']; ?>" required>
						<input hidden name="id_competence" value="<?= $ligne_competence['id_competence']; ?>">
						<input type="submit" value="mettre à jour">
					</form>
			</div>
				
				<p> <?php echo $ligne_competence['id_competence']; ?>    </p>
		
		</div>

	</div>
</body>
</html>