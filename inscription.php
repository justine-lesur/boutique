<!doctype html>
<html>
<head>
	<meta charset="utf-8">
		<meta name="description" content="Voici la description de l'équipe des codeurs du dimanche">
    <link rel="stylesheet" href="css/boutique.css" type="text/css"/>
		<title>CV de Justine</title>
</head>

<?php
require "justine-class.php";
include('header.php');
$var = new user;

$var->inscription();
?>

<body>
	<form method="post" action="inscription.php">
		<input type="text" name="login" placeholder="Login" required/>
	    <input type="mail" name="email" placeholder="Adresse Mail*" required/>
		<input type="password" name="password" placeholder="Mot de passe" required/>
		<input type="password" name="repeatpassword" placeholder="Confirmer le Mot de Passe*" required/>
		<input type="submit" name="valider"/>
	</form>
</body>
</html>