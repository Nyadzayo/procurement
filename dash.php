<?php
require_once(__DIR__ . '/core/init.php');
$user = new User();
?>
<div class="card card-profile">
    <div class="card-header" style="background-image: url(demo/photos/wheat.jpg);"></div>
    <div class="card-body text-center">
        <img class="card-profile-img" src="demo/faces/male/logo.jpg">
        <h3 class="mb-3"><?php echo escape($user->data()->name);?></h3>
        <p class="mb-4">
            basic info
        </p>
        <button class="btn btn-outline-success btn-">
            <span class="fe fe-user"></span> view
        </button>
    </div>
</div>