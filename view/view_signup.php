<!DOCTYPE html>
<html>
    <?php require_once("view/blocks/head.html"); ?>
    <head>
        <script src="lib/jquery-2.2.0.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/panier.js"></script>
        <link href="lib/Jquery/jquery-ui-1.11.4/jquery-ui.theme.css" rel="stylesheet" type="text/css"/>
        <link href="lib/Jquery/jquery-ui-1.11.4/jquery-ui.structure.css" rel="stylesheet" type="text/css"/>
        <script src="lib/Jquery/jquery-ui-1.11.4/external/jquery/jquery.js" type="text/javascript"></script>
        <script src="lib/Jquery/jquery-ui-1.11.4/jquery-ui.js" type="text/javascript"></script>
        <script src="lib/Jquery/jquery-validation-1.14.0/jquery.validate.js" type="text/javascript"></script>

    </head>
    <body>
        <?php require_once("view/blocks/view_navbar.html"); ?>
        <section>
            <div class="container">
                <div class="row">
                    <h1 style="margin-top: 20px; margin-bottom: 50px">Please fill up this form to sign up</h1>
                    <h2 style="background-color: red">Not Debugged - Use </h2>
                    <h3 style="background-color: grey">Id -> admin</h3>
                    <h3 style="background-color: grey">Password -> admin</h3>
                    <h2 style="background-color: green">To connect</h2>
                    <br><br>
                    <form action="view_signup.php" id="signupForm"  method="post" >
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
                                <td><input id="ddnJour" name="jour" type="number" size="2" value="day">
                                    <input id="ddnMois" name="mois" type="number" size="2" value="mont">
                                    <input id="ddnAnnee" name="annee" type="number" size="4" value="year"></td>
                                <td class="errors" id="errPseudo"></td>
                            </tr>
                            <tr>
                                <td>Pseudo:</td>
                                <td><input id="pseudo" name="pseudo" type="text" size="16" value="" onchange=''></td>
                                <td class="errors" id="errPseudo"></td>
                            </tr>

                            <tr>
                                <td>Mot de passe:</td>
                                <td><input id="password" name="password" type="password" size="16" value="" ></td>
                                <td class="errors" id="errPassword"></td>
                            </tr>
                            <tr>
                                <td>Confirmation du mot de passe:</td>
                                <td><input id="passwordConfirm" name="password_confirm" size="16" type="password" value="" ></td>
                                <td class="errors" id="errPasswordConfirm"></td>
                            </tr>
                            <tr>
                                <td>Mail:</td>
                                <td><input id="mail" name="mail" type="text" size="16" value=""></td>
                                <td class="errors" id="errPseudo"></td>
                            </tr>
                            <tr>
                                <td>Numéro de téléphone:</td>
                                <td><input id="tel" name="tel" type="text" size="16" value=""></td>
                                <td class="errors" id="errPseudo"></td>
                            </tr>
                        </table>
                        <input id="btn" type="submit" value="Sign Up">
                    </form>
                    <?php if(count($errors)!=0): ?>
                        <div class='errors'>
                            <br><br><p>Veuillez corriger les erreurs suivantes:</p>
                            <ul>
                                <?php foreach($errors as $error): ?>
                                    <li><?= $error ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

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