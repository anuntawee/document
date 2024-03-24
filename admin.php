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
                                <div class="card-body">
                                    <h1>กำหนด Role-Permission</h1>
                                    <!-- Button to Open the Modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#myModal">
                                        เพิ่มผู้ใช้งาน
                                    </button>

                                    <!-- The Modal -->
                                    <div class="modal" id="myModal">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">เพิ่มผู้ใช้งาน</h4>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <form id="add_user_form" method="POST" name="id_project"
                                                        class="validated" enctype="multipart/form-data">
                                                        <div class="row text-center">
                                                            <div class="col-6">
                                                                <input type="text" class="form-control"
                                                                    placeholder="ชื่อ" name="member_name"
                                                                    id="member_name">
                                                            </div>
                                                            <div class="col-6">
                                                                <input type="text" class="form-control"
                                                                    placeholder="นามสกุล" name="member_lastname"
                                                                    id="member_lastname">
                                                            </div>
                                                            <div class="col-12">
                                                                <br>
                                                                <input type="text" class="form-control"
                                                                    placeholder="E-Mail" name="member_email">
                                                                    <input type="text" class="form-control"
                                                                    placeholder="Password" name="member_pass">
                                                                <br>
                                                                <select class="form-control" placeholder="Role"
                                                                    name="member_role" id="member_role">
                                                                    <option selected>Role</option>
                                                                    <option value="Lead Project">Lead Project </option>
                                                                    <option value="Senior Project Manager">Senior
                                                                        Project
                                                                        Manager</option>
                                                                    <option value="Project Manager">Project Manager
                                                                    </option>
                                                                    <option value="Assistant Project Manage">Assistant
                                                                        Project
                                                                        Manager</option>
                                                                    <option value="Project Coordinator">Project
                                                                        Coordinator
                                                                    </option>
                                                                    <option value="Senior Developer">Senior Developer
                                                                    </option>
                                                                    <option value="Bussiness Analyze">Bussiness Analyze
                                                                    </option>
                                                                    <option value="System Analyze">System Analyze
                                                                    </option>
                                                                    <option value="Dev-Ops Engineer">Dev-Ops Engineer
                                                                    </option>
                                                                    <option value="Data Engineer">Data Engineer</option>
                                                                    <option value="Data Engineer & AI/ML">Data Engineer
                                                                        &
                                                                        AI/ML
                                                                    </option>
                                                                    <option value="Tester">Tester</option>
                                                                    <option value="Lead UX/UI Designer">Lead UX/UI
                                                                        Designer
                                                                    </option>
                                                                    <option value="CO-Founder COO">CO-Founder COO
                                                                    </option>
                                                                    <option value="Founder CEO">Founder CEO</option>
                                                                    <option value="Founder CFO">Founder CFO</option>
                                                                    <option value="Founder CIO">Founder CIO</option>
                                                                    <option value="ADMIN">ADMIN</option>
                                                                </select>
                                                                <br>
                                                                <h4>กำหนด Role-Permission</h4>
                                                            </div>
                                                        </div>
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
                                                <th>NAME</th>
                                                <th>ROLE</th>
                                                <th>VIEW</th>
                                                <th>COMEMNT</th>
                                                <th>EDITS</th>
                                                <th>APPROVE</th>
                                                <th>SIGNOFF</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $getuser = $user->getalluser();
                                            if (is_array($getuser) || is_object($getuser)) {
                                                foreach ($getuser as $i => $rowre)
                                                    if (isset ($rowre)) {
                                                        // print_r($rowre);
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo "" . ($i + 1); ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $rowre['member_name']; ?>
                                                                <?php echo $rowre['member_lastname']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $rowre['member_role']; ?>
                                                            </td>
                                                            <div class="text-center">
                                                                <td>
                                                                    <input type="checkbox" name="view" id="view"
                                                                        value="<?php echo $rowre['member_view']; ?>"
                                                                        <?php if ($rowre['member_view'] == 1) echo "checked"; ?>
                                                                        onclick="edit_user_form(<?php echo $rowre['member_id']; ?>, this);">
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="comment" id="comment"
                                                                        value="<?php echo $rowre['member_comment']; ?>"
                                                                        <?php if ($rowre['member_comment'] == 1) echo "checked"; ?>
                                                                        onclick="edit_user_form(<?php echo $rowre['member_id']; ?>, this);">
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="edits" id="edits"
                                                                        value="<?php echo $rowre['member_edits']; ?>"
                                                                        <?php if ($rowre['member_edits'] == 1) echo "checked"; ?>
                                                                        onclick="edit_user_form(<?php echo $rowre['member_id']; ?>, this);">
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="approve" id="approve"
                                                                        value="<?php echo $rowre['member_approve']; ?>"
                                                                        <?php if ($rowre['member_approve'] == 1) echo "checked"; ?>
                                                                        onclick="edit_user_form(<?php echo $rowre['member_id']; ?>, this);">
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="signoff" id="signoff"
                                                                        value="<?php echo $rowre['member_signoff']; ?>"
                                                                        <?php if ($rowre['member_signoff'] == 1) echo "checked"; ?>
                                                                        onclick="edit_user_form(<?php echo $rowre['member_id']; ?>, this);">
                                                                </td>
                                                                <td>
                                                                    <button type="button" class="btn btn-outline-danger"
                                                                        onclick="return delete_project(<?php echo $rowre['member_id']; ?>);">
                                                                        <i class="fas fa-fw fa-trash"
                                                                            aria-hidden="true"></i></button>
                                                                </td>

                                                            </div>
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
                                                <th>NAME</th>
                                                <th>ROLE</th>
                                                <th>VIEW</th>
                                                <th>COMEMNT</th>
                                                <th>EDITS</th>
                                                <th>APPROVE</th>
                                                <th>SIGNOFF</th>
                                                <th></th>
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
        function add_user_form() {
            var formData = new FormData($("#add_user_form")[0]); // Use the actual form element
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
        document.addEventListener("DOMContentLoaded", function () {
            checkCheckbox();
        });
        function checkCheckbox() {
            var checkboxIds = ["view", "comment", "edits", "approve", "signoff"];
            checkboxIds.forEach(function (id) {
                var checkbox = document.getElementById(id);
                var valueFromPHP = checkbox.value;
                checkbox.checked = (valueFromPHP == 1);
            });
        }

        function edit_user_form(member_id, checkbox) {
            var value = checkbox.checked ? 1 : 0;
            var member_name = checkbox.name;
            // console.log("member_id: " + member_id);
            // console.log("Value: " + value);
            // console.log("member_name: " + member_name);
            var formData = new FormData();
            formData.append(member_name, value);
            formData.append('member_id', member_id);

            $.ajax({
                type: "POST",
                url: "connect/process.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    //close modal
                    $(".close").trigger("click");
                    // alert(data);
                    location.reload();
                }
            });
            return false;
        }

    </script>
</body>

</html>