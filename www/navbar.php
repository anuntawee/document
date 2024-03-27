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

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"> <strong> Report</strong></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">


    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="menu.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>HOME</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">

    <li class="nav-item">
        <a class="nav-link collapsed" href="project.php" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span> Project</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="admin.php" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span> ManagementUser</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="template.php" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span> Template</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->