<?php
include('../user_shared/head.php');
include('../user_shared/header.php');
include('../general/connectiont.php');
include('../general_user/user_function.php');
$id = $_GET['update'];
$s = "SELECT * from cases where id=$id";
$qs = mysqli_query($con, $s);
$row = mysqli_fetch_assoc($qs);
if(isset($_POST['submit'])){
    $u = "UPDATE `cases` SET `status` = 'accept' WHERE `cases`.`id` = $id";
    $qu = mysqli_query($con, $u);  
    go("/cases_user/view_messages.php");

}
if(isset($_POST['delete'])){
    $u = "UPDATE `cases` SET `status` = 'not accept' WHERE `cases`.`id` = $id";
    $qu = mysqli_query($con, $u);  
    go("/cases_user/view_messages.php");

}

?>

<main id="main" class="view">

    <section class="about">
        <div class="container">
            <div class="card col-md-8">
                <h1 class="head1">Messages</h1>
                
                    <div class="card-body">
                        <h2 class="title">Message from <?php echo "$row[from]" ?> </h2 class="title">
                        <h2 class="title">title: <?php echo "$row[title]" ?> </h2 class="title">
                        <h2 class="title">description: <?php echo "$row[description]" ?> </h2 class="title">
                        <h2 class="title">response: <?php echo "$row[response]" ?> </h2 class="title">
                        <h2 class="title">status: <?php echo "$row[status]" ?> </h2 class="title">


                        <form method="POST">
                    <button type="submit" name="submit" class="btn btn-primary">Accept</button>
                    <button type="submit" name="delete" class="btn btn-danger">Not Accept</button>
                    <a href="/layer_company/cases_user/view_messages.php" class="btn btn-info">Back</a>


                </form>

                        <div class="line"></div>


                    </div>
              

            </div>
        </div>
    </section>
</main>







<?php
include('../user_shared/footer.php');
include('../user_shared/script.php');

?>