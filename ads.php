<?php include_once 'includes/header.php'; ?>
<?php if (!empty($email)) : ?>
    <?php include_once "pdo.php" ?>
    <?php include_once "models/Pet.php" ?>
    <?php include_once "models/User.php" ?>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // $user_id = htmlspecialchars($_POST['user_id'], ENT_QUOTES);
        // $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
        // $zipcode = htmlspecialchars($_POST['zipcode'], ENT_QUOTES);
        // $lookingFor = htmlspecialchars($_POST['looking_for'], ENT_QUOTES);
        // $canAdvertise = htmlspecialchars($_POST['can_advertise'], ENT_QUOTES);
        // $isAdmin_u = htmlspecialchars($_POST['isAdmin'], ENT_QUOTES);
        // $warnings = htmlspecialchars($_POST['warnings'], ENT_QUOTES);
        // try {
        //     $sql_u = "UPDATE USERS
        //     SET email = :em, zipcode = :z, looking_for = :l, can_advertise = :c,
        //     isAdmin = :ia, warnings = :w
        //     WHERE user_id = :uid";
        //     $stmt_u = $pdo->prepare($sql_u);
        //     $stmt_u->execute(array(
        //         ':em' => $email,
        //         ':uid' => $user_id,
        //         ':ia' => $isAdmin_u,
        //         ':z' => $zipcode,
        //         ':l' => $lookingFor,
        //         ':c' => $canAdvertise,
        //         ':w' => $warnings
        //     ));
        //     if ($stmt_u->rowCount()) {
        //         echo "<p class='lead bg-light text-success text-center'>User $email successfully updated!</p>";
        //     } else {
        //         echo "<p class='lead bg-light text-danger text-center'>Error: No users exist with that ID.</p>";
        //     }
        // } catch (PDOException $e) {
        //     echo "<p class='bg-light text-center'>Something went wrong ($e)</p>";
        // }
    }
    ?>
    <?php
    $breed_colors = ['Blue', 'Chestnut', 'Light', 'Silver', 'Beige', 'Red', 'Gold', 'Black', 'Brown', 'Yellow', 'Tan', 'Wheaten', 'White', 'Dark', 'Gray', 'Cream', 'Rust', 'Lilac', 'Apricot', 'Orange', 'Fawn'];
    if (
        !empty($_GET['q'])
        && is_numeric($_GET['q'])
    ) {
        $breed_id = htmlspecialchars($_GET['q'], ENT_QUOTES);
    }
    ?>
    <?php
    $sql = "SELECT can_advertise FROM USERS WHERE email = :u;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':u' => $email));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $user = new User($row);
    ?>
    <script>
        counter = 0;

        function unauth() {
            alert("Want to post an ad? Contact the admin for extra rights.");
            document.getElementById('addPost').style.display = 'none';
        }

        $(document).ready(function() {
            $("#formAdvanced").hide();
            $("#btnFilterPet").click(function() {
                breed_name = $("#petinput").val();
                fetch(
                    'validate-pet-search.php?q=' + encodeURIComponent(breed_name)
                ).then((res) => {
                    return res.text();
                }).then((text) => {
                    $(".individual-ad").remove();
                    $("div.noresults").remove();
                    if (text.startsWith('<div class="individual-ad')) {
                        $("#filteredPets").html(text);
                    } else {
                        $("#filteredPets").html(`
                        <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="noresults scrollspy-example bg-light p-3 rounded-2" tabindex="0">
                    <h4 id="scrollspyHeading1">We're sorry</h4>
                    <p>No one has placed an add for this breed type yet... Come back later.</p>
                    </div>
                        `);
                    }
                    $('#filteredPets').contents().unwrap();
                    $('#adRow').append('<div id="filteredPets"></div>');
                })
            });
            $("#btnAdvanced").click(() => {
                if (counter % 2 == 0) {
                    $("#petinput").val("");
                    $("#petinput").prop('disabled', true).prop('placeholder', "Use filters below");
                    $("#btnFilterPet").prop('disabled', true);
                } else {
                    $("#petinput").prop('disabled', false).prop('placeholder', "Type a breed type like: Havana Brown, then press 🔍");
                    $("#btnFilterPet").prop('disabled', false);
                }
                $("#formAdvanced").toggle();
                counter++;
            })
        });
    </script>
    <?php if ($user->can_advertise) : ?>
        <div class="p-3 mb-2 bg-dark text-white">
            <p class="lead text-white text-center">
                <a href="add.php">Add post</a>
            </p>
        </div>
    <?php endif; ?>
    <?php if (!$user->can_advertise) : ?>
        <div id="addPost" class="p-3 mb-2 bg-dark">
            <p class="lead text-center">
                <a class="text-muted" onclick="unauth()" href="#">Add post</a>
            </p>
        </div>
    <?php endif; ?>
    <section class="">
        <div class="container">
            <div id='adRow' class="row">
                <div class="input-group" id="boot-search-box">
                    <input name="petinput" id="petinput" type="text" class="form-control" placeholder="Type a breed type like: Havana Brown, then press 🔍">
                    <div class="input-group-btn">
                        <div class="btn-group" role="group">
                            <div class="dropdown dropdown-lg">
                                <button id="btnAdvanced" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">⚙️</button>
                                <button type="button" id="btnFilterPet" class="btn btn-info">🔍</button>
                            </div>
                        </div>
                    </div>
                </div>
                <form action=<?= $_SERVER['PHP_SELF'] ?> method="POST" id="formAdvanced" class="bg-white p-4">
                    <div class="form-check form-check-inline">
                        <label for="breed" class="form-label">Breed</label>
                        <select name="breed" id="breed">
                            <option value="Choose" selected>Choose</option>
                            <?php
                            $breed_types = array();
                            $sql = "select name from breeds;";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute();
                            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                            while ($row) {
                                $pet = new Pet($row);
                                if (!in_array($pet->name, $breed_types)) {
                                    array_push($breed_types, $pet->name);
                                }
                                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                            }
                            foreach ($breed_types as $key => $value) {
                                echo <<<COLOR
                                    <option value="$value">$value</option>
                                    COLOR;
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-check form-check-inline">
                        <label for="gender" class="form-label">Gender</label>
                        <select name="gender" id="gender">
                            <option value="Choose" selected>Choose</option>
                            <option value="Male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-check form-check-inline">
                        <label for="minAge" class="form-label">Min Age</label>
                        <select name="minAge" id="minAge">
                            <?php
                            for ($i = 1; $i <= 22; $i++) {
                                echo <<<AGE
                                <option value="$i">$i</option>
                                AGE;
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-check form-check-inline">
                        <label for="maxAge" class="form-label">Max Age</label>
                        <select name="maxAge" id="maxAge">
                            <?php
                            for ($i = 1; $i <= 21; $i++) {
                                echo <<<AGE
                                <option value="$i">$i</option>
                                AGE;
                            }
                            ?>
                            <option selected value="22">22</option>
                        </select>
                    </div>
                    <div class="form-check form-check-inline">
                        <label for="size" class="form-label">Size</label>
                        <select name="size" id="size">
                            <option value="Choose" selected>Choose</option>
                            <option value="Small">Small</option>
                            <option value="Medium">Medium</option>
                            <option value="Large">Large</option>
                        </select>
                    </div>
                    <div class="form-check form-check-inline">
                        <label for="color" class="form-label">Color</label>
                        <select name="color" id="color">
                            <option value="Choose" selected>Choose</option>
                            <?php
                            foreach ($breed_colors as $key => $value) {
                                echo <<<COLOR
                            <option value="$value">$value</option>
                            COLOR;
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-check form-check-inline">
                        <label for="healthcare" class="form-label">Healthcare</label>
                        <select name="healthcare" id="healthcare">
                            <option value="Choose" selected>Choose</option>
                            <option value="4">Free</option>
                            <option value="5">Basic Care</option>
                            <option value="6">Complete Care</option>
                            <option value="7">Complete Care Plus</option>
                        </select>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" value="true" name="btnAdvancedSubmit" id="btnAdvancedSubmit" class="btn btn-primary">Search</button>
                    </div>
                </form>
                <?php
                if (
                    !empty($breed_id)
                    && is_numeric($breed_id)
                ) {
                    $sql = "SELECT p.pet_id,b.name as bname, b.isFeline, gender, age,p.name,story,diet,u.zipcode,datediff(now(),a.advertised_date) as days FROM pet_details p
                    join ads a on p.pet_id=a.pet_id
                    join users u on p.owner_id =u.user_id
                    join breeds b on p.breed_id= b.breed_id
                    where p.breed_id = :b
                    order by days;";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(array(":b" => $breed_id));
                } else {
                    $sql = "SELECT p.pet_id,b.name as bname,b.isFeline,gender, age,p.name,story,diet,u.zipcode,datediff(now(),a.advertised_date) as days FROM pet_details p
                    join ads a on p.pet_id=a.pet_id
                    join users u on p.owner_id =u.user_id
                    join breeds b on p.breed_id= b.breed_id
                    order by days;";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                }
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if (empty($row)) {
                    echo <<<G
                    <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="noresults scrollspy-example bg-light p-3 rounded-2" tabindex="0">
                    <h4 id="scrollspyHeading1">We're sorry</h4>
                    <p>No one has placed an add for this breed type yet... Come back later.</p>
                    </div>

                    G;
                }
                echo ("<div id='filteredPets'></div>");

                while ($row) {
                    $pet = new Pet($row);
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
                    <a class="btn text-white bg-success list-group-item list-group-item-action" id="list-adopt-list$pet->pet_id" href="ads.php?adopted_pet=$pet->pet_id">Adopt me</a>
                    AD;
                ?>
                    <?php if ($errors['taken'] == $pet->pet_id) : ?>
                        <h6 class="userwarn">Sorry. Pet taken.</h6>
                    <?php endif; ?>
                <?php
                    echo <<<AD
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
                     of age $pet->age who is looking for a warm home.</p> <samp>Breed: $pet->bname</samp> <hr><p><em>Pet Collar identification number is $pet->pet_id</em></p>
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
                    if (!in_array($pet->bname, $breed_types)) {
                        array_push($breed_types, $pet->bname);
                    }
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