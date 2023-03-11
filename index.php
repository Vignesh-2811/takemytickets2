<?php 
include "config/connection.php";
include "includes/header.php";
include "functions/myfunctions.php";
?>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Select Event</h5>
                  </div>

                  <form class="row g-3 needs-validation" action = "functions/authcode.php" method = "POST">

                    <div class="col-12">
                      <label for="yourevent" class="form-label">Which event do you want to sell tickets for?</label>
                        <!-- <option selected>Select Event</option> -->
                        <select name="event_id" id="" class="form-select mb-2" required>
                        <?php
                            $events = getAll("venues");

                            if(mysqli_num_rows($events) > 0 ){
                                foreach ($events as $item) {
                                    ?>
                                    <option value = "<?= $item['venue'];?>, <?= $item['city']; ?>"><?= $item['venue']; ?>, <?= $item['city']; ?></option>
                                    <?php 
                                }
                            }
                            else{
                                echo "No event available";
                            }
                        ?>
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="tickets" class = "form-label">How many tickets do you want to sell?</label>
                        <select name="tickets" id="" class = "form-select mb-2" required>
                            <option value="1">1 ticket</option>
                            <option value="2">2 tickets</option>
                            <option value="3">3 tickets</option>
                            <option value="4">4 tickets</option>
                            <option value="5">5 tickets</option>
                    </select>
                    </div>

                    <div class="col-12">
                        <label for="category" class = "form-label">What's the ticket type?</label>
                        <select name="type" id="" class = "form-select mb-2" required>
                            <option value="bronze">Bronze</option>
                            <option value="gold">Gold</option>
                            <option value="elite">Elite</option>
                    </select>
                    </div>

                    </div>
                   
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="continue_btn">Continue</button>
                    </div>
                   
                  </form>
               

                </div>
              </div>
              <div class="col-12 mt-3 text-center">
                        <p>You can only sell tickets for one type at a time. If you have multiple types of tickets, you'll need to create a separate listing for each of them</p>
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