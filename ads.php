<?php include_once 'includes/header.php'; ?>
<?php if (!empty($email)) : ?>
    <?php include_once "pdo.php" ?>
    <?php include_once "models/Pet.php" ?>
    <?php include_once "models/User.php" ?>
    <?php
    $sql = "SELECT can_advertise FROM USERS WHERE email = :u;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':u' => $email));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $user = new User($row);
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function unauth() {
            alert("Want to post an ad? Contact the admin for extra rights.");
        }
    </script>
    <?php if ($user->can_advertise) : ?>
        <div class="p-3 mb-2 bg-dark text-white">
            <p class="lead text-white text-center">
                <a href="add.php">Add post</a>
            </p>
        </div>
    <?php endif; ?>
    <?php if (!$user->can_advertise) : ?>
        <div class="p-3 mb-2 bg-dark text-white">
            <p class="lead text-white text-center">
                <a onclick="unauth()" href="">Add post</a>
            </p>
        </div>
    <?php endif; ?>
    <section class="">
        <div class="container">
            <div class="row">
                <?php
                $sql = "SELECT p.pet_id,age,name,story,diet,u.zipcode,datediff(now(),a.advertised_date) as days FROM pet_details p
                 join ads a on p.pet_id=a.pet_id
                 join users u on p.owner_id =u.user_id
                 order by days;";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                while ($row) {
                    $pet = new Pet($row);
                    echo <<<AD
                    <div class="col-md-6 col-lg-4">
                    <div class="card my-3">
                    <div class="card-thumbnail">
                    <div class="text-center"><samp>$pet->days days ago</samp></div>
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
                    <a class="text-white bg-success list-group-item list-group-item-action" id="list-settings-list$pet->pet_id" data-bs-toggle="list" href="#list-settings" role="tab" aria-controls="list-settings">Adopt me</a>
                    </div>
                    </div>
                    <div class="col-8">
                    <div class="bg-light tab-content" id="nav-tabContent$pet->pet_id">
                    <div class="tab-pane active" id="list-home$pet->pet_id" role="tabpanel" aria-labelledby="list-home-list">
                    <p class='lead'>$pet->name is a $pet->gender pet of age $pet->age who is looking for a warm home.</p> <hr><em><p>Pet Collar identification number is $pet->pet_id</p></em>
                    AD;
                    echo <<<ADD
                    </div>
                    <div class="tab-pane" id="list-profile$pet->pet_id" role="tabpanel" aria-labelledby="list-profile-list">$pet->story</div>
                    <div class="tab-pane" id="list-messages$pet->pet_id" role="tabpanel" aria-labelledby="list-messages-list">$pet->diet</div>
                    <div class="tab-pane" id="list-settings$pet->pet_id" role="tabpanel" aria-labelledby="list-settings-list">This pet resides at a residence with zipcode $pet->zipcode</div>
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