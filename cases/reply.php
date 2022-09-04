<?php
include('../shared/head.php');
include('../shared/header.php');
include('../shared/aside.php');
include('../general/connectiont.php');
include('../general/function.php');
role(0, 1);
$id = $_GET['update'];
$s = "SELECT users.email,cases.title,cases.description,cases.id,cases.response,users.name,cases.status FROM `cases` JOIN users ON cases.userid=users.id where cases.id=$id ORDER BY `cases`.`response` ='no message' DESC";
$qs = mysqli_query($con, $s);
$row = mysqli_fetch_assoc($qs);
if (isset($_POST['submit'])) {
    $message = $_POST['message'];
    $name=$_SESSION['name'] ;
    $u = "UPDATE `cases` SET `response` = '$message',`from`='$name' WHERE `cases`.`id` = $id";
    $qu = mysqli_query($con, $u);
    go("/cases/view.php");
}
if (isset($_POST['delete'])) {
    $d = "DELETE FROM cases where id=$id";
    $dq = mysqli_query($con, $d);
    go("/cases/view.php");
}

?>


<main id="main" class="main">

    <div class="container">
        <div class="card col-md-8">
            <h1 class="head1">Messages</h1>

            <div class="card-body">
                <h2 class="title">Message from <?php echo "$row[name]" ?> </h2 class="title">
                <h3><?php echo " email:   $row[email]" ?></h3>
                <hr>
                <h3><?php echo "title:  $row[title]" ?></h3>
                <hr>
                <h3><?php echo "description:  $row[description]" ?></h3>
                <hr>
                <h3><?php echo "response:  $row[response]" ?></h3>
                <hr>
                <h3><?php echo "status:  $row[status]" ?></h3>
                <hr>
                <form method="POST">
                    <textarea id="exampleInputEmail1" class="form-control" name="message" rows="4" cols="50" placeholder="message"></textarea>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    <button type="submit" name="delete" class="btn btn-danger">delete</button>
                    <a href="/layer_company/cases/view.php" class="btn btn-info">Back</a>


                </form>
                <div class="div_line"></div>


            </div>


        </div>
    </div>

</main>





<?php
include('../shared/footer.php');
include('../shared/script.php');


?>