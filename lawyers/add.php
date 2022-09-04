<?php
include('../shared/head.php');
include('../shared/header.php');
include('../shared/aside.php');
include('../general/connectiont.php');
include('../general/function.php');


role(0,1);
if(isset($_POST['submit'])){
$name=$_POST['name'];
$age=$_POST['age'];
$address=$_POST['address'];
$salary=$_POST['salary'];
$yearsEX=$_POST['yearsEX'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$password=$_POST['password'];
$image_name = time() . $_FILES['image']['name'];
$image_tmp = $_FILES['image']['tmp_name'];
$location = "./upload/";
move_uploaded_file($image_tmp, $location . $image_name);
$i="INSERT INTO `lawyers` VALUES(NULL,'$name',$age,'$address',$salary,$yearsEX,'$phone','$email','$password','$image_name',default)";
$qi=mysqli_query($con,$i);
if($qi){
go("/lawyers/list.php");
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
            <h1 class="h1_add">add lawyer</h1>
            <div class="body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group ">
                        <label for="exampleInputEmail1">NAME</label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group ">
                        <label for="exampleInputEmail1">AGE</label>
                        <input type="number" class="form-control" name="age" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group ">
                        <label for="exampleInputEmail1">ADDRESS</label>
                        <input type="text" class="form-control" name="address" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group ">
                        <label for="exampleInputEmail1">SALARY</label>
                        <input type="number" class="form-control" name="salary" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group ">
                        <label for="exampleInputEmail1">YEARS EX</label>
                        <input type="number" class="form-control" name="yearsEX" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    
                    <div class="form-group ">
                        <label for="exampleInputEmail1">PHONE</label>
                        <input type="tel" class="form-control" name="phone" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    
                    <div class="form-group ">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">image</label>
                        <input type="file" class="form-control" name="image" id="exampleInputPassword1" required>
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