<?php
error_reporting(0);
include  'include/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description" content="Vali is a">
    <title>Employee Management System</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="app sidebar-mini">
    <!-- Navbar-->
    <?php include 'include/header.php'; ?>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <?php include 'include/sidebar.php'; ?>
    <main class="app-content">


        <div class="row">

            <div class="col-md-12">
                <div class="tile">
                    <!---Success Message--->

                    <!---Error Message--->
                    <h3 class="tile-title">Attendance Report</h3>
                    <div class="tile-body">
                        <form class="row" method="post">
                            <div class="form-group col-md-6">
                                <label class="control-label">From Date</label>
                                <input class="form-control" type="date" name="fdate" id="fdate" placeholder="Enter From Date">
                            </div>

                            <div class="form-group col-md-6">
                                <label class="control-label">To Date</label>
                                <input class="form-control" type="date" name="todate" id="todate" placeholder="Enter To Date">
                            </div>
                            <div class="form-group col-md-4 align-self-end">
                                <input type="Submit" name="Submit" id="Submit" class="btn btn-primary" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <?php
        if (isset($_POST['Submit'])) { ?>
            <?php
            $fdate = $_POST['fdate'];
            $tdate = $_POST['todate'];
            ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <h2 align="center">Attendance Report from <?php echo date("d-m-Y", strtotime($fdate)); ?> To <?php echo date("d-m-Y", strtotime($tdate)); ?></h2>
                            <hr />
                            <table class="table table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                        <!-- <th>Sr.No</th> -->
                                        <th>Employee ID</th>
                                        <th>Attendance Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($results as $row) {
                                        $statusClass = $row['status'] == 'Present' ? 'bg-success' : 'bg-danger';
                                        echo "<tr>";
                                        echo "<td>" . $row['employee_id'] . "</td>";
                                        echo "<td>" . $row['attendance_date'] . "</td>";
                                        echo "<td><sapn class='p-2 rounded text-light  $statusClass'>" . $row['status'] . "</sapn></td>";
                                        echo "</tr>";
                                    }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/plugins/pace.min.js"></script>
    <script type="text/javascript" src="../js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
        $('#sampleTable').DataTable();
    </script>

</body>

</html>