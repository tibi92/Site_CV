
<?php require("../connexion/connexion.php"); ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<?php
	$sql = $pdo->query("SELECT nom, prenom, ville, avatar FROM utilisateur") ;
	$ligne = $sql->fetch();
?>
	<title >Bienvenue <?php echo $ligne['prenom'].''.$ligne['prenom']; ?></title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body> </body>
	<header>
		<?php require("../admin/admin_menu.php"); ?>
	</header>
	<div class="maincontent">	

		<h1 >Espace administratif du site CV</h1>
		<sidebar></sidebar>

		<?php 
			  $date = date("d-m-Y");
			  $heure = date("H:i");
			  echo '<strong style="color:purple"> Nous sommes le '. $date.' , il est '. $heure .'</strong>';
			  echo '<div >
			  <p>Hola  '.$ligne['prenom'].' '.$ligne['nom'].' de '.$ligne['ville'].'<br></p>
			  </div>';
			  echo '<img src ="../img/'.$ligne['avatar'].'" alt=""><br>';
		 ?>


<?php echo $ligne['prenom'].'<br><br>'; ?>


</div>
<footer style="border: 1px solid purple">Pied de page</footer>


