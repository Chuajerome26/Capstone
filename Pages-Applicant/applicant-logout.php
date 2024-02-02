<?php
  session_start();
  session_unset();
  session_destroy();

  //Go back to login
  header("Location: ../index.php");