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
            $sql = "SELECT * FROM ads;";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $i = 0;
            while ($row) {
                $i++;
                $ownerID = $row['ownerID'];
                $breedID = $row['breedID'];
                $name = $row['name'];
                $gender = $row['gender'];
                $age = $row['age'];
                $size = $row['size'];
                $color = $row['color'];
                $story = $row['story'];
                $diet = $row['diet'];
                $isDog = $row['isDog'];
                echo <<<AD
                <div class="col-md-6 col-lg-4">
                <div class="card my-3">
                <div class="card-thumbnail">
                <img src="./assets/img/generic_$isDog.jpg" width="200" class="img-fluid mx-auto d-block" alt="thumbnail">
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
                <div class="tab-pane active" id="list-home$i" role="tabpanel" aria-labelledby="list-home-list">
                AD;
                if ($isDog) {
                    $sql2 = "SELECT name from dogs where id = $breedID";
                    $stmt2 = $pdo->prepare($sql2);
                    $stmt2->execute();
                    $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
                    echo $row2['name'];
                } else {
                    $sql3 = "SELECT name from cats where id = $breedID";
                    $stmt3 = $pdo->prepare($sql3);
                    $stmt3->execute();
                    $row3 = $stmt3->fetch(PDO::FETCH_ASSOC);
                    echo $row3['name'];
                }
                echo <<<ADD
                 $breedID $name $gender $age $size $color</div>
                <div class="tab-pane" id="list-profile$i" role="tabpanel" aria-labelledby="list-profile-list">$story</div>
                <div class="tab-pane" id="list-messages$i" role="tabpanel" aria-labelledby="list-messages-list">$diet</div>
                <div class="tab-pane" id="list-settings$i" role="tabpanel" aria-labelledby="list-settings-list">$ownerID</div>
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

                ADD;
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
            }
            ?>
        </div>
    </div>
</section>