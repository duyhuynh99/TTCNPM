<?php
	session_start();
	header('Content-Type: text/html; charset=utf-8');
?>
<?php
	include('../database.php');
	$error = false;
	$response = '';
	$id_modify = $_SESSION['id_account_modify'];

	if(isset($_POST['name']) and $_POST['name']!=""){
		$name =$_POST['name'];
	}
	else{
		$error = true;
		$response = $response . '- Hãy nhập họ của bạn! <br/>';
	}

	if(isset($_POST['surname']) and $_POST['surname']!=""){
		$surname =$_POST['surname'];
	}
	else{
		$error = true;
		$response = $response . '- Hãy nhập tên của bạn! <br/>';
	}

	if(isset($_POST['email']) and $_POST['email']!=""){
		$email =$_POST['email'];
	}
	else{
		$error = true;
		$response = $response . '- Hãy nhập email của bạn! <br/>';
	}

	if(isset($_POST['phone']) and $_POST['phone']!=""){
		$phone =$_POST['phone'];
	}
	else{
		$error = true;
		$response = $response . '- Hãy nhập số điện thoại của bạn! <br/>';
	}

	if(isset($_POST['khoa']) and $_POST['khoa']!="0"){
		$khoa =$_POST['khoa'];
	}
	else{
		$error = true;
		$response = $response . '- Hãy chọn khoa của bạn! <br/>';
	}

	if(isset($_POST['exper'])  and $_POST['exper']!=""){
		$exper =$_POST['exper'];
	}
	else{
		$error = true;
		$response = $response . '- Hãy nhập kinh nghiệm bạn! <br/>';
	}
	
	if(!$error){
		$sql = "UPDATE thong_tin_tai_khoan_doctor SET	name = '$name', sur_name = '$surname',phone ='$phone', khoa = '$khoa',exper = '$exper' WHERE id_tai_khoan = $id_modify";
		if ($conn->query($sql) == TRUE) {
			echo "1";
		} else {
			echo "Không thể cập nhật dữ liệu vào database";
		}
	}
	else{
		echo "$response";
	}
	$conn->close();
?>