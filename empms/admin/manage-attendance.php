<?php
error_reporting(0);
include 'include/config.php';

// Fetching attendance records
$sql = "SELECT * FROM tblattendance";
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description" content="Employee Management System">
    <title>Employee Management System - Manage Attendance</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
</head>

<body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <?php include 'include/header.php'; ?>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <?php include 'include/sidebar.php'; ?>
    <main class="app-content">

        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h2 align="center"> Manage Attendance</h2>
                    <hr />

                    <div class="tile-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th>Employee ID</th>
                                        <th>Attendance Date</th>/
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
        </div>

    </main>
    <!-- Essential javascripts for application to work-->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/plugins/pace.min.js"></script>
    <!-- DataTables JS -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $('#sampleTable').DataTable();
    </script>
</body>

</html>