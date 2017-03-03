<?php
require("connexion/connexion.php");
$arr = array('errors' => true);

if($_POST){

	if(!empty($_POST['email']) && !empty($_POST['objet']) && !empty($_POST['message'])){

		$contact = $pdo->prepare("INSERT INTO contact(email,objet,message) 
			VALUES(:email,:objet,:message)");

		$contact->bindParam(':email',$_POST['email'],PDO::PARAM_STR);
		$contact->bindParam(':objet',$_POST['objet'],PDO::PARAM_STR);
		$contact->bindParam(':message',$_POST['message'],PDO::PARAM_STR);

		if($contact->execute()){

			$arr['errors'] = false;
			$arr['message'] = "Vos données on bien été transmises";

		}
	}else{

		$arr['message'] = "Veuillez remplir tous les champs";
	}
}
echo json_encode($arr);

?>