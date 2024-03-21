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
		// $jsonData = str_replace(['[', ']'], '', $jsonData);
		// $jsonData = str_replace(',', '', $jsonData);
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
	public function add_report($data)
	{
		$targetDirectory = "../images/";
		$targetFilePath = $targetDirectory . basename($_FILES["fileUpload"]["name"]);
		$uploadOk = move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $targetFilePath);

		// if (!$uploadOk) {
		// 	echo json_encode(["success" => false, "message" => "Error uploading file."]);
		// 	return;
		// }
		$db = $this->connect();
		$add_user = $db->prepare("INSERT INTO `tb_report` (`report_id`, `report_name`, `report_detail`, `report_time`, `report_location`, `report_img_name`, `report_type`) 
    VALUES (NULL,?,?,?,?,?,?); ");

		$add_user->bind_param(
			"ssssss",
			$data['name'],
			$data['detail'],
			$data['time'],
			$data['location'],
			$targetFilePath,
			$data['roll']
		);

		if (!$add_user->execute()) {

			echo $db->error;

		} else {

			echo "บันทึกข้อมูลเรียบร้อย";
		}
	}


}


?>