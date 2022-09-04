<?php
include('../shared/head.php');
include('../shared/header.php');
include('../shared/aside.php');
include('../general/connectiont.php');
include('../general/function.php');
role(0);
$s = "SELECT * FROM `admin` WHERE id = $_GET[more] ";

$qs = mysqli_query($con, $s);
$row = mysqli_fetch_assoc($qs);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM `admin` WHERE id=$id";
    $dq = mysqli_query($con, $delete);
    if ($dq) {
        go("/admin/list.php");
    } else {
    }
} else {
}

?>
<main id="main" class="main">


    <div class="container">
        <div class="card col-md-8">
            <h1>information about <span style="color: rgb(142, 89, 194)  ;"> <?php echo " $row[name]" ?></span></h1>
            <div class="card-body">
                <hr>
                <h3><?php echo " id:   $row[id]" ?></h3>
                <hr>
                <h3><?php echo "name:  $row[name]" ?></h3>
                <hr>
                <h3><?php echo "age:  $row[age]" ?></h3>
                <hr>
                <h3><?php echo "address:  $row[address]" ?></h3>


                <hr>

                <h3><?php echo "phone:  $row[phone]" ?></h3>
                <hr>
                <h3><?php echo "email:  $row[email]" ?></h3>
                <h3><?php echo "role:  $row[role]" ?></h3>

                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="/layer_company/admin/list.php" class="btn btn-info">back</a>
                    <a href="/layer_company/admin/showmore.php?delete=<?php echo "$row[id]" ?> " class="btn btn-danger">Delete </a>
                    <a href="/layer_company/admin/update.php?update=<?php echo "$row[id]" ?> " class="btn btn-warning">update </a>
                </div>




            </div>

        </div>
    </div>
</main>



<?php
include('../shared/footer.php');
include('../shared/script.php');


?>