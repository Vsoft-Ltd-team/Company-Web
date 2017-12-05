<?php include_once("../include/dbconnect.php");
include_once("include/header.php");
$x = @$_GET['id'];
$y = @$_GET['act'];

if(@$_GET['act'] == "delete"){
    $sql = "delete from pricing where id='$x'" ;
    $result = mysqli_query($conn, $sql);
}


?>

    <!-- Page Content -->
    <div id="page-wrapper">
    <div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Starter Page</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">List of all orders</div>
                <div class="panel-body">
                    <?php
                    $sql = "SELECT * FROM pricing";
                    $result = mysqli_query($conn, $sql);
                    ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-condensed table-hover dataTables" >
                            <thead>
                            <tr>
                                <th><strong>#</strong></th>
                                <th><strong>Name</strong></th>
                                <th><strong>Phone</strong></th>
                                <th><strong>Email</strong></th>
                                <th><strong>Organization</strong></th>
                                <th><strong>Employees</strong></th>
                                <th><strong>Required product</strong></th>
                                <th><strong>Current System</strong></th>
                                <th><strong>Action</strong></th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            ?>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['fname'] ?> <?php echo $row['lname'] ?></td>
                            <td><?php echo $row['phone'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['organization'] ?></td>
                            <td><?php echo $row['emp_number'] ?></td>
                            <td><?php echo $row['new_software'] ?></td>
                            <td><?php echo $row['old_software'] ?></td>
                            <td>
                                <a class="btn btn-sm btn-info" href="compose_orders.php?user_id=<?php echo $row['id']?>">Reply</a>
                                <a class="btn btn-sm btn-danger" href="?action = transview&id=<?php echo $row['id']?>&act=delete" onclick="return confirm('Are your sure you want to delete')">Delete</a>

                            </td>
                            </tbody>
                            <?php
                            echo "</tr>";

                            }
                            ?>


                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php include_once("include/footer.php");?>