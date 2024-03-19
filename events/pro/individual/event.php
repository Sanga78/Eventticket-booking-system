<?php
if (!isset($file_access)) die("Direct File Access Denied");
$source = 'event';
$me = "?page=$source";
?>

<div class="content">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">
                                All Events</h3>
                            <div class='float-right'>
                                </div>
                        </div>

                        <div class="card-body">

                            <table id="example1" style="align-items: stretch;"
                                class="table table-hover w-100 table-bordered table-striped<?php //
                                                                                                                                            ?>">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Event</th>
                                        <th>venue</th>
                                        <th>First Class Seat</th>
                                        <th>Second Class Seat</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $row = $conn->query("SELECT * FROM event");
                                    if ($row->num_rows < 1) echo "No Records Yet";
                                    $sn = 0;
                                    while ($fetch = $row->fetch_assoc()) {
                                        $id = $fetch['id'];
                                    ?>

                                    <tr>
                                        <td><?php echo ++$sn; ?></td>
                                        <td><?php echo $fullname = $fetch['name']; ?></td>
                                        <td><?php echo $fetch['venue']; ?></td>
                                        <td><?php echo $fetch['first_seat']; ?></td>
                                        <td><?php echo $fetch['second_seat']; ?></td>
                                        <td>
                                           
                                        </td>
                                    </tr>
                                        <!-- /.modal -->
                                        <?php
                                    }
                                        ?>

                                </tbody>
                               
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
</div>
</div>
</section>
</div>
