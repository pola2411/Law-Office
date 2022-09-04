<?php
include('../shared/head.php');
include('../shared/header.php');
include('../shared/aside.php');
include('../general/connectiont.php');
include('../general/function.php');
$d=$_SESSION['admin'];
if ($_SESSION['role'] ==0) {
    $s = "SELECT * FROM `articales` order by update_time desc";
    $qs = mysqli_query($con, $s);
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $delete = "DELETE FROM `articales` where id=$id";
        $qd = mysqli_query($con, $delete);

        go("/articales/list.php");
    } else {
    }
} 
elseif($_SESSION['role'] != 0) {
    
    $s = "SELECT * FROM `articales` WHERE auther='$d'  order by update_time desc ";
    $qs = mysqli_query($con, $s);
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $delete = "DELETE FROM `articales` where id=$id";
        $qd = mysqli_query($con, $delete);

        go("/articales/list.php");
    } else {
    }
   
}
else{
    go("/");
}
?>

          <img src="/layer_company/admin/upload/<?=$data['image_profile']?>" alt="Profile" class="header rounded-circle ">


<main id="main" class="main">
    <div class="container  ">
        <h1 class="h1_add">news</h1>
        <?php foreach($qs as $data) { ?>
            <div class="card col-md-8" style="margin:60px auto">
            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" >
               <?php if($data['id_pro']=="layer"){?> 
                <img src="/layer_company/lawyers/upload/<?=$data['image_profile']?>" alt="Profile" id="t" class="rounded-circle ">

                <?php } else{ ?>
                 <img src="/layer_company/admin/upload/<?=$data['image_profile']?>" alt="Profile" id="t" class="rounded-circle ">
                    <?php }?>

       
          <span class="d-none d-md-block" style="margin-left:9px ;"><?= $data['auther']?></span>
        </a><!-- End Profile Iamge Icon -->
                <img src="/layer_company/articales/upload/<?= $data['image'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $data['title'] ?></h5>
                    <p class="card-text"><?= $data['description'] ?></p>
                    <a href="/layer_company/articales/update.php?update=<?php echo "$data[id]" ?>" class="btn btn-warning">edit</a>
                    <a href="/layer_company/articales/list.php?delete=<?php echo "$data[id]" ?>" class="btn btn-danger">delete</a>
                    <p class="card-text"><?= $data['update_time'] ?></p>    
                </div>

            </div>
        <?php } ?>
    </div>






</main>











<?php
include('../shared/footer.php');
include('../shared/script.php');


?>