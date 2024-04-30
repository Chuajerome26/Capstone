<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

<title>bs4 Footer - Bootdey.com</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    /* Footer */
@import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');


#footer {
    background: rgba(49, 54, 63, 0.3) !important;
    margin-left: 0 !important;
    margin-right: 0 !important;
    padding-left: 0 !important;
    padding-right: 0 !important;
    padding-top: 0px;
    
}

    </style>
</head>
<body>

<section id="footer">
<div class="container-fluid">
<div class="row text-center text-xs-center text-sm-left text-md-left">
<div class="col-xs-12 col-sm-4 col-md-4 mx-auto">

<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
<ul class="list-unstyled list-inline social text-center">

</ul>
</div>
</hr>
</div>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
<p class="style=font-size: 10px;">&copy; 2024 Scholarship Management System. All Rights Reserved.</p>
</div>
</hr>
</div>
</div>
</section>

<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  $(document).ready(function(){
    $('#createNewLink').click(function(){
      $('#registrationModal').modal('show');
    });

    $('#registrationForm').submit(function(event) {
      event.preventDefault();

      var firstName = $('#firstName').val();
      var middleName = $('#middleName').val();
      var lastName = $('#lastName').val();

      if (!isValidName(firstName)) {
        $('#firstName').addClass('invalid-input').removeClass('valid-input');
        alert("First name cannot contain numbers.");
        return;
      } else {
        $('#firstName').addClass('valid-input').removeClass('invalid-input');
      }

      if (!isValidName(middleName)) {
        $('#middleName').addClass('invalid-input').removeClass('valid-input');
        alert("Middle name cannot contain numbers.");
        return;
      } else {
        $('#middleName').addClass('valid-input').removeClass('invalid-input');
      }

      if (!isValidName(lastName)) {
        $('#lastName').addClass('invalid-input').removeClass('valid-input');
        alert("Last name cannot contain numbers.");
        return;
      } else {
        $('#lastName').addClass('valid-input').removeClass('invalid-input');
      }

      // If all validations pass, you can submit the form
      // Example: $('#registrationForm').submit();
    });

    function isValidName(name) {
      return /^[^0-9]+$/.test(name);
    }
  });
</script>

</body>
</html>
