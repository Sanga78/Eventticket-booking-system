<?php
if (!isset($file_access)) die("Direct File Access Denied");
?>
<div class="content">
    <h5 class="mt-4 mb-2">Hi, <?php echo $fullname ?></h5>
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-danger">
                <span class="info-box-icon"><i class="fa fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Attendees</span>
                    <span class="info-box-number"><?php
                                                    echo $reg =  $conn->query("SELECT * FROM customer")->num_rows;
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
            <div class="info-box bg-info">
                <span class="info-box-icon"><i class="fa fa-bell"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Events</span>
                    <span class="info-box-number"><?php
                                                    echo $comp = $conn->query("SELECT * FROM event WHERE organizer_id = $organizer_id")->num_rows;
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
                        class="info-box-number"><?php echo connect()->query("SELECT * FROM schedule WHERE organizer_id = $organizer_id")->num_rows ?></span>

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
            <div class="info-box bg-success">
                <span class="info-box-icon"><i class="fa fa-dollar-sign"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Payments</span>
                    <span class="info-box-number"> ksh <?php
                                                            $row = connect()->query("SELECT SUM(amount) AS amount 
                                                            FROM payment 
                                                            INNER JOIN schedule ON payment.schedule_id = schedule.id 
                                                            WHERE schedule.organizer_id = '$organizer_id'")->fetch_assoc();
                                                            echo $row['amount'] == null ? '0' : $row['amount'];
                                                        ?></span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 70%"></div>
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