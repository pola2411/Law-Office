<?php
include('../shared/head.php');
include('../shared/header.php');
include('../shared/aside.php');
include('../general/connectiont.php');
include('../general/function.php');


role(0, 1);
$s = "SELECT cases.status,users.email,cases.title,cases.description,cases.id,cases.response,users.name FROM `cases` JOIN users ON cases.userid=users.id ORDER BY `cases`.`response` ='no message' DESC";
$qs = mysqli_query($con, $s);





?>


<main id="main" class="main">


    <div class="container">
        <div class="card col-md-8">
            <h1 class="head1">Messages</h1>
            <?php foreach ($qs as $data) { ?>
                <div class="card-body">
                    <h2 class="title">Message from <?php echo "$data[name]" ?> </h2 class="title">
                 
                    <a href="/layer_company/cases/reply.php?update=<?php echo "$data[id]" ?> " class="btn_message btn btn-warning">View </a>

                    <div class="div_line"></div>


                </div>
            <?php } ?>

        </div>
    </div>
</main>











<?php
include('../shared/footer.php');
include('../shared/script.php');


?>