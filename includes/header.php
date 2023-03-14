<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Take my Tickets</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <!-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Alertify JS -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />

  <!-- Bootstrap theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

  <!-- FA Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-5h5H8W5t5cGjK9Qqlh7JTF8xC+GzLZ0xx+2yaybVUjxE6h65JvI+9fZap7TGZmH6UJmV83x/hD3y4+bJ/VF6pA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- jquery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="assets/js/verify.js"></script>

  <style>
    .form-control {
      border: 1px solid #B3A1A1 !important;
      padding: 8px 10px;
    }

    .form-select {
      border: 1px solid #B3A1A1 !important;
      padding: 8px 10px;

    }
  </style>

  <script>
    function copyToClipboard() {
      var copyText = document.getElementById("myText");
      copyText.select();
      document.execCommand("copy");
      $('#forwarded-btn').prop('disabled', false);
      alertify.set('notifier', 'position', 'bottom-center');
      alertify.success('Mail ID Copied!');

    }

    // Send verification request and display message
    $(document).ready(function() {
      $('#forwarded-btn').click(function() {
        $('#verification-message').text('Please keep this page open and allow 1-2 mins to TakeMyTickets to verify your tickets');
        $.ajax({
          url: 'verify.php',
          dataType: 'json',
          success: function(response) {
            if (response.status === 'success') {
              $('#verification-message').text('Successfully Verified');
              $.get('booking.php', function() {});
            } else {
              $('#verification-message').text('Verification failed: ' + response.message);
            }
          },
          error: function() {
            $('#verification-message').text('Verification failed.');
          },
          complete: function() {
            $('#loader').hide();
          }
        });
      });
    });
  </script>
</head>

<body>