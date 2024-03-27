<?php
include "function.php";

$delete = new delete();
$report = new report();
$getupdate = new update();
$insert = new insert();
$user = new User();
$getuser = $user->getalluser();

if (isset ($_POST['project_name'])) {
  $insert->add_project($_POST);
} else if (isset ($_POST['member_name'])) {
  $insert->add_user($_POST);
} else if (isset ($_POST['timeplan_project_name'])) {
  $insert->add_timeplan($_POST);
} else if (isset ($_POST['doc_status'])) {
  $insert->add_doc($_POST);
}
// var_dump($_POST);
// var_dump($_FILES);


if (isset ($_POST['show_edit_user_id'])) {
  $edit_user = $report->getallproject_id($_POST['show_edit_user_id']);
  foreach ($edit_user as $i => $rowre) {
    echo '<form id="edit_user_from" method="POST" class="validated"
    enctype="multipart/form-data">
    <input type="checkbox" name="view" id="view"
    value="' . $rowre['member_view'] . '">
    <input type="checkbox" name="comment" id="comment"
    value="' . $rowre['member_comment'] . '">
    <input type="checkbox" name="edits" id="edits"
    value="' . $rowre['member_edits'] . '">
    <input type="checkbox" name="approve" id="approve"
    value="' . $rowre['member_approve'] . '">
    <input type="checkbox" name="signoff" id="signoff"
    value="' . $rowre['member_signoff'] . '">
    <input type="hidden" name="edit_user_id" value="' . $rowre['member_id'] . '">
    </form>';
  }
} else if (isset ($_POST['show_edit_report_id'])) {
  // var_dump($_POST);
  // $getuser = $user->getalluser();
  // if (is_array($getuser) || is_object($getuser)) {
  $edit_user = $report->getallget($_POST['show_edit_report_id']);
  foreach ($edit_user as $i => $rowre) {
    echo '<form id="edit_report_form" method="POST" class="validated"
    enctype="multipart/form-data">
    <h5>วันที่เริ่มกำหนดแผน</h5>
    <input type="date" name="editstart" id="editstart" value="' . $rowre['getstart'] . '" class="form-control"><br>
    <h5>วันสิ้นสุดแผนแผน</h5>
    <input type="date" name="editend" id="editend" value="' . $rowre['getend'] . '" class="form-control"><br>
    <h5>ชื่อผู้รับผิดชอบกำหนดแผน</h5>
    <select name="editstartname" id="editstartname" class="form-control me-1">
    <option select>
    ' . $rowre['get_statname'] . '
    </option>';
    if (is_array($getuser) || is_object($getuser)) {
      foreach ($getuser as $i => $rowree)
        if (isset ($rowree)) {
          echo '<option value="' . $rowree['member_name'] . ' ' . $rowree['member_lastname'] . '">' . $rowree['member_name'] . ' ' . $rowree['member_lastname'] . '</option>';
        }
    }
    echo '</select>
    <br>
    <h5>วันที่เริ่มปฎิบัติการ</h5>
    <input type="date" name="editworkstart" id="editworkstart" value="' . $rowre['get_workstart'] . '" class="form-control"><br>
    <h5>วันสิ้นสุดปฎิบัติการ</h5>
    <input type="date" name="editworkend" id="editworkend" value="' . $rowre['get_workend'] . '" class="form-control"><br>';
    echo '
    <h5>ชื่อผู้รับผิดชอบปฎิบัติการ</h5>
    <select name="editeworkname2" id="editeworkname2" class="form-control me-1">
    <option select>
    ' . $rowre['get_work_name2'] . '
    </option>
    ';
    if (is_array($getuser) || is_object($getuser)) {
      foreach ($getuser as $i => $rowree)
        if (isset ($rowree)) {
          // print_r($rowree);
          echo '<option value="' . $rowree['member_name'] . ' ' . $rowree['member_lastname'] . '">' . $rowree['member_name'] . ' ' . $rowree['member_lastname'] . '</option>'; }
    }
    echo '
    <input type="hidden" name="checkname" value="1">
    <input type="hidden" name="edit_get_id" value="' . $rowre['get_id'] . '">
    </form>';
  }
} else if (isset ($_POST['show_edit_pro_id'])) {
  // var_dump($_POST);
  $edit_user = $report->getallpro($_POST['show_edit_pro_id']);
  foreach ($edit_user as $i => $rowre) {
    echo '<form id="edit_report_form" method="POST" class="validated"
    enctype="multipart/form-data">
    <h5>วันที่เริ่มกำหนดแผน</h5>
    <input type="date" name="editstart" id="editstart" value="' . $rowre['prostart'] . '" class="form-control"><br>
    <h5>วันสิ้นสุดแผนแผน</h5>
    <input type="date" name="editend" id="editend" value="' . $rowre['proend'] . '" class="form-control"><br>
    <h5>ชื่อผู้รับผิดชอบกำหนดแผน</h5>
    <select name="editstartname" id="editstartname" class="form-control me-1">
    <option select>
    ' . $rowre['pro_statname'] . '
    </option>';
    if (is_array($getuser) || is_object($getuser)) {
      foreach ($getuser as $i => $rowree)
        if (isset ($rowree)) {
          // print_r($rowree);
          echo '<option value="' . $rowree['member_name'] . ' ' . $rowree['member_lastname'] . '">' . $rowree['member_name'] . ' ' . $rowree['member_lastname'] . '</option>';  }
    }
    echo '</select>
    <br>
    <h5>วันที่เริ่มปฎิบัติการ</h5>
    <input type="date" name="editworkstart" id="editworkstart" value="' . $rowre['pro_workstart'] . '" class="form-control"><br>
    <h5>วันสิ้นสุดปฎิบัติการ</h5>
    <input type="date" name="editworkend" id="editworkend" value="' . $rowre['pro_workend'] . '" class="form-control"><br>';
    echo '
    <h5>ชื่อผู้รับผิดชอบปฎิบัติการ</h5>
    <select name="editeworkname2" id="editeworkname2" class="form-control me-1">
    <option select>
    ' . $rowre['pro_work_name2'] . '
    </option>';
    if (is_array($getuser) || is_object($getuser)) {
      foreach ($getuser as $i => $rowree)
        if (isset ($rowree)) {
          // print_r($rowree);
          echo '<option value="' . $rowree['member_name'] . ' ' . $rowree['member_lastname'] . '">' . $rowree['member_name'] . ' ' . $rowree['member_lastname'] . '</option>'; }
    }
    echo '
    <input type="hidden" name="checkname" value="2">
    <input type="hidden" name="edit_get_id" value="' . $rowre['pro_id'] . '">
    </form>';
  }
} else if (isset ($_POST['show_edit_sign_id'])) {
  // var_dump($_POST);
  $edit_user = $report->getallsign($_POST['show_edit_sign_id']);
  foreach ($edit_user as $i => $rowre) {
    echo '<form id="edit_report_form" method="POST" class="validated"
    enctype="multipart/form-data">
    <h5>วันที่เริ่มกำหนดแผน</h5>
    <input type="date" name="editstart" id="editstart" value="' . $rowre['sign_start'] . '" class="form-control"><br>
    <h5>วันสิ้นสุดแผนแผน</h5>
    <input type="date" name="editend" id="editend" value="' . $rowre['sign_end'] . '" class="form-control"><br>
    <h5>ชื่อผู้รับผิดชอบกำหนดแผน</h5>
    <select name="editstartname" id="editstartname" class="form-control me-1">
    <option select>
    ' . $rowre['sign_startname'] . '
    </option>';
    if (is_array($getuser) || is_object($getuser)) {
      foreach ($getuser as $i => $rowree)
        if (isset ($rowree)) {
          // print_r($rowree);
          echo '<option value="' . $rowree['member_name'] . ' ' . $rowree['member_lastname'] . '">' . $rowree['member_name'] . ' ' . $rowree['member_lastname'] . '</option>'; }
    }
    echo '</select>
    <br>
    <h5>วันที่เริ่มปฎิบัติการ</h5>
    <input type="date" name="editworkstart" id="editworkstart" value="' . $rowre['sign_workname'] . '" class="form-control"><br>
    <h5>วันสิ้นสุดปฎิบัติการ</h5>
    <input type="date" name="editworkend" id="editworkend" value="' . $rowre['sign_workend'] . '" class="form-control"><br>';
    echo '
    <h5>ชื่อผู้รับผิดชอบปฎิบัติการ</h5>
    <select name="editeworkname2" id="editeworkname2" class="form-control me-1">
    <option select>
    ' . $rowre['sign_work_name2'] . '
    </option>';
    if (is_array($getuser) || is_object($getuser)) {
      foreach ($getuser as $i => $rowree)
        if (isset ($rowree)) {
          // print_r($rowree);
          echo '<option value="' . $rowree['member_name'] . ' ' . $rowree['member_lastname'] . '">' . $rowree['member_name'] . ' ' . $rowree['member_lastname'] . '</option>'; }
    }
    echo '
    <input type="hidden" name="checkname" value="3">
    <input type="hidden" name="edit_get_id" value="' . $rowre['sign_id'] . '">
    </form>';
  }
} else if (isset ($_POST['show_edit_dev_id'])) {
  // var_dump($_POST);
  $edit_user = $report->getalldev($_POST['show_edit_dev_id']);
  foreach ($edit_user as $i => $rowre) {
    echo '<form id="edit_report_form" method="POST" class="validated"
    enctype="multipart/form-data">
    <h5>วันที่เริ่มกำหนดแผน</h5>
    <input type="date" name="editstart" id="editstart" value="' . $rowre['devstart'] . '" class="form-control"><br>
    <h5>วันสิ้นสุดแผนแผน</h5>
    <input type="date" name="editend" id="editend" value="' . $rowre['devend'] . '" class="form-control"><br>
    <h5>ชื่อผู้รับผิดชอบกำหนดแผน</h5>
    <select name="editstartname" id="editstartname" class="form-control me-1">
    <option select>
    ' . $rowre['dev_startname'] . '
    </option>';
    if (is_array($getuser) || is_object($getuser)) {
      foreach ($getuser as $i => $rowree)
        if (isset ($rowree)) {
          // print_r($rowree);
          echo '<option value="' . $rowree['member_name'] . ' ' . $rowree['member_lastname'] . '">' . $rowree['member_name'] . ' ' . $rowree['member_lastname'] . '</option>'; }
    }
    echo '</select>
    <br>
    <h5>วันที่เริ่มปฎิบัติการ</h5>
    <input type="date" name="editworkstart" id="editworkstart" value="' . $rowre['dev_workstart'] . '" class="form-control"><br>
    <h5>วันสิ้นสุดปฎิบัติการ</h5>
    <input type="date" name="editworkend" id="editworkend" value="' . $rowre['dev_workend'] . '" class="form-control"><br>';
    echo '
    <h5>ชื่อผู้รับผิดชอบปฎิบัติการ</h5>
    <select name="editeworkname2" id="editeworkname2" class="form-control me-1">
    <option select>
    ' . $rowre['dev_work_name2'] . '
    </option>';
    if (is_array($getuser) || is_object($getuser)) {
      foreach ($getuser as $i => $rowree)
        if (isset ($rowree)) {
          // print_r($rowree);
          echo '<option value="' . $rowree['member_name'] . ' ' . $rowree['member_lastname'] . '">' . $rowree['member_name'] . ' ' . $rowree['member_lastname'] . '</option>'; }
    }
    echo '
    <input type="hidden" name="checkname" value="4">
    <input type="hidden" name="edit_get_id" value="' . $rowre['dev_id'] . '">
    </form>';
  }
} else if (isset ($_POST['show_edit_sit_id'])) {
  // var_dump($_POST);
  $edit_user = $report->getallsit($_POST['show_edit_sit_id']);
  foreach ($edit_user as $i => $rowre) {
    echo '<form id="edit_report_form" method="POST" class="validated"
    enctype="multipart/form-data">
    <h5>วันที่เริ่มกำหนดแผน</h5>
    <input type="date" name="editstart" id="editstart" value="' . $rowre['getstart'] . '" class="form-control"><br>
    <h5>วันสิ้นสุดแผนแผน</h5>
    <input type="date" name="editend" id="editend" value="' . $rowre['getend'] . '" class="form-control"><br>
    <h5>ชื่อผู้รับผิดชอบกำหนดแผน</h5>
    <select name="editstartname" id="editstartname" class="form-control me-1">
    <option select>
    ' . $rowre['sit_getname'] . '
    </option>';
    if (is_array($getuser) || is_object($getuser)) {
      foreach ($getuser as $i => $rowree)
        if (isset ($rowree)) {
          // print_r($rowree);
          echo '<option value="' . $rowree['member_name'] . ' ' . $rowree['member_lastname'] . '">' . $rowree['member_name'] . ' ' . $rowree['member_lastname'] . '</option>'; }
    }
    echo '</select>
    <br>
    <h5>วันที่เริ่มปฎิบัติการ</h5>
    <input type="date" name="editworkstart" id="editworkstart" value="' . $rowre['sit_workstart'] . '" class="form-control"><br>
    <h5>วันสิ้นสุดปฎิบัติการ</h5>
    <input type="date" name="editworkend" id="editworkend" value="' . $rowre['sit_workend'] . '" class="form-control"><br>';
    echo '
    <h5>ชื่อผู้รับผิดชอบปฎิบัติการ</h5>
    <select name="editeworkname2" id="editeworkname2" class="form-control me-1">
    <option select>
    ' . $rowre['sit_work_name2'] . '
    </option>';
    if (is_array($getuser) || is_object($getuser)) {
      foreach ($getuser as $i => $rowree)
        if (isset ($rowree)) {
          // print_r($rowree);
          echo '<option value="' . $rowree['member_name'] . ' ' . $rowree['member_lastname'] . '">' . $rowree['member_name'] . ' ' . $rowree['member_lastname'] . '</option>'; }
    }
    echo '
    <input type="hidden" name="checkname" value="5">
    <input type="hidden" name="edit_get_id" value="' . $rowre['sit_id'] . '">
    </form>';
  }
} else if (isset ($_POST['show_edit_internal_id'])) {
  // var_dump($_POST);
  $edit_user = $report->getallinter($_POST['show_edit_internal_id']);
  foreach ($edit_user as $i => $rowre) {
    echo '<form id="edit_report_form" method="POST" class="validated"
    enctype="multipart/form-data">
    <h5>วันที่เริ่มกำหนดแผน</h5>
    <input type="date" name="editstart" id="editstart" value="' . $rowre['internalstart'] . '" class="form-control"><br>
    <h5>วันสิ้นสุดแผนแผน</h5>
    <input type="date" name="editend" id="editend" value="' . $rowre['internalend'] . '" class="form-control"><br>
    <h5>ชื่อผู้รับผิดชอบกำหนดแผน</h5>
    <select name="editstartname" id="editstartname" class="form-control me-1">
    <option select>
    ' . $rowre['internal_startname'] . '
    </option>';
    if (is_array($getuser) || is_object($getuser)) {
      foreach ($getuser as $i => $rowree)
        if (isset ($rowree)) {
          // print_r($rowree);
          echo '<option value="' . $rowree['member_name'] . ' ' . $rowree['member_lastname'] . '">' . $rowree['member_name'] . ' ' . $rowree['member_lastname'] . '</option>'; }
    }
    echo '</select>
    <br>
    <h5>วันที่เริ่มปฎิบัติการ</h5>
    <input type="date" name="editworkstart" id="editworkstart" value="' . $rowre['internal_workstart'] . '" class="form-control"><br>
    <h5>วันสิ้นสุดปฎิบัติการ</h5>
    <input type="date" name="editworkend" id="editworkend" value="' . $rowre['internal_workend'] . '" class="form-control"><br>';
    echo '
    <h5>ชื่อผู้รับผิดชอบปฎิบัติการ</h5>
    <select name="editeworkname2" id="editeworkname2" class="form-control me-1">
    <option select>
    ' . $rowre['internal_work_name2'] . '
    </option>';
    if (is_array($getuser) || is_object($getuser)) {
      foreach ($getuser as $i => $rowree)
        if (isset ($rowree)) {
          // print_r($rowree);
          echo '<option value="' . $rowree['member_name'] . ' ' . $rowree['member_lastname'] . '">' . $rowree['member_name'] . ' ' . $rowree['member_lastname'] . '</option>'; }
    }
    echo '
    <input type="hidden" name="checkname" value="6">
    <input type="hidden" name="edit_get_id" value="' . $rowre['internal_id'] . '">
    </form>';
  }
} else if (isset ($_POST['show_edit_usertest_id'])) {
  // var_dump($_POST);
  $edit_user = $report->getallusertest($_POST['show_edit_usertest_id']);
  foreach ($edit_user as $i => $rowre) {
    echo '<form id="edit_report_form" method="POST" class="validated"
    enctype="multipart/form-data">
    <h5>วันที่เริ่มกำหนดแผน</h5>
    <input type="date" name="editstart" id="editstart" value="' . $rowre['userteststart'] . '" class="form-control"><br>
    <h5>วันสิ้นสุดแผนแผน</h5>
    <input type="date" name="editend" id="editend" value="' . $rowre['usertestend'] . '" class="form-control"><br>
    <h5>ชื่อผู้รับผิดชอบกำหนดแผน</h5>
    <select name="editstartname" id="editstartname" class="form-control me-1">
    <option select>
    ' . $rowre['usertest_startname'] . '
    </option>';
    if (is_array($getuser) || is_object($getuser)) {
      foreach ($getuser as $i => $rowree)
        if (isset ($rowree)) {
          // print_r($rowree);
          echo '<option value="' . $rowree['member_name'] . ' ' . $rowree['member_lastname'] . '">' . $rowree['member_name'] . ' ' . $rowree['member_lastname'] . '</option>'; }
    }
    echo '</select>
    <br>
    <h5>วันที่เริ่มปฎิบัติการ</h5>
    <input type="date" name="editworkstart" id="editworkstart" value="' . $rowre['usertest_workstart'] . '" class="form-control"><br>
    <h5>วันสิ้นสุดปฎิบัติการ</h5>
    <input type="date" name="editworkend" id="editworkend" value="' . $rowre['usertest_workend'] . '" class="form-control"><br>';
    echo '
    <h5>ชื่อผู้รับผิดชอบปฎิบัติการ</h5>
    <select name="editeworkname2" id="editeworkname2" class="form-control me-1">
    <option select>
    ' . $rowre['usertest_work_name2'] . '
    </option>';
    if (is_array($getuser) || is_object($getuser)) {
      foreach ($getuser as $i => $rowree)
        if (isset ($rowree)) {
          // print_r($rowree);
          echo '<option value="' . $rowree['member_name'] . ' ' . $rowree['member_lastname'] . '">' . $rowree['member_name'] . ' ' . $rowree['member_lastname'] . '</option>'; }
    }
    echo '
    <input type="hidden" name="checkname" value="7">
    <input type="hidden" name="edit_get_id" value="' . $rowre['usertest_id'] . '">
    </form>';
  }
} else if (isset ($_POST['show_edit_end_id'])) {
  // var_dump($_POST);
  $edit_user = $report->getallend($_POST['show_edit_end_id']);
  foreach ($edit_user as $i => $rowre) {
    echo '<form id="edit_report_form" method="POST" class="validated"
    enctype="multipart/form-data">
    <h5>วันที่เริ่มกำหนดแผน</h5>
    <input type="date" name="editstart" id="editstart" value="' . $rowre['endstart'] . '" class="form-control"><br>
    <h5>วันสิ้นสุดแผนแผน</h5>
    <input type="date" name="editend" id="editend" value="' . $rowre['endend'] . '" class="form-control"><br>
    <h5>ชื่อผู้รับผิดชอบกำหนดแผน</h5>
    <select name="editstartname" id="editstartname" class="form-control me-1">
    <option select>
    ' . $rowre['end_startname'] . '
    </option>';
    if (is_array($getuser) || is_object($getuser)) {
      foreach ($getuser as $i => $rowree)
        if (isset ($rowree)) {
          // print_r($rowree);
          echo '<option value="' . $rowree['member_name'] . ' ' . $rowree['member_lastname'] . '">' . $rowree['member_name'] . ' ' . $rowree['member_lastname'] . '</option>'; }
    }
    echo '</select>
    <br>
    <h5>วันที่เริ่มปฎิบัติการ</h5>
    <input type="date" name="editworkstart" id="editworkstart" value="' . $rowre['end_workstart'] . '" class="form-control"><br>
    <h5>วันสิ้นสุดปฎิบัติการ</h5>
    <input type="date" name="editworkend" id="editworkend" value="' . $rowre['end_workend'] . '" class="form-control"><br>';
    echo '
    <h5>ชื่อผู้รับผิดชอบปฎิบัติการ</h5>
    <select name="editeworkname2" id="editeworkname2" class="form-control me-1">
    <option select>
    ' . $rowre['end_work_name2'] . '
    </option>';
    if (is_array($getuser) || is_object($getuser)) {
      foreach ($getuser as $i => $rowree)
        if (isset ($rowree)) {
          // print_r($rowree);
          echo '<option value="' . $rowree['member_name'] . ' ' . $rowree['member_lastname'] . '">' . $rowree['member_name'] . ' ' . $rowree['member_lastname'] . '</option>'; }
    }
    echo '
    <input type="hidden" name="checkname" value="8">
    <input type="hidden" name="edit_get_id" value="' . $rowre['end_id'] . '">
    </form>';
  }
}

if (isset ($_POST['edit_get_id'])) {
  $getupdate->edit_get($_POST);
}
else if(isset($_POST['member_id'])) {
  $getupdate->edit_member($_POST);
}
// var_dump($_POST);
if (isset ($_POST['delete_project'])) {
  $delete->delete_project($_POST['delete_project']);
} 
else if (isset ($_POST['delete_all'])) {
  $delete->delete_all($_POST['delete_all']);
}
else if (isset ($_POST['delete_member'])) {
  $delete->delete_member($_POST['delete_member']);
}
?>