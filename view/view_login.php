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
        <div class="container">
            <div class="row" style="padding-top: 50px  text-align: center">
                <div class="col-sm-4 mx-auto" style="text-align: center">
                    <?php require_once("view/blocks/form_login.html"); ?>
                    <?php if($error): ?>
                        <div class='errors'><br><br><?= $error ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </body>
</html>