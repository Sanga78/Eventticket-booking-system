<?php
session_start();
require_once '../conn.php';
$class = "signin";

?>
<?php
$cur_page = 'signup';
include 'includes/inc-header.php';
include 'includes/inc-nav.php';
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (!isset($email, $password)) {
?>
<script>
alert("Ensure you fill the form properly.");
</script>
<?php
    } else {

        //Check for login
        $password = md5($password);
        $check = $conn->prepare("SELECT * FROM passenger WHERE email = ? AND password = ?");
        $check->bind_param("ss", $email, $password);
        if (!$check->execute()) die("Form Filled With Error");
        $res = $check->get_result();
        $no_rows = $res->num_rows;
        if ($no_rows ==  1) {
            $row = $res->fetch_assoc();
            $id = $row['id'];
            $status = $row['status'];
            if ($status != 1) {
        ?>
<script>
alert("Account Deactivated!\nContact The System Administrator!");
window.location = "signin.php";
</script>
<?php
                exit;
            }
            session_regenerate_id(true);
            $_SESSION['user_id'] = $id;
            $_SESSION['email'] = $email;

            ?>
<script>
alert("Access Granted!");
window.location = "individual.php";
</script>
<?php
            exit;
        } else { ?>
<script>
alert("Access Denied.");
</script>
<?php
        }
    }
}
?>
<div class="login-page">
    <center><h2>Customer Panel</h2></center>
        <div class="form">
    
        <form>
            <input type="email"name ="email" placeholder="&#xf003;  Email Address"/>
            <input type="password" name="password" id="password" placeholder="&#xf023;  password"/>
            <i class="fas fa-eye" onclick="show()"></i> 
            <br>
            <br>
            <button>LOGIN</button>
            <p class="message">
              <a href="#">.</a><br>
            </p>
        </form>
    
        <form class="login-form">
            <button type="button" onclick="window.location.href='individual_reg.php'">SIGN UP</button>
        </form>
        </div>
</div>
</div>
<script src="assets/js/jquery-1.12.4-jquery.min.js"></script>
<script src="assets/js/sweetalert2.js"></script>
</body>

</html>