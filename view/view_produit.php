<!DOCTYPE html>
<html>
    <?php require_once("view/blocks/head.html"); ?>
    <head>
        <script type="text/javascript" src="lib/jquery-2.2.0.min.js"></script>
        <script type="text/javascript" src="js/panier.js"></script>
    </head>
    <body>
        <?php require_once("view/blocks/view_navbar.html"); ?>
        <h2 style="margin-top:60px; text-align: center"><?= $produit->label ?> </h2>
        <section style="background-color: white;">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <div class="card text-black">
                            <?= "<img src=".$produit->photo.' width = "100%" height = "100%" alt = "img"/>' ?>
                            <div class="card-body">
                                <div class="text-center">
                                    <h5>Produit : <?= $produit->label ?></h5>
                                    <p class="text-muted mb-4">Apple pro display XDR</p>
                                </div>
                                <div>
                                    <div class="d-flex justify-content-between">
                                        <span><strong>Label</strong></span><span><?= $produit->label ?></span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span><strong>Description</strong></span><span><?= $produit->descr ?></span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span><strong>Prix</strong></span><span><?= $produit->prix ?></span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between total font-weight-bold mt-4">
                                    <span id="idProd" hidden value="<?= $produit->id ?>"></span>
                                    <input type="button" class="btn btn-dark" value="Ajouter au panier" onclick="addToBasket()">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
    <footer class="footer" id="footer">
        <div class="container">
            <?php require_once("view/blocks/view_footer.html"); ?>
        </div>
    </footer>
</html>