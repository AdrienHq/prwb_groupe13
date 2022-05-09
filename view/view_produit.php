<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Categorie TEST</title>
        <base href="<?= $web_root ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/style1.css">
        <script type="text/javascript" src="lib/jquery-2.2.0.min.js"></script>
        <script type="text/javascript" src="lib/unslider/unslider-min.js"></script>
        <script type="text/javascript" src="js/panier.js"></script>
        <link rel="stylesheet" type="text/css" href="lib/unslider/unslider.css">
        <link rel="stylesheet" type="text/css" href="lib/unslider/unslider-dots.css">
    </head>
    <body>
        <?php require_once("view_navbar.html"); ?>
       
        <h2>Produit : <?= $produit->label ?></h2>

            <div class="banner">
                <ul>
                    <li><?= "<img src=".$produit->photo.' width = "400" height = "400" alt = "img"/>' ?></li>
                    <li><?= "<img src=".$produit->photo.' width = "400" height = "400" alt = "img"/>' ?></li>
                    <li><?= "<img src=".$produit->photo.' width = "400" height = "400" alt = "img"/>' ?></li>
                    <li><?= "<img src=".$produit->photo.' width = "400" height = "400" alt = "img"/>' ?></li>
                </ul>
            </div>
            <!-- <?= "<span><img src=".$produit->photo.' width = "400" height = "400" alt = "img"/><span>' ?> -->
            <span class="label_profil">Label</span> : <?= $produit->label ?><br>
            <span class="label_profil">Description</span> : <?= $produit->descr ?><br>
            <span class="label_profil">Prix</span> : <?= $produit->prix ?><br>
            <span id="idProd" hidden value="<?= $produit->id ?>"></span>
            <input type="button" value="Ajouter au panier" onclick="addToBasket()">
        <script>
            $(function() {
                $('.banner').unslider();
            });
        </script>
    </body>
</html>