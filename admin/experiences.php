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

<?php
	if(isset($_POST['titre_e'])){ // On vérifie si on insert une nouvelle compétence
		if($_POST['titre_e']!='' && $_POST['sous_titre_e']!='' && $_POST['date_e']!='' && $_POST['description_e']!=''){
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
		<!-- Ck editor -->
		<script src="../ckeditor/ckeditor.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/style.css">
	</head>

	<body>
		
		<header>
			<?php require("../admin/admin_menu.php"); ?>
		</header>

		<div class="wrapper">
			<h1> Les expériences</h1>
				<form action="experiences.php" method="POST">
					<table width="200px" border="">
	                    <tr>                    
	                        <td>Titre experience</td> 
	                        <td><input type="text" name="titre_e" size="50" value="" required></td>                           
	                    </tr>
	                    <tr>
	                        <td>Sous-Titre experience</td> 
	                        <td><input type="text" name="sous_titre_e" value="" size="50"  required></td>                           
	                    </tr>
	                    <tr>    
	                        <td>Date</td> 
	                        <td><input type="text" name="date_e" value="" size="50"  required></td>                           
	                    </tr>
	                    <tr>
	                        <td>Description</td> 
	                        <td><textarea id="editor1" name="description_e" value="" size="100" cols="80" rows="10" required></textarea>
	                        <script>CKEDITOR.replace('editor1');</script></td>                          
	                    </tr>
	                    <tr>
	                        <td colspan="2"><input type="submit" value"Insérer une experience"></td>
	                    </tr>
	                </table>	
				</form>

				<?php 
					$sql = $pdo->prepare("SELECT * FROM experience");
					$sql->execute(); // execute la 
					$nbr_experience = $sql->rowCount(); // compte les lignes
				?>
			
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
		           </table>

		</div>
</body>
</html>