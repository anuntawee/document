<?php
include "function.php";

$delete = new delete();
$report = new report();
$getupdate = new update();
$insert = new insert();

if (isset($_POST['project_name'])) {
  $insert->add_project($_POST);
}
if (isset($_POST['show_edit_user_id'])) {
  $edit_user = $report->getalluser_id($_POST['show_edit_user_id']);
  foreach ($edit_user as $i => $rowre) {
    echo '<form id="edit_user_from" method="POST" class="validated"
    enctype="multipart/form-data">
    <input type="text" id="editid_card" name="editid_card" placeholder="รหัสพนักงาน"
        class="form-control"value="' . $rowre['member_user'] . '"><br>
    <input type="text" id="editpassword" name="editpassword" placeholder="รหัสผ่าน"
        class="form-control" value="' . $rowre['member_password'] . '"><br>
    <select name="editmr" id="editmr" class="form-control form-select">
    <option value="' . $rowre['member_headname'] . '">' . $rowre['member_headname'] . '</option>
        <option value="MR.">Mr.</option>
        <option value="MS.">Ms.</option>
        <option value="MRS.">Mrs.</option>
    </select><br>
    <input type="text" id="editname" name="editname" placeholder="Name"
        class="form-control" value="' . $rowre['member_name'] . '"><br>
    <input type="text" id="editlastname" name="editlastname" placeholder="lastname"
        class="form-control"value="' . $rowre['member_lastname'] . '"><br>
    <select  id="editroll" name="editroll" class="form-control form-select">
    <option value="' . $rowre['member_roll'] . '">' . $rowre['member_roll'] . '</option>
        <option value="EMPLOYEE">EMPLOYEE</option>
        <option value="MANAGER">MANAGER</option>
    </select>
    <input type="hidden" name="edit_user_id" value="' . $rowre['member_id'] . '">
    </form>';
  }
}
if (isset($_POST['edit_report_id'])) {
  $getupdate->edit_report($_POST);
}
if (isset($_POST['delete_project'])) {
  $delete->delete_project($_POST['delete_project']);
}
?>