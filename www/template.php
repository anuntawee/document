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

<style>
    h5:hover {
        text-decoration: underline;
    }
</style>

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

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <!-- <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->

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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">

                    </div>

                    <br>
                    <div class="row">
                        <div>
                            <div class="card">
                                <div class="card-body"></div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-6">
                                            <h1 class="">Download Template </h1>
                                        </div>
                                        <div class="col-6">

                                            <form>
                                                <div class="input-group">

                                                    <input type="text" id="searchInput" placeholder="Search document..."
                                                        class="form-control bg-light border-0 small" aria-label="Search"
                                                        aria-describedby="basic-addon2">

                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary" type="button">
                                                            <i class="fas fa-search fa-sm"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                            <br>
                                        </div>
                                        <div class="col-1">

                                        </div>
                                        <div class="col-10">
                                            <span>
                                                <!-- <h5 onclick="downloadFile()">1) Business Requirement Document</h5> -->
                                                <h5 onclick="downloadFile()">1) Acceptance Record</h5>
                                                <h5 onclick="downloadFile2()">2) Change Request </h5>
                                                <h5 onclick="downloadFile3()">3) Correction Register</h5>
                                                <h5 onclick="downloadFile5()">4) Maintenance Documentation</h5>
                                                <!-- <h5 onclick="downloadFile6()">6) Product Operation Guide</h5> -->
                                                <h5 onclick="downloadFile7()">5) Progress Status Record</h5>
                                                <h5 onclick="downloadFile8()">6) Project Plan</h5>
                                                <!-- <h5 onclick="downloadFile9()">9) Project Repository</h5> -->
                                                <h5 onclick="downloadFile9()">7) Project Repository Backup</h5>
                                                <h5 onclick="downloadFile11()">8) Requirements Specification</h5>
                                                <!-- <h5 onclick="downloadFile12()">12) Software</h5>
                                                <h5 onclick="downloadFile13()">13) Software Component</h5>
                                                <h5 onclick="downloadFile14()">14) Software Configuration</h5> -->
                                                <h5 onclick="downloadFile15()">9) Software Design</h5>
                                                <!-- <h5 onclick="downloadFile16()">16) Software User Documentation</h5> -->
                                                <h5 onclick="downloadFile17()">10) Statement of Work</h5>
                                                <!-- <h5 onclick="downloadFile18()">18) Test Cases and Test Procedures</h5> -->
                                                <h5 onclick="downloadFile19()">11) Test Report</h5>
                                                <h5 onclick="downloadFile20()">12) Traceability Record</h5>
                                                <h5 onclick="downloadFile21()">13) Verification Results</h5>
                                                <!-- <h5 onclick="downloadFile22()">22) Validation Results</h5>
                                                <h5 onclick="downloadFile23()">23) Propasal (If Any)</h5> -->
                                            </span>
                                        </div>
                                        <div class="col-1">

                                        </div>
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

    <script>
        // Get the input element and attach an event listener for input changes
        const searchInput = document.getElementById('searchInput');
        searchInput.addEventListener('input', handleSearch);

        // Function to handle search
        function handleSearch() {
            const searchTerm = searchInput.value.toLowerCase();
            const documentList = document.querySelectorAll('h5');

            documentList.forEach((document) => {
                const documentText = document.textContent.toLowerCase();
                const isVisible = documentText.includes(searchTerm);
                document.style.display = isVisible ? 'block' : 'none';
            });
        }
        function downloadFile() {
            downloadFileWithName('01_AcceptanceRecord.docx', 'template/01_AcceptanceRecord.docx');
        }

        function downloadFile2() {
            downloadFileWithName('02_ChangeRequirement.docx', 'template/02_ChangeRequirement.docx');
        }

        function downloadFile3() {
            downloadFileWithName('03_Correction Register.xlsx', 'template/03_Correction Register.xlsx');
        }
        function downloadFile4() {
            downloadFileWithName('#', 'template/#');
        }
        function downloadFile5() {
            downloadFileWithName('04_MOM.docx', 'template/05_MOM.docx');
        }
        function downloadFile6() {
            downloadFileWithName('#', 'template/#');
        }
        function downloadFile7() {
            downloadFileWithName('05_Implementation Timeline (SI Process).xlsx', 'template/07_Implementation Timeline (SI Process).xlsx');
        }
        function downloadFile8() {
            downloadFileWithName('06_Project Plan.docx', 'template/08_Project Plan.docx');
            
        }
        function downloadFile9() {
            downloadFileWithName('07_Project Team Info.xlsx', 'template/08_Project Team Info.xlsx');
        }
        function downloadFile10() {
            downloadFileWithName('#', 'template/#');
        }
        function downloadFile11() {
            downloadFileWithName('08_SRS.docx', 'template/11_SRS.docx');
        }
        function downloadFile12() {
            downloadFileWithName('#', 'template/#');
        }
        function downloadFile13() {
            downloadFileWithName('#', 'template/#');
        }
        function downloadFile14() {
            downloadFileWithName('#', 'template/#');
        }
        function downloadFile15() {
            downloadFileWithName('09_Data Dictionary.docx', 'template/15_Data Dictionary.docx');
            downloadFileWithName('09_Software Design.docx', 'template/15_Software Design.docx');
        }
        function downloadFile16() {
            downloadFileWithName('#', 'template/#');
        }
        function downloadFile17() {
            downloadFileWithName('10_StatementofWork.docx', 'template/17_StatementofWork.docx');
        }
        function downloadFile18() {
            downloadFileWithName('#', 'template/#');
        }
        function downloadFile19() {
            downloadFileWithName('11_Test Report (Correction).xlsx', 'template/19_Test Report (Correction).xlsx');
        }
        function downloadFile20() {
            downloadFileWithName('12_Traceability Record.xlsx', 'template/20_Traceability Record.xlsx');
        }
        function downloadFile21() {
            downloadFileWithName('13_UAT.docx', 'template/21_UAT.docx');
        }
        function downloadFile22() {
            downloadFileWithName('#', 'template/#');
        }
        function downloadFile23() {
            downloadFileWithName('#', 'template/#');
        }

        function downloadFileWithName(fileName, filePath) {
            // สร้าง popup สำหรับการยืนยันการดาวน์โหลด
            var confirmation = confirm("คุณต้องการดาวน์โหลดไฟล์ " + fileName + " หรือไม่?");
            // ถ้าผู้ใช้กด OK
            if (confirmation) {
                var downloadLink = document.createElement('a');
                downloadLink.setAttribute('href', filePath);
                downloadLink.setAttribute('download', fileName);
                downloadLink.style.display = 'none';
                document.body.appendChild(downloadLink);
                downloadLink.click();
                document.body.removeChild(downloadLink);
            } else {
                // ถ้าผู้ใช้กด Cancel
                alert("การดาวน์โหลดไฟล์ " + fileName + " ถูกยกเลิก");
            }
        }

    </script>
</body>

</html>