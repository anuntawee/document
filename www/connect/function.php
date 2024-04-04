<?php
class dbh
{
	private $host;
	private $Username;
	private $password;
	private $db;

	protected function connect()
	{
		$this->host = "localhost";
		$this->Username = "root";
		$this->password = "";
		$this->db = "projectscg";
		$con = new mysqli($this->host = "localhost", $this->Username = "root", $this->password = "", $this->db = "projectscg");
		$con->set_charset("utf8");
		date_default_timezone_set('Asia/Bangkok');
		return $con;
	}
}
class User extends dbh
{
	public function getallproject()
	{
		$sql = "SELECT * FROM tb_project WHERE project_id";
		$result = $this->connect()->query($sql);
		$numROW = $result->num_rows;
		if ($numROW > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}
	}
	public function getalluser()
	{
		$sql = "SELECT * FROM tb_member WHERE member_id";
		$result = $this->connect()->query($sql);
		$numROW = $result->num_rows;
		if ($numROW > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}
	}
	public function getdocstatus($condition = "")
	{
		$sql = "SELECT * FROM tb_doc";
		if (!empty ($condition)) {
			$sql .= " WHERE " . $condition;
		}
		$result = $this->connect()->query($sql);
		$data = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
		}
		return $data;
	}
	public function getallget($condition = "")
	{
		$sql = "SELECT * FROM tb_get";
		if (!empty ($condition)) {
			$sql .= " WHERE " . $condition;
		}
		$result = $this->connect()->query($sql);
		$data = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
		}
		return $data;
	}
	public function getallpro($condition = "")
	{
		$sql = "SELECT * FROM tb_pro";
		if (!empty ($condition)) {
			$sql .= " WHERE " . $condition;
		}
		$result = $this->connect()->query($sql);
		$data = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
		}
		return $data;
	}
	public function getallsign($condition = "")
	{
		$sql = "SELECT * FROM tb_sign";
		if (!empty ($condition)) {
			$sql .= " WHERE " . $condition;
		}
		$result = $this->connect()->query($sql);
		$data = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
		}
		return $data;
	}
	public function getalldev($condition = "")
	{
		$sql = "SELECT * FROM tb_dev";
		if (!empty ($condition)) {
			$sql .= " WHERE " . $condition;
		}
		$result = $this->connect()->query($sql);
		$data = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
		}
		return $data;
	}
	public function getallsit($condition = "")
	{
		$sql = "SELECT * FROM tb_sit";
		if (!empty ($condition)) {
			$sql .= " WHERE " . $condition;
		}
		$result = $this->connect()->query($sql);
		$data = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
		}
		return $data;
	}
	public function getallinter($condition = "")
	{
		$sql = "SELECT * FROM tb_internal";
		if (!empty ($condition)) {
			$sql .= " WHERE " . $condition;
		}
		$result = $this->connect()->query($sql);
		$data = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
		}
		return $data;
	}
	public function getallusertest($condition = "")
	{
		$sql = "SELECT * FROM tb_usertest";
		if (!empty ($condition)) {
			$sql .= " WHERE " . $condition;
		}
		$result = $this->connect()->query($sql);
		$data = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
		}
		return $data;
	}
	public function getallend($condition = "")
	{
		$sql = "SELECT * FROM tb_end";
		if (!empty ($condition)) {
			$sql .= " WHERE " . $condition;
		}
		$result = $this->connect()->query($sql);
		$data = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
		}
		return $data;
	}

	public function getwheredoc($condition1 = "", $condition2 = "")
	{
		$sql = "SELECT * FROM tb_doc";
		if (!empty ($condition1) && !empty ($condition2)) {
			$sql .= " WHERE " . $condition1 . " AND " . $condition2;
		} elseif (!empty ($condition1)) {
			$sql .= " WHERE " . $condition1;
		} elseif (!empty ($condition2)) {
			$sql .= " WHERE " . $condition2;
		}
		$result = $this->connect()->query($sql);
		$data = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
		}
		return $data;
	}
	public function getdraftdoc_version($condition1 = "", $condition2 = "")
	{
		$sql = "SELECT `doc_version`, DATE_FORMAT(`doc_time`, '%Y-%m-%d %H:%i:%s') AS `formatted_doc_time` FROM `tb_doc` WHERE `doc_status` = 'Draft'";
		// เพิ่มเงื่อนไขการค้นหาที่ถูกส่งมาในพารามิเตอร์
		if (!empty ($condition1)) {
			$sql .= " AND " . $condition1;
		}
		if (!empty ($condition2)) {
			$sql .= " AND " . $condition2;
		}
		$sql .= " ORDER BY `doc_time` DESC LIMIT 1;";
		$result = $this->connect()->query($sql);
		$data = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
		}
		return $data;
	}
	public function getreviewdoc_version($condition1 = "", $condition2 = "")
	{
		$sql = "SELECT `doc_version`, DATE_FORMAT(`doc_time`, '%Y-%m-%d %H:%i:%s') AS `formatted_doc_time` FROM `tb_doc` WHERE `doc_status` = 'Review'";
		if (!empty ($condition1)) {
			$sql .= " AND " . $condition1;
		}
		if (!empty ($condition2)) {
			$sql .= " AND " . $condition2;
		}
		$sql .= " ORDER BY `doc_time` DESC LIMIT 1;";
		$result = $this->connect()->query($sql);
		$data = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
		}
		return $data;
	}
	public function getfinaldoc_version($condition1 = "", $condition2 = "")
	{
		$sql = "SELECT `doc_version`, DATE_FORMAT(`doc_time`, '%Y-%m-%d %H:%i:%s') AS `formatted_doc_time` FROM `tb_doc` WHERE `doc_status` = 'Final'";
		if (!empty ($condition1)) {
			$sql .= " AND " . $condition1;
		}
		if (!empty ($condition2)) {
			$sql .= " AND " . $condition2;
		}
		$sql .= " ORDER BY `doc_time` DESC LIMIT 1;";
		$result = $this->connect()->query($sql);
		$data = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
		}
		return $data;
	}
	public function getintelnaldoc_version($condition1 = "", $condition2 = "")
	{
		$sql = "SELECT `doc_version`, DATE_FORMAT(`doc_time`, '%Y-%m-%d %H:%i:%s') AS `formatted_doc_time` FROM `tb_doc` WHERE `doc_status` = 'InternalSign'";
		if (!empty ($condition1)) {
			$sql .= " AND " . $condition1;
		}
		if (!empty ($condition2)) {
			$sql .= " AND " . $condition2;
		}
		$sql .= " ORDER BY `doc_time` DESC LIMIT 1;";
		$result = $this->connect()->query($sql);
		$data = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
		}
		return $data;
	}
	public function getextelnaldoc_version($condition1 = "", $condition2 = "")
	{
		$sql = "SELECT `doc_version`, DATE_FORMAT(`doc_time`, '%Y-%m-%d %H:%i:%s') AS `formatted_doc_time` FROM `tb_doc` WHERE `doc_status` = 'ExternaSign'";
		if (!empty ($condition1)) {
			$sql .= " AND " . $condition1;
		}
		if (!empty ($condition2)) {
			$sql .= " AND " . $condition2;
		}
		$sql .= " ORDER BY `doc_time` DESC LIMIT 1;";
		$result = $this->connect()->query($sql);
		$data = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
		}
		return $data;
	}
	public function getalltem()
	{
		$sql = "SELECT * FROM tb_template";
		$result = $this->connect()->query($sql);
		$numROW = $result->num_rows;
		if ($numROW > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}
	}
}
class report extends dbh
{
	public function getallproject_id($id)
	{
		$sql = "SELECT * FROM `tb_project` WHERE `project_id` = $id;";
		$result = $this->connect()->query($sql);
		$numROW = $result->num_rows;
		if ($numROW > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}
	}
	public function getallget($id)
	{
		$sql = "SELECT * FROM `tb_get` WHERE `get_id` = '$id'";
		$result = $this->connect()->query($sql);
		$numROW = $result->num_rows;
		if ($numROW > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}
	}
	public function getallpro($id)
	{
		$sql = "SELECT * FROM tb_pro WHERE `pro_id` = '$id'";
		$result = $this->connect()->query($sql);
		$numROW = $result->num_rows;
		if ($numROW > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}
	}
	public function getallsign($id)
	{
		$sql = "SELECT * FROM tb_sign WHERE `sign_id` = '$id'";
		$result = $this->connect()->query($sql);
		$numROW = $result->num_rows;
		if ($numROW > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}
	}
	public function getalldev($id)
	{
		$sql = "SELECT * FROM tb_dev WHERE `dev_id` = '$id'";
		$result = $this->connect()->query($sql);
		$numROW = $result->num_rows;
		if ($numROW > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}
	}
	public function getallsit($id)
	{
		$sql = "SELECT * FROM tb_sit WHERE `sit_id` = '$id'";
		$result = $this->connect()->query($sql);
		$numROW = $result->num_rows;
		if ($numROW > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}
	}
	public function getallinter($id)
	{
		$sql = "SELECT * FROM tb_internal WHERE `internal_id` = '$id'";
		$result = $this->connect()->query($sql);
		$numROW = $result->num_rows;
		if ($numROW > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}
	}
	public function getallusertest($id)
	{
		$sql = "SELECT * FROM tb_usertest WHERE `usertest_id` = '$id'";
		$result = $this->connect()->query($sql);
		$numROW = $result->num_rows;
		if ($numROW > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}
	}
	public function getallend($id)
	{
		$sql = "SELECT * FROM tb_end WHERE `end_id` = '$id'";
		$result = $this->connect()->query($sql);
		$numROW = $result->num_rows;
		if ($numROW > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}
	}
}
class delete extends dbh
{
	public function delete_project($id)
	{
		$db = $this->connect();
		var_dump($id);
		$del_user = $db->prepare("DELETE FROM tb_project WHERE project_id = ?;");
		$del_user->bind_param("i", $id);
		if (!$del_user->execute()) {
			echo $db->error;
		} else {
			echo "ลบข้อมูลเรียบร้อย";
		}
	}
	public function delete_all($id)
	{
		$db = $this->connect();
		$del_get = $db->prepare("DELETE FROM tb_get WHERE get_project_name = ?");
		$del_pro = $db->prepare("DELETE FROM tb_pro WHERE pro_project_name = ?");
		$del_sign = $db->prepare("DELETE FROM tb_sign WHERE sign_project_name = ?");
		$del_dev = $db->prepare("DELETE FROM tb_dev WHERE dev_project_name = ?");
		$del_sit = $db->prepare("DELETE FROM tb_sit WHERE sit_project_name = ?");
		$del_internal = $db->prepare("DELETE FROM tb_internal WHERE internal_project_name = ?");
		$del_usertest = $db->prepare("DELETE FROM tb_usertest WHERE usertest_project_name = ?");
		$del_end = $db->prepare("DELETE FROM tb_end WHERE end_project_name = ?");
		$del_get->bind_param('s', $id);
		$del_pro->bind_param('s', $id);
		$del_sign->bind_param('s', $id);
		$del_dev->bind_param('s', $id);
		$del_sit->bind_param('s', $id);
		$del_internal->bind_param('s', $id);
		$del_usertest->bind_param('s', $id);
		$del_end->bind_param('s', $id);
		if (
			!$del_get->execute() || !$del_pro->execute() || !$del_sign->execute() || !$del_dev->execute() ||
			!$del_sit->execute() || !$del_internal->execute() || !$del_usertest->execute() || !$del_end->execute()
		) {
			echo $db->error;
		} else {
			echo "ลบข้อมูลเรียบร้อย";
		}
	}
	public function delete_member($id)
	{
		$db = $this->connect();
		var_dump($id);
		$del_user = $db->prepare("DELETE FROM tb_member WHERE member_id = ?;");
		$del_user->bind_param("i", $id);
		if (!$del_user->execute()) {
			echo $db->error;
		} else {
			echo "ลบข้อมูลเรียบร้อย";
		}
	}
}

class update extends dbh
{
	public function edit_get($data)
	{
		$db = $this->connect();
		if ($data['checkname'] === '1') {
			$edit_user = $db->prepare("UPDATE `tb_get` SET `getstart` = ?, `getend` = ?, `get_statname` = ?, `get_workstart` = ?, `get_workend` =?,`get_work_name2` =? WHERE `tb_get`.`get_id` = ?;");
		} else if ($data['checkname'] === '2') {
			$edit_user = $db->prepare("UPDATE `tb_pro` SET `prostart` = ?, `proend` = ?, `pro_statname` = ?, `pro_workstart` = ?, `pro_workend` =?,`pro_work_name2` =? WHERE `tb_pro`.`pro_id` = ?;");
		} else if ($data['checkname'] === '3') {
			$edit_user = $db->prepare("UPDATE `tb_sign` SET `sign_start` = ?, `sign_end` = ?, `sign_startname` = ?, `sign_workname` = ?, `sign_workend` =?, `sign_work_name2` =? WHERE `tb_sign`.`sign_id` = ?;");
		} else if ($data['checkname'] === '4') {
			$edit_user = $db->prepare("UPDATE `tb_dev` SET `devstart` = ?, `devend` = ?, `dev_startname` = ?, `dev_workstart` = ?, `dev_workend` =?, `dev_work_name2` =? WHERE `tb_dev`.`dev_id` = ?;");
		} else if ($data['checkname'] === '5') {
			$edit_user = $db->prepare("UPDATE `tb_sit` SET `getstart` = ?, `getend` = ?, `sit_getname` = ?, `sit_workstart` = ?, `sit_workend` =?, `sit_work_name2` =? WHERE `tb_sit`.`sit_id` = ?;");
		} else if ($data['checkname'] === '6') {
			$edit_user = $db->prepare("UPDATE `tb_internal` SET `internalstart` = ?, `internalend` = ?, `internal_startname` = ?, `internal_workstart` = ?, `internal_workend` =?,`internal_work_name2` =? WHERE `tb_internal`.`internal_id` = ?;");
		} else if ($data['checkname'] === '7') {
			$edit_user = $db->prepare("UPDATE `tb_usertest` SET `userteststart` = ?, `usertestend` = ?, `usertest_startname` = ?, `usertest_workstart` = ?, `usertest_workend` =?,`usertest_work_name2` =? WHERE `tb_usertest`.`usertest_id` = ?;");
		} else if ($data['checkname'] === '8') {
			$edit_user = $db->prepare("UPDATE `tb_end` SET `endstart` = ?, `endend` = ?, `end_startname` = ?, `end_workstart` = ?, `end_workend` =?, `end_work_name2` =? WHERE `tb_end`.`end_id` = ?;");
		}
		$edit_user->bind_param(
			"ssssssi",
			$data['editstart'],
			$data['editend'],
			$data['editstartname'],
			$data['editworkstart'],
			$data['editworkend'],
			$data['editeworkname2'],
			$data['edit_get_id']
		);
		if (!$edit_user->execute()) {
			echo $db->error;
			// var_dump($data);
		} else {
			// var_dump($data);
			echo "แก้ไขข้อมูลเรียบร้อย";
		}
	}
	public function edit_member($data)
	{
		$db = $this->connect();
		$member_id = $data['member_id'];
		if (isset ($data['view'])) {
			$edit_user = $db->prepare("UPDATE `tb_member` SET `member_view` = ? WHERE `tb_member`.`member_id` = ?");
			$edit_user->bind_param("si", $data['view'], $member_id);
		} elseif (isset ($data['comment'])) {
			$edit_user = $db->prepare("UPDATE `tb_member` SET `member_comment` = ? WHERE `tb_member`.`member_id` = ?");
			$edit_user->bind_param("si", $data['comment'], $member_id);
		} elseif (isset ($data['edits'])) {
			$edit_user = $db->prepare("UPDATE `tb_member` SET `member_edits` = ? WHERE `tb_member`.`member_id` = ?");
			$edit_user->bind_param("si", $data['edits'], $member_id);
		} elseif (isset ($data['approve'])) {
			$edit_user = $db->prepare("UPDATE `tb_member` SET `member_approve` = ? WHERE `tb_member`.`member_id` = ?");
			$edit_user->bind_param("si", $data['approve'], $member_id);
		} elseif (isset ($data['signoff'])) {
			$edit_user = $db->prepare("UPDATE `tb_member` SET `member_signoff` = ? WHERE `tb_member`.`member_id` = ?");
			$edit_user->bind_param("si", $data['signoff'], $member_id);
		}
		if ($edit_user->execute()) {
			// var_dump($data);
			echo "Successfully updated data.";
		} else {
			echo $db->error;
		}
	}

	// public function edit_report($data)
	// {
	// 	$db = $this->connect();
	// 	$edit_user = $db->prepare("UPDATE `tb_report` SET `report_name` = ?, `report_detail` = ?, `report_time` = ?, `report_location` = ?, `report_img_name` = ?, `report_type` = ? WHERE `tb_report`.`report_id` = ?;");

	// 	// Check if a new image is being uploaded
	// 	if (!empty ($_FILES["editfileUpload"]["name"])) {
	// 		$targetDirectory = "../images/";
	// 		$targetFilePath = $targetDirectory . basename($_FILES["editfileUpload"]["name"]);
	// 		$uploadOk = move_uploaded_file($_FILES["editfileUpload"]["tmp_name"], $targetFilePath);
	// 		if (!$uploadOk) {
	// 			echo json_encode(["success" => false, "message" => "Error uploading file."]);
	// 			return;
	// 		}
	// 		$imagePath = $targetFilePath;
	// 	} else {
	// 		// No new image uploaded, keep the existing image path
	// 		// $imagePath = $data['existingImagePath'];
	// 		$imagePath = $data['editfileuploadnull'];
	// 	}

	// 	$edit_user->bind_param("ssssssi", $data['editid_name'], $data['editdetail'], $data['edittime'], $data['editreport_location'], $imagePath, $data['edittype'], $data['edit_report_id']);

	// 	$success = $edit_user->execute();

	// 	if (!$success) {
	// 		echo json_encode(["success" => false, "message" => "Database error: " . $db->error]);
	// 	} else {
	// 		echo json_encode(["success" => true, "message" => "Data updated successfully."]);
	// 	}
	// }


}
class insert extends dbh
{
	public function add_project($data)
	{
		$db = $this->connect();
		$jsonData = json_encode($data['project_person']);
		$jsonData = json_encode($data['selectedOptions']);
		$add_user = $db->prepare("INSERT INTO tb_project(project_id,project_name,project_person) VALUES(NULL,?,?) ");
		$add_user->bind_param("ss", $data['project_name'], $jsonData);
		if (!$add_user->execute()) {
			echo $db->error;
		} else {
			echo "บันทึกข้อมูลเรียบร้อย";
		}
	}
	public function add_user($data)
	{
		$db = $this->connect();
		$add_user = $db->prepare("INSERT INTO `tb_member` (`member_id`, `member_name`, `member_lastname`, `member_email`, `member_pass`, `member_role`, `member_view`, `member_comment`, `member_edits`, `member_approve`, `member_signoff`) VALUES (NULL, ?, ?, ?, ?, ?, NULL, NULL, NULL, NULL, NULL);");
		$add_user->bind_param("sssss", $data['member_name'], $data['member_lastname'], $data['member_email'], $data['member_pass'], $data['member_role']);
		if (!$add_user->execute()) {
			echo $db->error;
		} else {
			echo "บันทึกข้อมูลเรียบร้อย";
		}
	}
	public function add_timeplan($data)
	{
		$db = $this->connect();
		if (isset ($data['timeplan_status_name'])) {
			$add_user_get = $db->prepare("INSERT INTO `tb_get` (`get_id`, `get_name`, `getstart`, `getend`, `get_statname`, `get_workstart`, `get_workend`, `get_work_name2`, `get_project_name`) VALUES (NULL,?,?,?,?,?,?,?,?);");
			$add_user_get->bind_param(
				"ssssssss",
				$data['timeplan_status_name'],
				$data['timeplan_re_getstart'],
				$data['timeplan_re_getend'],
				$data['timeplan_re_getname'],
				$data['timeplan_re_workstart'],
				$data['timeplan_re_workend'],
				$data['timeplan_re_workname'],
				$data['timeplan_project_name'],
			);
		}
		if (isset ($data['timeplan_status_name_2'])) {
			$add_user_pro = $db->prepare("INSERT INTO `tb_pro` (`pro_id`, `pro_nam`, `prostart`, `proend`, `pro_statname`, `pro_workstart`, `pro_workend`, `pro_work_name2`, `pro_project_name`) VALUES (NULL,?,?,?,?,?,?,?,?);");
			$add_user_pro->bind_param(
				"ssssssss",
				$data['timeplan_status_name_2'],
				$data['timeplan_pro_getstart'],
				$data['timeplan_pro_getend'],
				$data['timeplan_pro_getname'],
				$data['timeplan_pro_workstart'],
				$data['timeplan_pro_workend'],
				$data['timeplan_pro_workname'],
				$data['timeplan_project_name'],
			);
		}
		if (isset ($data['timeplan_status_name_3'])) {
			$add_user_sign = $db->prepare("INSERT INTO `tb_sign` (`sign_id`, `sign_name`, `sign_start`, `sign_end`, `sign_startname`, `sign_workname`, `sign_workend`, `sign_work_name2`, `sign_project_name`) VALUES (NULL,?,?,?,?,?,?,?,?);");
			$add_user_sign->bind_param(
				"ssssssss",
				$data['timeplan_status_name_3'],
				$data['timeplan_sing_getstart'],
				$data['timeplan_sing_getend'],
				$data['timeplan_sing_getname'],
				$data['timeplan_sing_workstart'],
				$data['timeplan_sing_workend'],
				$data['timeplan_sing_workname'],
				$data['timeplan_project_name'],
			);
		}
		if (isset ($data['timeplan_status_name_4'])) {
			$add_user_dev = $db->prepare("INSERT INTO `tb_dev` (`dev_id`, `dev_name`, `devstart`, `devend`, `dev_startname`, `dev_workstart`, `dev_workend`, `dev_work_name2`, `dev_project_name`) VALUES (NULL,?,?,?,?,?,?,?,?);");
			$add_user_dev->bind_param(
				"ssssssss",
				$data['timeplan_status_name_4'],
				$data['timeplan_dev_getstart'],
				$data['timeplan_dev_getend'],
				$data['timeplan_dev_getname'],
				$data['timeplan_dev_workstart'],
				$data['timeplan_dev_workend'],
				$data['timeplan_dev_workname'],
				$data['timeplan_project_name'],
			);
		}
		if (isset ($data['timeplan_status_name_5'])) {
			$add_user_sit = $db->prepare("INSERT INTO `tb_sit` (`sit_id`, `sit_name`, `getstart`, `getend`, `sit_getname`, `sit_workstart`, `sit_workend`, `sit_work_name2`, `sit_project_name`) VALUES (NULL,?,?,?,?,?,?,?,?);");
			$add_user_sit->bind_param(
				"ssssssss",
				$data['timeplan_status_name_5'],
				$data['timeplan_sit_getstart'],
				$data['timeplan_sit_getend'],
				$data['timeplan_sit_getname'],
				$data['timeplan_sit_workstart'],
				$data['timeplan_sit_workend'],
				$data['timeplan_sit_workname'],
				$data['timeplan_project_name'],
			);
		}
		if (isset ($data['timeplan_status_name_6'])) {
			$add_user_interlnal = $db->prepare("INSERT INTO `tb_internal` (`internal_id`, `internal_name`, `internalstart`, `internalend`, `internal_startname`, `internal_workstart`, `internal_workend`, `internal_work_name2`, `internal_project_name`) VALUES (NULL,?,?,?,?,?,?,?,?);");
			$add_user_interlnal->bind_param(
				"ssssssss",
				$data['timeplan_status_name_6'],
				$data['timeplan_inter_getstart'],
				$data['timeplan_inter_getend'],
				$data['timeplan_inter_getname'],
				$data['timeplan_inter_workstart'],
				$data['timeplan_inter_workend'],
				$data['timeplan_inter_workname'],
				$data['timeplan_project_name'],
			);
		}
		if (isset ($data['timeplan_status_name_7'])) {
			$add_user_user = $db->prepare("INSERT INTO `tb_usertest` (`usertest_id`, `usertest_name`, `userteststart`, `usertestend`, `usertest_startname`, `usertest_workstart`, `usertest_workend`, `usertest_work_name2`, `usertest_project_name`) VALUES (NULL,?,?,?,?,?,?,?,?);");
			$add_user_user->bind_param(
				"ssssssss",
				$data['timeplan_status_name_7'],
				$data['timeplan_user_getstart'],
				$data['timeplan_user_getend'],
				$data['timeplan_user_getname'],
				$data['timeplan_user_workstart'],
				$data['timeplan_user_workend'],
				$data['timeplan_user_workname'],
				$data['timeplan_project_name'],
			);
		}
		if (isset ($data['timeplan_status_name_8'])) {
			$add_user_end = $db->prepare("INSERT INTO `tb_end` (`end_id`, `end_name`, `endstart`, `endend`, `end_startname`, `end_workstart`, `end_workend`, `end_work_name2`, `end_project_name`) VALUES (NULL,?,?,?,?,?,?,?,?);");
			$add_user_end->bind_param(
				"ssssssss",
				$data['timeplan_status_name_8'],
				$data['timeplan_end_getstart'],
				$data['timeplan_end_getend'],
				$data['timeplan_end_getname'],
				$data['timeplan_end_workstart'],
				$data['timeplan_end_workend'],
				$data['timeplan_end_workname'],
				$data['timeplan_project_name'],
			);
		}
		if ($add_user_get->execute()) {
			if ($add_user_pro->execute()) {
				if ($add_user_sign->execute()) {
					if ($add_user_dev->execute()) {
						if ($add_user_sit->execute()) {
							if ($add_user_interlnal->execute()) {
								if ($add_user_user->execute()) {
									if ($add_user_end->execute()) {
										echo "บันทึกข้อมูลเรียบร้อย";
									} else {
										echo "เกิดข้อผิดพลาดในการเพิ่มข้อมูลในตาราง tb_sign:" . $db->error;
									}
								} else {
									echo "เกิดข้อผิดพลาดในการเพิ่มข้อมูลในตาราง tb_pro:" . $db->error;
								}
							} else {
								echo "เกิดข้อผิดพลาดในการเพิ่มข้อมูลในตาราง tb_get:" . $db->error;
							}
						} else {
							echo "เกิดข้อผิดพลาดในการเพิ่มข้อมูลในตาราง tb_dev:" . $db->error;
						}
					} else {
						echo "เกิดข้อผิดพลาดในการเพิ่มข้อมูลในตาราง tb_sit:" . $db->error;
					}
				} else {
					echo "เกิดข้อผิดพลาดในการเพิ่มข้อมูลในตาราง tb_interlnal:" . $db->error;
				}
			} else {
				echo "เกิดข้อผิดพลาดในการเพิ่มข้อมูลในตาราง tb_user:" . $db->error;
			}
		} else {
			echo "เกิดข้อผิดพลาดในการเพิ่มข้อมูลในตาราง tb_end:" . $db->error;
		}
		$add_user_get->close();
		$add_user_pro->close();
		$add_user_sign->close();
		$add_user_dev->close();
		$add_user_sit->close();
		$add_user_interlnal->close();
		$add_user_user->close();
		$add_user_end->close();

		// $add_user = $db->prepare("INSERT INTO `tb_timeplan` (`timeplan_id`, `timeplan_project_name`, `timeplan_status_name`, `timeplan_re_getstart`, 
		// `timeplan_re_getend`, `timeplan_re_getname`, `timeplan_re_workstart`, `timeplan_re_workend`, `timeplan_re_workname`, `timeplan_status_name_2`, 
		// `timeplan_pro_getstart`, `timeplan_pro_getend`, `timeplan_pro_getname`, `timeplan_pro_workstart`, `timeplan_pro_workend`, `timeplan_pro_workname`, 
		// `timeplan_status_name_3`, `timeplan_sing_getstart`, `timeplan_sing_getend`, `timeplan_sing_getname`, `timeplan_sing_workstart`, `timeplan_sing_workend`, 
		// `timeplan_sing_workname`, `timeplan_status_name_4`, `timeplan_dev_getstart`, `timeplan_dev_getend`, `timeplan_dev_getname`, `timeplan_dev_workstart`, 
		// `timeplan_dev_workend`, `timeplan_dev_workname`, `timeplan_status_name_5`, `timeplan_sit_getstart`, `timeplan_sit_getend`, `timeplan_sit_getname`, 
		// `timeplan_sit_workstart`, `timeplan_sit_workend`, `timeplan_sit_workname`, `timeplan_status_name_6`, `timeplan_inter_getstart`, `timeplan_inter_getend`, 
		// `timeplan_inter_getname`, `timeplan_inter_workstart`, `timeplan_inter_workend`, `timeplan_inter_workname`, `timeplan_status_name_7`, `timeplan_user_getstart`, 
		// `timeplan_user_getend`, `timeplan_user_getname`, `timeplan_user_workstart`, `timeplan_user_workend`, `timeplan_user_workname`, `timeplan_status_name_8`, 
		// `timeplan_end_getstart`, `timeplan_end_getend`, `timeplan_end_getname`, `timeplan_end_workstart`, `timeplan_end_workend`, `timeplan_end_workname`) 
		// VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
		// ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
		// $add_user->bind_param(
		// 	"sssssssssssssssssssssssssssssssssssssssssssssssssssssssss",
		// );
	}
	public function add_doc($data)
	{
		$targetDirectory = "../document/{$data['doc_project_name']}/{$data['template_name']}/";
		if (!file_exists($targetDirectory)) {
			if (!mkdir($targetDirectory, 0777, true)) {
				echo "เกิดข้อผิดพลาดในการสร้างโฟลเดอร์";
			}
		}
		// $targetDirectory = "../document/{$data['doc_project_name']}/{$data['template_name']}/";
		$targetFilePath = $targetDirectory . basename($_FILES["fileUpload"]["name"]);
		$uploadOk = move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $targetFilePath);
		$filename = basename($_FILES["fileUpload"]["name"]);
		if (!$uploadOk) {
			// echo json_encode(["success" => false, "message" => "Error uploading file."]);
			echo 'กรุณาแนบไฟล์ก่อนที่จะส่งข้อมูล';
			// echo json_encode(["success" => false, "message" => "Error uploading file."]);
			// var_dump($data);
			// var_dump($_FILES);
			return;
		}
		$db = $this->connect();
		$add_user = $db->prepare("INSERT INTO `tb_doc` (`doc_id`, `doc_name`, `doc_path`, `doc_status`, `doc_version`, `doc_project_name`, `doc_upload_by`, `doc_template`, `doc_time`) 
		VALUES (NULL,?,?,?,?,?,?,?,NOW());");
		$add_user->bind_param(
			"sssssss",
			$filename,
			$targetFilePath,
			$data['doc_status'],
			$data['doc_version'],
			$data['doc_project_name'],
			$data['doc_upload_by'],
			$data['template_name'],
		);
		if (!$add_user->execute()) {
			echo $db->error;
		} else {
			echo "บันทึกข้อมูลเรียบร้อย";
		}
	}
}
?>