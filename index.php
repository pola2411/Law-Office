<?php
include('./shared/head.php');
include('./shared/header.php');
include('./shared/aside.php');
include('./general/connectiont.php');
include('./general/function.php');
$s = "SELECT * FROM `articales` order by update_time desc";
$qs = mysqli_query($con, $s);


?>
<main id="main" class="main">
    <div class="container">
        <h1 class="h1_add">news</h1>
        <?php foreach ($qs as $data) { ?>
            <div class="card col-md-8" style=" margin:60px auto">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#">
                    <?php if ($data['id_pro'] == "layer") { ?>
                        <img src="/layer_company/lawyers/upload/<?= $data['image_profile'] ?>" alt="Profile" id="t" class="rounded-circle ">

                    <?php } else { ?>
                        <img src="/layer_company/admin/upload/<?= $data['image_profile'] ?>" alt="Profile" id="t" class="rounded-circle ">
                    <?php } ?>
                    <p class="card-text" style="margin-left:9px ;"><?= $data['auther'] ?></p>
                </a><!-- End Profile Iamge Icon -->

                <img src="/layer_company/articales/upload/<?= $data['image'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $data['title'] ?></h5>
                    <p class="card-text"><?= $data['description'] ?></p>
                    <p class="card-text"><?= $data['update_time'] ?></p>
                </div>

            </div>
        <?php } ?>
    </div>







</main><!-- End #main -->



<?php
include('./shared/footer.php');
include('./shared/script.php');
?>