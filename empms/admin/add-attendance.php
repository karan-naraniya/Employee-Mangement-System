<?php
error_reporting(0);
include 'include/config.php';

if (isset($_POST['submit'])) {
    $employee_id = $_POST['employee_id'];
    $attendance_date = $_POST['attendance_date'];
    $status = $_POST['status'];

    $sql = "INSERT INTO tblattendance (employee_id, attendance_date, status) VALUES (:employee_id, :attendance_date, :status)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':employee_id', $employee_id, PDO::PARAM_STR);
    $query->bindParam(':attendance_date', $attendance_date, PDO::PARAM_STR);
    $query->bindParam(':status', $status, PDO::PARAM_STR);

    $query->execute();

    $lastInsertId = $dbh->lastInsertId();

    if ($lastInsertId >= 0) {
        $msg = "Attendance added successfully";
    } else {
        $errormsg = "Data not inserted successfully";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description" content="Employee Management System">
    <title>Employee Management System</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <?php include 'include/header.php'; ?>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <?php include 'include/sidebar.php'; ?>
    <main class="app-content">

        <div class="row">

            <div class="col-md-6">
                <div class="tile">
                    <h2 align="center"> Add Attendance</h2>
                    <hr />
                    <!---Success Message--->
                    <?php if ($msg) { ?>
                        <div class="alert alert-success" role="alert">
                            <strong>Well done!</strong> <?php echo htmlentities($msg); ?>
                        </div>
                    <?php } ?>

                    <!---Error Message--->
                    <?php if ($errormsg) { ?>
                        <div class="alert alert-danger" role="alert">
                            <strong>Oh snap!</strong> <?php echo htmlentities($errormsg); ?>
                        </div>
                    <?php } ?>


                    <div class="tile-body">
                        <form method="post">
                            <div class="form-group col-md-12">
                                <label class="control-label"> Employee ID</label>
                                <input class="form-control" name="employee_id" id="employee_id" type="text" placeholder="Enter Employee ID" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label"> Attendance Date</label>
                                <input class="form-control" name="attendance_date" id="attendance_date" type="date" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label"> Status</label>
                                <select class="form-control" name="status" id="status" required>
                                    <option value="Present">Present</option>
                                    <option value="Absent">Absent</option>
                                    <option value="Absent">Half Day</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4 align-self-end">
                                <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

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