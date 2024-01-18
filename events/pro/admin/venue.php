<?php
if (!isset($file_access)) die("Direct File Access Denied");
$source = 'venue';
$me = "?page=$source"
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
                                All Venues</h3>
                            <div class='float-right'>
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#add">
                                    Add New venue &#128645;
                                </button></div>
                        </div>

                        <div class="card-body">

                            <table id="example1" style="align-items: stretch;"
                                class="table table-hover w-100 table-bordered table-striped<?php //
                                                                                                                                            ?>">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Venue</th>
                                        <th>Virtual Meeting link</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $row = $conn->query("SELECT * FROM meeting");
                                    if ($row->num_rows < 1) echo "No Records Yet";
                                    $sn = 0;
                                    while ($fetch = $row->fetch_assoc()) {
                                        $id = $fetch['id'];
                                    ?>

                                    <tr>
                                        <td><?php echo ++$sn; ?></td>
                                        <td><?php echo $fetch['venue']; ?></td>
                                        <td><?php echo $fetch['link'];

                                                $fullname = $fetch['venue'] . " or " . $fetch['link']; ?></td>
                                        <td>
                                            <form method="POST">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#edit<?php echo $id ?>">
                                                    Edit
                                                </button> -

                                                <input type="hidden" class="form-control" name="del_venue"
                                                    value="<?php echo $id ?>" required id="">
                                                <button type="submit"
                                                    onclick="return confirm('Are you sure about this?')"
                                                    class="btn btn-danger">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="edit<?php echo $id ?>">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Editing <?php echo $fullname;


                                                                                        ?> &#128642;</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="post">
                                                        <input type="hidden" class="form-control" name="id"
                                                            value="<?php echo $id ?>" required id="">
                                                        <p>Venue : <input type="text" class="form-control"
                                                                value="<?php echo $fetch['venue'] ?>" name="venue"
                                                                required id="">
                                                        </p>
                                                        <p> Virtual meeting Link : <input type="text" class="form-control"
                                                                value="<?php echo $fetch['link'] ?>" name="link"
                                                                required id="">
                                                        </p>
                                                        <p>

                                                            <input class="btn btn-info" type="submit" value="Edit Venue"
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

<div class="modal fade" id="add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" align="center">
            <div class="modal-header">
                <h4 class="modal-title">Add New Venue &#128649;
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">

                    <table class="table table-bordered">

                        <tr>
                            <th>Venue</th>
                            <td><input type="text" class="form-control" name="venue" required id=""></td>
                        </tr>
                        <tr>
                            <th>Or virtualy</th>
                            <td><input type="text" class="form-control" name="link" required id="">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">

                                <input class="btn btn-info" type="submit" value="Add Venue" name='submit'>
                            </td>
                        </tr>
                    </table>
                </form>



            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<?php

if (isset($_POST['submit'])) {
    $venue = $_POST['venue'];
    $link = $_POST['link'];
    if (!isset($link, $venue)) {
        alert("Fill Form Properly!");
    } else {
        $conn = connect();

        $ins = $conn->prepare("INSERT INTO meeting (venue,link) VALUES (?,?)");
        $ins->bind_param("ss", $venue, $link);
        $ins->execute();
        alert("Event venue Added!");
        load($_SERVER['PHP_SELF'] . "$me");
    }
}

if (isset($_POST['edit'])) {
    $venue = $_POST['venue'];
    $link = $_POST['link'];
    $id = $_POST['id'];
    if (!isset($venue, $link)) {
        alert("Fill Form Properly!");
    } else {
        $conn = connect();
        $ins = $conn->prepare("UPDATE meeting SET venue = ?, link = ? WHERE id = ?");
        $ins->bind_param("ssi", $venue, $link, $id);
        $ins->execute();
        alert("Venue Modified!");
        load($_SERVER['PHP_SELF'] . "$me");
    }
}

if (isset($_POST['del_venue'])) {
    $con = connect();
    $conn = $con->query("DELETE FROM meeting WHERE id = '" . $_POST['del_venue'] . "'");
    if ($con->affected_rows < 1) {
        alert("Venue Could Not Be Deleted. This Venue Has Been linked To Another Data!");
        load($_SERVER['PHP_SELF'] . "$me");
    } else {
        alert("Venue Deleted Succesfully!");
        load($_SERVER['PHP_SELF'] . "$me");
    }
}
?>