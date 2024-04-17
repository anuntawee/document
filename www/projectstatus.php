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
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css\style.css">

</head>
<?php
if (isset($_GET['project_name'])) {
    $project_name = $_GET['project_name'];
}
include 'connect/function.php';
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

                <!-- Topbar -->
                <?php
                include 'topbar.php';
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <br>
                    <div class="row">
                        <div>
                            <div class="card">
                                <div class="card-body">
                                    <h1>ภาพรวมโครงการ
                                        <?php echo $project_name ?>
                                    </h1>
                                </div>
                                <div class="col-12">
                                    <table id="example" class="row-border" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>รายการ</th>
                                                <!-- <th>Stage</th> -->
                                                <th>Status</th>
                                                <th>เวลาที่ดำเนินการล่าสุด</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $getuser = $user->getdocstatus("doc_project_name = '" . $project_name . "'");
                                            if (is_array($getuser) || is_object($getuser)) {
                                                $uniqueDocs = array(); // เก็บชื่อเอกสารที่ไม่ซ้ำกัน
                                                $latestDocs = array(); // เก็บข้อมูลเอกสารที่มีวันที่ล่าสุด
                                            
                                                // วนลูปเพื่อจัดกลุ่มข้อมูลตามชื่อเอกสาร
                                                foreach ($getuser as $rowre) {
                                                    $docName = $rowre['doc_template'];
                                                    $docStatus = $rowre['doc_status'];
                                                    $docTime = strtotime($rowre['doc_time']);
                                                    // เก็บข้อมูลล่าสุดของแต่ละชื่อเอกสาร
                                                    if (!isset($latestDocs[$docName]) || $docTime > $latestDocs[$docName]['time']) {
                                                        $latestDocs[$docName] = array(
                                                            'status' => $docStatus,
                                                            'time' => $docTime
                                                        );
                                                    }
                                                    if (!in_array($docName, $uniqueDocs)) {
                                                        $uniqueDocs[] = $docName;
                                                    }
                                                }
                                                // แสดงข้อมูลของชื่อเอกสารที่ไม่ซ้ำกันและมีวันที่ล่าสุด
                                                foreach ($uniqueDocs as $i => $docName) {
                                                    $latestStatus = $latestDocs[$docName]['status'];
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo "" . ($i + 1); ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $docName; ?>
                                                            
                                                        </td>
                                                        <td>
                                                            <?php echo $latestStatus; ?>
                                                            
                                                        </td>
                                                        <td>
                                                            <?php echo date('Y-m-d H:i:s', $latestDocs[$docName]['time']); ?>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-outline-warning"
                                                                onclick="sendEmail('<?php echo $docName; ?>', '<?php echo $latestStatus; ?>','<?php echo $member_email; ?>' )">
                                                                <i class="fas fa-fw fa-bell" aria-hidden="true"></i>
                                                            </button>
                                                        </td>
                                                        <!-- <td>
                                                                <button type="button" class="btn btn-outline-primary"><i
                                                                        class="fas fa-fw fa-pencil-alt"
                                                                        aria-hidden="true"></i></button>
                                                                <button type="button" class="btn btn-outline-warning"> <i
                                                                        class="fas fa-fw fa-calendar"
                                                                        aria-hidden="true"></i></button>
                                                                <button type="button" class="btn btn-outline-danger"><i
                                                                        class="fas fa-fw fa-trash" aria-hidden="true"></i></button>
                                                            </td> -->
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <!-- <tr>
                                                <th>ลำดับ</th>
                                                <th>ชื่อโครงการ</th>
                                                <th>Stage</th>
                                                <th>Status</th>
                                                <th>ผู้รับผิดชอบ</th>
                                                <th>จัดการ</th>
                                            </tr> -->
                                        </tfoot>
                                    </table>
                                    <br>
                                    <a href="listmenu.php?project_name=<?php echo urlencode($project_name); ?>"><button
                                            class="btn btn-danger float-right">BACK</button>
                                    </a>
                                    <br>
                                    <br>
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

        new DataTable('#example');
        // Function to increment the value in the table cell
        function incrementValue() {
            var table = document.getElementById("example");
            var cell = table.rows[0].cells[0];
            var currentValue = parseInt(cell.innerHTML) || 0; // Get current value and convert to integer
            cell.innerHTML = currentValue + 1; // Increment the value
        }
        function sendEmail(docName, latestStatus,member_email) {
            // สร้าง FormData เพื่อเก็บข้อมูล
            var formData = new FormData();
            formData.append('docName', docName);
            formData.append('latestStatus', latestStatus);
            formData.append('member_email', member_email);


            $.ajax({
                type: "POST",
                url: "connect/process.php",
                data: formData, // ส่งข้อมูลผ่าน FormData
                processData: false, // ป้องกัน jQuery จัดการข้อมูล
                contentType: false, // ป้องกัน jQuery ตั้งค่าประเภทเนื้อหา
                success: function (data) {
                    // ปิด modal
                    $(".close").trigger("click");
                    // แสดงผลลัพธ์
                    alert(data);
                    // โหลดหน้าใหม่
                    location.reload();
                }
            });
            return false;
        }


        // function sendEmail(docName, latestStatus) {
        //     // สร้างอ็อบเจ็กต์ XMLHttpRequest
        //     var xhttp = new XMLHttpRequest();

        //     // กำหนดการจัดการเหตุการณ์เมื่อมีการเปลี่ยนแปลงในสถานะการเรียกข้อมูล
        //     xhttp.onreadystatechange = function () {
        //         if (this.readyState == 4 && this.status == 200) {
        //             // การเรียกสำเร็จ
        //             alert("อีเมลถูกส่งไปยัง " + this.responseText);
        //         }
        //     };

        //     // กำหนดเมธอดและ URL ที่ต้องการเรียก
        //     xhttp.open("GET", "connect/send_email.php?docName=" + docName + "&latestStatus=" + latestStatus, true);

        //     // ส่งคำขอ
        //     xhttp.send();
        // }
    </script>
</body>

</html>