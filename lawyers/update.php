<?php
include('../shared/head.php');
include('../shared/header.php');
include('../shared/aside.php');
include('../general/connectiont.php');
include('../general/function.php');

$su="SELECT * FROM  `lawyers` WHERE id= $_GET[update]";
$qsu=mysqli_query($con,$su);
$row=mysqli_fetch_assoc($qsu);
if(isset($_POST['submit'])){
    $id="$_GET[update]";
    $name=$_POST['name'];
$age=$_POST['age'];
$address=$_POST['address'];
$salary=$_POST['salary'];
$yearsEX=$_POST['yearsEX'];
$phone=$_POST['phone'];
$email=$_POST['email'];

$update="UPDATE  `lawyers` SET `name`='$name',`age`='$age',`address`='$address',salary='$salary',yearsEX='$yearsEX',phone='$phone',email='$email' where id=$id";
$qi=mysqli_query($con,$update);
if($qi){
go("/lawyers/list.php");
}
else{
    echo "<script>
alert('not update')

</script>";
}






}else{


}



?>
<main id="main" class="main">

    <div class="container">
        <div class="card col-md-8 ">
            <h1 class="h1_add">update lawyer</h1>
            <div class="body">
                <form method="POST">
                    <div class="form-group ">
                        <label for="exampleInputEmail1">NAME</label>
                        <input type="text" class="form-control" value="<?php echo "$row[name]"?>" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group ">
                        <label >AGE</label>
                        <input type="number" name="age" class="form-control" value="<?php echo $row["age"] ?>" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group ">
                        <label for="exampleInputEmail1">ADDRESS</label>
                        <input type="text" class="form-control" value="<?php echo "$row[address]"?>" name="address" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group ">
                        <label for="exampleInputEmail1">SALARY</label>
                        <input type="number" class="form-control" value="<?php echo $row["salary"] ?>"name="salary" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group ">
                        <label for="exampleInputEmail1">YEARS EX</label>
                        <input type="number" class="form-control" value="<?php echo $row["yearsEX"] ?>" name="yearsEX" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    
                    <div class="form-group ">
                        <label for="exampleInputEmail1">PHONE</label>
                        <input type="tel" class="form-control" name="phone" value="<?php echo "$row[phone]"?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    
                    <div class="form-group ">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" value="<?php echo "$row[email]"?>" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>

              
                    <a href="/layer_company/lawyers/list.php" class="btn btn-info"> back</a>
                    <button type="submit"" name="submit" class="btn btn-primary">update</button>
                    
                </form>
            </div>
        </div>
    </div>

        

</main>

<?php
include('../shared/footer.php');
include('../shared/script.php');


?>