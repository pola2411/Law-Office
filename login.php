<?php
include('./shared/head.php');
include('./general/connectiont.php');

$error = "";


if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $s = "SELECT * FROM `admin` where email='$email' AND `password`='$password'";
  $qs = mysqli_query($con, $s);
  $r = mysqli_fetch_assoc($qs);

  $num_row = mysqli_num_rows($qs);
  if ($num_row > 0) {

    $_SESSION['admin'] = $email;
    $_SESSION['id'] = $r['id'];
    $_SESSION['name'] = $r['name'];
    $_SESSION['image'] = $r['image'];
    $_SESSION['age'] = $r['age'];
    $_SESSION['phone'] = $r['phone'];
    $_SESSION['address'] = $r['address'];
    $_SESSION['password'] = $r['password'];
    $_SESSION['role'] = $r['role'];
    $_SESSION['type']="admin";


    echo "<script>
window.location.replace('/layer_company/')


</script>";
  } else {
 

    $s = "SELECT * FROM `lawyers` where email='$email' AND `password`='$password'";
    $qs = mysqli_query($con, $s);
    $r = mysqli_fetch_assoc($qs);

    $num_row = mysqli_num_rows($qs);
    if ($num_row > 0) {

      $_SESSION['admin'] = $email;
      $_SESSION['id'] = $r['id'];
      $_SESSION['name'] = $r['name'];
      $_SESSION['image'] = $r['image'];
      $_SESSION['age'] = $r['age'];
      $_SESSION['phone'] = $r['phone'];
      $_SESSION['address'] = $r['address'];
      $_SESSION['password'] = $r['password'];
      $_SESSION['role'] = 2;
      $_SESSION['type']="layer";
      $_SESSION['id_profile']=$r['id_profile'];;

      echo "<script>
      window.location.replace('/layer_company/')
      
      
      </script>";
    }
  }
}



?>

<main>
  <div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <a href="/layer_company" class="logo d-flex align-items-center w-auto">
                <img src="/layer_company/assets/img/logo.png" alt="">
                <h5 class="card-title text-center pb-0 fs-4">Law Office</h5>

              </a>
            </div><!-- End Logo -->

            <div class="card mb-3">

              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                  <p class="text-center small">Enter your username & password to login</p>
                </div>

                <form class="row g-3 needs-validation" method="POST" novalidate>

                  <div class="col-12">
                    <label for="yourUsername" class="form-label">email</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                      <input type="email" name="email" class="form-control" id="yourUsername" required>

                      <div class="invalid-feedback">Please enter your email.</div>
                    </div>
                    <div class="text-danger"><?php echo "$error" ?></div>
                  </div>

                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <div class="input-group has-validation">
                      <input type="password" name="password" class="form-control" id="yourPassword" required>

                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
                    <div class="text-danger"><?php echo "$error"  ?></div>
                  </div>

                  <div class="col-12">

                  </div>
                  <div class="col-12">
                    <button class="btn btn-primary w-100" name="submit" type="submit">Login</button>
                  </div>


                </form>

              </div>
            </div>

            <div class="credits">

              Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>

          </div>
        </div>
      </div>

    </section>

  </div>
</main><!-- End #main -->
<?php
include('./shared/script.php');
?>