<?php
include('./user_shared/head.php');
include('./user_shared/header.php');
include('./general/connectiont.php');
include('./general_user/user_function.php');
$s = "SELECT * FROM `articales` order by update_time desc";
$qs = mysqli_query($con, $s);


?>

<section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="container text-center text-md-left" data-aos="fade-up">
        <h1>Welcome to Law Office</h1>

        <a href="#news" class="btn-get-started scrollto">Get Started</a>
    </div>
</section><!-- End Hero -->

<main id="main">

<section id="news">
    <h1 class="h">News</h1>
  
    <div class="container  col-md-12">
        
        <?php foreach($qs as $data) { ?>
            <div class="card col-md-8" style=" margin:60px auto">
            
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" >
        <?php if($data['id_pro']=="layer"){?> 
                <img src="/layer_company/lawyers/upload/<?=$data['image_profile']?>" alt="Profile" class="img_profile rounded-circle ">

                <?php } else{ ?>
                 <img src="/layer_company/admin/upload/<?=$data['image_profile']?>" alt="Profile" class="img_profile rounded-circle ">
                    <?php }?>
        <p class="card-text" style="margin-left:9px ; "><?= $data['auther']?></p>
        </a><!-- End Profile Iamge Icon -->
           
            <img src="/layer_company/articales/upload/<?= $data['image'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $data['title'] ?></h5>
                    <p class="card-text"><?= $data['description'] ?></p>
                    <p class="card-text"><?= $data['update_time'] ?></p>    

                    

                </div>

            </div>
        <?php } ?>
    </div>





    




</section>

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Contact</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row no-gutters justify-content-center" data-aos="fade-up">

                <div class="col-lg-5 d-flex align-items-stretch">
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Location:</h4>
                            <p>A108 Adam Street, New York, NY 535022</p>
                        </div>

                        <div class="email mt-4">
                            <i class="bi bi-envelope"></i>
                            <h4>Email:</h4>
                            <p>info@example.com</p>
                        </div>

                        <div class="phone mt-4">
                            <i class="bi bi-phone"></i>
                            <h4>Call:</h4>
                            <p>+1 5589 55488 55s</p>
                        </div>

                    </div>

                </div>

                <div class="col-lg-5 d-flex align-items-stretch">
                    <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
                </div>

            </div>

          

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

<?php
include('./user_shared/footer.php');
include('./user_shared/script.php');

?>