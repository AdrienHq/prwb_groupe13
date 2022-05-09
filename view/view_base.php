<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Connectez vous !</title>
        <base href="<?= $web_root ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
        <script src="/lib/jquery-2.2.0.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="/js/panier.js"></script>
        <script>
            $(function(){
                $("input:text:first").focus();
            });
        </script>
    </head>
    <body>
        <header>
            <?php require_once("view_navbar.html"); ?>
            <?php require_once("view_header.html"); ?>
            <?php require_once("view_footer.html"); ?>
        </header>
        <section>
            <div class="container">
                <div class="row">

                </div>
            </div>
        </section>
    </body>
</html>