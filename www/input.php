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
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="css\style.css">

</head>
<?php
// ตรวจสอบว่ามีการส่งค่า project_name และ template_name มาหรือไม่
if (isset ($_GET['project_name']) && isset ($_GET['template_name'])) {
    // นำค่าที่รับมามาใช้งาน
    $project_name = $_GET['project_name'];
    $template_name = $_GET['template_name'];
    // echo "Project Name: $project_name<br>";
    // echo "Template Name: $template_name<br>";
    // var_dump($project_name);
    // var_dump($template_name);
} else {
    // หากไม่มีค่าที่ส่งมา สามารถแสดงข้อความเตือนหรือทำสิ่งอื่นๆ ตามต้องการได้
    echo "ไม่พบข้อมูลที่ส่งมา";
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
                <?php
                include 'topbar.php';
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="">Upload เอกสาร</h1>
                    </div>
                    <br>
                    <div class="row">
                        <div>
                            <div class="card">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-6">
                                        </div>
                                        <div class="col-6">
                                            <br>
                                        </div>
                                        <div class="container">
                                            <div id="home" class="container tab-pane active"><br>
                                                <table class="table table-hover  table-bordered ">
                                                    <tbody">
                                                        <tr>
                                                            <th>
                                                                <h1>เพิ่มเอกสาร
                                                                    <?php echo "$template_name"; ?>
                                                                </h1>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <h3>ประเภท </h3>
                                                                <select name="" id="pagelist"
                                                                    class="custom-select mb-3">
                                                                    <option selected>Custom Select Menu</option>
                                                                    <option value="1">Draft</option>
                                                                    <option value="2">Review</option>
                                                                    <option value="3">Final</option>
                                                                    <option value="4">Internal Sign</option>
                                                                    <option value="5">External sign</option>
                                                                </select>
                                                            </th>
                                                        </tr>
                                                        </tbody>
                                            </div>
                                        </div>
                                        </table>
                                        <div id="1" style="display:none">
                                            <form id="add_user_form_draft" method="POST" name="upload_doc"
                                                class="validated" enctype="multipart/form-data">
                                                <h1>Upload เอกสาร Draft</h1>
                                                <input name="fileUpload" id="fileUploadDraft" type="file"
                                                    class="form-control">
                                                <input type="hidden" id="doc_status_draft" name="doc_status"
                                                    value="Draft">
                                                <!-- <input type="hidden" id="doc_project_name_draft" name="doc_project_name_draft"
                                                    value="<?php echo $rowre['project_name']; ?>"> -->
                                                <input type="hidden" id="doc_project_name_draft" name="doc_project_name"
                                                    value="<?php echo $project_name ?>">
                                                <?php
                                                $getversion = $user->getdraftdoc_version("doc_project_name = '{$project_name}' AND doc_template = '{$template_name}'");
                                                if (is_array($getversion) || is_object($getversion)) {
                                                    foreach ($getversion as $i => $rowre)
                                                        if (isset ($rowre)) {
                                                            // print_r($rowre);
                                                            ?>
                                                            <input type="hidden" id="doc_version_draft" name="doc_version"
                                                                value="<?php echo isset ($rowre['doc_version']) ? $rowre['doc_version'] : 1; ?>">
                                                            <?php
                                                        }
                                                }
                                                ?>
                                                <br>
                                                <input type="text" id="doc_project_name_draft" name="doc_project_name"
                                                    value="<?php echo $project_name ?>">
                                                <button type="button" class="btn btn-primary"
                                                    onclick="return add_user_form('Draft', '<?php echo $template_name; ?>');">SUBMIT</button>
                                            </form>
                                        </div>
                                        <div id="2" style="display:none">
                                            <form id="add_user_form_review" method="POST" name="upload_doc"
                                                class="validated" enctype="multipart/form-data">
                                                <h1>Upload เอกสาร Review</h1>
                                                <input name="fileUpload" id="fileUploadReview" type="file"
                                                    class="form-control">
                                                <input type="hidden" id="doc_status_review" name="doc_status"
                                                    value="Review">
                                                <input type="hidden" id="doc_project_name_review"
                                                    name="doc_project_name" value="<?php echo $project_name ?>">
                                                <?php
                                                $getversion = $user->getreviewdoc_version("doc_project_name = '{$project_name}' AND doc_template = '{$template_name}'");
                                                if (is_array($getversion) || is_object($getversion)) {
                                                    foreach ($getversion as $i => $rowre)
                                                        if (isset ($rowre)) {
                                                            // print_r($rowre);
                                                            ?>
                                                            <input type="hidden" id="doc_version_review" name="doc_version"
                                                                value="<?php echo isset ($rowre['doc_version']) ? $rowre['doc_version'] : 1; ?>">
                                                            <?php
                                                        }
                                                }
                                                ?>
                                                <br>
                                                <input type="text" id="doc_project_name_review" name="doc_project_name"
                                                    value="<?php echo $project_name ?>">
                                                <button type="button" class="btn btn-primary"
                                                    onclick="return add_user_form('Review', '<?php echo $template_name; ?>');">SUBMIT</button>
                                            </form>
                                            <br>
                                        </div>
                                        <div id="3" style="display:none">
                                            <form id="add_user_form_final" method="POST" name="upload_doc"
                                                class="validated" enctype="multipart/form-data">
                                                <h1>Upload เอกสาร Final</h1>
                                                <input name="fileUpload" id="fileUploadfinal" type="file"
                                                    class="form-control">
                                                <input type="hidden" id="doc_status_final" name="doc_status"
                                                    value="Final">
                                                <input type="hidden" id="doc_project_name_final" name="doc_project_name"
                                                    value="<?php echo $project_name ?>">
                                                <?php
                                                $getversion = $user->getfinaldoc_version("doc_project_name = '{$project_name}' AND doc_template = '{$template_name}'");
                                                if (is_array($getversion) || is_object($getversion)) {
                                                    foreach ($getversion as $i => $rowre)
                                                        if (isset ($rowre)) {
                                                            // print_r($rowre);
                                                            ?>
                                                            <input type="hidden" id="doc_version_final" name="doc_version"
                                                                value="<?php echo isset ($rowre['doc_version']) ? $rowre['doc_version'] : 1; ?>">
                                                            <?php
                                                        }
                                                }
                                                ?>
                                                <br>
                                                <input type="text" id="doc_project_name_final" name="doc_project_name"
                                                    value="<?php echo $project_name ?>">
                                                <button type="button" class="btn btn-primary"
                                                    onclick="return add_user_form('Final', '<?php echo $template_name; ?>');">SUBMIT</button>
                                            </form>
                                            <br>
                                        </div>
                                        <div id="4" style="display:none">
                                            <form id="add_user_form_internalsign" method="POST" name="upload_doc"
                                                class="validated" enctype="multipart/form-data">
                                                <h1>Upload เอกสาร Internal Sign</h1>
                                                <input name="fileUpload" id="fileUploadinternalsign" type="file"
                                                    class="form-control">
                                                <input type="hidden" id="doc_status_internalsign" name="doc_status"
                                                    value="InternalSign">
                                                <input type="hidden" id="doc_project_name_internalsign"
                                                    name="doc_project_name" value="<?php echo $project_name ?>">
                                                <?php
                                                $getversion = $user->getintelnaldoc_version("doc_project_name = '{$project_name}' AND doc_template = '{$template_name}'");
                                                if (is_array($getversion) || is_object($getversion)) {
                                                    foreach ($getversion as $i => $rowre)
                                                        if (isset ($rowre)) {
                                                            // print_r($rowre);
                                                            ?>
                                                            <input type="hidden" id="doc_version_internalsign" name="doc_version"
                                                                value="<?php echo isset ($rowre['doc_version']) ? $rowre['doc_version'] : 1; ?>">
                                                            <?php
                                                        }
                                                }
                                                ?>
                                                <br>
                                                <input type="text" id="doc_project_name_internalsign"
                                                    name="doc_project_name" value="<?php echo $project_name ?>">
                                                <button type="button" class="btn btn-primary"
                                                    onclick="return add_user_form('InternalSign', '<?php echo $template_name; ?>');">SUBMIT</button>
                                            </form>
                                            <br>
                                        </div>
                                        <div id="5" style="display:none">
                                            <form id="add_user_form_externasign" method="POST" name="upload_doc"
                                                class="validated" enctype="multipart/form-data">
                                                <h1>Upload เอกสาร External sign</h1>
                                                <input name="fileUpload" id="fileUploadexternalsign" type="file"
                                                    class="form-control">
                                                <input type="hidden" id="doc_status_externalsign" name="doc_status"
                                                    value="ExternaSign">
                                                <input type="hidden" id="doc_project_name_externalsign"
                                                    name="doc_project_name" value="<?php echo $project_name ?>">
                                                <?php
                                                $getversion = $user->getextelnaldoc_version("doc_project_name = '{$project_name}' AND doc_template = '{$template_name}'");
                                                if (is_array($getversion) || is_object($getversion)) {
                                                    foreach ($getversion as $i => $rowre)
                                                        if (isset ($rowre)) {
                                                            // print_r($rowre);
                                                            ?>
                                                            <input type="hidden" id="doc_version_externalsign" name="doc_version"
                                                                value="<?php echo isset ($rowre['doc_version']) ? $rowre['doc_version'] : 1; ?>">
                                                            <?php
                                                        }
                                                }
                                                ?>
                                                <br>
                                                <input type="text" id="doc_project_name_externalsign"
                                                    name="doc_project_name" value="<?php echo $project_name ?>">
                                                <button type="button" class="btn btn-primary"
                                                    onclick="return add_user_form('ExternaSign', '<?php echo $template_name; ?>');">SUBMIT</button>
                                            </form>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <a href="listdocument.php?project_name=<?php echo urlencode($project_name); ?>"><button
                                        class="btn btn-danger float-right">BACK</button> </a>

                                <br><br>
                            </div>
                            <div class="card">
                                <div class="container">
                                    <table id="example" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>NameDocument</th>
                                                <th>Document</th>
                                                <th>Status</th>
                                                <th>Version</th>
                                                <th>Timestamp</th>
                                                <!-- <th>Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $getuser = $user->getwheredoc("doc_project_name = '{$project_name}' AND doc_template = '{$template_name}'");
                                            if (is_array($getuser) || is_object($getuser)) {
                                                foreach ($getuser as $i => $rowre)
                                                    if (isset ($rowre)) {
                                                        // print_r($rowre);
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $rowre['doc_name']; ?>
                                                            </td>
                                                            <td>
                                                                <a href="document/<?php echo $rowre['doc_path']; ?>"
                                                                    download>Download
                                                                    File</a>
                                                            </td>
                                                            <td>
                                                                <?php echo $rowre['doc_status']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $rowre['doc_version']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $rowre['doc_time']; ?>
                                                            </td>
                                                            <!-- <td></td> -->
                                                        </tr>
                                                        <?php
                                                    }
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <!-- <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr> -->
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
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
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script>
        new DataTable('#example');
        $("#pagelist").change(function () {
            var viewID = $("#pagelist option:selected").val();
            $("#pagelist option").each(function () {
                var hideID = $(this).val();
                $("#" + hideID).hide();
            });
            $("#" + viewID).show();
        });

        // function add_user_form() {
        //     var formData = new FormData($("#add_user_form")[0]); // Use the actual form element
        //     $.ajax({
        //         type: "POST",
        //         url: "connect/process.php",
        //         data: formData,
        //         processData: false, // Prevent jQuery from processing data
        //         contentType: false, // Prevent jQuery from setting content type
        //         success: function (data) {
        //             //close modal
        //             $(".close").trigger("click");
        //             alert(data);
        //             console.log(data);
        //             //reload page
        //             location.reload();
        //         }
        //     });
        //     return false;
        // }
        function add_user_form(docStatus, template_name) {
            var formData;
            var fileInput;
            var docStatusInput;
            var docProjectNameInput;
            var docVersionInput;

            // เลือกฟอร์มที่ถูกแสดงอยู่
            if (docStatus === 'Draft') {
                formData = new FormData($("#add_user_form_draft")[0]); // Use the actual form element
                fileInput = $("#fileUploadDraft");
                docStatusInput = $("#doc_status_draft");
                docProjectNameInput = $("#doc_project_name_draft");
                docVersionInput = $("#doc_version_draft");

            } else if (docStatus === 'Review') {
                formData = new FormData($("#add_user_form_review")[0]); // Use the actual form element
                fileInput = $("#fileUploadReview");
                docStatusInput = $("#doc_status_review");
                docProjectNameInput = $("#doc_project_name_review");
                docVersionInput = $("#doc_version_review");
            }
            else if (docStatus === 'Final') {
                formData = new FormData($("#add_user_form_final")[0]); // Use the actual form element
                fileInput = $("#fileUploadfinal");
                docStatusInput = $("#doc_status_final");
                docProjectNameInput = $("#doc_project_name_final");
                docVersionInput = $("#doc_version_final");
            } else if (docStatus === 'InternalSign') {
                formData = new FormData($("#add_user_form_internalsign")[0]); // Use the actual form element
                fileInput = $("#fileUploadinternalsign");
                docStatusInput = $("#doc_status_internalsign");
                docProjectNameInput = $("#doc_project_name_internalsign");
                docVersionInput = $("#doc_version_internalsign");
            } else if (docStatus === 'ExternaSign') {
                formData = new FormData($("#add_user_form_externasign")[0]); // Use the actual form element
                fileInput = $("#fileUploadexternalsign");
                docStatusInput = $("#doc_status_externalsign");
                docProjectNameInput = $("#doc_project_name_externalsign");
                docVersionInput = $("#doc_version_externalsign");
            }
            var currentVersion = parseInt(docVersionInput.val());
            formData.append('doc_version', currentVersion + 1);
            formData.append('template_name', template_name);
            docStatusInput.val(docStatus);
            $.ajax({
                type: "POST",
                url: "connect/process.php",
                data: formData,
                processData: false, // Prevent jQuery from processing data
                contentType: false, // Prevent jQuery from setting content type
                success: function (data) {
                    //close modal
                    $(".close").trigger("click");
                    alert(data);
                    console.log(data);
                    //reload page
                    location.reload();
                }
            });
            return false;
        }
    </script>

</body>

</html>