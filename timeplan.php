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
                    <div class="row ">
                        <div class="card" id="card2">
                            <div class="container-flure">
                                <div class="row">
                                    <div class="card-body">
                                        <h1 class="text-center" data-bs-toggle="collapse" data-bs-target="#demo2">Show
                                            Time plan</h1>
                                        <div id="demo2" class="collapse">
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
                                                            if (isset ($rowre)) {
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
                                                                            <i class="fas fa-fw fa-pencil-alt"
                                                                                aria-hidden="true"></i>
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
                                                                                        <button type="button"
                                                                                            class="btn btn-primary"
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
                                                            if (isset ($rowre)) {
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
                                                                            <i class="fas fa-fw fa-pencil-alt"
                                                                                aria-hidden="true"></i>
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
                                                            if (isset ($rowre)) {
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
                                                                            <i class="fas fa-fw fa-pencil-alt"
                                                                                aria-hidden="true"></i>
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
                                                            if (isset ($rowre)) {
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
                                                                            <i class="fas fa-fw fa-pencil-alt"
                                                                                aria-hidden="true"></i>
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
                                                            if (isset ($rowre)) {
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
                                                                            <i class="fas fa-fw fa-pencil-alt"
                                                                                aria-hidden="true"></i>
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
                                                            if (isset ($rowre)) {
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
                                                                            <i class="fas fa-fw fa-pencil-alt"
                                                                                aria-hidden="true"></i>
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
                                                            if (isset ($rowre)) {
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
                                                                            <i class="fas fa-fw fa-pencil-alt"
                                                                                aria-hidden="true"></i>
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
                                                            if (isset ($rowre)) {
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
                                                                            <i class="fas fa-fw fa-pencil-alt"
                                                                                aria-hidden="true"></i>
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
                        <div class="card" id="card1">
                            <div class="container">
                                <div class="row">
                                    <div class="card-body">
                                        <h1 class="text-center" data-bs-toggle="collapse" data-bs-target="#demo">Input
                                            Time plan</h1>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div id="demo" class="collapse">
                                                        <form id="add_user_form" method="POST" name="timeplan_id"
                                                            class="validated" enctype="multipart/form-data">
                                                            แบบฟอร์มข้อมูล | วันกำหนดโครงการ
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <br><br>
                                                                    <h4>1. Get Requirement</h4>
                                                                    <input type="hidden" name="timeplan_status_name"
                                                                        id="timeplan_status_name"
                                                                        value="1.Get Requirement">
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="container">
                                                                        <div
                                                                            class="row align-items-center justify-content-center">
                                                                            <div class="col-md-12 text-center mb-5">
                                                                                วันกำหนดแผน
                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        วันเริ่ม
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        วันสิ้นสุด
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            name="timeplan_re_getstart"
                                                                                            id="timeplan_re_getstart">
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            name="timeplan_re_getend"
                                                                                            id="timeplan_re_getend"
                                                                                            >
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        ผู้รับผิดชอบ
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <select
                                                                                            name="timeplan_re_getname"
                                                                                            id="timeplan_re_getname"
                                                                                            class="form-control me-1"
                                                                                            required>
                                                                                            <option selected>
                                                                                                รายชื่อพนักงาน</option>
                                                                                            <?php
                                                                                            $getuser = $user->getalluser();
                                                                                            if (is_array($getuser) || is_object($getuser)) {
                                                                                                foreach ($getuser as $i => $rowre)
                                                                                                    if (isset ($rowre)) {
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
                                                                    <div class="container">
                                                                        <div
                                                                            class="row align-items-center justify-content-center">
                                                                            <div class="col-md-12 text-center mb-5">
                                                                                วันปฎิบัติการ
                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        วันเริ่ม
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        วันสิ้นสุด
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            name="timeplan_re_workstart"
                                                                                            id="timeplan_re_workstart">
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            name="timeplan_re_workend"
                                                                                            id="timeplan_re_workend">
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        ผู้รับผิดชอบ
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <select
                                                                                            name="timeplan_re_workname"
                                                                                            id="timeplan_re_workname"
                                                                                            class="form-control me-1">
                                                                                            <option select>
                                                                                                รายชื่อพนักงาน
                                                                                            </option>
                                                                                            <?php
                                                                                            foreach ($getuser as $i => $rowre)
                                                                                                if (isset ($rowre)) {
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
                                                                    <h4>2. เสนอ Proposal พร้อมแนบ QO</h4>
                                                                    <input type="hidden" name="timeplan_status_name_2"
                                                                        id="timeplan_status_name_2"
                                                                        value="2.เสนอ Proposal พร้อมแนบ QO">
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="container">
                                                                        <div
                                                                            class="row align-items-center justify-content-center">
                                                                            <div class="col-md-12 text-center mb-5">
                                                                                วันกำหนดแผน
                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        วันเริ่ม
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        วันสิ้นสุด
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            name="timeplan_pro_getstart"
                                                                                            id="timeplan_pro_getstart">
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            name="timeplan_pro_getend"
                                                                                            id="timeplan_pro_getend">
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        ผู้รับผิดชอบ
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <select
                                                                                            name="timeplan_pro_getname"
                                                                                            id="timeplan_pro_getname"
                                                                                            class="form-control me-1">
                                                                                            <option select>
                                                                                                รายชื่อพนักงาน
                                                                                            </option>
                                                                                            <?php
                                                                                            foreach ($getuser as $i => $rowre)
                                                                                                if (isset ($rowre)) {
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
                                                                    <div class="container">
                                                                        <div
                                                                            class="row align-items-center justify-content-center">
                                                                            <div class="col-md-12 text-center mb-5">
                                                                                วันปฎิบัติการ
                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        วันเริ่ม
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        วันสิ้นสุด
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            name="timeplan_pro_workstart"
                                                                                            id="timeplan_pro_workstart">
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            name="timeplan_pro_workend"
                                                                                            id="timeplan_pro_workend">
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        ผู้รับผิดชอบ
                                                                                    </div>
                                                                                    <div class="col-12">

                                                                                        <select
                                                                                            name="timeplan_pro_workname"
                                                                                            id="timeplan_pro_workname"
                                                                                            class="form-control me-1">
                                                                                            <option select>
                                                                                                รายชื่อพนักงาน
                                                                                            </option>
                                                                                            <?php
                                                                                            foreach ($getuser as $i => $rowre)
                                                                                                if (isset ($rowre)) {
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
                                                                    <h4>3. Sign OQ และจัดทำเอกสารเพื่อ Kick off
                                                                        project</h4>
                                                                    <input type="hidden" name="timeplan_status_name_3"
                                                                        id="timeplan_status_name_3" value="3.Sign OQ และจัดทำเอกสารเพื่อ Kick off
                                                                        project">
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="container">
                                                                        <div
                                                                            class="row align-items-center justify-content-center">
                                                                            <div class="col-md-12 text-center mb-5">
                                                                                วันกำหนดแผน
                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        วันเริ่ม
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        วันสิ้นสุด
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            name="timeplan_sing_getstart"
                                                                                            id="timeplan_sing_getstart">
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            name="timeplan_sing_getend"
                                                                                            id="timeplan_sing_getend">
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        ผู้รับผิดชอบ
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <select
                                                                                            name="timeplan_sing_getname"
                                                                                            id="timeplan_sing_getname"
                                                                                            class="form-control me-1">
                                                                                            <option select>
                                                                                                รายชื่อพนักงาน
                                                                                            </option>
                                                                                            <?php
                                                                                            foreach ($getuser as $i => $rowre)
                                                                                                if (isset ($rowre)) {
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
                                                                    <div class="container">
                                                                        <div
                                                                            class="row align-items-center justify-content-center">
                                                                            <div class="col-md-12 text-center mb-5">
                                                                                วันปฎิบัติการ
                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        วันเริ่ม
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        วันสิ้นสุด
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            name="timeplan_sing_workstart"
                                                                                            id="timeplan_sing_workstart">
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            name="timeplan_sing_workend"
                                                                                            id="timeplan_sing_workend">
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        ผู้รับผิดชอบ
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <select
                                                                                            name="timeplan_sing_workname"
                                                                                            id="timeplan_sing_workname"
                                                                                            class="form-control me-1">
                                                                                            <option select>
                                                                                                รายชื่อพนักงาน
                                                                                            </option>
                                                                                            <?php
                                                                                            foreach ($getuser as $i => $rowre)
                                                                                                if (isset ($rowre)) {
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
                                                                    <h4>4. Development Phase</h4>
                                                                    <input type="hidden" name="timeplan_status_name_4"
                                                                        id="timeplan_status_name_4"
                                                                        value="4.Development Phase">
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="container">
                                                                        <div
                                                                            class="row align-items-center justify-content-center">
                                                                            <div class="col-md-12 text-center mb-5">
                                                                                วันกำหนดแผน
                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        วันเริ่ม
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        วันสิ้นสุด
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            name="timeplan_dev_getstart"
                                                                                            id="timeplan_dev_getstart">
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            name="timeplan_dev_getend"
                                                                                            id="timeplan_dev_getend">
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        ผู้รับผิดชอบ
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <select
                                                                                            name="timeplan_dev_getname"
                                                                                            id="timeplan_dev_getname"
                                                                                            class="form-control me-1">
                                                                                            <option select>
                                                                                                รายชื่อพนักงาน
                                                                                            </option>
                                                                                            <?php
                                                                                            foreach ($getuser as $i => $rowre)
                                                                                                if (isset ($rowre)) {
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
                                                                    <div class="container">
                                                                        <div
                                                                            class="row align-items-center justify-content-center">
                                                                            <div class="col-md-12 text-center mb-5">
                                                                                วันปฎิบัติการ
                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        วันเริ่ม
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        วันสิ้นสุด
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            name="timeplan_dev_workstart"
                                                                                            id="timeplan_dev_workstart">
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            name="timeplan_dev_workend"
                                                                                            id="timeplan_dev_workend">
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        ผู้รับผิดชอบ
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <select
                                                                                            name="timeplan_dev_workname"
                                                                                            id="timeplan_dev_workname"
                                                                                            class="form-control me-1">
                                                                                            <option select>
                                                                                                รายชื่อพนักงาน
                                                                                            </option>
                                                                                            <?php
                                                                                            foreach ($getuser as $i => $rowre)
                                                                                                if (isset ($rowre)) {
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
                                                                    <input type="hidden" name="timeplan_status_name_5"
                                                                        id="timeplan_status_name_5" value="5.SIT">
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="container">
                                                                        <div
                                                                            class="row align-items-center justify-content-center">
                                                                            <div class="col-md-12 text-center mb-5">
                                                                                วันกำหนดแผน
                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        วันเริ่ม
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        วันสิ้นสุด
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            name="timeplan_sit_getstart"
                                                                                            id="timeplan_sit_getstart">
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            name="timeplan_sit_getend"
                                                                                            id="timeplan_sit_getend">
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        ผู้รับผิดชอบ
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <select
                                                                                            name="timeplan_sit_getname"
                                                                                            id="timeplan_sit_getname"
                                                                                            class="form-control me-1">
                                                                                            <option select>
                                                                                                รายชื่อพนักงาน
                                                                                            </option>
                                                                                            <?php
                                                                                            foreach ($getuser as $i => $rowre)
                                                                                                if (isset ($rowre)) {
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
                                                                    <div class="container">
                                                                        <div
                                                                            class="row align-items-center justify-content-center">
                                                                            <div class="col-md-12 text-center mb-5">
                                                                                วันปฎิบัติการ
                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        วันเริ่ม
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        วันสิ้นสุด
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            name="timeplan_sit_workstart"
                                                                                            id="timeplan_sit_workstart">
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            name="timeplan_sit_workend"
                                                                                            id="timeplan_sit_workend">
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        ผู้รับผิดชอบ
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <select
                                                                                            name="timeplan_sit_workname"
                                                                                            id="timeplan_sit_workname"
                                                                                            class="form-control me-1">
                                                                                            <option select>
                                                                                                รายชื่อพนักงาน
                                                                                            </option>
                                                                                            <?php
                                                                                            foreach ($getuser as $i => $rowre)
                                                                                                if (isset ($rowre)) {
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
                                                                    <h4>6. Internal Test</h4>
                                                                    <input type="hidden" name="timeplan_status_name_6"
                                                                        id="timeplan_status_name_6"
                                                                        value="6.Internal Test">
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="container">
                                                                        <div
                                                                            class="row align-items-center justify-content-center">
                                                                            <div class="col-md-12 text-center mb-5">
                                                                                วันกำหนดแผน
                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        วันเริ่ม
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        วันสิ้นสุด
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            name="timeplan_inter_getstart"
                                                                                            id="timeplan_inter_getstart">
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            name="timeplan_inter_getend"
                                                                                            id="timeplan_inter_getend">
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        ผู้รับผิดชอบ
                                                                                    </div>
                                                                                    <div class="col-12">

                                                                                        <select
                                                                                            name="timeplan_inter_getname"
                                                                                            id="timeplan_inter_getname"
                                                                                            class="form-control me-1">
                                                                                            <option select>
                                                                                                รายชื่อพนักงาน
                                                                                            </option>
                                                                                            <?php
                                                                                            foreach ($getuser as $i => $rowre)
                                                                                                if (isset ($rowre)) {
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
                                                                    <div class="container">
                                                                        <div
                                                                            class="row align-items-center justify-content-center">
                                                                            <div class="col-md-12 text-center mb-5">
                                                                                วันปฎิบัติการ
                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        วันเริ่ม
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        วันสิ้นสุด
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            name="timeplan_inter_workstart"
                                                                                            id="timeplan_inter_workstart">
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            name="timeplan_inter_workend"
                                                                                            id="timeplan_inter_workend">
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        ผู้รับผิดชอบ
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <select
                                                                                            name="timeplan_inter_workname"
                                                                                            id="timeplan_inter_workname"
                                                                                            class="form-control me-1">
                                                                                            <option select>
                                                                                                รายชื่อพนักงาน
                                                                                            </option>
                                                                                            <?php
                                                                                            foreach ($getuser as $i => $rowre)
                                                                                                if (isset ($rowre)) {
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
                                                                    <h4>7. User Acceptance Test</h4>
                                                                    <input type="hidden" name="timeplan_status_name_7"
                                                                        id="timeplan_status_name_7"
                                                                        value="7.User Acceptance Test">
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="container">
                                                                        <div
                                                                            class="row align-items-center justify-content-center">
                                                                            <div class="col-md-12 text-center mb-5">
                                                                                วันกำหนดแผน
                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        วันเริ่ม
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        วันสิ้นสุด
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            name="timeplan_user_getstart"
                                                                                            id="timeplan_user_getstart">
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            name="timeplan_user_getend"
                                                                                            id="timeplan_user_getend">
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        ผู้รับผิดชอบ
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <select
                                                                                            name="timeplan_user_getname"
                                                                                            id="timeplan_user_getname"
                                                                                            class="form-control me-1">
                                                                                            <option select>
                                                                                                รายชื่อพนักงาน
                                                                                            </option>
                                                                                            <?php
                                                                                            foreach ($getuser as $i => $rowre)
                                                                                                if (isset ($rowre)) {
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
                                                                    <div class="container">
                                                                        <div
                                                                            class="row align-items-center justify-content-center">
                                                                            <div class="col-md-12 text-center mb-5">
                                                                                วันปฎิบัติการ
                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        วันเริ่ม
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        วันสิ้นสุด
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            name="timeplan_user_workstart"
                                                                                            id="timeplan_user_workstart">
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            name="timeplan_user_workend"
                                                                                            id="timeplan_user_workend">
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        ผู้รับผิดชอบ
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <select
                                                                                            name="timeplan_user_workname"
                                                                                            id="timeplan_user_workname"
                                                                                            class="form-control me-1">
                                                                                            <option select>
                                                                                                รายชื่อพนักงาน
                                                                                            </option>
                                                                                            <?php
                                                                                            foreach ($getuser as $i => $rowre)
                                                                                                if (isset ($rowre)) {
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
                                                                    <h4>8. ส่งมอบงาน</h4>
                                                                    <input type="hidden" name="timeplan_status_name_8"
                                                                        id="timeplan_status_name_8" value="8.ส่งมอบงาน">
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="container">
                                                                        <div
                                                                            class="row align-items-center justify-content-center">
                                                                            <div class="col-md-12 text-center mb-5">
                                                                                วันกำหนดแผน
                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        วันเริ่ม
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        วันสิ้นสุด
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            name="timeplan_end_getstart"
                                                                                            id="timeplan_end_getstart">
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            name="timeplan_end_getend"
                                                                                            id="timeplan_end_getend">
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        ผู้รับผิดชอบ
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <select
                                                                                            name="timeplan_end_getname"
                                                                                            id="timeplan_end_getname"
                                                                                            class="form-control me-1">
                                                                                            <option select>
                                                                                                รายชื่อพนักงาน
                                                                                            </option>
                                                                                            <?php
                                                                                            foreach ($getuser as $i => $rowre)
                                                                                                if (isset ($rowre)) {
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
                                                                    <div class="container">
                                                                        <div
                                                                            class="row align-items-center justify-content-center">
                                                                            <div class="col-md-12 text-center mb-5">
                                                                                วันปฎิบัติการ
                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        วันเริ่ม
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        วันสิ้นสุด
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            name="timeplan_end_workstart"
                                                                                            id="timeplan_end_workstart">
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            name="timeplan_end_workend"
                                                                                            id="timeplan_end_workend">
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        ผู้รับผิดชอบ
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <select
                                                                                            name="timeplan_end_workname"
                                                                                            id="timeplan_end_workname"
                                                                                            class="form-control me-1">
                                                                                            <option select>
                                                                                                รายชื่อพนักงาน
                                                                                            </option>
                                                                                            <?php
                                                                                            foreach ($getuser as $i => $rowre)
                                                                                                if (isset ($rowre)) {
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
                                                            <input type="hidden" id="timeplan_project_name"
                                                                name="timeplan_project_name"
                                                                value="<?php echo $project_name; ?>">
                                                            <div class="d-flex justify-content-end">
                                                                <button type="button" class="btn btn-primary"
                                                                    onclick="return add_user_form();">SUBMIT</button>
                                                                <br>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <a
                                                        href="listmenu.php?project_name=<?php echo urlencode($project_name); ?>"><button
                                                            class="btn btn-danger float-right">BACK</button>
                                                    </a>
                                                </div>
                                            </div>
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