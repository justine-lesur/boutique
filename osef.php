<form action="" method="post">
            <select name="selectorder">
                <option value="recent">Plus Récent</option>
                <option <?php if(isset($_POST["selectorder"]) && $_POST["selectorder"] == "prixmini"){ echo "selected"; } ?> value="prixmini">Plus Bas Prix</option>
                <option <?php if(isset($_POST["selectorder"]) && $_POST["selectorder"] == "prixmax"){ echo "selected"; } ?> value="prixmax">Prix Le Plus Élevé</option>
                <input type="submit">    
            </select>
        </form>
    </section>
    <section>
        <?php if(isset($_POST["selectorder"]) && $_POST["selectorder"] == "recent"):
            foreach($resultat as $article): ?>
                <article>
                    <a href=""><img src="<?php echo $article[4]?>" alt="mode"></a>
                    <h3><?php echo $article[1] ?></h3>
                    <span><?php echo $article[6] ?> €</span>
                </article>
            <?php endforeach;
        elseif(isset($_POST["selectorder"]) && $_POST["selectorder"] == "prixmini"):
            foreach($resultat1 as $article): ?>
                <article>
                    <a href=""><img src="<?php echo $article[4]?>" alt="mode"></a>
                    <h3><?php echo $article[1] ?></h3>
                    <span><?php echo $article[6] ?> €</span>
                </article>
            <?php endforeach;
        elseif(isset($_POST["selectorder"]) && $_POST["selectorder"] == "prixmax"):
            foreach($resultat2 as $article): ?>
                <article>
                    <a href=""><img src="<?php echo $article[4]?>" alt="mode"></a>
                    <h3><?php echo $article[1] ?></h3>
                    <span><?php echo $article[6] ?> €</span>
                </article>
            <?php endforeach;
        else:
            foreach($resultat as $article): ?>
                <article>
                    <a href=""><img src="<?php echo $article[4]?>" alt="mode"></a>
                    <h3><?php echo $article[1] ?></h3>
                    <span><?php echo $article[6] ?> €</span>
                </article>
            <?php endforeach;
        endif;
        ?>
         

        // $cateid = $categories[0];
                //  ?>
                // <li><a href="produits.php?idcat=<?php echo $categories[0] ?>"><?php echo $categories[1] ?></a></li>