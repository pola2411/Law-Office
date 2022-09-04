<?php
include('./user_shared/head.php');
include('./user_shared/header.php');
include('./general/connectiont.php');
include('./general_user/user_function.php');
$done = "";
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $message = $_POST['message'];
    $userid = $_SESSION['id'];
    $i = "INSERT INTO `cases` VALUES(NULL,'$title','$message',$userid,default,default,default)";
    $qi = mysqli_query($con, $i);
    if ($qi) {
        $done = "Your message has been sent. Thank you!";
    } else {
    }
}

?>





<main id="main">
    <section class="contact">

        <div class="row mt-5 justify-content-center" data-aos="fade-up">
            <div class="col-lg-10">
                <form method="POST">
                    <div class="php-email-form">
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="title" id="subject" placeholder="Title" required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                        </div>


                        <div class="text-center"><button type="submit" name="submit">Send Message</button></div>
                    </div>
                </form>
            </div>

        </div>
    </section>

</main>












<?php
include('./user_shared/footer.php');
include('./user_shared/script.php');

?>