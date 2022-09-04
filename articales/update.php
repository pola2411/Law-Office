<?php
include('../shared/head.php');
include('../shared/header.php');
include('../shared/aside.php');
include('../general/connectiont.php');
include('../general/function.php');
role(0,2);
$d=$_SESSION['admin'];
    $id=$_GET['update'];
    $s = "SELECT * FROM `articales` where id=$id";
    $qs = mysqli_query($con, $s);
    $row=mysqli_fetch_assoc($qs);
   
    if(isset($_POST['submit'])){
        $title=$_POST['title'];
        $description=$_POST['description'];
        $image_name=time() . $_FILES['image']['name'];
        $tmp_name=$_FILES['image']['tmp_name'];
        $image_siz=$_FILES['image']['size'];
        $location="./upload/";
        move_uploaded_file($tmp_name,$location .$image_name);
        if ($image_siz == 0) {
            $image_name = $row['image'];
          }
        $i="UPDATE `articales` SET title='$title',`description`='$description', `image`='$image_name',update_time=DEFAULT WHERE id=$id";
        $qi=mysqli_query($con,$i);
        if($qi){
        go("/articales/list.php");
        }
        else{
            echo "<script>
        alert('please enter all data correct')
        
        </script>";
        }
        
        
} 
else{}
    ?>


    <main id="main" class="main">

    <div class="container">
        <div class="card col-md-8 ">
            <h1 class="h1_add">update articales</h1>
            <div class="body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group ">
                        <label for="exampleInputEmail1">title</label>
                        <input type="text" class="form-control" name="title" value="<?php echo "$row[title]" ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group ">
                        <label for="exampleInputEmail1">description</label>
                        <textarea id="exampleInputEmail1" class="form-control"   name="description" rows="4" cols="50"><?php echo "$row[description]" ?></textarea>
                    </div>
                    <div class="form-group ">
                        <label for="exampleInputEmail1">image</label>
                        <input type="file" class="form-control" name="image" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

        

</main>







    <?php
include('../shared/footer.php');
include('../shared/script.php');


?>





