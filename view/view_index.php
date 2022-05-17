<!DOCTYPE html>
<html>
    <?php require_once("view/blocks/head.html"); ?>
    <head>
        <script type="text/javascript" src="lib/jquery-2.2.0.min.js"></script>
        <script type="text/javascript" src="js/panier.js"></script>
    </head>
    <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function () {
            myInput.focus()
        })
    </script>
    <header>
        <?php require_once("view/blocks/view_navbar.html"); ?>
        <?php require_once("view/blocks/view_header.html"); ?>
    </header>
    <body>
        <section role="main">
            <div class="baseline">
                <span class="baseline-welcome">Gimme</span>
                <span class="baseline-slogan">Your MONEY</span>
                <span class="baseline-descr">Will be better in my pocket</span>
            </div>
            <div class="container" style="text-align: center">
                <div class="row" style="margin-bottom: 150px; margin-top: 50px">
                    <div class="col-md-4">
                        <h2 style="background-color: #666666; margin-top: 15px; padding: 5px 5px 15px">Our story</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium deserunt dicta illo molestias praesentium quas repudiandae similique sunt unde vel!</p>
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            View Details
                        </button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci asperiores beatae cum exercitationem, illo molestias, necessitatibus nesciunt nihil odit omnis quam quas repellat, rerum. Aliquam consequatur doloremque dolorum, eligendi, eum ex facilis in laborum nostrum porro possimus quibusdam quis quo ratione unde, vel vero voluptatum! Ab pariatur placeat quis ratione!
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h2 style="background-color: #666666; margin-top: 15px; padding: 5px 5px 15px">Our engagement</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium deserunt dicta illo molestias praesentium quas repudiandae similique sunt unde vel!</p>
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            View Details
                        </button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci asperiores beatae cum exercitationem, illo molestias, necessitatibus nesciunt nihil odit omnis quam quas repellat, rerum. Aliquam consequatur doloremque dolorum, eligendi, eum ex facilis in laborum nostrum porro possimus quibusdam quis quo ratione unde, vel vero voluptatum! Ab pariatur placeat quis ratione!
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h2 style="background-color: #666666; margin-top: 15px; padding: 5px 5px 15px">Yes we ripped you off</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium deserunt dicta illo molestias praesentium quas repudiandae similique sunt unde vel!</p>
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            View Details
                        </button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci asperiores beatae cum exercitationem, illo molestias, necessitatibus nesciunt nihil odit omnis quam quas repellat, rerum. Aliquam consequatur doloremque dolorum, eligendi, eum ex facilis in laborum nostrum porro possimus quibusdam quis quo ratione unde, vel vero voluptatum! Ab pariatur placeat quis ratione!
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
