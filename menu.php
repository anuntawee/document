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
include 'connect\function.php';
$user = new User();
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php
        include 'navbar.php';
        ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <br>
                    <div class="row">

                        <div>
                            <div class="card  text-center">
                                <div class="container">
                                    <br>
                                    <h1 class="">โครงการทั้งหมด</h1>

                                    <div class="row">
                                        <div class="col-6">
                                        </div>
                                        <div class="col-6">

                                            <br>
                                        </div>
                                        <div class="container">
                                            <div class="row row-cols-1 row-cols-md-5 g-4">
                                                <?php
                                                $getuser = $user->getallproject();
                                                if (is_array($getuser) || is_object($getuser)) {
                                                    foreach ($getuser as $i => $rowre)
                                                        if (isset ($rowre)) {
                                                            //print_r($rowre);
                                                            ?>
                                                            <div class="col">
                                                                <div class="card h-100">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">
                                                                        <a href="listmenu.php?project_name=<?php echo urlencode($rowre['project_name']); ?>"><?php echo $rowre['project_name']; ?></a>
                                                                            <!-- <a href="listmenu.php"> <?php echo $rowre['project_name']; ?></a> -->
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                } else {
                                                    // echo "ยังไม่ได้กรอกข้อมูล";
                                                }
                                                ?>
                                                <!-- <div class="col">
                                                    <div class="card h-100">

                                                        <div class="card-body">
                                                            <h5 class="card-title"> <a href="listmenu.html">โครงการที่
                                                                    2 Ketchup CMS</a></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="card h-100">

                                                        <div class="card-body">
                                                            <h5 class="card-title"> <a href="listmenu.html">โครงการที่
                                                                    3 Ketchup Mobile</a></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="card h-100">

                                                        <div class="card-body">
                                                            <h5 class="card-title"> <a href="listmenu.html">โครงการที่
                                                                    4</a></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="card h-100">

                                                        <div class="card-body">
                                                            <h5 class="card-title"> <a href="listmenu.html">โครงการที่
                                                                    5</a></h5>
                                                        </div>
                                                    </div>
                                                </div> -->
                                            </div>
                                            <br>
                                        </div>

                                        <!-- <div class="container">
                                            <div class="row row-cols-1 row-cols-md-5 g-4">
                                                <div class="col">
                                                    <div class="card h-100">

                                                        <div class="card-body">
                                                            <h5 class="card-title"> <a href="listmenu.html">โครงการที่
                                                                    6</a></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="card h-100">

                                                        <div class="card-body">
                                                            <h5 class="card-title"> <a href="listmenu.html">โครงการที่
                                                                    7</a></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="card h-100">

                                                        <div class="card-body">
                                                            <h5 class="card-title"> <a href="listmenu.html">โครงการที่
                                                                    8</a></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="card h-100">

                                                        <div class="card-body">
                                                            <h5 class="card-title"> <a href="listmenu.html">โครงการที่
                                                                    9</a></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="card h-100">

                                                        <div class="card-body">
                                                            <h5 class="card-title"> <a href="listmenu.html">โครงการที่
                                                                    10</a></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                        </div>

                                        <div class="container">
                                            <div class="row row-cols-1 row-cols-md-5 g-4">
                                                <div class="col">
                                                    <div class="card h-100">

                                                        <div class="card-body">
                                                            <h5 class="card-title"> <a href="listmenu.html">โครงการที่
                                                                    11</a></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="card h-100">

                                                        <div class="card-body">
                                                            <h5 class="card-title"> <a href="listmenu.html">โครงการที่
                                                                    12</a></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="card h-100">

                                                        <div class="card-body">
                                                            <h5 class="card-title"> <a href="listmenu.html">โครงการที่
                                                                    13</a></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="card h-100">

                                                        <div class="card-body">
                                                            <h5 class="card-title"> <a href="listmenu.html">โครงการที่
                                                                    14</a></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="card h-100">

                                                        <div class="card-body">
                                                            <h5 class="card-title"> <a href="listmenu.html">โครงการที่
                                                                    15</a></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                        </div>

                                        <div class="container">
                                            <div class="row row-cols-1 row-cols-md-5 g-4">
                                                <div class="col">
                                                    <div class="card h-100">

                                                        <div class="card-body">
                                                            <h5 class="card-title"> <a href="listmenu.html">โครงการที่
                                                                    16</a></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="card h-100">

                                                        <div class="card-body">
                                                            <h5 class="card-title"> <a href="listmenu.html">โครงการที่
                                                                    17</a></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="card h-100">

                                                        <div class="card-body">
                                                            <h5 class="card-title"> <a href="listmenu.html">โครงการที่
                                                                    18</a></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="card h-100">

                                                        <div class="card-body">
                                                            <h5 class="card-title"> <a href="listmenu.html">โครงการที่
                                                                    19</a></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="card h-100">

                                                        <div class="card-body">
                                                            <h5 class="card-title"> <a href="listmenu.html">โครงการที่
                                                                    20</a></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                        <div class="container">
                                            <div class="row row-cols-1 row-cols-md-5 g-4">
                                                <div class="col">
                                                    <div class="card h-100">

                                                        <div class="card-body">
                                                            <h5 class="card-title"> <a href="listmenu.html">โครงการที่
                                                                    21</a></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="card h-100">

                                                        <div class="card-body">
                                                            <h5 class="card-title"> <a href="listmenu.html">โครงการที่
                                                                    22</a></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="card h-100">

                                                        <div class="card-body">
                                                            <h5 class="card-title"> <a href="listmenu.html">โครงการที่
                                                                    23</a></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="card h-100">

                                                        <div class="card-body">
                                                            <h5 class="card-title"> <a href="listmenu.html">โครงการที่
                                                                    24</a></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
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

</body>

</html>