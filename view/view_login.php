<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Connectez vous !</title>
        <base href="<?= $web_root ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/style1.css">
        <script src="lib/jquery-2.2.0.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/panier.js"></script>
        <script>
            $(function(){
                $("input:text:first").focus();
            });
        </script>
    </head>
    <body>
        <div>
            
            <?php require_once("view_navbar.html"); ?>
            
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