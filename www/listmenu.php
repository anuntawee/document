<?php
session_start();
if ($_SESSION['member_id'] == "") {
    echo "Please Login!";
    exit();
} else {
    $member_id = $_SESSION["member_id"];
    $member_email = $_SESSION["member_email"];
    $member_view = $_SESSION["member_view"];
    $member_comment = $_SESSION["member_comment"];
    $member_edits = $_SESSION["member_edits"];
    $member_approve = $_SESSION["member_approve"];
    $member_signoff = $_SESSION["member_signoff"];
    // echo "Welcome, User ID: $member_id";
    // echo "$member_view";
    // echo "$member_comment";
    // echo "$member_edits";
    // echo "$member_approve";
    // echo "$member_signoff";
    // var_dump($_SESSION);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>REPORT</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Prompt:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css\style.css">

</head>
<?php
if (isset ($_GET['project_name'])) {
    $project_name = $_GET['project_name'];
    // var_dump($project_name);
}

include 'connect\function.php';
$user = new User();
?>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php
        include 'navbar.php';
        ?>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php
                include 'topbar.php';
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <br>
                    <div class="row">
                        <div>
                            <div class="card">
                                <!-- <div class="card-body">กระดานทั้งหมด</div> -->
                                <div class="container">
                                    <div class="row">
                                        <div class="col-6">

                                        </div>
                                        <div class="col-6">

                                            <br>
                                        </div>
                                        <div class="container text-center">
                                            <div class="row row-cols-1 row-cols-md-3 g-3">
                                                <div class="col">
                                                    <div class="card h-100">
                                                        <div class="card-body">
                                                            <h5 class="card-title">
                                                                <a
                                                                    href="timeplan.php?project_name=<?php echo urlencode($project_name); ?>">Time
                                                                    plan ของ Project</a>
                                                                <!-- <a href="timeplan.php">Time
                                                                    plan ของ Project </a> -->
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="card h-100">
                                                        <div class="card-body">
                                                            <h5 class="card-title">
                                                                <a
                                                                    href="listdocument.php?project_name=<?php echo urlencode($project_name); ?>">Time
                                                                    Upload
                                                                    เอกสาร </a>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="card h-100">
                                                        <div class="card-body">
                                                            <h5 class="card-title">
                                                                <a
                                                                    href="projectstatus.php?project_name=<?php echo urlencode($project_name); ?>">
                                                                    ภาพรวมโครงการ </a>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                        <a href="menu.php"><button
                                                class="btn btn-danger float-right">BACK</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
            include 'footer.php';
            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script>
        $("#pagelist").change(function () {
            var viewID = $("#pagelist option:selected").val();
            $("#pagelist option").each(function () {
                var hideID = $(this).val();
                $("#" + hideID).hide();
            });
            $("#" + viewID).show();
        });
    </script>

</body>

</html>