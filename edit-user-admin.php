<?php

session_start();

ob_start();

////////// UTILISATEURS //////////

$connexion = mysqli_connect("localhost","root","","boutique");
$requete_user = "SELECT * FROM `utilisateurs` WHERE id_droits = 1";
$query_user = mysqli_query($connexion, $requete_user);
$resultat_user = mysqli_fetch_all($query_user);

$requete_admin = "SELECT * FROM `utilisateurs` WHERE id_droits = 10";
$query_admin = mysqli_query($connexion, $requete_admin);
$resultat_admin = mysqli_fetch_all($query_admin);


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
<?php

if(!empty($_SESSION["login"]) && $_SESSION["id_droits"] == 10): ?>
        <a href="index.php"><img src="img/53494.png" alt="leave" class="leave-admin"></a>
        <main class="main-container">
            <section class="sec-container">
                <nav class="nav-container">
                    <ul class="ul-container">
                        <a href="admin.php" class="lien-nav lien-nav2 lien-lonely2"><li>Admin</li></a>
                        <a href="creer-produit.php" class="lien-nav lien-nav2 lien-lonely3"><li>Créer un produit</li></a>
                        <a href="edit-user-admin.php" class="lien-nav lien-lonely"><li>Gestion utilisateurs</li></a>
                        <a href="gestion-categorie.php" class="lien-nav lien-nav2 lien-lonely4"><li>Gestion catégories</li></a>
                        <a href="display-commandes.php" class="lien-nav lien-nav2 lien-lonely5"><li>Gestion commandes</li></a>
                        <a href="topsale-admin.php" class="lien-nav lien-nav2 lien-lonely6"><li>Top 5 ventes</li></a>
                    </ul>
                </nav>
                <section class="sec-container2">
                    <div class="box-title">
                        <h1 class="title-admin">Espace droits utilisateurs</h1>
                    </div>
<!-- ////////// TABLEAU UTILISATEURS ////////// -->
                    <div id="flex-divuser">
                        <article class="art-droits">
                            <div>
                                <h2 class="title-droits">Utilisateurs</h2>
                            </div>
                            <table class="table-droits">
                                <thead>
                                    <tr class="tr-droits">
                                        <th class="id-eduser">ID</th>
                                        <th class="log-eduser">LOGIN</th>
                                        <th>EMAIL</th>
                                        <th class="droits-and-del">DROITS</th>
                                        <th class="droits-and-del">DELETE</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody-droit-user">

<?php foreach($resultat_user as $users): ?>

                                    <tr>
                                        <td class="td-user-admin"><?php echo $users[0] ?></td>
                                        <td class="td-user-admin"><?php echo $users[1] ?></td>
                                        <td class="td-user-admin"><?php echo $users[3] ?></td>
                                        <td class="td-user-admin"><a href="upgrade-droit.php?id=<?php echo $users[0] ?>" class="lien-updemdel"><img src="img/admin.png" alt="admin" id="img-upadmin"></a></td>
                                        <td class="td-user-admin"><a href="delete-user.php?id=<?php echo $users[0] ?>" class="lien-updemdel"><img src="img/Button-Delete-icon.png" alt="delete" id="img-del-user"></a></td>
                                    </tr>

<?php endforeach; ?>

                                </tbody>
                            </table>
                        </article>

                        <article class="art-droits">
                            <div>
                                <h2 class="title-droits" id="t-droits-ad">Administrateurs</h2>
                            </div>
                            <table class="table-droits">
                                <thead>
                                    <tr class="tr-droits">
                                        <th class="id-eduser">ID</th>
                                        <th class="log-eduser">LOGIN</th>
                                        <th>EMAIL</th>
                                        <th class="droits-and-del">DROITS</th>
                                        <th class="droits-and-del">DELETE</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody-droit-user">

<?php foreach($resultat_admin as $admin): ?>

                                    <tr>
                                        <td class="td-user-admin"><?php echo $admin[0] ?></td>
                                        <td class="td-user-admin"><?php echo $admin[1] ?></td>
                                        <td class="td-user-admin"><?php echo $admin[3] ?></td>
                                        <td class="td-user-admin"><a href="demote-droit.php?id=<?php echo $admin[0] ?>" class="lien-updemdel"><img src="img/user.png" alt="user" id="img-downuser"></a></td>
                                        <td class="td-user-admin"><a href="delete-user.php?id=<?php echo $admin[0] ?>" class="lien-updemdel"><img src="img/Button-Delete-icon.png" alt="delete" id="img-del-user"></a></td>
                                    </tr>

<?php endforeach; ?>

                                </tbody>
                            </table>
                        </article>
                    </div>
                </section>
            </section>
        </main>
<?php

elseif(empty($_SESSION["login"]) || $_SESSION["id_droits"] == 1): ?>
    <section class="bg-error">
        <article class="art-error">
            <div class="div-errtitle">
                <h4 class="error-title">Vous n'avez pas accès à cette page</h4>
            </div>
            <div class="div-erradm">
                <p class="error-admin"><?php echo "Vous devez être connecté en tant qu'administrateur pour accéder a cette page"; ?></p>
            </div>
            <div class="div-lienerr">
                <a href="index.php" class="lien-error">Cliquez ici</a>
            </div>
            <div class="div-erradm2">  
                <p class="error-admin">pour revenir a la page d'accueil.</p>
            </div>
        </article>
    </section>
<?php endif;

if(isset($erreur)): ?>
    <div id=""><?php echo $erreur ?></div>
<?php endif;

ob_end_flush(); ?>

    </body>
</html>