<?php
session_start();
error_reporting(0);
require_once('include/config.php');
if (strlen($_SESSION["Empid"]) == 0) {
    header('location:index.php');
} else { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta name="description" content="Vali is a responsive">

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
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <h2 align="center">Attendance History</h2>
                            <hr />
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th>Employee ID</th>
                                        <th>Attendance Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $empid = $_SESSION["Empid"];
                                    $sql = "SELECT * FROM tblattendance WHERE employee_id=:empid";
                                    $query = $dbh->prepare($sql);
                                    $query->bindParam(':empid', $empid, PDO::PARAM_STR);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_ASSOC);

                                    if ($query->rowCount() > 0) {
                                        foreach ($results as $row) {
                                            $statusClass = $row['status'] == 'Present' ? 'bg-success' : 'bg-danger';
                                            echo "<tr>";
                                            echo "<td>" . $row['employee_id'] . "</td>";
                                            echo "<td>" . $row['attendance_date'] . "</td>";
                                            echo "<td><span class='p-2 rounded text-light $statusClass'>" . $row['status'] . "</span></td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='3'>No attendance records found.</td></tr>";
                                    }
                                    ?>

                                </tbody>
                            </table>
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
        <!-- The javascript plugin to display page loading on top-->
        <script src="js/plugins/pace.min.js"></script>
        <!-- Page specific javascripts-->
        <!-- Data table plugin-->
        <script type="text/javascript" src="../js/plugins/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../js/plugins/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript">
            $('#sampleTable').DataTable();
        </script>

    </body>

    </html>
<?php } ?>