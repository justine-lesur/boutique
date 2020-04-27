<?php
require "justine-class.php";
$var = new user;

?>


<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/boutique.css" type="text/css"/>
<title>May - Mon profil</title>
</head>

<body>
<section class="image-background">
<?php
include('header.php');
?>
<h1 class="hashtag">#profil</h1>
</section>
<section class="formulaire">
	<form method="post">
		<section>
		<?php $var->updatelogin();?>
		<h2 class="modifier">Modifier mon identifiant</h1>
		<label>
			<input type="text" name="login2" class="input" placeholder="Nouvel identifiant*" required/><br/>
		</label>
		<label>
			<input type="password" name="motdepasse" class="input" placeholder="Mot de passe*" required/><br/>
		</label>
		<label>
	  		<input type="submit" name="submit2" class="submit2" value="Valider" />
	 	</label>
	</form>
	</section>
	
	<section>
	<?php $var->updatepassword();?>
	<form method="post">
		<h1 class="modifier">Modifier mon mot de passe</h1>
		<label>
			<input type="password" name="ancienmotdepasse" class="input" placeholder="Ancien mot de passe*" required/><br/>
		</label>
		<label>
			<input type="password" name="nouveaumotdepasse" class="input" placeholder="Nouveau mot de passe*" required/><br/>
		</label>
		<label>
	  		<input type="submit" class="submit2" name="submit3" value="Valider" />
	 	</label>
	</form>
	</section>
</section>
	<section>
		<h2 class="modifier">Historique d'achats</h2>
		<table>
			<tbody>
				<tr class="haut">
					<th>Commande</th>
					<th>Adresse</th>
					<th>Date d'achat</th>
					<th>Prix total</th>
					<th>Paiement</th>
				</tr>
				<?php
					$connexion = mysqli_connect('localhost','root','','boutique'); 
					$historique = "SELECT * FROM commandes WHERE id_utilisateur = ".$_SESSION['id']."";
					$queryhistorique = mysqli_query($connexion, $historique);
					$resultat = mysqli_fetch_all($queryhistorique);
									
				
					foreach($resultat as $articles)
				{
				?>
				<tr>
					<td><?php echo $articles[5]; ?></td>
					<td><?php echo $articles[4]; ?></td>
					<td><?php echo $articles[3]; ?></td>
					<td><?php echo $articles[2]; ?></td>
					<td><?php echo $articles[6]; ?></td>
				</tr>	
				<?php
				}
				?>
			</tbody>
		</table>
	</section>
	<?php
		include('footer.php');
	?>
</body>
</html>