<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Administration</title>
        <meta charset="utf-8">
        <base href="<?= $web_root ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="lib/jquery-2.2.0.min.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" src="lib/datatables/datatables.min.css">
        <script type="text/javascript" src="lib/datatables/datatables.min.js"></script>
        
    </head>
    <body>
        
        <div class="container">
            <h2>Administration</h2>
            <ul class="nav nav-tabs">
                <li><a data-toggle="tab" href="#admin1">Utilisateurs</a></li>
                <li><a data-toggle="tab" href="#admin2">Produits</a></li>
                <li><a data-toggle="tab" href="#admin3">Catégories</a></li>
                <li><INPUT Type="button" VALUE="Retour" onClick="history.go(-1);return true;"></li>
            </ul>

            <div class="tab-content">
                <div id="admin1" class="tab-pane fade">
                    <h3>Veuillez remplir le formulaire pour rajouter un utilisateur.</h3>
                    <form id="signupForm" action="admin/insert_user" method="post">
                        <table>
                            <tr>
                                <td>Nom:</td>
                                <td><input id="nom" name="nom" type="text" size="16" value=""></td>
                                <td class="errors" id="errPseudo"></td>
                            </tr>
                            <tr>
                                <td>Prenom:</td>
                                <td><input id="prenom" name="prenom" type="text" size="16" value=""></td>
                                <td class="errors" id="errPseudo"></td>
                            </tr>
                            <tr>
                                <td>Date de naissance:</td>
                                <td><input id="ddnJour" name="jour" type="number" size="2" value="">
                                <input id="ddnMois" name="mois" type="number" size="2" value="">
                                <input id="ddnAnnee" name="annee" type="text" size="4" value=""></td>
                                <td class="errors" id="errPseudo"></td>
                            </tr>
                            <tr>
                                <td>Pseudo:</td>
                                <td><input id="pseudo" name="pseudo" type="text" size="16"></td>
                                <td class="errors" id="errPseudo"></td>
                            </tr>

                            <tr>
                                <td>Mot de passe:</td>
                                <td><input id="password" name="password" type="password" size="16"></td>
                                <td class="errors" id="errPassword"></td>
                            </tr>
                            <tr>
                                <td>Confirmation du mot de passe:</td>
                                <td><input id="passwordConfirm" name="password_confirm" size="16" type="password"></td>
                                <td class="errors" id="errPasswordConfirm"></td>
                            </tr>
                            <tr>
                                <td>Mail:</td>
                                <td><input id="mail" name="mail" type="text" size="16"></td>
                                <td class="errors" id="errPseudo"></td>
                            </tr>
                            <tr>
                                <td>Numéro de téléphone:</td>
                                <td><input id="tel" name="tel" type="text" size="16"></td>
                                <td class="errors" id="errPseudo"></td>
                            </tr>
                        </table>
                        <input id="btn" type="submit" value="Ajouter">
                    </form>
                    <h3>Utilisateurs sur le site</h3>
                    <?php
                        echo '<form action="admin/delete_user" method="post">';
                        echo '
                        <table id="datatable" border="1" width="10">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Pseudo</th>
                                <th>Date de naissance</th>
                                <th>Mail</th>
                                <th>Téléphone</th>
                                <th>Supprimé</th>
                            </tr>
                        </thead>
                        <tbody> ';

                        foreach ($alluser as $user) {
                            echo "<tr>";
                            echo "<td>".$user->nom."</td><td>".$user->prenom."</td>";
                            echo "<td>".$user->pseudo."</td><td>".$user->ddn."</td>";
                            echo "<td>".$user->mail."</td><td>".$user->tel."</td>";
                            
                            //checkbox supprimé
                            echo '<td><input type="checkbox"';
                            if ($user->suppr == true)
                                echo "checked ";
                            echo 'name="suppr'.$user->id.'" value="'.$user->id.'"></td>';
                            
                        }
                        echo "</tbody></table>";
                        echo '<input type="submit" value="Supprimer">';
                        echo '</form>';
                    ?>
                </div>
                <div id="admin2" class="tab-pane fade">				  
                    <p>
                        <h3>Entrez le produit à rajouter.</h3>
                        <form id="addprod" action="admin/insert_product" method="post">
                            <table>
                                <tr>
                                    <td>Nom du produit :</td>
                                    <td><input id="label" name="label" type="text" size="16" value=""></td>
                                </tr>
                                <tr>
                                    <td>Description du produit :</td>
                                    <td><input id="descr" name="descr" type="text" size="16" value=""></td>
                                </tr>
                                <tr>
                                    <td>Prix du produit :</td>
                                    <td><input id="prix" name="prix" type="number" size="16" value=""></td>
                                </tr>
                                <tr>
                                    <td>Quantité en stock :</td>
                                    <td><input id="stock" name="stock" type="number" size="16" value=""></td>
                                </tr>
                            </table>
                            <input id="btn" type="submit" value="Ajouter">
                        </form>
                    </p>
                    <p>
                        
                        <?php
                        echo '<form action="admin/delete_product" method="post">';
                        echo '
                        <table id="datatable" border="1" width="10">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Label</th>
                                <th>Description</th>
                                <th>Prix</th>
                                <th>Stock</th>
                                <th>Supprimé</th>
                            </tr>
                        </thead>
                        <tbody> ';

                        foreach ($allProd as $prod) {
                            echo "<tr>";
                            echo "<td>".$prod->id."</td>";
                            echo "<td>".$prod->label."</td><td>".$prod->descr."</td>";
                            echo "<td>".$prod->prix."</td><td>".$prod->stock."</td>";
                            
                            //checkbox supprimé
                            echo '<td><input type="checkbox"';
                            if ($prod->suppr == true)
                                echo "checked ";
                            echo 'name="suppr'.$prod->id.'" value="'.$prod->id.'"></td>';
                        }
                        echo "</tbody></table>";
                        echo '<input type="submit" value="Supprimer">';
                        echo '</form>';
                        ?>
                    </p>
                </div>
                <div id="admin3" class="tab-pane fade">
                    <p>
                        <h3>Entrez le nom de la catégore à rajouter.</h3>
                        <form id="addcat" action="admin/insert_categorie" method="post">
                            <table>
                                <tr>
                                    <td>Nom :</td>
                                    <td><input id="titre" name="titre" type="text" size="16" value=""></td>
                                </tr>
                            </table>
                            <input id="btn" type="submit" value="Ajouter">
                        </form>
                    </p>
                    <p>
                        <h3>Entrez le nom de la catégorie à supprimer.</h3>
                        <form id="deletecat" action="admin/delete_categorie" method="post">
                            <table>
                                <tr>
                                    <td>Nom de la catégorie :</td>
                                    <td><input id="titre" name="titre" type="text" size="16" value=""></td>
                                </tr>
                            </table>
                            <input id="btn" type="submit" value="Supprimer">
                        </form>
                    </p>
                </div>
            </div>
        </div>
        <script>    
            $(document).ready(function() { 
                    $("#datatable").DataTable();
            });
        </script>
    </body>
</html>