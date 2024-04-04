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
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

</head>
<?php
if (isset($_GET['project_name'])) {
    $project_name = $_GET['project_name'];
    // var_dump($project_name);
}
include 'connect/function.php';
$user = new User();
?>
<style>
    .invalid {
        background-color: #ffcccc;
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
                <?php
                include 'topbar.php';
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="row ">
                        <div class="card" id="card2">
                            <div class="container-flure">
                                <div class="row">
                                    <div class="card-body">
                                        <h1 class="text-center">Show
                                            Time plan</h1>
                                        <div class="col-2">
                                            <div class="row">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#myModal">
                                                    Input Time plan
                                                </button>


                                                <div class="modal" id="myModal">
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">

                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Input Time plan</h4>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"></button>
                                                            </div>

                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                                <div class="card" id="card1">
                                                                    <div class="container">
                                                                        <div class="row">
                                                                            <div class="card-body">
                                                                                <h1 class="text-center">Input
                                                                                    Time plan</h1>
                                                                                <div class="container">
                                                                                    <div class="row">
                                                                                        <div class="col-12">

                                                                                            <form id="add_user_form"
                                                                                                method="POST"
                                                                                                name="timeplan_id"
                                                                                                class="validated"
                                                                                                enctype="multipart/form-data">
                                                                                                แบบฟอร์มข้อมูล |
                                                                                                วันกำหนดโครงการ
                                                                                                <div class="row">
                                                                                                    <div class="col-4">
                                                                                                        <br><br>
                                                                                                        <h4>1. Get
                                                                                                            Requirement
                                                                                                        </h4>
                                                                                                        <input
                                                                                                            type="hidden"
                                                                                                            name="timeplan_status_name"
                                                                                                            id="timeplan_status_name"
                                                                                                            value="1.Get Requirement">
                                                                                                    </div>
                                                                                                    <div class="col-4">
                                                                                                        <div
                                                                                                            class="container">
                                                                                                            <div
                                                                                                                class="row align-items-center justify-content-center">
                                                                                                                <div
                                                                                                                    class="col-md-12 text-center mb-5">
                                                                                                                    วันกำหนดแผน
                                                                                                                    <div
                                                                                                                        class="row">
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            วันเริ่ม
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            วันสิ้นสุด
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            <input
                                                                                                                                type="date"
                                                                                                                                class="form-control"
                                                                                                                                name="timeplan_re_getstart"
                                                                                                                                id="timeplan_re_getstart">
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            <input
                                                                                                                                type="date"
                                                                                                                                class="form-control"
                                                                                                                                name="timeplan_re_getend"
                                                                                                                                id="timeplan_re_getend">
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-12">
                                                                                                                            ผู้รับผิดชอบ
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-12">
                                                                                                                            <select
                                                                                                                                name="timeplan_re_getname"
                                                                                                                                id="timeplan_re_getname"
                                                                                                                                class="form-control me-1"
                                                                                                                                required>
                                                                                                                                <option
                                                                                                                                    selected>
                                                                                                                                    รายชื่อพนักงาน
                                                                                                                                </option>
                                                                                                                                <?php
                                                                                                                                $getuser = $user->getalluser();
                                                                                                                                if (is_array($getuser) || is_object($getuser)) {
                                                                                                                                    foreach ($getuser as $i => $rowre)
                                                                                                                                        if (isset($rowre)) {
                                                                                                                                            // print_r($rowre);
                                                                                                                                            ?>
                                                                                                                                            <option
                                                                                                                                                value=" <?php echo $rowre['member_name']; ?>
                                                                                                            <?php echo $rowre['member_lastname']; ?>">
                                                                                                                                                <?php echo $rowre['member_name']; ?>
                                                                                                                                                <?php echo $rowre['member_lastname']; ?>
                                                                                                                                            </option>
                                                                                                                                            <?php
                                                                                                                                        }
                                                                                                                                }
                                                                                                                                ?>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-4">
                                                                                                        <div
                                                                                                            class="container">
                                                                                                            <div
                                                                                                                class="row align-items-center justify-content-center">
                                                                                                                <div
                                                                                                                    class="col-md-12 text-center mb-5">
                                                                                                                    วันปฎิบัติการ
                                                                                                                    <div
                                                                                                                        class="row">
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            วันเริ่ม
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            วันสิ้นสุด
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            <input
                                                                                                                                type="date"
                                                                                                                                class="form-control"
                                                                                                                                name="timeplan_re_workstart"
                                                                                                                                id="timeplan_re_workstart">
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            <input
                                                                                                                                type="date"
                                                                                                                                class="form-control"
                                                                                                                                name="timeplan_re_workend"
                                                                                                                                id="timeplan_re_workend">
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-12">
                                                                                                                            ผู้รับผิดชอบ
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-12">
                                                                                                                            <select
                                                                                                                                name="timeplan_re_workname"
                                                                                                                                id="timeplan_re_workname"
                                                                                                                                class="form-control me-1">
                                                                                                                                <option
                                                                                                                                    select>
                                                                                                                                    รายชื่อพนักงาน
                                                                                                                                </option>
                                                                                                                                <?php
                                                                                                                                foreach ($getuser as $i => $rowre)
                                                                                                                                    if (isset($rowre)) {
                                                                                                                                        // print_r($rowre);
                                                                                                                                        ?>
                                                                                                                                        <option
                                                                                                                                            value="<?php echo $rowre['member_name']; ?>
                                                                                                                            <?php echo $rowre['member_lastname']; ?>">
                                                                                                                                            <?php echo $rowre['member_name']; ?>
                                                                                                                                            <?php echo $rowre['member_lastname']; ?>
                                                                                                                                        </option>
                                                                                                                                        <?php
                                                                                                                                    }
                                                                                                                                ?>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <hr>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-4">
                                                                                                        <br><br>
                                                                                                        <h4>2. เสนอ
                                                                                                            Proposal
                                                                                                            พร้อมแนบ QO
                                                                                                        </h4>
                                                                                                        <input
                                                                                                            type="hidden"
                                                                                                            name="timeplan_status_name_2"
                                                                                                            id="timeplan_status_name_2"
                                                                                                            value="2.เสนอ Proposal พร้อมแนบ QO">
                                                                                                    </div>
                                                                                                    <div class="col-4">
                                                                                                        <div
                                                                                                            class="container">
                                                                                                            <div
                                                                                                                class="row align-items-center justify-content-center">
                                                                                                                <div
                                                                                                                    class="col-md-12 text-center mb-5">
                                                                                                                    วันกำหนดแผน
                                                                                                                    <div
                                                                                                                        class="row">
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            วันเริ่ม
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            วันสิ้นสุด
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            <input
                                                                                                                                type="date"
                                                                                                                                class="form-control"
                                                                                                                                name="timeplan_pro_getstart"
                                                                                                                                id="timeplan_pro_getstart">
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            <input
                                                                                                                                type="date"
                                                                                                                                class="form-control"
                                                                                                                                name="timeplan_pro_getend"
                                                                                                                                id="timeplan_pro_getend">
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-12">
                                                                                                                            ผู้รับผิดชอบ
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-12">
                                                                                                                            <select
                                                                                                                                name="timeplan_pro_getname"
                                                                                                                                id="timeplan_pro_getname"
                                                                                                                                class="form-control me-1">
                                                                                                                                <option
                                                                                                                                    select>
                                                                                                                                    รายชื่อพนักงาน
                                                                                                                                </option>
                                                                                                                                <?php
                                                                                                                                foreach ($getuser as $i => $rowre)
                                                                                                                                    if (isset($rowre)) {
                                                                                                                                        // print_r($rowre);
                                                                                                                                        ?>
                                                                                                                                        <option
                                                                                                                                            value="<?php echo $rowre['member_name']; ?>
                                                                                                                            <?php echo $rowre['member_lastname']; ?>">
                                                                                                                                            <?php echo $rowre['member_name']; ?>
                                                                                                                                            <?php echo $rowre['member_lastname']; ?>
                                                                                                                                        </option>
                                                                                                                                        <?php
                                                                                                                                    }
                                                                                                                                ?>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-4">
                                                                                                        <div
                                                                                                            class="container">
                                                                                                            <div
                                                                                                                class="row align-items-center justify-content-center">
                                                                                                                <div
                                                                                                                    class="col-md-12 text-center mb-5">
                                                                                                                    วันปฎิบัติการ
                                                                                                                    <div
                                                                                                                        class="row">
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            วันเริ่ม
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            วันสิ้นสุด
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            <input
                                                                                                                                type="date"
                                                                                                                                class="form-control"
                                                                                                                                name="timeplan_pro_workstart"
                                                                                                                                id="timeplan_pro_workstart">
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            <input
                                                                                                                                type="date"
                                                                                                                                class="form-control"
                                                                                                                                name="timeplan_pro_workend"
                                                                                                                                id="timeplan_pro_workend">
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-12">
                                                                                                                            ผู้รับผิดชอบ
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-12">

                                                                                                                            <select
                                                                                                                                name="timeplan_pro_workname"
                                                                                                                                id="timeplan_pro_workname"
                                                                                                                                class="form-control me-1">
                                                                                                                                <option
                                                                                                                                    select>
                                                                                                                                    รายชื่อพนักงาน
                                                                                                                                </option>
                                                                                                                                <?php
                                                                                                                                foreach ($getuser as $i => $rowre)
                                                                                                                                    if (isset($rowre)) {
                                                                                                                                        // print_r($rowre);
                                                                                                                                        ?>
                                                                                                                                        <option
                                                                                                                                            value="<?php echo $rowre['member_name']; ?>
                                                                                                                            <?php echo $rowre['member_lastname']; ?>">
                                                                                                                                            <?php echo $rowre['member_name']; ?>
                                                                                                                                            <?php echo $rowre['member_lastname']; ?>
                                                                                                                                        </option>
                                                                                                                                        <?php
                                                                                                                                    }
                                                                                                                                ?>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <hr>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-4">
                                                                                                        <br><br>
                                                                                                        <h4>3. Sign OQ
                                                                                                            และจัดทำเอกสารเพื่อ
                                                                                                            Kick
                                                                                                            off
                                                                                                            project</h4>
                                                                                                        <input
                                                                                                            type="hidden"
                                                                                                            name="timeplan_status_name_3"
                                                                                                            id="timeplan_status_name_3"
                                                                                                            value="3.Sign OQ และจัดทำเอกสารเพื่อ Kick off
                                                                        project">
                                                                                                    </div>
                                                                                                    <div class="col-4">
                                                                                                        <div
                                                                                                            class="container">
                                                                                                            <div
                                                                                                                class="row align-items-center justify-content-center">
                                                                                                                <div
                                                                                                                    class="col-md-12 text-center mb-5">
                                                                                                                    วันกำหนดแผน
                                                                                                                    <div
                                                                                                                        class="row">
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            วันเริ่ม
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            วันสิ้นสุด
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            <input
                                                                                                                                type="date"
                                                                                                                                class="form-control"
                                                                                                                                name="timeplan_sing_getstart"
                                                                                                                                id="timeplan_sing_getstart">
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            <input
                                                                                                                                type="date"
                                                                                                                                class="form-control"
                                                                                                                                name="timeplan_sing_getend"
                                                                                                                                id="timeplan_sing_getend">
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-12">
                                                                                                                            ผู้รับผิดชอบ
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-12">
                                                                                                                            <select
                                                                                                                                name="timeplan_sing_getname"
                                                                                                                                id="timeplan_sing_getname"
                                                                                                                                class="form-control me-1">
                                                                                                                                <option
                                                                                                                                    select>
                                                                                                                                    รายชื่อพนักงาน
                                                                                                                                </option>
                                                                                                                                <?php
                                                                                                                                foreach ($getuser as $i => $rowre)
                                                                                                                                    if (isset($rowre)) {
                                                                                                                                        // print_r($rowre);
                                                                                                                                        ?>
                                                                                                                                        <option
                                                                                                                                            value="<?php echo $rowre['member_name']; ?>
                                                                                                                            <?php echo $rowre['member_lastname']; ?>">
                                                                                                                                            <?php echo $rowre['member_name']; ?>
                                                                                                                                            <?php echo $rowre['member_lastname']; ?>
                                                                                                                                        </option>
                                                                                                                                        <?php
                                                                                                                                    }
                                                                                                                                ?>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-4">
                                                                                                        <div
                                                                                                            class="container">
                                                                                                            <div
                                                                                                                class="row align-items-center justify-content-center">
                                                                                                                <div
                                                                                                                    class="col-md-12 text-center mb-5">
                                                                                                                    วันปฎิบัติการ
                                                                                                                    <div
                                                                                                                        class="row">
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            วันเริ่ม
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            วันสิ้นสุด
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            <input
                                                                                                                                type="date"
                                                                                                                                class="form-control"
                                                                                                                                name="timeplan_sing_workstart"
                                                                                                                                id="timeplan_sing_workstart">
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            <input
                                                                                                                                type="date"
                                                                                                                                class="form-control"
                                                                                                                                name="timeplan_sing_workend"
                                                                                                                                id="timeplan_sing_workend">
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-12">
                                                                                                                            ผู้รับผิดชอบ
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-12">
                                                                                                                            <select
                                                                                                                                name="timeplan_sing_workname"
                                                                                                                                id="timeplan_sing_workname"
                                                                                                                                class="form-control me-1">
                                                                                                                                <option
                                                                                                                                    select>
                                                                                                                                    รายชื่อพนักงาน
                                                                                                                                </option>
                                                                                                                                <?php
                                                                                                                                foreach ($getuser as $i => $rowre)
                                                                                                                                    if (isset($rowre)) {
                                                                                                                                        // print_r($rowre);
                                                                                                                                        ?>
                                                                                                                                        <option
                                                                                                                                            value="<?php echo $rowre['member_name']; ?>
                                                                                                                            <?php echo $rowre['member_lastname']; ?>">
                                                                                                                                            <?php echo $rowre['member_name']; ?>
                                                                                                                                            <?php echo $rowre['member_lastname']; ?>
                                                                                                                                        </option>
                                                                                                                                        <?php
                                                                                                                                    }
                                                                                                                                ?>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <hr>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-4">
                                                                                                        <br><br>
                                                                                                        <h4>4.
                                                                                                            Development
                                                                                                            Phase</h4>
                                                                                                        <input
                                                                                                            type="hidden"
                                                                                                            name="timeplan_status_name_4"
                                                                                                            id="timeplan_status_name_4"
                                                                                                            value="4.Development Phase">
                                                                                                    </div>
                                                                                                    <div class="col-4">
                                                                                                        <div
                                                                                                            class="container">
                                                                                                            <div
                                                                                                                class="row align-items-center justify-content-center">
                                                                                                                <div
                                                                                                                    class="col-md-12 text-center mb-5">
                                                                                                                    วันกำหนดแผน
                                                                                                                    <div
                                                                                                                        class="row">
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            วันเริ่ม
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            วันสิ้นสุด
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            <input
                                                                                                                                type="date"
                                                                                                                                class="form-control"
                                                                                                                                name="timeplan_dev_getstart"
                                                                                                                                id="timeplan_dev_getstart">
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            <input
                                                                                                                                type="date"
                                                                                                                                class="form-control"
                                                                                                                                name="timeplan_dev_getend"
                                                                                                                                id="timeplan_dev_getend">
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-12">
                                                                                                                            ผู้รับผิดชอบ
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-12">
                                                                                                                            <select
                                                                                                                                name="timeplan_dev_getname"
                                                                                                                                id="timeplan_dev_getname"
                                                                                                                                class="form-control me-1">
                                                                                                                                <option
                                                                                                                                    select>
                                                                                                                                    รายชื่อพนักงาน
                                                                                                                                </option>
                                                                                                                                <?php
                                                                                                                                foreach ($getuser as $i => $rowre)
                                                                                                                                    if (isset($rowre)) {
                                                                                                                                        // print_r($rowre);
                                                                                                                                        ?>
                                                                                                                                        <option
                                                                                                                                            value="<?php echo $rowre['member_name']; ?>
                                                                                                                            <?php echo $rowre['member_lastname']; ?>">
                                                                                                                                            <?php echo $rowre['member_name']; ?>
                                                                                                                                            <?php echo $rowre['member_lastname']; ?>
                                                                                                                                        </option>
                                                                                                                                        <?php
                                                                                                                                    }
                                                                                                                                ?>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-4">
                                                                                                        <div
                                                                                                            class="container">
                                                                                                            <div
                                                                                                                class="row align-items-center justify-content-center">
                                                                                                                <div
                                                                                                                    class="col-md-12 text-center mb-5">
                                                                                                                    วันปฎิบัติการ
                                                                                                                    <div
                                                                                                                        class="row">
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            วันเริ่ม
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            วันสิ้นสุด
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            <input
                                                                                                                                type="date"
                                                                                                                                class="form-control"
                                                                                                                                name="timeplan_dev_workstart"
                                                                                                                                id="timeplan_dev_workstart">
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            <input
                                                                                                                                type="date"
                                                                                                                                class="form-control"
                                                                                                                                name="timeplan_dev_workend"
                                                                                                                                id="timeplan_dev_workend">
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-12">
                                                                                                                            ผู้รับผิดชอบ
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-12">
                                                                                                                            <select
                                                                                                                                name="timeplan_dev_workname"
                                                                                                                                id="timeplan_dev_workname"
                                                                                                                                class="form-control me-1">
                                                                                                                                <option
                                                                                                                                    select>
                                                                                                                                    รายชื่อพนักงาน
                                                                                                                                </option>
                                                                                                                                <?php
                                                                                                                                foreach ($getuser as $i => $rowre)
                                                                                                                                    if (isset($rowre)) {
                                                                                                                                        // print_r($rowre);
                                                                                                                                        ?>
                                                                                                                                        <option
                                                                                                                                            value="<?php echo $rowre['member_name']; ?>
                                                                                                                            <?php echo $rowre['member_lastname']; ?>">
                                                                                                                                            <?php echo $rowre['member_name']; ?>
                                                                                                                                            <?php echo $rowre['member_lastname']; ?>
                                                                                                                                        </option>
                                                                                                                                        <?php
                                                                                                                                    }
                                                                                                                                ?>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <hr>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-4">
                                                                                                        <br><br>
                                                                                                        <h4>5. SIT</h4>
                                                                                                        <input
                                                                                                            type="hidden"
                                                                                                            name="timeplan_status_name_5"
                                                                                                            id="timeplan_status_name_5"
                                                                                                            value="5.SIT">
                                                                                                    </div>
                                                                                                    <div class="col-4">
                                                                                                        <div
                                                                                                            class="container">
                                                                                                            <div
                                                                                                                class="row align-items-center justify-content-center">
                                                                                                                <div
                                                                                                                    class="col-md-12 text-center mb-5">
                                                                                                                    วันกำหนดแผน
                                                                                                                    <div
                                                                                                                        class="row">
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            วันเริ่ม
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            วันสิ้นสุด
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            <input
                                                                                                                                type="date"
                                                                                                                                class="form-control"
                                                                                                                                name="timeplan_sit_getstart"
                                                                                                                                id="timeplan_sit_getstart">
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            <input
                                                                                                                                type="date"
                                                                                                                                class="form-control"
                                                                                                                                name="timeplan_sit_getend"
                                                                                                                                id="timeplan_sit_getend">
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-12">
                                                                                                                            ผู้รับผิดชอบ
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-12">
                                                                                                                            <select
                                                                                                                                name="timeplan_sit_getname"
                                                                                                                                id="timeplan_sit_getname"
                                                                                                                                class="form-control me-1">
                                                                                                                                <option
                                                                                                                                    select>
                                                                                                                                    รายชื่อพนักงาน
                                                                                                                                </option>
                                                                                                                                <?php
                                                                                                                                foreach ($getuser as $i => $rowre)
                                                                                                                                    if (isset($rowre)) {
                                                                                                                                        // print_r($rowre);
                                                                                                                                        ?>
                                                                                                                                        <option
                                                                                                                                            value="<?php echo $rowre['member_name']; ?>
                                                                                                                            <?php echo $rowre['member_lastname']; ?>">
                                                                                                                                            <?php echo $rowre['member_name']; ?>
                                                                                                                                            <?php echo $rowre['member_lastname']; ?>
                                                                                                                                        </option>
                                                                                                                                        <?php
                                                                                                                                    }
                                                                                                                                ?>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-4">
                                                                                                        <div
                                                                                                            class="container">
                                                                                                            <div
                                                                                                                class="row align-items-center justify-content-center">
                                                                                                                <div
                                                                                                                    class="col-md-12 text-center mb-5">
                                                                                                                    วันปฎิบัติการ
                                                                                                                    <div
                                                                                                                        class="row">
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            วันเริ่ม
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            วันสิ้นสุด
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            <input
                                                                                                                                type="date"
                                                                                                                                class="form-control"
                                                                                                                                name="timeplan_sit_workstart"
                                                                                                                                id="timeplan_sit_workstart">
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            <input
                                                                                                                                type="date"
                                                                                                                                class="form-control"
                                                                                                                                name="timeplan_sit_workend"
                                                                                                                                id="timeplan_sit_workend">
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-12">
                                                                                                                            ผู้รับผิดชอบ
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-12">
                                                                                                                            <select
                                                                                                                                name="timeplan_sit_workname"
                                                                                                                                id="timeplan_sit_workname"
                                                                                                                                class="form-control me-1">
                                                                                                                                <option
                                                                                                                                    select>
                                                                                                                                    รายชื่อพนักงาน
                                                                                                                                </option>
                                                                                                                                <?php
                                                                                                                                foreach ($getuser as $i => $rowre)
                                                                                                                                    if (isset($rowre)) {
                                                                                                                                        // print_r($rowre);
                                                                                                                                        ?>
                                                                                                                                        <option
                                                                                                                                            value="<?php echo $rowre['member_name']; ?>
                                                                                                                            <?php echo $rowre['member_lastname']; ?>">
                                                                                                                                            <?php echo $rowre['member_name']; ?>
                                                                                                                                            <?php echo $rowre['member_lastname']; ?>
                                                                                                                                        </option>
                                                                                                                                        <?php
                                                                                                                                    }
                                                                                                                                ?>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <hr>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-4">
                                                                                                        <br><br>
                                                                                                        <h4>6. Internal
                                                                                                            Test</h4>
                                                                                                        <input
                                                                                                            type="hidden"
                                                                                                            name="timeplan_status_name_6"
                                                                                                            id="timeplan_status_name_6"
                                                                                                            value="6.Internal Test">
                                                                                                    </div>
                                                                                                    <div class="col-4">
                                                                                                        <div
                                                                                                            class="container">
                                                                                                            <div
                                                                                                                class="row align-items-center justify-content-center">
                                                                                                                <div
                                                                                                                    class="col-md-12 text-center mb-5">
                                                                                                                    วันกำหนดแผน
                                                                                                                    <div
                                                                                                                        class="row">
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            วันเริ่ม
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            วันสิ้นสุด
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            <input
                                                                                                                                type="date"
                                                                                                                                class="form-control"
                                                                                                                                name="timeplan_inter_getstart"
                                                                                                                                id="timeplan_inter_getstart">
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            <input
                                                                                                                                type="date"
                                                                                                                                class="form-control"
                                                                                                                                name="timeplan_inter_getend"
                                                                                                                                id="timeplan_inter_getend">
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-12">
                                                                                                                            ผู้รับผิดชอบ
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-12">

                                                                                                                            <select
                                                                                                                                name="timeplan_inter_getname"
                                                                                                                                id="timeplan_inter_getname"
                                                                                                                                class="form-control me-1">
                                                                                                                                <option
                                                                                                                                    select>
                                                                                                                                    รายชื่อพนักงาน
                                                                                                                                </option>
                                                                                                                                <?php
                                                                                                                                foreach ($getuser as $i => $rowre)
                                                                                                                                    if (isset($rowre)) {
                                                                                                                                        // print_r($rowre);
                                                                                                                                        ?>
                                                                                                                                        <option
                                                                                                                                            value="<?php echo $rowre['member_name']; ?>
                                                                                                                            <?php echo $rowre['member_lastname']; ?>">
                                                                                                                                            <?php echo $rowre['member_name']; ?>
                                                                                                                                            <?php echo $rowre['member_lastname']; ?>
                                                                                                                                        </option>
                                                                                                                                        <?php
                                                                                                                                    }
                                                                                                                                ?>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-4">
                                                                                                        <div
                                                                                                            class="container">
                                                                                                            <div
                                                                                                                class="row align-items-center justify-content-center">
                                                                                                                <div
                                                                                                                    class="col-md-12 text-center mb-5">
                                                                                                                    วันปฎิบัติการ
                                                                                                                    <div
                                                                                                                        class="row">
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            วันเริ่ม
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            วันสิ้นสุด
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            <input
                                                                                                                                type="date"
                                                                                                                                class="form-control"
                                                                                                                                name="timeplan_inter_workstart"
                                                                                                                                id="timeplan_inter_workstart">
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            <input
                                                                                                                                type="date"
                                                                                                                                class="form-control"
                                                                                                                                name="timeplan_inter_workend"
                                                                                                                                id="timeplan_inter_workend">
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-12">
                                                                                                                            ผู้รับผิดชอบ
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-12">
                                                                                                                            <select
                                                                                                                                name="timeplan_inter_workname"
                                                                                                                                id="timeplan_inter_workname"
                                                                                                                                class="form-control me-1">
                                                                                                                                <option
                                                                                                                                    select>
                                                                                                                                    รายชื่อพนักงาน
                                                                                                                                </option>
                                                                                                                                <?php
                                                                                                                                foreach ($getuser as $i => $rowre)
                                                                                                                                    if (isset($rowre)) {
                                                                                                                                        // print_r($rowre);
                                                                                                                                        ?>
                                                                                                                                        <option
                                                                                                                                            value="<?php echo $rowre['member_name']; ?>
                                                                                                                            <?php echo $rowre['member_lastname']; ?>">
                                                                                                                                            <?php echo $rowre['member_name']; ?>
                                                                                                                                            <?php echo $rowre['member_lastname']; ?>
                                                                                                                                        </option>
                                                                                                                                        <?php
                                                                                                                                    }
                                                                                                                                ?>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <hr>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-4">
                                                                                                        <br><br>
                                                                                                        <h4>7. User
                                                                                                            Acceptance
                                                                                                            Test</h4>
                                                                                                        <input
                                                                                                            type="hidden"
                                                                                                            name="timeplan_status_name_7"
                                                                                                            id="timeplan_status_name_7"
                                                                                                            value="7.User Acceptance Test">
                                                                                                    </div>
                                                                                                    <div class="col-4">
                                                                                                        <div
                                                                                                            class="container">
                                                                                                            <div
                                                                                                                class="row align-items-center justify-content-center">
                                                                                                                <div
                                                                                                                    class="col-md-12 text-center mb-5">
                                                                                                                    วันกำหนดแผน
                                                                                                                    <div
                                                                                                                        class="row">
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            วันเริ่ม
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            วันสิ้นสุด
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            <input
                                                                                                                                type="date"
                                                                                                                                class="form-control"
                                                                                                                                name="timeplan_user_getstart"
                                                                                                                                id="timeplan_user_getstart">
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            <input
                                                                                                                                type="date"
                                                                                                                                class="form-control"
                                                                                                                                name="timeplan_user_getend"
                                                                                                                                id="timeplan_user_getend">
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-12">
                                                                                                                            ผู้รับผิดชอบ
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-12">
                                                                                                                            <select
                                                                                                                                name="timeplan_user_getname"
                                                                                                                                id="timeplan_user_getname"
                                                                                                                                class="form-control me-1">
                                                                                                                                <option
                                                                                                                                    select>
                                                                                                                                    รายชื่อพนักงาน
                                                                                                                                </option>
                                                                                                                                <?php
                                                                                                                                foreach ($getuser as $i => $rowre)
                                                                                                                                    if (isset($rowre)) {
                                                                                                                                        // print_r($rowre);
                                                                                                                                        ?>
                                                                                                                                        <option
                                                                                                                                            value="<?php echo $rowre['member_name']; ?>
                                                                                                                            <?php echo $rowre['member_lastname']; ?>">
                                                                                                                                            <?php echo $rowre['member_name']; ?>
                                                                                                                                            <?php echo $rowre['member_lastname']; ?>
                                                                                                                                        </option>
                                                                                                                                        <?php
                                                                                                                                    }
                                                                                                                                ?>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-4">
                                                                                                        <div
                                                                                                            class="container">
                                                                                                            <div
                                                                                                                class="row align-items-center justify-content-center">
                                                                                                                <div
                                                                                                                    class="col-md-12 text-center mb-5">
                                                                                                                    วันปฎิบัติการ
                                                                                                                    <div
                                                                                                                        class="row">
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            วันเริ่ม
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            วันสิ้นสุด
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            <input
                                                                                                                                type="date"
                                                                                                                                class="form-control"
                                                                                                                                name="timeplan_user_workstart"
                                                                                                                                id="timeplan_user_workstart">
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            <input
                                                                                                                                type="date"
                                                                                                                                class="form-control"
                                                                                                                                name="timeplan_user_workend"
                                                                                                                                id="timeplan_user_workend">
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-12">
                                                                                                                            ผู้รับผิดชอบ
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-12">
                                                                                                                            <select
                                                                                                                                name="timeplan_user_workname"
                                                                                                                                id="timeplan_user_workname"
                                                                                                                                class="form-control me-1">
                                                                                                                                <option
                                                                                                                                    select>
                                                                                                                                    รายชื่อพนักงาน
                                                                                                                                </option>
                                                                                                                                <?php
                                                                                                                                foreach ($getuser as $i => $rowre)
                                                                                                                                    if (isset($rowre)) {
                                                                                                                                        // print_r($rowre);
                                                                                                                                        ?>
                                                                                                                                        <option
                                                                                                                                            value="<?php echo $rowre['member_name']; ?>
                                                                                                                            <?php echo $rowre['member_lastname']; ?>">
                                                                                                                                            <?php echo $rowre['member_name']; ?>
                                                                                                                                            <?php echo $rowre['member_lastname']; ?>
                                                                                                                                        </option>
                                                                                                                                        <?php
                                                                                                                                    }
                                                                                                                                ?>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <hr>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-4">
                                                                                                        <br><br>
                                                                                                        <h4>8. ส่งมอบงาน
                                                                                                        </h4>
                                                                                                        <input
                                                                                                            type="hidden"
                                                                                                            name="timeplan_status_name_8"
                                                                                                            id="timeplan_status_name_8"
                                                                                                            value="8.ส่งมอบงาน">
                                                                                                    </div>
                                                                                                    <div class="col-4">
                                                                                                        <div
                                                                                                            class="container">
                                                                                                            <div
                                                                                                                class="row align-items-center justify-content-center">
                                                                                                                <div
                                                                                                                    class="col-md-12 text-center mb-5">
                                                                                                                    วันกำหนดแผน
                                                                                                                    <div
                                                                                                                        class="row">
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            วันเริ่ม
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            วันสิ้นสุด
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            <input
                                                                                                                                type="date"
                                                                                                                                class="form-control"
                                                                                                                                name="timeplan_end_getstart"
                                                                                                                                id="timeplan_end_getstart">
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            <input
                                                                                                                                type="date"
                                                                                                                                class="form-control"
                                                                                                                                name="timeplan_end_getend"
                                                                                                                                id="timeplan_end_getend">
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-12">
                                                                                                                            ผู้รับผิดชอบ
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-12">
                                                                                                                            <select
                                                                                                                                name="timeplan_end_getname"
                                                                                                                                id="timeplan_end_getname"
                                                                                                                                class="form-control me-1">
                                                                                                                                <option
                                                                                                                                    select>
                                                                                                                                    รายชื่อพนักงาน
                                                                                                                                </option>
                                                                                                                                <?php
                                                                                                                                foreach ($getuser as $i => $rowre)
                                                                                                                                    if (isset($rowre)) {
                                                                                                                                        // print_r($rowre);
                                                                                                                                        ?>
                                                                                                                                        <option
                                                                                                                                            value="<?php echo $rowre['member_name']; ?>
                                                                                                                            <?php echo $rowre['member_lastname']; ?>">
                                                                                                                                            <?php echo $rowre['member_name']; ?>
                                                                                                                                            <?php echo $rowre['member_lastname']; ?>
                                                                                                                                        </option>
                                                                                                                                        <?php
                                                                                                                                    }
                                                                                                                                ?>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-4">
                                                                                                        <div
                                                                                                            class="container">
                                                                                                            <div
                                                                                                                class="row align-items-center justify-content-center">
                                                                                                                <div
                                                                                                                    class="col-md-12 text-center mb-5">
                                                                                                                    วันปฎิบัติการ
                                                                                                                    <div
                                                                                                                        class="row">
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            วันเริ่ม
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            วันสิ้นสุด
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            <input
                                                                                                                                type="date"
                                                                                                                                class="form-control"
                                                                                                                                name="timeplan_end_workstart"
                                                                                                                                id="timeplan_end_workstart">
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-6">
                                                                                                                            <input
                                                                                                                                type="date"
                                                                                                                                class="form-control"
                                                                                                                                name="timeplan_end_workend"
                                                                                                                                id="timeplan_end_workend">
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-12">
                                                                                                                            ผู้รับผิดชอบ
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-12">
                                                                                                                            <select
                                                                                                                                name="timeplan_end_workname"
                                                                                                                                id="timeplan_end_workname"
                                                                                                                                class="form-control me-1">
                                                                                                                                <option
                                                                                                                                    select>
                                                                                                                                    รายชื่อพนักงาน
                                                                                                                                </option>
                                                                                                                                <?php
                                                                                                                                foreach ($getuser as $i => $rowre)
                                                                                                                                    if (isset($rowre)) {
                                                                                                                                        // print_r($rowre);
                                                                                                                                        ?>
                                                                                                                                        <option
                                                                                                                                            value="<?php echo $rowre['member_name']; ?>
                                                                                                                            <?php echo $rowre['member_lastname']; ?>">
                                                                                                                                            <?php echo $rowre['member_name']; ?>
                                                                                                                                            <?php echo $rowre['member_lastname']; ?>
                                                                                                                                        </option>
                                                                                                                                        <?php
                                                                                                                                    }
                                                                                                                                ?>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <input type="hidden"
                                                                                                    id="timeplan_project_name"
                                                                                                    name="timeplan_project_name"
                                                                                                    value="<?php echo $project_name; ?>">
                                                                                                <div
                                                                                                    class="d-flex justify-content-end">
                                                                                                    <button
                                                                                                        type="button"
                                                                                                        class="btn btn-primary"
                                                                                                        onclick="return checkdata();">SUBMIT</button>
                                                                                                    <!-- <button type="button" class="btn btn-primary"
                                                                    onclick="return add_user_form();">SUBMIT</button> -->
                                                                                                    <br>
                                                                                                </div>
                                                                                            </form>


                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger"
                                                                    data-bs-dismiss="modal">Close</button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                            </div>
                                        </div>
                                        <div class="col-10">

                                        </div>
                                        <br>
                                        <table id="example" class="row-border" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>รายละเอียดโครงการ</th>
                                                    <th>วันที่เริ่มกำหนดแผน</th>
                                                    <th>วันสิ้นสุดกำหนดแผน</th>
                                                    <th>ชื่อผู้รับผิดชอบกำหนดแผน</th>
                                                    <th>วันที่เริ่มปฎับัติการ</th>
                                                    <th>วันสิ้นสุดปฎับัติการ</th>
                                                    <th>ชื่อผู้รับผิดชอบปฎิบัติการ</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $getuser = $user->getallget("get_project_name = '" . $project_name . "'");
                                                if (is_array($getuser) || is_object($getuser)) {
                                                    foreach ($getuser as $i => $rowre)
                                                        if (isset($rowre)) {
                                                            // print_r($rowre);
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $rowre['get_name']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['getstart']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['getend']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['get_statname']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['get_workstart']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['get_workend']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['get_work_name2']; ?>
                                                                </td>
                                                                <td>
                                                                    <!-- <button type="button" class="btn btn-outline-primary"><i
                                                                                class="fas fa-fw fa-pencil-alt"
                                                                                aria-hidden="true"></i></button> -->
                                                                    <button type="button" class="btn btn-outline-warning"
                                                                        data-toggle="modal" data-target="#edit_username"
                                                                        onclick="return show_edit_user(<?php echo $rowre['get_id']; ?>);">
                                                                        <i class="fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                                                                    </button>
                                                                    <!-- <button type="button" class="btn btn-outline-danger"
                                                                            onclick="return delete_project(<?php echo $rowre['get_id']; ?>);">
                                                                            <i class="fas fa-fw fa-trash"
                                                                                aria-hidden="true"></i></button> -->
                                                                    <div class="modal fade" id="edit_username" tabindex="-1"
                                                                        role="dialog" aria-labelledby="myModalLabel">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <button type="button" class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close"><span
                                                                                            aria-hidden="true">&times;</span></button>
                                                                                    <h4 class="modal-title" id="myModalLabel">
                                                                                        แก้ไขข้อมูล</h4>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <div id="edit_form">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-primary"
                                                                                        onclick="return edit_user_form();">Save
                                                                                        changes</button>
                                                                                    <button type="button" class="btn btn-danger"
                                                                                        data-dismiss="modal">Close</button>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                }
                                                ?>
                                                <?php
                                                $getuser = $user->getallpro("pro_project_name = '" . $project_name . "'");
                                                if (is_array($getuser) || is_object($getuser)) {
                                                    foreach ($getuser as $i => $rowre)
                                                        if (isset($rowre)) {
                                                            // print_r($rowre);
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $rowre['pro_nam']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['prostart']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['proend']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['pro_statname']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['pro_workstart']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['pro_workend']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['pro_work_name2']; ?>
                                                                </td>
                                                                <td>
                                                                    <button type="button" class="btn btn-outline-warning"
                                                                        data-toggle="modal" data-target="#edit_username"
                                                                        onclick="return show_edit_user2(<?php echo $rowre['pro_id']; ?>);">
                                                                        <i class="fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                                                                    </button>
                                                                    <!-- <button type="button" class="btn btn-outline-danger"
                                                                            onclick="return delete_project(<?php echo $rowre['pro_id']; ?>);">
                                                                            <i class="fas fa-fw fa-trash"
                                                                                aria-hidden="true"></i></button> -->
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                }
                                                ?>
                                                <?php
                                                $getuser = $user->getallsign("sign_project_name = '" . $project_name . "'");
                                                if (is_array($getuser) || is_object($getuser)) {
                                                    foreach ($getuser as $i => $rowre)
                                                        if (isset($rowre)) {
                                                            // print_r($rowre);
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $rowre['sign_name']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['sign_start']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['sign_end']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['sign_startname']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['sign_workname']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['sign_workend']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['sign_work_name2']; ?>
                                                                </td>
                                                                <td>
                                                                    <button type="button" class="btn btn-outline-warning"
                                                                        data-toggle="modal" data-target="#edit_username"
                                                                        onclick="return show_edit_user3(<?php echo $rowre['sign_id']; ?>);">
                                                                        <i class="fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                                                                    </button>
                                                                    <!-- <button type="button" class="btn btn-outline-danger"
                                                                            onclick="return delete_project(<?php echo $rowre['sign_id']; ?>);">
                                                                            <i class="fas fa-fw fa-trash"
                                                                                aria-hidden="true"></i></button> -->
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                }
                                                ?>
                                                <?php
                                                $getuser = $user->getalldev("dev_project_name = '" . $project_name . "'");
                                                if (is_array($getuser) || is_object($getuser)) {
                                                    foreach ($getuser as $i => $rowre)
                                                        if (isset($rowre)) {
                                                            // print_r($rowre);
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $rowre['dev_name']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['devstart']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['devend']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['dev_startname']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['dev_workstart']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['dev_workend']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['dev_work_name2']; ?>
                                                                </td>
                                                                <td>
                                                                    <button type="button" class="btn btn-outline-warning"
                                                                        data-toggle="modal" data-target="#edit_username"
                                                                        onclick="return show_edit_user4(<?php echo $rowre['dev_id']; ?>);">
                                                                        <i class="fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                                                                    </button>
                                                                    <!-- <button type="button" class="btn btn-outline-danger"
                                                                            onclick="return delete_project(<?php echo $rowre['dev_id']; ?>);">
                                                                            <i class="fas fa-fw fa-trash"
                                                                                aria-hidden="true"></i></button> -->
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                }
                                                ?>
                                                <?php
                                                $getuser = $user->getallsit("sit_project_name = '" . $project_name . "'");
                                                if (is_array($getuser) || is_object($getuser)) {
                                                    foreach ($getuser as $i => $rowre)
                                                        if (isset($rowre)) {
                                                            // print_r($rowre);
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $rowre['sit_name']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['getstart']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['getend']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['sit_getname']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['sit_workstart']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['sit_workend']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['sit_work_name2']; ?>
                                                                </td>
                                                                <td>
                                                                    <button type="button" class="btn btn-outline-warning"
                                                                        data-toggle="modal" data-target="#edit_username"
                                                                        onclick="return show_edit_user5(<?php echo $rowre['sit_id']; ?>);">
                                                                        <i class="fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                                                                    </button>
                                                                    <!-- <button type="button" class="btn btn-outline-danger"
                                                                            onclick="return delete_project(<?php echo $rowre['sit_id']; ?>);">
                                                                            <i class="fas fa-fw fa-trash"
                                                                                aria-hidden="true"></i></button> -->
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                }
                                                ?>
                                                <?php
                                                $getuser = $user->getallinter("internal_project_name = '" . $project_name . "'");
                                                if (is_array($getuser) || is_object($getuser)) {
                                                    foreach ($getuser as $i => $rowre)
                                                        if (isset($rowre)) {
                                                            // print_r($rowre);
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $rowre['internal_name']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['internalstart']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['internalend']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['internal_startname']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['internal_workstart']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['internal_workend']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['internal_work_name2']; ?>
                                                                </td>
                                                                <td>
                                                                    <button type="button" class="btn btn-outline-warning"
                                                                        data-toggle="modal" data-target="#edit_username"
                                                                        onclick="return show_edit_user6(<?php echo $rowre['internal_id']; ?>);">
                                                                        <i class="fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                                                                    </button>
                                                                    <!-- <button type="button" class="btn btn-outline-danger"
                                                                            onclick="return delete_project(<?php echo $rowre['internal_id']; ?>);">
                                                                            <i class="fas fa-fw fa-trash"
                                                                                aria-hidden="true"></i></button> -->
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                }
                                                ?>
                                                <?php
                                                $getuser = $user->getallusertest("usertest_project_name = '" . $project_name . "'");
                                                if (is_array($getuser) || is_object($getuser)) {
                                                    foreach ($getuser as $i => $rowre)
                                                        if (isset($rowre)) {
                                                            // print_r($rowre);
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $rowre['usertest_name']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['userteststart']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['usertestend']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['usertest_startname']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['usertest_workstart']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['usertest_workend']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['usertest_work_name2']; ?>
                                                                </td>
                                                                <td>
                                                                    <button type="button" class="btn btn-outline-warning"
                                                                        data-toggle="modal" data-target="#edit_username"
                                                                        onclick="return show_edit_user7(<?php echo $rowre['usertest_id']; ?>);">
                                                                        <i class="fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                                                                    </button>
                                                                    <!-- <button type="button" class="btn btn-outline-danger"
                                                                            onclick="return delete_project(<?php echo $rowre['usertest_id']; ?>);">
                                                                            <i class="fas fa-fw fa-trash"
                                                                                aria-hidden="true"></i></button> -->
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                }
                                                ?>
                                                <?php
                                                $getuser = $user->getallend("end_project_name = '" . $project_name . "'");
                                                if (is_array($getuser) || is_object($getuser)) {
                                                    foreach ($getuser as $i => $rowre)
                                                        if (isset($rowre)) {
                                                            // print_r($rowre);
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $rowre['end_name']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['endstart']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['endend']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['end_startname']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['end_workstart']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['end_workend']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rowre['end_work_name2']; ?>
                                                                </td>
                                                                <td>
                                                                    <button type="button" class="btn btn-outline-warning"
                                                                        data-toggle="modal" data-target="#edit_username"
                                                                        onclick="return show_edit_user8(<?php echo $rowre['end_id']; ?>);">
                                                                        <i class="fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                                                                    </button>
                                                                    <!-- <button type="button" class="btn btn-outline-danger"
                                                                            onclick="return delete_project(<?php echo $rowre['end_id']; ?>);">
                                                                            <i class="fas fa-fw fa-trash"
                                                                                aria-hidden="true"></i></button> -->
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                }
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <!-- <tr>
                                                        <th>รายละเอียดโครงการ</th>
                                                        <th>วันที่เริ่มกำหนดแผน</th>
                                                        <th>วันสิ้นสุดกำหนดแผน</th>
                                                        <th>ชื่อผู้รับผิดชอบกำหนดแผน</th>
                                                        <th>วันที่เริ่มปฎับัติการ</th>
                                                        <th>วันสิ้นสุดปฎับัติการ</th>
                                                        <th>ชื่อผู้รับผิดชอบปฎิบัติการ</th>
                                                        <th>Action</th>
                                                    </tr> -->
                                            </tfoot>
                                        </table>
                                        <br>
                                        <div class="d-flex justify-content-end">
                                            <button type="button" class="btn btn-outline-danger"
                                                onclick="return delete_project('<?php echo $project_name; ?>');">
                                                ลบทั้งหมด
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- /.container-fluid -->
            </div>
            <div class="container">
                <a href="listmenu.php?project_name=<?php echo urlencode($project_name); ?>"><button
                        class="btn btn-danger float-right">BACK</button>
                </a>
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
    <!-- <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <a class="btn btn-" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div> -->

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
        $("#pagelist").change(function () {
            var viewID = $("#pagelist option:selected").val();
            $("#pagelist option").each(function () {
                var hideID = $(this).val();
                $("#" + hideID).hide();
            });
            $("#" + viewID).show();
        });
        function checkdata() {

            var inputIds = [
                "timeplan_re_getstart", "timeplan_re_getend", "timeplan_re_getname", "timeplan_re_workstart", "timeplan_re_workend", "timeplan_re_workname",
                "timeplan_pro_getstart", "timeplan_pro_getend", "timeplan_pro_getname", "timeplan_pro_workstart", "timeplan_pro_workend", "timeplan_pro_workname",
                "timeplan_sing_getstart", "timeplan_sing_getend", "timeplan_sing_getname", "timeplan_sing_workstart", "timeplan_sing_workend", "timeplan_sing_workname",
                "timeplan_dev_getstart", "timeplan_dev_getend", "timeplan_dev_getname", "timeplan_dev_workstart", "timeplan_dev_workend", "timeplan_dev_workname",
                "timeplan_sit_getstart", "timeplan_sit_getend", "timeplan_sit_getname", "timeplan_sit_workstart", "timeplan_sit_workend", "timeplan_sit_workname",
                "timeplan_inter_getstart", "timeplan_inter_getend", "timeplan_inter_getname", "timeplan_inter_workstart", "timeplan_inter_workend", "timeplan_inter_workname",
                "timeplan_user_getstart", "timeplan_user_getend", "timeplan_user_getname", "timeplan_user_workstart", "timeplan_user_workend", "timeplan_user_workname",
                "timeplan_end_getstart", "timeplan_end_getend", "timeplan_end_getname", "timeplan_end_workstart", "timeplan_end_workend", "timeplan_end_workname"
            ];

            var isAlerted = false; // เพิ่มตัวแปรเพื่อตรวจสอบว่าเคยแจ้งเตือนไปแล้วหรือยัง
            var isValid = true; // เพิ่มตัวแปรเพื่อตรวจสอบว่าข้อมูลทั้งหมดถูกต้องหรือไม่

            inputIds.forEach(function (id) {
                var dateInput = document.getElementById(id).value;
                if (dateInput === "") {
                    if (!isAlerted) { // ถ้ายังไม่เคยแจ้งเตือน
                        alert("กรุณาใส่ข้อมูลในช่อง input");
                        isAlerted = true; // กำหนดให้เป็น true เมื่อเราได้แจ้งเตือนไปแล้ว
                    }
                    document.getElementById(id).classList.add('invalid');
                    isValid = false; // กำหนดให้ข้อมูลไม่ถูกต้องเมื่อมีช่อง input ว่าง
                } else {
                    // เมื่อใส่ข้อมูลครบถูกต้อง
                    document.getElementById(id).classList.remove('invalid');
                }
            });
            if (isValid) {
                alert("input success");
                return add_user_form();
            }
            // var dateInput = document.getElementById("timeplan_re_getstart").value;
            // var dateInput2 = document.getElementById("timeplan_re_getend").value;
            // var dateInput3 = document.getElementById("timeplan_re_getname").value;
            // var dateInput4 = document.getElementById("timeplan_re_workstart").value;
            // var dateInput5 = document.getElementById("timeplan_re_workend").value;
            // var dateInput6 = document.getElementById("timeplan_re_workname").value;

            // var dateInput7 = document.getElementById("timeplan_pro_getstart").value;
            // var dateInput8 = document.getElementById("timeplan_pro_getend").value;
            // var dateInput9 = document.getElementById("timeplan_pro_getname").value;
            // var dateInput10 = document.getElementById("timeplan_pro_workstart").value;
            // var dateInput11 = document.getElementById("timeplan_pro_workend").value;
            // var dateInput12 = document.getElementById("timeplan_pro_workname").value;

            // var dateInput13 = document.getElementById("timeplan_sing_getstart").value;
            // var dateInput14 = document.getElementById("timeplan_sing_getend").value;
            // var dateInput15 = document.getElementById("timeplan_sing_getname").value;
            // var dateInput16 = document.getElementById("timeplan_sing_workstart").value;
            // var dateInput17 = document.getElementById("timeplan_sing_workend").value;
            // var dateInput18 = document.getElementById("timeplan_sing_workname").value;

            // var dateInput19 = document.getElementById("timeplan_dev_getstart").value;
            // var dateInput20 = document.getElementById("timeplan_dev_getend").value;
            // var dateInput21 = document.getElementById("timeplan_dev_getname").value;
            // var dateInput22 = document.getElementById("timeplan_dev_workstart").value;
            // var dateInput23 = document.getElementById("timeplan_dev_workend").value;
            // var dateInput24 = document.getElementById("timeplan_dev_workname").value;

            // var dateInput25 = document.getElementById("timeplan_sit_getstart").value;
            // var dateInput26 = document.getElementById("timeplan_sit_getend").value;
            // var dateInput27 = document.getElementById("timeplan_sit_getname").value;
            // var dateInput28 = document.getElementById("timeplan_sit_workstart").value;
            // var dateInput29 = document.getElementById("timeplan_sit_workend").value;
            // var dateInput30 = document.getElementById("timeplan_sit_workname").value;

            // var dateInput31 = document.getElementById("timeplan_inter_getstart").value;
            // var dateInput32 = document.getElementById("timeplan_inter_getend").value;
            // var dateInput33 = document.getElementById("timeplan_inter_getname").value;
            // var dateInput34 = document.getElementById("timeplan_inter_workstart").value;
            // var dateInput35 = document.getElementById("timeplan_inter_workend").value;
            // var dateInput36 = document.getElementById("timeplan_inter_workname").value;


            // var dateInput37 = document.getElementById("timeplan_user_getstart").value;
            // var dateInput38 = document.getElementById("timeplan_user_getend").value;
            // var dateInput39 = document.getElementById("timeplan_user_getname").value;
            // var dateInput40 = document.getElementById("timeplan_user_workstart").value;
            // var dateInput41 = document.getElementById("timeplan_user_workend").value;
            // var dateInput42 = document.getElementById("timeplan_user_workname").value;


            // var dateInput43 = document.getElementById("timeplan_end_getstart").value;
            // var dateInput44 = document.getElementById("timeplan_end_getend").value;
            // var dateInput45 = document.getElementById("timeplan_end_getname").value;
            // var dateInput46 = document.getElementById("timeplan_end_workstart").value;
            // var dateInput47 = document.getElementById("timeplan_end_workend").value;
            // var dateInput48 = document.getElementById("timeplan_end_workname").value;

            // if (dateInput === "") {
            //     alert("กรุณาใส่ข้อมูลในช่อง input");
            // } else {
            //     // alert("ใส่ข้อมูลแล้วinput");
            //     return add_user_form();
            // }
        }
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
                    alert(data);
                    console.log(data);
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
                        delete_all: id
                    },
                    success: function (data) {
                        alert(data);
                        location.reload();
                    }
                });
            }
            return false;
        }
        function show_edit_user(id) {
            $.ajax({
                type: "POST",
                url: "connect/process.php",
                data: {
                    show_edit_report_id: id,
                },
                success: function (data) {
                    $("#edit_form").html(data);
                }
            });
            return false;
        }
        function show_edit_user2(id) {
            $.ajax({
                type: "POST",
                url: "connect/process.php",
                data: {
                    show_edit_pro_id: id,
                },
                success: function (data) {
                    $("#edit_form").html(data);
                }
            });
            return false;
        }
        function show_edit_user3(id) {
            $.ajax({
                type: "POST",
                url: "connect/process.php",
                data: {
                    show_edit_sign_id: id,
                },
                success: function (data) {
                    $("#edit_form").html(data);
                }
            });
            return false;
        }
        function show_edit_user4(id) {
            $.ajax({
                type: "POST",
                url: "connect/process.php",
                data: {
                    show_edit_dev_id: id,
                },
                success: function (data) {
                    $("#edit_form").html(data);
                }
            });
            return false;
        }
        function show_edit_user5(id) {
            $.ajax({
                type: "POST",
                url: "connect/process.php",
                data: {
                    show_edit_sit_id: id,
                },
                success: function (data) {
                    $("#edit_form").html(data);
                }
            });
            return false;
        }
        function show_edit_user6(id) {
            $.ajax({
                type: "POST",
                url: "connect/process.php",
                data: {
                    show_edit_internal_id: id,
                },
                success: function (data) {
                    $("#edit_form").html(data);
                }
            });
            return false;
        }
        function show_edit_user7(id) {
            $.ajax({
                type: "POST",
                url: "connect/process.php",
                data: {
                    show_edit_usertest_id: id,
                },
                success: function (data) {
                    $("#edit_form").html(data);
                }
            });
            return false;
        }
        function show_edit_user8(id) {
            $.ajax({
                type: "POST",
                url: "connect/process.php",
                data: {
                    show_edit_end_id: id,
                },
                success: function (data) {
                    $("#edit_form").html(data);
                }
            });
            return false;
        }

        function edit_user_form() {
            var formData = new FormData($("#edit_report_form")[0]); // Use the actual form element
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
    </script>

</body>

</html>