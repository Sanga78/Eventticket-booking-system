<?php
if (!isset($file_access)) die("Direct File Access Denied");
?>
<div class="content">
    <h5 class="mt-4 mb-2">Hi, <?php echo $fullname ?></h5>
    
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-info">
                <span class="info-box-icon"><i class="fa fa-bus"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Events</span>
                    <span class="info-box-number"><?php
                                                    echo $comp = $conn->query("SELECT * FROM bus")->num_rows;
                                                    ?></span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 70%"></div>
                    </div>
                    <?php //readonly  
                    ?>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-secondary">
                <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Schedules</span>
                    <span
                        class="info-box-number"><?php echo connect()->query("SELECT * FROM schedule")->num_rows ?></span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 70%"></div>
                    </div>
                    <?php //readonly  
                    ?>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
         
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-primary">
                <span class="info-box-icon"><i class="fa fa-route"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Organizer</span>
                    <span class="info-box-number"><?php echo connect()->query("SELECT * FROM route")->num_rows ?></span>

                    <div class="progress"><div></div>
                        <div class="progress-bar" style="width: 50%"></div>
                    </div>

                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
		<div>
		</div>

        
                
			<?php
if (!isset($file_access)) die("Direct File Access Denied");
?>

<div class="content">
    <div class="container-fluid">
        <?php
        if (!isset($_POST['submit'])) {
        ?>
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header alert-success">
                        <h5 class="m-0">Quick Tips</h5>
                    </div>
                    <div class="card-body">
                        Use the links at the left.
                        <br />You can see list of schedules by clicking on "New Booking". The system will display list
                        of available schedules for you which you can view and make bookings from. <br>Before your
                        bookings are saved, you are redirected to make payment. <br>After a successful payment, system
                        generates your ticket ID for you which you are required to bring to the station. <br>You are
                        allowed to view all your booking history by clicking on "View Bookings".
                    </div>
                </div>
            </div><?php
                    } else {
                        $class = $_POST['class'];
                        $number = $_POST['number'];
                        $schedule_id = $_POST['id'];
                        if ($number < 1) die("Invalid Number");
                        ?>

            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header alert-success">
                            <h5 class="m-0">Booking Preview</h5>
                        </div>
                        <div class="card-body">
                            <div class="callout callout-info">
                                <h5><i class="fas fa-info"></i> <?php echo ucwords($class), " Class" ?>:</h5>
                                You are about to book
                                <?php echo $number, " Ticket", $number > 1 ? 's' : '', ' for ', getRouteFromSchedule($schedule_id); ?>
                                <br />

                                <?php

                                    $fee = ($_SESSION['amount'] = getFee($schedule_id, $class));
                                    echo $number, " x kes", $fee, " = kes", ($fee * $number), "<hr/>";
                                    $fee = $fee * $number;
                                    $amount = intval($fee);
                                    $vat = ceil($fee * 0.01);
                                    echo "V.A.T Charges = kes$vat<br/><br/><hr/>";
                                    echo "Total = kes", $total = $amount + $vat;
                                    $fee =  intval($total) . "00";
                                    $_SESSION['amount'] =  $total;
                                    $_SESSION['original'] =  $fee;
                                    $_SESSION['schedule'] =  $schedule_id;
                                    $_SESSION['no'] =  $number;
                                    $_SESSION['class'] =  $class;
                                    ?>
                            </div>
                            <a href="https://tujenge.io/payments-page/8a102b70-0740-11ed-8180-630be1e24dd7"><button
                                    onclick="return confirm('You will be directed to make your payment.\nPayment finalizes your booking!')"
                                    class="btn btn-primary">Pay Now</button></a>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /.content -->
<!-- /.col -->
</div>
<!-- /.row -->

</div>
