<?php
include('../shared/head.php');
include('../shared/header.php');
include('../shared/aside.php');
include('../general/connectiont.php');
include('../general/function.php');

role(0);

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $type_role=$_POST['type_role'];

        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];
        $image_name = time() . $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $location = "./upload/";
        if ($password == $confirm) {
            move_uploaded_file($image_tmp, $location . $image_name);
            $i = "INSERT INTO `admin` VALUES(NULL,'$name',$age,'$address','$phone','$email','$password','$image_name', $type_role)";
            $qi = mysqli_query($con, $i);
            if ($qi) {
                go("/admin/list.php");
            } else {
                echo "<script>
            alert('please enter all data correct')

            </script>";
            }
        } else {
            echo "<script>
alert('please check password')

</script>";
        }
    } else {
    }

    


?>
<main id="main" class="main">

    <div class="container">
        <div class="card col-md-8 ">
            <h1 class="h1_add">add admin</h1>
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
                        <label for="exampleInputEmail1">PHONE</label>
                        <input type="tel" class="form-control" name="phone" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>

                    <div class="form-group ">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">confirm password</label>
                        <input type="password" class="form-control" name="confirm" id="exampleInputPassword1 " required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">image</label>
                        <input type="file" class="form-control" name="image" id="exampleInputPassword1" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">role</label>
                        <select name="type_role"  class="form-control"  id="">
                        <option value="0">all access</option>
                        <option value="1">without add articales</option>
                        <option value="2">without add admins</option>

                        </select>
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