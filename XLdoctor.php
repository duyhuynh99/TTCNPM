<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
?>
<?php
			include('database.php');
			$error = false;
			$response = '';
			$id_login1=$_SESSION['id_login'];
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
                $sql = "INSERT INTO thong_tin_tai_khoan_doctor(id_tai_khoan,name,sur_name,phone,khoa,gmail,exper)
                VALUES ('$id_login1','$name','$surname','$phone','$khoa','$email','$exper');";
                if ($conn->query($sql) == TRUE) {
                    echo "1";
                } else {
                    echo "Không thể thêm dữ liệu vào database";
                }
			}
			else{
				echo "$response";
			}
            $conn->close();
?>