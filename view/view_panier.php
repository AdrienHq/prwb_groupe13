<!DOCTYPE html>
<html lang="en">
    <?php require_once("view/blocks/head.html"); ?>
    <head>
        <script type="text/javascript" src="lib/jquery-2.2.0.min.js"></script>
        <script type="text/javascript" src="js/panier.js"></script>
    </head>
    <body>
        <?php require_once("view/blocks/view_navbar.html"); ?>
        <section>
            <div class="container">
                <h1 style="margin-top: 20px; margin-bottom: 50px; text-align: center">Panier</h1>
                <div class="row">
                    <?=
                    '<table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Photo</th>
                                <th scope="col">Label</th>
                                <th scope="col">Description</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Quantite</th>
            
                                <th scope="col">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>'
                    ?>
                    <?php
                    $prixtotal = 0;
                    foreach ($panier as $line) {
                        echo "<tr name=". $line->id . ">";
                        echo "<td><img src=".$line->photo.' width = "80" height = "80" alt = "img"/></td>';
                        echo '<td><a href="produit/produit?id='.$line->id.'">'.$line->label."</a></td>";
                        echo "<td>".$line->descr."</td>";
                        echo "<td>".($line->prix)*($line->stock).'</td>';
                        echo '<td>'.$line->stock.'</td>';
                        echo '<td><input class="delete" id="'. $line->id . '" type="image" src="img/close.png" width = "20" height = "20" alt = "img">';
                        echo '</tr>';
                    }
                    echo "</tbody></table>";
                    echo"<h3>"."Prix Total : ".$prixtotal."</h3>";
                    ?>
                    <style>h3 {text-align: center;}</style>

                    <div style="text-align:center;">
                        <input type="button" value="Vider le panier" onclick="emptyBasket()">
                    </div>
                    <script>
                        $(document).ready(function() {
                            $("#datatable").DataTable();
                        });
                    </script>
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