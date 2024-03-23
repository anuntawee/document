<?php
include "function.php";

$delete = new delete();
$report = new report();
$getupdate = new update();
$insert = new insert();

if (isset($_POST['project_name'])) {
  $insert->add_project($_POST);
}
else if (isset($_POST['member_name'])) {
  $insert->add_user($_POST);
}
else if (isset($_POST['timeplan_project_name'])) {
  $insert->add_timeplan($_POST);
}

// var_dump($_POST);
if (isset($_POST['show_edit_user_id'])) {
  $edit_user = $report->getallproject_id($_POST['show_edit_user_id']);
  foreach ($edit_user as $i => $rowre) {
    echo '<form id="edit_user_from" method="POST" class="validated"
    enctype="multipart/form-data">
    <input type="checkbox" name="view" id="view"
    value="'.$rowre['member_view']. '">
    <input type="checkbox" name="comment" id="comment"
    value="'.$rowre['member_comment']. '">
    <input type="checkbox" name="edits" id="edits"
    value="'.$rowre['member_edits']. '">
    <input type="checkbox" name="approve" id="approve"
    value="'.$rowre['member_approve']. '">
    <input type="checkbox" name="signoff" id="signoff"
    value="'.$rowre['member_signoff']. '">
    <input type="hidden" name="edit_user_id" value="' . $rowre['member_id'] . '">
    </form>';
  }
}

if(isset($_POST['member_id'])) {
    $getupdate->edit_user($_POST);
}
if (isset($_POST['delete_project'])) {
  $delete->delete_project($_POST['delete_project']);
}
?>