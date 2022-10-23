<?php include_once 'includes/header.php'; ?>
<div class="p-3 mb-2 bg-dark text-white">
    <p class="lead text-white text-center">
        <a href="add.php">Add post</a>
    </p>
</div>
<section class="">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="card my-3">
                    <div class="card-thumbnail">
                        <img src="./assets/img/generic_cat.jpg" width="200" class="img-fluid" alt="thumbnail">
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <div class="list-group" id="list-tab" role="tablist">
                                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-bs-toggle="list" href="#list-home" role="tab" aria-controls="list-home">Home</a>
                                    <a class="list-group-item list-group-item-action" id="list-profile-list" data-bs-toggle="list" href="#list-profile" role="tab" aria-controls="list-profile">Profile</a>
                                    <a class="list-group-item list-group-item-action" id="list-messages-list" data-bs-toggle="list" href="#list-messages" role="tab" aria-controls="list-messages">Messages</a>
                                    <a class="list-group-item list-group-item-action" id="list-settings-list" data-bs-toggle="list" href="#list-settings" role="tab" aria-controls="list-settings">Settings</a>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="bg-light tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">...</div>
                                    <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">A</div>
                                    <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">B</div>
                                    <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">C</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>