<?php
include('../shared/head.php');
include('../shared/header.php');
include('../shared/aside.php');
include('../general/connectiont.php');
include('../general/function.php');
role(0);
$su="SELECT * FROM  `admin` WHERE id= $_GET[update]";
$qsu=mysqli_query($con,$su);
$row=mysqli_fetch_assoc($qsu);
if(isset($_POST['submit'])){
    $id="$_GET[update]";
    $name=$_POST['name'];
$age=$_POST['age'];
$address=$_POST['address'];
$role=$_POST['type_role'];

$phone=$_POST['phone'];
$email=$_POST['email'];

$update="UPDATE  `admin` SET `name`='$name',`age`='$age',`address`='$address',phone='$phone',email='$email',`role`='$role' where id=$id";
$qi=mysqli_query($con,$update);
if($qi){
go("/admin/list.php");
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
            <h1 class="h1_add">update admin</h1>
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
                        <label for="exampleInputEmail1">PHONE</label>
                        <input type="tel" class="form-control" name="phone" value="<?php echo "$row[phone]"?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    
                    <div class="form-group ">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" value="<?php echo "$row[email]"?>" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">role</label>
                        <select name="type_role"   class="form-control"  id="">
                          <option value="<?php echo "$row[role]"?>">not change</option>  
                        <option value="0">all access</option>
                        <option value="1">without add articales</option>
                        <option value="2">without add admins</option>

                        </select>
                    </div>

              
                    <a href="/layer_company/admin/list.php" class="btn btn-info"> back</a>
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