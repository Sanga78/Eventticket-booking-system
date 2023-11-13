<?php
  @session_start();
  if (!isset($_SESSION['organizer_id'])) {
    echo "<script>alert('You are not logged in!'); window.location='../';</script>";
    exit;
  }

  $organizer_id = $_SESSION['organizer_id'];
  $email = $_SESSION['email'];
  if (!isset($conn)) require '../conn.php';
  $exist = $conn->query("SELECT * FROM organizer WHERE id = '$organizer_id'")->num_rows;
  if ($exist != 1) {
    echo "<script>alert('You are not logged in!'); window.location='../';</script>";
    exit;
  }
  ?>