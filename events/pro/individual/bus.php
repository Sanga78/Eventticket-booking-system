<?php
if (!isset($file_access)) die("Direct File Access Denied");
$source = 'bus';
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
                                        <th>First Class Seat</th>
                                        <th>Second Class Seat</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $row = $conn->query("SELECT * FROM bus");
                                    if ($row->num_rows < 1) echo "No Records Yet";
                                    $sn = 0;
                                    while ($fetch = $row->fetch_assoc()) {
                                        $id = $fetch['id'];
                                    ?>

                                    <tr>
                                        <td><?php echo ++$sn; ?></td>
                                        <td><?php echo $fullname = $fetch['name']; ?></td>
                                        <td><?php echo $fetch['first_seat']; ?></td>
                                        <td><?php echo $fetch['second_seat']; ?></td>
                                        <td>
                                           
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="edit<?php echo $id ?>">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Editing <?php echo $fullname;


                                                                                        ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="post">
                                                        <input type="hidden" class="form-control" name="id"
                                                            value="<?php echo $id ?>" required id="">
                                                        <p>	Event : <input type="strings" class="form-control"
                                                                name="name" value="<?php echo $fetch['name'] ?>"
                                                                required minlength="3" id=""></p>
                                                        <p>First Class Capacity : <input type="number" min='0'
                                                                class="form-control"
                                                                value="<?php echo $fetch['first_seat'] ?>"
                                                                name="first_seat" required id="">
                                                        </p>
                                                        <p> Class Capacity : <input type="number" min='0'
                                                                class="form-control"
                                                                value="<?php echo $fetch['second_seat'] ?>"
                                                                name="second_seat" required id="">
                                                        </p>
                                                        <p>

                                                            <input class="btn btn-info" type="submit" value="Edit Bus"
                                                                name='edit'>
                                                        </p>
                                                    </form>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
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

<d
<?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $first_seat = $_POST['first_seat'];
    $second_seat = $_POST['second_seat'];
    if (!isset($name, $first_seat, $second_seat)) {
        alert("Fill Form Properly!");
    } else {
        $conn = connect();
        //Check if bus exists
        $check = $conn->query("SELECT * FROM bus WHERE name = '$name' ")->num_rows;
        if ($check) {
            alert("Event exists");
        } else {
            $ins = $conn->prepare("INSERT INTO bus (name, first_seat, second_seat) VALUES (?,?,?)");
            $ins->bind_param("sss", $name, $first_seat, $second_seat);
            $ins->execute();
            alert("Event Added!");
            load($_SERVER['PHP_SELF'] . "$me");
        }
    }
}

if (isset($_POST['edit'])) {
    $name = $_POST['name'];
    $first_seat = $_POST['first_seat'];
    $second_seat = $_POST['second_seat'];
    $id = $_POST['id'];
    if (!isset($name, $first_seat, $second_seat)) {
        alert("Fill Form Properly!");
    } else {
        $conn = connect();
        //Check if bus exists
        $check = $conn->query("SELECT * FROM bus WHERE name = '$name' ")->num_rows;
        if ($check == 2) {
            alert("Event exists");
        } else {
            $ins = $conn->prepare("UPDATE bus SET name = ?, first_seat = ?, second_seat = ? WHERE id = ?");
            $ins->bind_param("sssi", $name, $first_seat, $second_seat, $id);
            $ins->execute();
            alert("Event Modified!");
            load($_SERVER['PHP_SELF'] . "$me");
        }
    }
}

if (isset($_POST['del_bus'])) {
    $con = connect();
    $conn = $con->query("DELETE FROM bus WHERE id = '" . $_POST['del_bus'] . "'");
    if ($con->affected_rows < 1) {
        alert("Event Could Not Be Deleted. This Event Been Tied To Another Data!");
        load($_SERVER['PHP_SELF'] . "$me");
    } else {
        alert("Event Deleted!");
        load($_SERVER['PHP_SELF'] . "$me");
    }
}
?>