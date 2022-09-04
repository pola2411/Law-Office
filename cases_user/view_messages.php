<?php
include('../user_shared/head.php');
include('../user_shared/header.php');
include('../general/connectiont.php');
include('../general_user/user_function.php');
$id = $_SESSION['id'];
$s = "SELECT * from cases where userid=$id ORDER BY `status`='wait' DESC ";
$qs = mysqli_query($con, $s);


?>




<main id="main" class="view">

    <section class="about">
        <div class="container">
            <div class="card col-md-8">
                <h1 class="head1">Messages</h1>
                <?php foreach ($qs as $data) { ?>
                    <div class="card-body">
                        <h2 class="title">Message from <?php echo "$data[from]" ?> </h2 class="title">
                        <a href="/layer_company/cases_user/reply.php?update=<?php echo "$data[id]" ?> " class="btn_message btn btn-warning">View </a>


                        <div class="line"></div>


                    </div>
                <?php } ?>

            </div>
        </div>
    </section>
</main>






<?php
include('../user_shared/footer.php');
include('../user_shared/script.php');

?>