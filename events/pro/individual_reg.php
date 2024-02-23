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
        $check_email = $conn->prepare("SELECT * FROM customer WHERE email = ? OR phone = ?");
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
            $stmt = $conn->prepare("INSERT INTO customer (name, email, password, phone, address, loc) VALUES (?,?,?,?,?,?)");
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
<div class="signup-page">
<div class="login-page">
        <center><h2>CUSTOMER REGISTER</h2></center>
        <div class="form">
          <form class="login-form" method="post" role="form" enctype="multipart/form-data" id="signup-form" autocomplete="off">
                <!-- json response will be here -->
                <div id="errorDiv"></div>
                <!-- json response will be here -->
                <input type="text" required minlength="10" name="name" placeholder="Full name" />
                <input type="email" required name="email" placeholder="Email address" />
                <p>Enter phone number: <input type="tel" id="phone" name="phone" required />
                <span id="valid-msg" class="hide">✓ Valid</span>
                <span id="error-msg" class="hide"></span>
                </p>
                <input type="file" name='file' placeholder="Select Picture"/>
                <input type='text' name="address" required placeholder="Address"/>>
                <input type="password" id="password" name="password" id="password" placeholder="set a password" />
                <input type="password" name="cpassword" id="cpassword" placeholder="confirm password" />
                <i class="fas fa-eye" onclick="show()"></i>
                <br>
                <br>
                <button type="submit" id="btn-signup">
                SIGN UP
                </button>
                <p class="message">
                    <a href="#">.</a><br>
                </p>
            </form>
        </div>
    </div>
</div>
</div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="./assets/js/intlTelInput.js"></script>
    <script src="./assets/js/intlTelInput-jquery.min.js"></script>
    <script src="./assets/js/intlTelInput-jquery.js"></script>
    <script>
        var input = document.querySelector('#phone')
            errorMsg = document.querySelector("#error-msg"),
            validMsg = document.querySelector("#valid-msg");

        // Error messages based on the code returned from getValidationError
        var errorMap = [ "Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];
        
        var intl = window.intlTelInput(input,{
            // initialCountry: "auto",
            // geoIpLookup: function(success,failure){
            //     $.get("https://ipinfo.io", function() {},"jsonp").always(function(resp) {
            //         var countryCode = (resp && resp.country) ? resp.country : "";
            //         success(countryCode);
            //     });
            // },
            utilsScript: "./assets/js/utils.js"
        });

        var reset = function() {
            input.classList.remove("error");
            errorMsg.innerHTML = "";
            errorMsg.classList.add("hide");
            validMsg.classList.add("hide");
        };

        // Validate on blur event
        input.addEventListener('blur', function() {
            reset();
            if(input.value.trim()){
                if(intl.isValidNumber()){
                    validMsg.classList.remove("hide");
                }else{
                    input.classList.add("error");
                    var errorCode = intl.getValidationError();
                    errorMsg.innerHTML = errorMap[errorCode];
                    errorMsg.classList.remove("hide");
                }
            }
        });
        
        // Reset on keyup/change event
        input.addEventListener('change', reset);
        input.addEventListener('keyup', reset);
    </script>
</body>

</html>