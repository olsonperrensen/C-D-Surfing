<?php include_once 'includes/header.php'; ?>
<?php if (!empty($email)) : ?>
    <?php include_once "pdo.php" ?>
    <?php include_once "models/Pet.php" ?>
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
                $sql = "SELECT * FROM pet_details where on_adoption = 1;";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                while ($row) {
                    $pet = new Pet($row);
                    echo <<<AD
                    <div class="col-md-6 col-lg-4">
                    <div class="card my-3">
                    <div class="card-thumbnail">
                    <img src="./assets/img/breed_details.jpg" width="200" class="img-fluid mx-auto d-block" alt="thumbnail">
                    </div>
                    <div class="card-body">
                    <div class="row">
                    <div class="col-4">
                    <div class="list-group" id="list-tab$pet->pet_id" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-home-list$pet->pet_id" data-bs-toggle="list" href="#list-home" role="tab" aria-controls="list-home">Profile</a>
                    <a class="list-group-item list-group-item-action" id="list-profile-list$pet->pet_id" data-bs-toggle="list" href="#list-profile" role="tab" aria-controls="list-profile">Story</a>
                    <a class="list-group-item list-group-item-action" id="list-messages-list$pet->pet_id" data-bs-toggle="list" href="#list-messages" role="tab" aria-controls="list-messages">Diet</a>
                    <a class="list-group-item list-group-item-action" id="list-settings-list$pet->pet_id" data-bs-toggle="list" href="#list-settings" role="tab" aria-controls="list-settings">Location</a>
                    </div>
                    </div>
                    <div class="col-8">
                    <div class="bg-light tab-content" id="nav-tabContent$pet->pet_id">
                    <div class="tab-pane active" id="list-home$pet->pet_id" role="tabpanel" aria-labelledby="list-home-list">
                    AD;
                    foreach ($pet as $key => $value) {
                        echo "$key:$value,";
                    }
                    echo <<<ADD
                    </div>
                    <div class="tab-pane" id="list-profile$pet->pet_id" role="tabpanel" aria-labelledby="list-profile-list">$pet->story</div>
                    <div class="tab-pane" id="list-messages$pet->pet_id" role="tabpanel" aria-labelledby="list-messages-list">$pet->diet</div>
                    <div class="tab-pane" id="list-settings$pet->pet_id" role="tabpanel" aria-labelledby="list-settings-list">$pet->owner_id</div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    <script>
                    $(document).ready(function() {
                    $("#list-home-list$pet->pet_id").click(function() {
                    $("#list-home$pet->pet_id").toggle();
                    $("#list-profile$pet->pet_id").hide()
                    $("#list-messages$pet->pet_id").hide();
                    $("#list-settings$pet->pet_id").hide();
    
                    $("#list-home-list$pet->pet_id").addClass('active');
                    $("#list-profile-list$pet->pet_id").removeClass('active');
                    $("#list-messages-list$pet->pet_id").removeClass('active');
                    $("#list-settings-list$pet->pet_id").removeClass('active');
                    });
                    $("#list-profile-list$pet->pet_id").click(function() {
                    $("#list-profile$pet->pet_id").toggle();
                    $("#list-home$pet->pet_id").hide()
                    $("#list-messages$pet->pet_id").hide();
                    $("#list-settings$pet->pet_id").hide();
    
                    $("#list-profile-list$pet->pet_id").addClass('active');
                    $("#list-home-list$pet->pet_id").removeClass('active');
                    $("#list-messages-list$pet->pet_id").removeClass('active');
                    $("#list-settings-list$pet->pet_id").removeClass('active');
                    });
                    $("#list-messages-list$pet->pet_id").click(function() {
                    $("#list-messages$pet->pet_id").toggle();
                    $("#list-profile$pet->pet_id").hide()
                    $("#list-home$pet->pet_id").hide();
                    $("#list-settings$pet->pet_id").hide();
    
    
                    $("#list-messages-list$pet->pet_id").addClass('active');
                    $("#list-home-list$pet->pet_id").removeClass('active');
                    $("#list-profile-list$pet->pet_id").removeClass('active');
                    $("#list-settings-list$pet->pet_id").removeClass('active');
                    });
                    $("#list-settings-list$pet->pet_id").click(function() {
                    $("#list-settings$pet->pet_id").toggle();
                    $("#list-profile$pet->pet_id").hide()
                    $("#list-messages$pet->pet_id").hide();
                    $("#list-home$pet->pet_id").hide();
    
    
                    $("#list-settings-list$pet->pet_id").addClass('active');
                    $("#list-home-list$pet->pet_id").removeClass('active');
                    $("#list-profile-list$pet->pet_id").removeClass('active');
                    $("#list-messages-list$pet->pet_id").removeClass('active');
                    });
                    });
                    </script>
    
                    ADD;
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if (empty($email)) {
    header('Location: login.php');
}
?>