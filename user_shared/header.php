<?php
if(isset($_GET['sign_out'])){
  session_unset();
  session_destroy();
  
  }

?>

<header id="header" class="fixed-top d-flex align-items-center">
  <div class="container d-flex justify-content-between">

    <div class="logo">
      <h1><a href="/layer_company/home.php/">Law Officee</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
    </div>

    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link scrollto " href="/layer_company/home.php/">Home</a></li>
        
            <li><a class="nav-link scrollto" href="/layer_company/cases.php/">Send Message</a></li>
            <li><a class="nav-link scrollto" href="/layer_company/cases_user/view_messages.php/">view Messages</a></li>
   
            
            <li><a class="nav-link scrollto" href="/layer_company/home.php/#contact">Contact</a></li>

            <li>
               <form action="">
              <button name="sign_out"> <span>Sign Out</span><i class="bi bi-box-arrow-right"></i> </button>

             </form> 
            </li>
                
      
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

  </div>
</header><!-- End Header -->