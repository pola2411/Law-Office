<?php
include('../shared/head.php');
include('../shared/header.php');
include('../shared/aside.php');
include('../general/connectiont.php');
include('../general/function.php');

if($_SESSION['type']=="admin"){
if (isset($_POST['save'])) {
  $name = $_POST['name'];
  $age = $_POST['age'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $image_name = time() . $_FILES['image']['name'];
  $image_tmp = $_FILES['image']['tmp_name'];
  $image_size = $_FILES['image']['size'];
  $location = "./upload/";
  move_uploaded_file($image_tmp, $location . $image_name);
  if ($image_size == 0) {
    $image_name = $_SESSION['image'];
  }
  $update = "UPDATE  `admin` SET `name`='$name',`age`='$age',`address`='$address',phone='$phone',`image`='$image_name'  where id=$_SESSION[id]";
  $qi = mysqli_query($con, $update);

  go("/login.php");
  session_unset();
  session_destroy();
}
else{}
if (isset($_POST['change_pass'])) {
  $old_pass = $_POST['old_pass'];
  $new_pass = $_POST['new_pass'];
  $confirm_pass = $_POST['confirm_pass'];
  $id=$_SESSION['id'];
  if ($_SESSION['password'] == $old_pass) {
    if ($new_pass == $confirm_pass) {
      $up = "UPDATE `admin` SET `password`='$new_pass' WHERE id =$id";
      $q = mysqli_query($con, $up);
      if ($q) {
        go("/login.php");
        session_unset();
        session_destroy();
      } 
      else {
        echo "<script>
        alert('please enter all data correct')
        
        </script>";
      }
    }
    else{
      echo "<script>
      alert('please enter all data correct')
      
      </script>";
    }
  }
  else{
    echo "<script>
    alert('please enter all data correct')
    
    </script>";
  }
}else{}}
elseif($_SESSION['type']=="layer"){
  if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $image_name = time() . $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_size = $_FILES['image']['size'];
    $location = "./upload/";
    move_uploaded_file($image_tmp, $location . $image_name);
    if ($image_size == 0) {
      $image_name = $_SESSION['image'];
    }
    $update = "UPDATE  `lawyers` SET `name`='$name',`age`='$age',`address`='$address',phone='$phone' where id=$_SESSION[id]";
    $qi = mysqli_query($con, $update);
  
    go("/login.php");
    session_unset();
    session_destroy();
  }
  else{}
  if (isset($_POST['change_pass'])) {
    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
    $confirm_pass = $_POST['confirm_pass'];
    $id=$_SESSION['id'];
    if ($_SESSION['password'] == $old_pass) {
      if ($new_pass == $confirm_pass) {
        $up = "UPDATE `lawyers` SET `password`='$new_pass' WHERE id =$id";
        $q = mysqli_query($con, $up);
        if ($q) {
          go("/login.php");
          session_unset();
          session_destroy();
        } 
        else {
          echo "<script>
          alert('please enter all data correct')
          
          </script>";
        }
      }
      else{
        echo "<script>
        alert('please enter all data correct')
        
        </script>";
      }
    }
    else{
      echo "<script>
      alert('please enter all data correct')
      
      </script>";
    }
  }else{}

}

?>
<?php if($_SESSION['type']=="admin"){?> 
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="/layer_company/admin/upload/<?= $_SESSION['image'] ?>" alt="Profile" class="rounded-circle">
            <h2><?= $_SESSION['name'] ?></h2>


          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
              </li>


              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">

                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Full Name</div>
                  <div class="col-lg-9 col-md-8"><?= $_SESSION['name'] ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">AGE</div>
                  <div class="col-lg-9 col-md-8"><?= $_SESSION['age'] ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">ADDRESS</div>
                  <div class="col-lg-9 col-md-8"><?= $_SESSION['address'] ?></div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">PHONE</div>
                  <div class="col-lg-9 col-md-8"><?= $_SESSION['phone'] ?></div>
                </div>


                <div class="row">
                  <div class="col-lg-3 col-md-4 label">email</div>
                  <div class="col-lg-9 col-md-8"><?= $_SESSION['admin'] ?></div>
                </div>



              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form method="POST" enctype="multipart/form-data">
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                    <div class="col-md-8 col-lg-9">
                      <img src="/layer_company/admin/upload/<?= $_SESSION['image'] ?>" alt="Profile">
                      <div class="pt-2">
                        <h6 for="image" class="text-center">change photo</h6>

                        <input type="file" name="image" class="btn btn-primary btn-sm" title="Upload new profile image" value="change photo">
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="name" type="text" class="form-control" id="fullName" value="<?= $_SESSION['name'] ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="company" class="col-md-4 col-lg-3 col-form-label">AGE</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="age" type="text" class="form-control" id="company" value="<?= $_SESSION['age'] ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Job" class="col-md-4 col-lg-3 col-form-label">address</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="address" type="text" class="form-control" id="Job" value="<?= $_SESSION['address'] ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Country" class="col-md-4 col-lg-3 col-form-label">PHONE</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="phone" type="text" class="form-control" id="Country" value="<?= $_SESSION['phone'] ?>">
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" name="save" class="btn btn-primary">Save Changes</button>
                  </div>
                </form><!-- End Profile Edit Form -->

              </div>

              <div class="tab-pane fade pt-3" id="profile-settings">



              </div>

              <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->
                <form method="POST">

                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="old_pass" type="password" class="form-control" id="currentPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="new_pass" type="password" class="form-control" id="newPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="confirm_pass" type="password" class="form-control" id="renewPassword">
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" name="change_pass" class="btn btn-primary">Change Password</button>
                  </div>
                </form><!-- End Change Password Form -->

              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->
<?php }
elseif($_SESSION['type']=="layer"){
?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
          <img src="/layer_company/lawyers/upload/<?= $_SESSION['image'] ?>" alt="Profile" class="rounded-circle">

            <h2><?= $_SESSION['name'] ?></h2>


          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
              </li>


              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">

                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">name</div>
                  <div class="col-lg-9 col-md-8"><?= $_SESSION['name'] ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">AGE</div>
                  <div class="col-lg-9 col-md-8"><?= $_SESSION['age'] ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">ADDRESS</div>
                  <div class="col-lg-9 col-md-8"><?= $_SESSION['address'] ?></div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">PHONE</div>
                  <div class="col-lg-9 col-md-8"><?= $_SESSION['phone'] ?></div>
                </div>


                <div class="row">
                  <div class="col-lg-3 col-md-4 label">email</div>
                  <div class="col-lg-9 col-md-8"><?= $_SESSION['admin'] ?></div>
                </div>



              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form method="POST" enctype="multipart/form-data">
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                    <div class="col-md-8 col-lg-9">
                      <div class="pt-2">

                        <input type="file" name="image" class="btn btn-primary btn-sm" title="Upload new profile image" value="change photo">
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="name" type="text" class="form-control" id="fullName" value="<?= $_SESSION['name'] ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="company" class="col-md-4 col-lg-3 col-form-label">AGE</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="age" type="text" class="form-control" id="company" value="<?= $_SESSION['age'] ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Job" class="col-md-4 col-lg-3 col-form-label">address</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="address" type="text" class="form-control" id="Job" value="<?= $_SESSION['address'] ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Country" class="col-md-4 col-lg-3 col-form-label">PHONE</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="phone" type="text" class="form-control" id="Country" value="<?= $_SESSION['phone'] ?>">
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" name="save" class="btn btn-primary">Save Changes</button>
                  </div>
                </form><!-- End Profile Edit Form -->

              </div>

              <div class="tab-pane fade pt-3" id="profile-settings">



              </div>

              <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->
                <form method="POST">

                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="old_pass" type="password" class="form-control" id="currentPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="new_pass" type="password" class="form-control" id="newPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="confirm_pass" type="password" class="form-control" id="renewPassword">
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" name="change_pass" class="btn btn-primary">Change Password</button>
                  </div>
                </form><!-- End Change Password Form -->

              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->
<?php }?>



<?php
include('../shared/footer.php');
include('../shared/script.php');


?>