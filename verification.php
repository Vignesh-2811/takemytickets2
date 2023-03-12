<?php 
include "config/connection.php";
include "includes/header.php";
include "functions/myfunctions.php";
?>
<style>
  
.input-group-append {
  position: absolute;
  right: 0;
  top: 0;
}
</style>


  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Verify Tickets</h5>
                    <p style = "opacity: 0.7">TakeMyTickets need to verify your ticket purchase. Make sure you forward the tickets from the mail ID you used to sign-up</p>
                  </div>


                    <div class="col-12">
                      <label for="yourevent" class="form-label"><i class="fa-thin fa-circle-1"></i>1. Copy our email address</label>
                      <div class="input-group">
                        <input type="text" id="myText" class="form-control" value="init8055@gmail.com" readonly>
                        <div class="input-group-append">
                          <button class="btn btn-outline-secondary" type="button" onclick="copyToClipboard()">
                            <i class="fa fa-copy"></i>
                          </button>
                          </div>
                      </div>
                      
                    </div>

                    <div class="col-12">
                        <label for="ticketconfirm" class = "form-label mt-3">2. Forward your ticket confirmation email</label>
                        <button class = "btn btn-outline-dark" id="forwarded-btn"  type = "button" disabled>I've forwarded my tickets</button>

                    </div>

                    <div class="col-12">
                       <label for="verification-message" class = "form-label mt-3">3. Verification</label>
                       <div id="verification-message" class = "form-label mt-3"></div>
                    </div>

                    </div>
                   
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="continue_btn" disabled>Continue</button>
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