<!DOCTYPE html>
<html>
    <?php require_once("view/blocks/head.html"); ?>
    <body>
        <?php require_once("view/blocks/view_navbar.html"); ?>
        <section>
            <div class="container">
                <div class="row">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Info</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <th scope="row">Nom</th>
                            <td><?= $user->nom ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Firstname</th>
                            <td><?= $user->prenom ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Pseudo</th>
                            <td><?= $user->pseudo ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Age</th>
                            <td><?= $user->ddn ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td><?= $user->mail ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Phone</th>
                            <td><?= $user->tel ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Admin</th>
                            <td><?= $user->admin ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <form action="login/mdp">
            <input type="submit" value="Changer mon mot de passe">
        </form>
    </body>
    <footer class="footer" id="footer">
        <div class="container">
            <?php require_once("view/blocks/view_footer.html"); ?>
        </div>
    </footer>
</html>
