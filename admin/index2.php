	
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

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<?php
	$sql = $pdo->query("SELECT nom, prenom, ville, avatar FROM utilisateur") ;
	$ligne = $sql->fetch();
?>
	<title >Bienvenue <?php echo $_SESSION['nom'].''.$_SESSION['prenom']; ?></title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Sansita" rel="stylesheet"> 
</head>
<body> 
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

<footer style="border: 1px solid purple">Pied de page
<a href="index.php?deconnect">Déconnexion</a>
</footer>

	</body>

</html>
