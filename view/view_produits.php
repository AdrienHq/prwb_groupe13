<!DOCTYPE html>
<html>
    <?php require_once("view/blocks/head.html"); ?>
    <body>
        <?php require_once("view/blocks/view_navbar.html"); ?>
        <section>
            <div class="container">
                <h1 style="margin-top: 20px; margin-bottom: 50px; text-align: center">All our products</h1>
                <div class="row">
                <?=
                    '<table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Photo</>
                                <th scope="col">Label</>
                                <th scope="col">Description</>
                                <th scope="col">Prix</>
                                <th scope="col">Quantité en stock</>
                            </tr>
                        </thead>
                        <tbody>'
                ?>
                <?php
                        foreach ($produits as $produit) {
                            echo "<tr>";
                                echo "<td><img src=".$produit->photo.' width = "80" height = "80" alt = "img"/></td>';
                                echo '<td><a href="produit/produit?id='.$produit->id.'">'.$produit->label."</a></td>";
                                echo "<td>".$produit->descr."</td>";
                                echo "<td>".$produit->prix."</td>";
                                echo "<td>".$produit->stock."</td>";
                            echo "<tr>";
                        }
                        echo "</tbody></table>";
                ?>
                    <script>
                        $(document).ready(function() {
                            $("#datatable").DataTable();
                        });
                    </script>
                </div>
            </div>
        </section>
    </body>
</html>