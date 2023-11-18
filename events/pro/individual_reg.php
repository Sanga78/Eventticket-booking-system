<?php
session_start();
require_once '../conn.php';
require_once '../constants.php';
$class = "reg";
?>
<?php
$cur_page = 'signup';
include 'includes/inc-header.php';
include 'includes/inc-nav.php';
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $file = 'file';
    $address = $_POST['address'];
    $cpassword = $_POST['cpassword'];
    $password = $_POST['password'];
    if (!isset($name, $address, $phone, $email, $password, $cpassword) || ($password != $cpassword)) { ?>
<script>
alert("Ensure you fill the form properly.");
</script>
<?php
    } else {
        //Check if email exists
        $check_email = $conn->prepare("SELECT * FROM passenger WHERE email = ? OR phone = ?");
        $check_email->bind_param("ss", $email, $phone);
        $check_email->execute();
        $res = $check_email->store_result();
        $res = $check_email->num_rows();
        if ($res) {
        ?>
<script>
alert("Email already exists!");
</script>
<?php

        } elseif ($cpassword != $password) { ?>
<script>
alert("Password does not match.");
</script>
<?php
        } else {
            //Insert
            $password = md5($password);
            $can = 1;
            $loc = uploadFile('file');
            if ($loc == -1) {
                echo "<script>alert('We could not complete your registration, try again later!')</script>";
                exit;
            }
            $stmt = $conn->prepare("INSERT INTO passenger (name, email, password, phone, address, loc) VALUES (?,?,?,?,?,?)");
            $stmt->bind_param("ssssss", $name, $email, $password, $phone, $address, $loc);
            if ($stmt->execute()) {
            ?>
<script>
alert("Congratulations.\nYou are now registered.");
window.location = 'signin.php';
</script>
<?php
            } else {
            ?>
<script>
alert("We could not register you!.");
</script>
<?php
            }
        }
    }
}
?>
 <div class="login-page">
        <center><h2>Sign Up below</h2></center>
        <div class="form">
          <form>
            <input type="text" required minlength="10" name="name" placeholder="Full name" />
            <input type="email" required name="email" placeholder="email address" />
            <input type="text" minlength="11" pattern="[0-9]{10}" required name="phone" placeholder="Phone Number"/>
            <input type="file" name='file' placeholder="Select Picture"/>
            <input type="password" id="password" name="password" id="password" placeholder="set a password" />
            <input type="password" name="cpassword" id="cpassword" placeholder="confirm password" />
            <i class="fas fa-eye" onclick="show()"></i>
            <br>
            <br>
          </form>

          <form class="login-form">
            <button type="button" id="btn-signup">
              SIGN UP
            </button>
            <p class="message">
                <a href="#">.</a><br>
            </p>
          </form>
        </div>
    </div>
</body>
<script>
    function show() {
      var password = document.getElementById("password");
      var icon = document.querySelector(".fas");
      if (password.type === "password") {
        password.type = "text";
      } else {
        password.type = "password";
      }
    }
  </script>
<!-- <script src="assets/js/jquery-1.12.4-jquery.min.js"></script> -->

</body>

</html>