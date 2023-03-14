<?php
include "config/connection.php";
include "includes/header.php";
session_start();
?>

<main>
  <div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <a href="#" class="logo d-flex align-items-center w-auto" style="text-decoration: none">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">Take My Tickets</span>
              </a>
            </div>
            <!-- End Logo -->

            <div class="card mb-3">

              <div class="card-body">

                <div class="pt-4 pb-2">
                  <?php
                  if (isset($_SESSION['message'])) {
                  ?>

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <strong>Hey!</strong> <?= $_SESSION['message']; ?>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  <?php
                    unset($_SESSION['message']);
                  }
                  ?>

                  <h5 class="card-title text-center pb-0 fs-4">Register Your Account</h5>
                </div>

                <form class="row g-3 needs-validation" action="functions/authcode.php" method="POST">

                  <div class="col-12">
                    <label for="youremail" class="form-label">Email</label>
                    <div class="input-group has-validation">
                      <input type="text" name="email" class="form-control" id="youremail" required>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                  </div>

                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Confirm Password</label>
                    <input type="password" name="cpassword" class="form-control" id="yourcPassword" required>
                  </div>

                  <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit" name="register_btn">Register</button>
                  </div>
                  <div class="col-12 mt-3 text-center">
                    <p>Already have an account? <a href="login.php">Sign In </a></p>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</main><!-- End #main -->

<?php
include "includes/footer.php";
?>