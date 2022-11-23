<?php include_once 'pdo.php'; ?>
<?php include_once 'models/Pet.php'; ?>
<?php
session_start();
if (
    !empty($_SESSION['email']) && !empty($_GET['q'])
    && !is_numeric($_GET['q'])
) {
    $filtered_pets_by_breed = array();
    $breed_name = htmlspecialchars($_GET['q'], ENT_QUOTES);

    $sql_ps = "SELECT p.pet_id,b.name as bname, b.isFeline, gender, age,p.name,story,diet,u.zipcode,datediff(now(),a.advertised_date) as days FROM pet_details p
                    join ads a on p.pet_id=a.pet_id
                    join users u on p.owner_id =u.user_id
                    join breeds b on p.breed_id= b.breed_id
                    where b.name LIKE :b
                    order by days;";
    $stmt_ps = $pdo->prepare($sql_ps);
    $stmt_ps->execute(array(':b' => "%$breed_name%"));
    $row_ps = $stmt_ps->fetch(PDO::FETCH_ASSOC);
    while ($row_ps) {
        array_push($filtered_pets_by_breed, $row_ps);
        $pet = new Pet($row_ps);
        echo <<<AD
                    <div class="individual-ad col-md-6 col-lg-4">
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
                    <a class="btn text-white bg-success list-group-item list-group-item-action" id="list-adopt-list$pet->pet_id" data-bs-toggle="list" href="ads.php?adopted_pet=$pet->pet_id" role="tab" aria-controls="list-settings">Adopt me</a>
                    </div>
                    </div>
                    <div class="col-8">
                    <div class="bg-light tab-content" id="nav-tabContent$pet->pet_id">
                    <div class="tab-pane active" id="list-home$pet->pet_id" role="tabpanel" aria-labelledby="list-home-list">
                    <p class='lead'>$pet->name is a $pet->gender 
                    AD;
        if ($pet->isFeline) {
            echo "cat";
        } else {
            echo "dog";
        }
        echo <<<AD
                     of age $pet->age who is looking for a warm home.</p> <samp>Breed: $pet->bname</samp> <hr><em><p>Pet Collar identification number is $pet->pet_id</p></em>
                    AD;
        echo <<<ADD
                    </div>
                    <div class="tab-pane" id="list-profile$pet->pet_id" role="tabpanel" aria-labelledby="list-profile-list">$pet->story</div>
                    <div class="tab-pane" id="list-messages$pet->pet_id" role="tabpanel" aria-labelledby="list-messages-list">$pet->diet</div>
                    <div class="tab-pane" id="list-settings$pet->pet_id" role="tabpanel" aria-labelledby="list-settings-list">This pet resides at a shelter with zipcode $pet->zipcode.</br></br>Adopt it soon so it becomes part of your home.</div>
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
        $row_ps = $stmt_ps->fetch(PDO::FETCH_ASSOC);
    }
} else if (
    $_SESSION['email'] &&
    !empty(htmlspecialchars($_GET['breed'], ENT_QUOTES)) &&
    !empty(htmlspecialchars($_GET['gender'], ENT_QUOTES)) &&
    !empty(htmlspecialchars($_GET['minAge'], ENT_QUOTES)) &&
    is_numeric(htmlspecialchars($_GET['minAge'], ENT_QUOTES)) &&
    !empty(htmlspecialchars($_GET['maxAge'], ENT_QUOTES)) &&
    is_numeric(htmlspecialchars($_GET['maxAge'], ENT_QUOTES)) &&
    !empty(htmlspecialchars($_GET['size'], ENT_QUOTES)) &&
    !empty(htmlspecialchars($_GET['color'], ENT_QUOTES)) &&
    !empty(htmlspecialchars($_GET['healthcare'], ENT_QUOTES)) &&
    is_numeric(htmlspecialchars($_GET['healthcare'], ENT_QUOTES))
) {
    echo "HI";
} else {
    header('Location: index.php');
}
