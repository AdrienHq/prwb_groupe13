<!DOCTYPE html>
<html>
    <?php require_once("view/blocks/head.html"); ?>
    <body>
        <div>
            <?php require_once("view/blocks/view_navbar.html"); ?>
            <script>
                function myFunction() {
                    document.getElementsByClassName("menu")[0].classList.toggle("responsive");
                }
            </script>
        </div>
        <div class="main">
            <form action="login/login" method="post">
                <table>
                    <tr>
                        <td>Pseudo:</td>
                        <td><input id="pseudo" name="pseudo" type="text" value=""></td>
                    </tr>
                    <tr>
                        <td>Mot de Passe:</td>
                        <td><input id="password" name="password" type="password" value=""></td>
                    </tr>
                </table>
                <input type="submit" value="Connexion">
            </form>
            <?php if($error): ?>
                <div class='errors'><br><br><?= $error ?></div>
            <?php endif; ?>
        </div>
    </body>
</html>