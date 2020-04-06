
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
		<meta name="description" content="Voici la description de l'équipe des codeurs du dimanche">
    <link rel="stylesheet" href="css/boutique.css" type="text/css"/>
		<title>Boutique en ligne</title>
</head>
<body>
	<header>
		<nav id="menu">
			<ul>
			<li><a href="index.php">Accueil</a></li>
				<?php
				 	if (!isset($_SESSION['login']))
					{
				?>		
						<li><a href="inscription.php">Inscription</a></li>
						<li><a href="connexion.php">Connexion</a></li>
				<?php
					}
					else
					{
						
				?>			
						<li><a href="mon-profil.php">Profil</a></li>
  						<li><a href="categories-produits/hommes/hommes.php">Hommes</a>
   							 <ul>
     							 <li><a href="categories-produits/hommes/pantalon-homme.php">Pantalons</a></li>
     							 <li><a href="categories-produits/hommes/haut-homme.php">Hauts</a></li>
     							 <li><a href="categories-produits/hommes/short-homme.php">Shorts</a></li>
    						 </ul>
  						</li>
  						<li><a href="categories-produits/femmes/femmes.php">Femmes</a>
   							 <ul>
     							 <li><a href="categories-produits/femmes/pantalon-femme.php">Pantalons</a></li>
     							 <li><a href="categories-produits/femmes/haut-femme.php">Hauts</a></li>
     							 <li><a href="categories-produits/femmes/jupe-femme.php">Jupes</a></li>
     							 <li><a href="categories-produits/femmes/robe-femme.php">Robes</a></li>
    						 </ul>
  						</li>
						<li><a href="panier.php">Panier</a></li>
				<?php

						//On regarde si l'utilisateur connecté est modérateur ou administrateur
						$connect = mysqli_connect('localhost','root','','boutique');
						$query = "SELECT id_droits FROM utilisateurs WHERE login='".$_SESSION['login']."'";
						$reg = mysqli_query($connect,$query);
						$rows= mysqli_fetch_assoc($reg);
						
						if ($rows['id_droits'] == 10)
		
						{
							?><li><a href="admin.php">Admin</a></li><?php
						}

					?>
						<li><a href="deconnexion.php">Déconnexion</a></li>
				<?php
						}
				
				?>
			</ul>
		</nav>
	</header>
</body>
</html>