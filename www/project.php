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

                    <br>
                    <div class="row">
                        <div>
                            <div class="card">
                                <div class="card-body">
                                    <h1>จัดการโครงการ</h1>
                                    <!-- Button to Open the Modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#myModal">
                                        เพิ่มโครงการ
                                    </button>

                                    <!-- The Modal -->
                                    <div class="modal" id="myModal">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title"> เพิ่มโครงการ</h4>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <form id="add_user_form" method="POST" name="id_project"
                                                        class="validated" enctype="multipart/form-data">
                                                        <input type="text" class="form-control"
                                                            placeholder="ชื่อโครงการ" name="project_name">
                                                        <br>
                                                        <!-- <input type="text" id="project_person" name="project_person"
                                                            placeholder="Enter ผู้รับชอบ..." class="form-control"> -->
                                                        <select id="project_person" name="project_person"
                                                            class="form-control">
                                                            <option selected="เพิ่มผู้รับชอบ">เพิ่มผู้รับชอบ</option>
                                                            <?php
                                                            $getalluser = $user->getalluser();
                                                            if (is_array($getalluser) || is_object($getalluser)) {
                                                                $displayedRoles = array(); // สร้างตัวแปรเพื่อเก็บค่าชื่อที่เคยแสดงแล้ว
                                                                foreach ($getalluser as $i => $rowree) {
                                                                    if (isset($rowree)) {
                                                                        $memberRole = $rowree['member_name'];
                                                                        // ตรวจสอบว่าชื่อนี้มีอยู่ในรายการที่เคยแสดงแล้วหรือไม่
                                                                        if (!in_array($memberRole, $displayedRoles)) {
                                                                            // ถ้ายังไม่มีก็แสดงชื่อนี้
                                                                            ?>
                                                                            <option
                                                                                value="<?php echo $rowree['member_name']; ?> <?php echo $rowree['member_lastname']; ?>">
                                                                                <?php echo $rowree['member_name']; ?>
                                                                                <?php echo $rowree['member_lastname']; ?>
                                                                            </option>
                                                                            <?php
                                                                            // เพิ่มชื่อนี้เข้าไปในรายการที่เคยแสดงแล้ว
                                                                            $displayedRoles[] = $memberRole;
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                        <br>
                                                        <label for="">เลือกผู้รับผิดชอบโครงการจะแสดงด้านล่าง</label>
                                                        <ul id="nameList"></ul>
                                                </div>
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary "
                                                        onclick="return add_user_form();">Save
                                                        changes</button>
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Close</button>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <table id="example" class="row-border" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>ชื่อโครงการ</th>
                                                <th>ผู้รับผิดชอบ</th>
                                                <th>จัดการ</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $getuser = $user->getallproject();
                                            if (is_array($getuser) || is_object($getuser)) {
                                                foreach ($getuser as $i => $rowre)
                                                    if (isset($rowre)) {
                                                        // print_r($rowre['project_person']);
                                                        $names = $rowre['project_person'];
                                                        // print_r($names);
                                                        // $name_array = explode(",", $names);
                                                        // print_r($name_array);
                                                        ?>
                                                        <tr>
                                                            <td width="5%">
                                                                <?php echo "" . ($i + 1); ?>
                                                            </td>
                                                            <td width="10%">
                                                                <?php echo $rowre['project_name']; ?>
                                                            </td>
                                                            <td>
                                                                <!-- <?php echo str_replace('"', "\n", $rowre['project_person']); ?> -->
                                                                <?php
                                                                if (isset($rowre['project_person'])) {

                                                                    $string = $rowre['project_person'];
                                                                    $array = json_decode($string, true);
                                                                    $value = $array['Sergio Rattanakapong'];
                                                                    echo $value;
                                                                    $desired_names = ["Kanyaporn Makonkhan", "Sergio Rattanakapong", "Sasichom Ritbanrueng", "Karachakay Intarasuwan", "Sukrit Anu", "Kanokwan Rueanthai", "Pramisa Aiemanan"];
                                                                    // var_dump($desired_names[1]);
                                                                    if (($value == $desired_names[1])) {
                                                                        // หากเป็นจริง แสดงผลลัพธ์
                                                                        echo $array[4] . "<br>";
                                                                        echo $array[5];
                                                                    } else {
                                                                        echo 'ไม่ได้กรอกข้อมูล PM , PO';
                                                                    }
                                                                }

                                                                ?>
                                                                <!-- <?php echo str_replace(['[', ']', '"'], '', $rowre['project_person']); ?> -->
                                                            </td>
                                                            <td>
                                                                <!-- <button type="button" class="btn btn-outline-primary"><i
                                                                        class="fas fa-fw fa-pencil-alt"
                                                                        aria-hidden="true"></i></button>
                                                                <button type="button" class="btn btn-outline-warning"> <i
                                                                        class="fas fa-fw fa-calendar"
                                                                        aria-hidden="true"></i></button> -->
                                                                <button type="button" class="btn btn-outline-danger"
                                                                    onclick="return delete_project(<?php echo $rowre['project_id']; ?>);">
                                                                    <i class="fas fa-fw fa-trash" aria-hidden="true"></i></button>
                                                            </td>
                                                        </tr>
                                                        <?php

                                                    }
                                            } else {
                                                // echo "ยังไม่ได้กรอกข้อมูล";
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>ชื่อโครงการ</th>
                                                <th>ผู้รับผิดชอบ</th>
                                                <th>จัดการ</th>
                                            </tr>
                                        </tfoot>
                                    </table>
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
        const input = document.getElementById('project_person');
        const nameList = document.getElementById('nameList');
        let selectedOptions = [];

        input.addEventListener('change', function (e) {
            const selectedOption = e.target.value;
            if (!selectedOptions.includes(selectedOption)) {
                selectedOptions.push(selectedOption);
                renderSelectedOptions();
            }
        });

        function add_user_form() {
            var formData = new FormData($("#add_user_form")[0]); // Use the actual form element
            selectedOptions.forEach(option => {
                formData.append('selectedOptions[]', option);
            });

            $.ajax({
                type: "POST",
                url: "connect/process.php",
                data: formData,
                processData: false, // Prevent jQuery from processing data
                contentType: false, // Prevent jQuery from setting content type
                success: function (data) {
                    //close modal
                    $(".close").trigger("click");
                    //show result
                    alert(data);
                    //reload page
                    location.reload();
                }
            });
            return false;
        }
        function delete_project(id) {
            if (confirm("คุณต้องการลบข้อมูลหรือไม่")) {
                $.ajax({
                    type: "POST",
                    url: "connect/process.php",
                    data: {
                        delete_project: id
                    },
                    success: function (data) {
                        alert(data);
                        location.reload();
                    }
                });
            }
            return false;
        }

        function renderSelectedOptions() {
            nameList.innerHTML = '';
            selectedOptions.forEach((option, index) => {
                const listItem = document.createElement('li');
                listItem.textContent = option;
                listItem.dataset.index = index;
                listItem.addEventListener('click', () => removeOption(index));
                nameList.appendChild(listItem);
            });
        }

        function removeOption(index) {
            selectedOptions.splice(index, 1);
            renderSelectedOptions();
        }

    </script>

</body>

</html>