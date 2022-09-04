<?php
include('../shared/head.php');
include('../shared/header.php');
include('../shared/aside.php');
include('../general/connectiont.php');
include('../general/function.php');


role(0);

    $s="SELECT id,email FROM `admin` WHERE id >6 ORDER BY id";
    $qs=mysqli_query($con,$s);
    
    if(isset($_GET['more'])){
    $id=$_GET['more'];
    
    }
    
?>

<main id="main" class="main">
<div class="container  col-md-12">
<div class="card col-md-8">
<h1 class="h1_add">list admin</h1>
    <div class="card-body">
    <table class="table" style="text-align: left;">
  <thead>
    <tr>
     
     
      <th >Account</th>
      <th  >More</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($qs as $data) {?>
    <tr>
   
      
       <td><?php echo "$data[email]";  ?></td>
      <td> <a href="/layer_company/admin/showmore.php?more=<?php echo "$data[id]" ?> " class="btn btn-info">more</a></td>
    </tr>
    <?php } ?>

  </tbody>
</table>

    </div>
</div>

</div>



</main>








<?php
include('../shared/footer.php');
include('../shared/script.php');


?>