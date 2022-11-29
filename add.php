<?php include_once 'includes/header.php'; ?>
<?php if (!empty($email)) : ?>
    <?php include_once 'pdo.php'; ?>
    <?php include_once 'models/User.php' ?>
    <?php include_once 'models/Pet.php' ?>
    <?php
    $sql = "SELECT can_advertise FROM USERS WHERE email = :em";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':em' => $email));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $user = new User($row);
    if (empty($user->can_advertise) && !$isAdmin) {
        header('Location: account.php');
        die();
    }
    ?>
    <?php
    $errors = array(
        'emptyPetName' => '',
        'emptyBreedName' => '',
        'emptyAnimalType' => '',
        'emptyGender' => '',
        'emptyAge' => '',
        'emptyStory' => '',
        'emptyDiet' => '',
        'emptyZipcode' => '',
        'invalidPetName' => '',
        'invalidBreedName' => '',
        'invalidAnimalType' => '',
        'invalidGender' => '',
        'invalidAge' => '',
        'invalidStory' => '',
        'invalidDiet' => '',
        'invalidZipcode' => '',
    );
    $btnPressed = false;
    // Handles POST requests
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (empty($_POST['petname'])) {
            $errors['emptyPetName'] = 'Pet name cannot be left empty.';
        }
        if (empty($_POST['breedName'])) {
            $errors['emptyBreedName'] = 'Breed cannot be left empty.';
        }
        if (empty($_POST['animalType'])) {
            $errors['emptyAnimalType'] = 'Animal type cannot be left empty.';
        }
        if (empty($_POST['gender'])) {
            $errors['emptyGender'] = 'Gender cannot be left empty.';
        }
        if (empty($_POST['age'])) {
            $errors['emptyAge'] = 'Age cannot be left empty.';
        }
        if (empty($_POST['story'])) {
            $errors['emptyStory'] = 'Story cannot be left empty.';
        }
        if (empty($_POST['diet'])) {
            $errors['emptyDiet'] = 'Diet cannot be left empty.';
        }
        if (empty($_POST['zipcode'])) {
            $errors['emptyZipcode'] = 'Zipcode cannot be left empty.';
        }
        if (strlen($_POST['petName'] < 3)) {
            $errors['invalidPetName'] = 'Pet name must be +3 characters long.';
        }
        if (strlen($_POST['story'] < 15)) {
            $errors['invalidStory'] = 'Story must be +15 characters long.';
        }
        if (strlen($_POST['diet'] < 3)) {
            $errors['invalidDiet'] = 'Diet must be +3 characters long.';
        }
        if (!array_filter($errors)) {
            // header('Location: thank-you.php');
        }
        var_dump($_POST);
    }
    ?>
    <section class="page-section cta">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="cta-inner bg-faded text-center rounded">
                        <h2 class="section-heading mb-5">
                            <span class="section-heading-upper">Transform someone's life</span>
                            <span class="section-heading-lower">Add a pet to our database</span>
                        </h2>
                        <form action=<?= $_SERVER['PHP_SELF']; ?> method="POST">
                            <div class="form-floating mb-3">
                                <input value="<?= htmlspecialchars($_POST['petName'] ?? '')  ?>" name="petName" type="petName" class="form-control">
                                <label for="floatingInput">Pet name</label>
                                <?php if ($errors['invalidPetName']) : ?>
                                    <h5 class="userwarn"><?= $errors['invalidPetName'] ?></h5>
                                <?php endif; ?>
                                <?php if ($errors['emptyPetName']) : ?>
                                    <h5 class="userwarn"><?= $errors['emptyPetName'] ?></h5>
                                <?php endif; ?>
                            </div>
                            <div class="form-floating">
                                <select class="form-select" aria-label="Default select example" name="breedName" id="breedName">
                                    <option value="" selected>Choose</option>
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
                                <label for="breed">Breed name</label>
                                <?php if ($errors['emptyBreedName']) : ?>
                                    <h5 class="userwarn"><?= $errors['emptyBreedName'] ?></h5>
                                <?php endif; ?>
                                <?php if ($errors['invalidBreedName']) : ?>
                                    <h5 class="userwarn"><?= $errors['invalidBreedName'] ?></h5>
                                <?php endif; ?>
                            </div>
                            <br>
                            <div class="form-floating">
                                <select class="form-select" aria-label="Default select example" name="animalType" id="animalType">
                                    <option value="" selected>Choose</option>
                                    <option value="Cat">Cat</option>
                                    <option value="Dog">Dog</option>
                                </select>
                                <label for="animalType">Animal type</label>
                                <?php if ($errors['emptyAnimalType']) : ?>
                                    <h5 class="userwarn"><?= $errors['emptyAnimalType'] ?></h5>
                                <?php endif; ?>
                                <?php if ($errors['invalidAnimalType']) : ?>
                                    <h5 class="userwarn"><?= $errors['invalidAnimalType'] ?></h5>
                                <?php endif; ?>
                            </div>
                            <br>
                            <div class="form-floating">
                                <select class="form-select" aria-label="Default select example" name="gender" id="gender">
                                    <option value="" selected>Choose</option>
                                    <option value="Female">Female</option>
                                    <option value="Male">Male</option>
                                </select>
                                <label for="gender">Gender</label>
                                <?php if ($errors['emptyGender']) : ?>
                                    <h5 class="userwarn"><?= $errors['emptyGender'] ?></h5>
                                <?php endif; ?>
                                <?php if ($errors['invalidGender']) : ?>
                                    <h5 class="userwarn"><?= $errors['invalidGender'] ?></h5>
                                <?php endif; ?>
                            </div>
                            <br>
                            <div class="form-floating">
                                <select class="form-select" aria-label="Default select example" name="age" id="age">
                                    <option value="" selected>Choose</option>
                                    <?php
                                    for ($i = 1; $i <= 22; $i++) {
                                        echo <<<AGE
                                <option value="$i">$i</option>
                                AGE;
                                    }
                                    ?>
                                </select>
                                <label for="age">Age</label>
                                <?php if ($errors['emptyAge']) : ?>
                                    <h5 class="userwarn"><?= $errors['emptyAge'] ?></h5>
                                <?php endif; ?>
                                <?php if ($errors['invalidAge']) : ?>
                                    <h5 class="userwarn"><?= $errors['invalidAge'] ?></h5>
                                <?php endif; ?>
                            </div>
                            <br>
                            <div class="form-floating">
                                <textarea class="form-control" name="story" id="story" rows="9"></textarea>
                                <label for="story">Story</label>
                                <?php if ($errors['emptyStory']) : ?>
                                    <h5 class="userwarn"><?= $errors['emptyStory'] ?></h5>
                                <?php endif; ?>
                                <?php if ($errors['invalidStory']) : ?>
                                    <h5 class="userwarn"><?= $errors['invalidStory'] ?></h5>
                                <?php endif; ?>
                            </div>
                            <br>
                            <div class="form-floating mb-3">
                                <input value="<?= htmlspecialchars($_POST['diet'] ?? '')  ?>" id="diet" name="diet" type="text" class="form-control">
                                <label for="diet">Diet</label>
                                <?php if ($errors['invalidStory']) : ?>
                                    <h5 class="userwarn"><?= $errors['invalidStory'] ?></h5>
                                <?php endif; ?>
                                <?php if ($errors['emptyStory']) : ?>
                                    <h5 class="userwarn"><?= $errors['emptyStory'] ?></h5>
                                <?php endif; ?>
                            </div>
                            <br>
                            <div class="form-floating mb-3">
                                <input value="<?= htmlspecialchars($_POST['zipcode'] ?? '')  ?>" id="zipcode" min='1000' max='10000' name="zipcode" type="number" class="form-control">
                                <label for="zipcode">Zipcode</label>
                                <?php if ($errors['invalidZipcode']) : ?>
                                    <h5 class="userwarn"><?= $errors['invalidZipcode'] ?></h5>
                                <?php endif; ?>
                                <?php if ($errors['emptyZipcode']) : ?>
                                    <h5 class="userwarn"><?= $errors['emptyZipcode'] ?></h5>
                                <?php endif; ?>
                            </div>
                            <br>
                            <div class="form-floating">
                                <input disabled value="<?= htmlspecialchars($_POST['petPhoto'] ?? '')  ?>" type="file" class="form-control">
                                <label for="floatingpetPhoto">Photo (Coming soon!)</label>
                                <br>
                                <button value="true" name="submit" class="btn btn-secondary btn-sm">Send</button>
                            </div>
                        </form>
                        <p class="mb-0">
                            <small><em>Issues?</em></small>
                            <br />
                            <a href="mailto:webmaster@C&D.be">webmaster@C&D.be</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include_once 'includes/footer.php'; ?>
    </body>

    </html>
<?php endif; ?>
<?php if (empty($email)) {
    header('Location: login.php');
}
