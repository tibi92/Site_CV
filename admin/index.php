<?php require '../connexion/connexion.php'; ?>
<?php     
session_start();//à mettre dans toutes les pages SESSION et identification
if(isset($_POST['connexion'])){//['connexion'] du name du submit du form ci dessous

    $email=addslashes($_POST['email']);
    $mdp=addslashes($_POST['mdp']);

    $sql = $pdo->prepare("SELECT * FROM utilisateur WHERE email='$email' AND mdp='$mdp'");//On vérifie le courriel et le mdp
    $sql-> execute();
    $nbr_utilisateur=$sql->rowCount();//on compte et s'il y est, le compte répond 1 sinon le compte répond 0 (est-ce le vra admin ou pas)

        if($nbr_utilisateur==0){//on ne le trouve pas
        $msg_connexion_err="Erreur d'authentification !";
        }else{//on trouve l'email et le mdp c'estbien il est bien inscrit
            $ligne = $sql->fetch();//pour retrouver son nom et prenom	

        $_SESSION['connexion'] = 'connecté';
        $_SESSION['id_utilisateur'] = $ligne['id_utilisateur'];
        $_SESSION['prenom'] = $ligne['prenom'];
        $_SESSION['nom'] = $ligne['nom'];

        header('location:accueil.php');//vers la page d'accueil de l'admin
    }
} 
	
	
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
	<meta charset="UTF-8">
	<title >Bienvenue</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto|Source+Sans+Pro" rel="stylesheet"> 
	</head>
	<body> 
		<header>
 
		</header>
		<div class="wrapper">
		<h1 class="h1">Connexion</h1>
			<form class="formulaire0" action="accueil.php" method="POST">
				<fieldset>
					<input class="formulaire1" type="email" name="email" placeholder="Email" required ></br></br>

					<input class="formulaire2" placeholder="Mot de passe" type="password" name="mdp" required></br></br>					
				</fieldset>
				<input class="bouton" name="connexion" type="submit" tabindex="4" value="C'est parti !"></br></br>
				<input class="bouton" type="reset" tabindex="3" value="Effacer">
				<p><a href="#" class="bouton" onClick="montrerform()">Mot de passe oublié ?</a></p>
			</form>
		</div>
	</body>
</html>