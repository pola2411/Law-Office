<?php
include('../shared/head.php');
include('../shared/header.php');
include('../shared/aside.php');
include('../general/connectiont.php');
include('../general/function.php');

role(0,2);
$idprofile="";
if(isset($_POST['submit'])){
$title=$_POST['title'];
$description=$_POST['description'];
$image_name=time() . $_FILES['image']['name'];
$tmp_name=$_FILES['image']['tmp_name'];
$image_siz=$_FILES['image']['size'];
$idprofile=$_SESSION['id_profile'];
$auth=$_SESSION['admin'];
$location="./upload/";
$image_profile=$_SESSION['image'];
move_uploaded_file($tmp_name,$location .$image_name);
$i="INSERT INTO `articales` values(NULL,'$title','$description','$auth','$image_name',DEFAULT,DEFAULT,'$image_profile','$idprofile')";
$qi=mysqli_query($con,$i);
if($qi){
go("/articales/list.php");
}
else{
    echo "<script>
alert('please enter all data correct')

</script>";
}






}else{


}



?>
<main id="main" class="main">

    <div class="container">
        <div class="card col-md-8 ">
            <h1 class="h1_add">add articales</h1>
            <div class="body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group ">
                        <label for="exampleInputEmail1">title</label>
                        <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group ">
                        <label for="exampleInputEmail1">description</label>
                        <textarea id="exampleInputEmail1" class="form-control" name="description" rows="4" cols="50"></textarea>
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