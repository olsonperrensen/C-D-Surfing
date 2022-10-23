<?php include_once 'includes/header.php'; ?>
<?php include_once "pdo.php" ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="p-3 mb-2 bg-dark text-white">
    <p class="lead text-white text-center">
        <a href="add.php">Add post</a>
    </p>
</div>
<section class="">
    <div class="container">
        <div class="row">
            <?php
            for ($i = 0; $i < 6; $i++) {
                echo <<<AD
                <div class="col-md-6 col-lg-4">
                <div class="card my-3">
                <div class="card-thumbnail">
                <img src="./assets/img/generic_cat.jpg" width="200" class="img-fluid" alt="thumbnail">
                </div>
                <div class="card-body">
                <div class="row">
                <div class="col-4">
                <div class="list-group" id="list-tab$i" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-home-list$i" data-bs-toggle="list" href="#list-home" role="tab" aria-controls="list-home">Home</a>
                <a class="list-group-item list-group-item-action" id="list-profile-list$i" data-bs-toggle="list" href="#list-profile" role="tab" aria-controls="list-profile">Profile</a>
                <a class="list-group-item list-group-item-action" id="list-messages-list$i" data-bs-toggle="list" href="#list-messages" role="tab" aria-controls="list-messages">Messages</a>
                <a class="list-group-item list-group-item-action" id="list-settings-list$i" data-bs-toggle="list" href="#list-settings" role="tab" aria-controls="list-settings">Settings</a>
                </div>
                </div>
                <div class="col-8">
                <div class="bg-light tab-content" id="nav-tabContent$i">
                <div class="tab-pane active" id="list-home$i" role="tabpanel" aria-labelledby="list-home-list">...</div>
                <div class="tab-pane" id="list-profile$i" role="tabpanel" aria-labelledby="list-profile-list">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt maxime reprehenderit vel, repellat, eos nobis necessitatibus natus temporibus nam nulla quisquam, at minima tempore. Neque, quidem modi. Magnam, totam labore.</div>
                <div class="tab-pane" id="list-messages$i" role="tabpanel" aria-labelledby="list-messages-list">B</div>
                <div class="tab-pane" id="list-settings$i" role="tabpanel" aria-labelledby="list-settings-list">C</div>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                <script>
                $(document).ready(function() {
                $("#list-home-list$i").click(function() {
                $("#list-home$i").toggle();
                $("#list-profile$i").hide()
                $("#list-messages$i").hide();
                $("#list-settings$i").hide();

                $("#list-home-list$i").addClass('active');
                $("#list-profile-list$i").removeClass('active');
                $("#list-messages-list$i").removeClass('active');
                $("#list-settings-list$i").removeClass('active');
                });
                $("#list-profile-list$i").click(function() {
                $("#list-profile$i").toggle();
                $("#list-home$i").hide()
                $("#list-messages$i").hide();
                $("#list-settings$i").hide();

                $("#list-profile-list$i").addClass('active');
                $("#list-home-list$i").removeClass('active');
                $("#list-messages-list$i").removeClass('active');
                $("#list-settings-list$i").removeClass('active');
                });
                $("#list-messages-list$i").click(function() {
                $("#list-messages$i").toggle();
                $("#list-profile$i").hide()
                $("#list-home$i").hide();
                $("#list-settings$i").hide();


                $("#list-messages-list$i").addClass('active');
                $("#list-home-list$i").removeClass('active');
                $("#list-profile-list$i").removeClass('active');
                $("#list-settings-list$i").removeClass('active');
                });
                $("#list-settings-list$i").click(function() {
                $("#list-settings$i").toggle();
                $("#list-profile$i").hide()
                $("#list-messages$i").hide();
                $("#list-home$i").hide();


                $("#list-settings-list$i").addClass('active');
                $("#list-home-list$i").removeClass('active');
                $("#list-profile-list$i").removeClass('active');
                $("#list-messages-list$i").removeClass('active');
                });
                });
                </script>
                AD;
            }
            ?>
        </div>
    </div>
</section>