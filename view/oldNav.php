<!--<nav>-->
<!--    <div>-->
<!--        <ul>-->
<!--            <li><a href="login/index">Accueil</a></li>-->
<!--            <li><a href="produit/produits">Produits</a></li>-->
<!--            <li class="dropdown">-->
<!--                <a href="produit/produits" class="dropbtn">Catégories</a>-->
<!--                <?php-->
<!--                    echo '<div class="dropdown-content">';-->
<!--                $categories = Categorie::select_all_categories();-->
<!--                foreach ($categories as $cat) {-->
<!--                echo '<a href="produit/produits?cat='.$cat->titre.'">'.$cat->titre.'</a>';-->
<!--                }-->
<!--                echo '</div>';-->
<!--    ?>-->
<!--    </li>-->
<!--    <?php if (isset($_SESSION['user']) && Utilisateur::is_admin($_SESSION['user'])) { echo "<li><a href="."admin/index"." class="."navbar-brand".">Admin</a></li>" ; }?>-->
<!--    <?php if (isset($_SESSION['user'])) { echo "<li><a href="."login/index"." class="."navbar-brand".">Profil</a>" ; }?>-->
<!--    <?php if (!isset($_SESSION['user'])) { echo "<li><a href="."login/login"." class="."navbar-brand".">Se connecter</a></li>" ; }?>-->
<!--    <?php if (!isset($_SESSION['user'])) { echo "<li><a href="."login/signup"." class="."navbar-brand".">S'enregistrer</a></li>" ; }?>-->
<!--    <?php if (isset($_SESSION['user'])) { echo "<li><a href="."login/logout"." class="."navbar-brand".">Déconnexion</a></li>" ; }?>-->
<!--    </ul>-->
<!--    <script>-->
<!--        function myFunction() {-->
<!--            document.getElementsByClassName("menu")[0].classList.toggle("responsive");-->
<!--        }-->
<!--    </script>-->
<!--    </div>-->
<!--</nav>-->
<!--<?php if (isset($_SESSION['user'])){-->
<!--echo "<div id=\"cart_logo\">\n";-->
<!--echo "    <a href=\"login/panier\"><img src=\"img/shopping_cart_logo.png\" alt=\"img\" height=\"30\" width=\"30\"></a>\n";-->
<!--echo "    <div id=\"valueCart\"></div>\n";-->
<!--echo "</div>\n";-->
<!--}?>-->