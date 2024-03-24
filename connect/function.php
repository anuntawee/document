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
	public function getalltimeplan($condition = "")
	{
		$sql = "SELECT * FROM tb_timeplan";
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

	public function getalldoc()
	{
		$sql = "SELECT * FROM tb_doc WHERE doc_id";
		$result = $this->connect()->query($sql);
		$numROW = $result->num_rows;
		if ($numROW > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}
	}
	public function getdraftdoc_version()
	{
		$sql = "SELECT `doc_version`, DATE_FORMAT(`doc_time`, '%Y-%m-%d %H:%i:%s') AS `formatted_doc_time` FROM `tb_doc` WHERE `doc_status` = 'Draft' ORDER BY `doc_time` DESC LIMIT 1;";
		$result = $this->connect()->query($sql);
		$numROW = $result->num_rows;
		if ($numROW > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}
	}
	public function getreviewdoc_version()
	{
		$sql = "SELECT `doc_version`, DATE_FORMAT(`doc_time`, '%Y-%m-%d %H:%i:%s') AS `formatted_doc_time` FROM `tb_doc` WHERE `doc_status` = 'Review' ORDER BY `doc_time` DESC LIMIT 1;";
		$result = $this->connect()->query($sql);
		$numROW = $result->num_rows;
		if ($numROW > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}
	}
	public function getfinaldoc_version()
	{
		$sql = "SELECT `doc_version`, DATE_FORMAT(`doc_time`, '%Y-%m-%d %H:%i:%s') AS `formatted_doc_time` FROM `tb_doc` WHERE `doc_status` = 'Final' ORDER BY `doc_time` DESC LIMIT 1;";
		$result = $this->connect()->query($sql);
		$numROW = $result->num_rows;
		if ($numROW > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}
	}
	public function getintelnaldoc_version()
	{
		$sql = "SELECT `doc_version`, DATE_FORMAT(`doc_time`, '%Y-%m-%d %H:%i:%s') AS `formatted_doc_time` FROM `tb_doc` WHERE `doc_status` = 'InternalSign' ORDER BY `doc_time` DESC LIMIT 1;";
		$result = $this->connect()->query($sql);
		$numROW = $result->num_rows;
		if ($numROW > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}
	}
	public function getextelnaldoc_version()
	{
		$sql = "SELECT `doc_version`, DATE_FORMAT(`doc_time`, '%Y-%m-%d %H:%i:%s') AS `formatted_doc_time` FROM `tb_doc` WHERE `doc_status` = 'ExternaSign' ORDER BY `doc_time` DESC LIMIT 1;";
		$result = $this->connect()->query($sql);
		$numROW = $result->num_rows;
		if ($numROW > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}
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
}
class delete extends dbh
{
	public function delete_project($id)
	{
		$db = $this->connect();
		$del_user = $db->prepare("DELETE FROM tb_project WHERE project_id = ?;");
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
	// public function edit_user($data)
	// {
	// 	$db = $this->connect();
	// 	$edit_user = $db->prepare("UPDATE `tb_member` SET `member_view` = ?, `member_comment` = ?, `member_edits` = ?, `member_approve` = ?, `member_signoff` =? WHERE `tb_member`.`member_id` = ?;
	// 		");
	// 	$edit_user->bind_param("sssssi", $data['view'], $data['comment'], $data['edits'], $data['approve'], $data['signoff'],$data['member_id']);
	// 	if (!$edit_user->execute()) {
	// 		echo $db->error;
	// 	} else {
	// 		var_dump($data);
	// 		echo "แก้ไขข้อมูลเรียบร้อย";
	// 	}
	// }
	public function edit_user($data)
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

	public function edit_report($data)
	{
		$db = $this->connect();
		$edit_user = $db->prepare("UPDATE `tb_report` SET `report_name` = ?, `report_detail` = ?, `report_time` = ?, `report_location` = ?, `report_img_name` = ?, `report_type` = ? WHERE `tb_report`.`report_id` = ?;");

		// Check if a new image is being uploaded
		if (!empty ($_FILES["editfileUpload"]["name"])) {
			$targetDirectory = "../images/";
			$targetFilePath = $targetDirectory . basename($_FILES["editfileUpload"]["name"]);
			$uploadOk = move_uploaded_file($_FILES["editfileUpload"]["tmp_name"], $targetFilePath);
			if (!$uploadOk) {
				echo json_encode(["success" => false, "message" => "Error uploading file."]);
				return;
			}
			$imagePath = $targetFilePath;
		} else {
			// No new image uploaded, keep the existing image path
			// $imagePath = $data['existingImagePath'];
			$imagePath = $data['editfileuploadnull'];
		}

		$edit_user->bind_param("ssssssi", $data['editid_name'], $data['editdetail'], $data['edittime'], $data['editreport_location'], $imagePath, $data['edittype'], $data['edit_report_id']);

		$success = $edit_user->execute();

		if (!$success) {
			echo json_encode(["success" => false, "message" => "Database error: " . $db->error]);
		} else {
			echo json_encode(["success" => true, "message" => "Data updated successfully."]);
		}
	}


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
		$add_user = $db->prepare("INSERT INTO `tb_member` (`memer_id`, `member_name`, `member_lastname`, `member_email`, `member_role`, `member_view`, `member_comment`, `member_edits`, `member_approve`, `member_signoff`) VALUES (NULL,?,?,?,?,NULL, NULL, NULL, NULL, NULL);");
		$add_user->bind_param("ssss", $data['member_name'], $data['member_lastname'], $data['member_email'], $data['member_role']);
		if (!$add_user->execute()) {
			echo $db->error;
		} else {
			echo "บันทึกข้อมูลเรียบร้อย";
		}
	}
	public function add_timeplan($data)
	{
		$db = $this->connect();
		$add_user = $db->prepare("INSERT INTO `tb_timeplan` (`timeplan_id`, `timeplan_project_name`, `timeplan_status_name`, `timeplan_re_getstart`, 
		`timeplan_re_getend`, `timeplan_re_getname`, `timeplan_re_workstart`, `timeplan_re_workend`, `timeplan_re_workname`, `timeplan_status_name_2`, 
		`timeplan_pro_getstart`, `timeplan_pro_getend`, `timeplan_pro_getname`, `timeplan_pro_workstart`, `timeplan_pro_workend`, `timeplan_pro_workname`, 
		`timeplan_status_name_3`, `timeplan_sing_getstart`, `timeplan_sing_getend`, `timeplan_sing_getname`, `timeplan_sing_workstart`, `timeplan_sing_workend`, 
		`timeplan_sing_workname`, `timeplan_status_name_4`, `timeplan_dev_getstart`, `timeplan_dev_getend`, `timeplan_dev_getname`, `timeplan_dev_workstart`, 
		`timeplan_dev_workend`, `timeplan_dev_workname`, `timeplan_status_name_5`, `timeplan_sit_getstart`, `timeplan_sit_getend`, `timeplan_sit_getname`, 
		`timeplan_sit_workstart`, `timeplan_sit_workend`, `timeplan_sit_workname`, `timeplan_status_name_6`, `timeplan_inter_getstart`, `timeplan_inter_getend`, 
		`timeplan_inter_getname`, `timeplan_inter_workstart`, `timeplan_inter_workend`, `timeplan_inter_workname`, `timeplan_status_name_7`, `timeplan_user_getstart`, 
		`timeplan_user_getend`, `timeplan_user_getname`, `timeplan_user_workstart`, `timeplan_user_workend`, `timeplan_user_workname`, `timeplan_status_name_8`, 
		`timeplan_end_getstart`, `timeplan_end_getend`, `timeplan_end_getname`, `timeplan_end_workstart`, `timeplan_end_workend`, `timeplan_end_workname`) 
		VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
		?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
		$add_user->bind_param(
			"sssssssssssssssssssssssssssssssssssssssssssssssssssssssss",
			$data['timeplan_project_name'],
			$data['timeplan_status_name'],
			$data['timeplan_re_getstart'],
			$data['timeplan_re_getend'],
			$data['timeplan_re_getname'],
			$data['timeplan_re_workstart'],
			$data['timeplan_re_workend'],
			$data['timeplan_re_workname'],
			$data['timeplan_status_name_2'],
			$data['timeplan_pro_getstart'],
			$data['timeplan_pro_getend'],
			$data['timeplan_pro_getname'],
			$data['timeplan_pro_workstart'],
			$data['timeplan_pro_workend'],
			$data['timeplan_pro_workname'],
			$data['timeplan_status_name_3'],
			$data['timeplan_sing_getstart'],
			$data['timeplan_sing_getend'],
			$data['timeplan_sing_getname'],
			$data['timeplan_sing_workstart'],
			$data['timeplan_sing_workend'],
			$data['timeplan_sing_workname'],
			$data['timeplan_status_name_4'],
			$data['timeplan_dev_getstart'],
			$data['timeplan_dev_getend'],
			$data['timeplan_dev_getname'],
			$data['timeplan_dev_workstart'],
			$data['timeplan_dev_workend'],
			$data['timeplan_dev_workname'],
			$data['timeplan_status_name_5'],
			$data['timeplan_sit_getstart'],
			$data['timeplan_sit_getend'],
			$data['timeplan_sit_getname'],
			$data['timeplan_sit_workstart'],
			$data['timeplan_sit_workend'],
			$data['timeplan_sit_workname'],
			$data['timeplan_status_name_6'],
			$data['timeplan_inter_getstart'],
			$data['timeplan_inter_getend'],
			$data['timeplan_inter_getname'],
			$data['timeplan_inter_workstart'],
			$data['timeplan_inter_workend'],
			$data['timeplan_inter_workname'],
			$data['timeplan_status_name_7'],
			$data['timeplan_user_getstart'],
			$data['timeplan_user_getend'],
			$data['timeplan_user_getname'],
			$data['timeplan_user_workstart'],
			$data['timeplan_user_workend'],
			$data['timeplan_user_workname'],
			$data['timeplan_status_name_8'],
			$data['timeplan_end_getstart'],
			$data['timeplan_end_getend'],
			$data['timeplan_end_getname'],
			$data['timeplan_end_workstart'],
			$data['timeplan_end_workend'],
			$data['timeplan_end_workname']
		);
		if (!$add_user->execute()) {
			echo $db->error;
		} else {
			echo "บันทึกข้อมูลเรียบร้อย";
		}
	}
	public function add_doc($data)
	{
		$targetDirectory = "../document/";
		$targetFilePath = $targetDirectory . basename($_FILES["fileUpload"]["name"]);
		$uploadOk = move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $targetFilePath);
		$filename = basename($_FILES["fileUpload"]["name"]);
		if (!$uploadOk) {
			echo json_encode(["success" => false, "message" => "Error uploading file."]);
			var_dump($data);
			var_dump($_FILES);
			return;
		}

		$db = $this->connect();
		$add_user = $db->prepare("INSERT INTO `tb_doc` (`doc_id`, `doc_name`, `doc_path`, `doc_status`, `doc_version`, `doc_project_name`, `doc_time`) 
		VALUES (NULL,?,?,?,?,?,NOW());");
		$add_user->bind_param(
			"sssss",
			$filename,
			$targetFilePath,
			$data['doc_status'],
			$data['doc_version'],
			$data['doc_project_name'],
		);
		if (!$add_user->execute()) {
			echo $db->error;
		} else {
			echo "บันทึกข้อมูลเรียบร้อย";
		}
	}
}
?>