<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Categorie TEST</title>
        <base href="<?= $web_root ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="lib/jquery-2.2.0.min.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" src="lib/datatables/datatables.min.css">
        <script type="text/javascript" src="lib/datatables/datatables.min.js"></script>
        <script type="text/javascript" src="js/panier.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style1.css">
    </head>
    <body>
        
        
        <?php require_once "view_navbar.html"; ?>
        
        <?= 
            '<table id="datatable" border="1" width="10">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Label</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Quantité en stock</th>
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
                echo "</tr>";
            }
            echo "</tbody></table>";
        ?>
        
        <script>    
            $(document).ready(function() { 
                    $("#datatable").DataTable();
            });
        </script>
    </body>
</html>