<!DOCTYPE html>
<html lang="en">
<?php require_once("view/blocks/head.html"); ?>
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
        <link rel="stylesheet" type="text/css" src="lib/datatables/datatables.min.css">
        <script type="text/javascript" src="lib/datatables/datatables.min.js"></script>
    </head>
    <body>
        <?php require_once("view/blocks/view_navbar.html"); ?>
        
        <?php
            echo '
            <table id="datatable" border="1" width="10">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Label</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Quantite</th>

                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody id="tablePanier"> ';

            //foreach ($produits as $line) {
            $prixtotal = 0;
            foreach ($panier as $line) {
                $prixtotal = $prixtotal + ($line->prix)*($line->stock);
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

    </body>
</html>
