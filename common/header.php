<?php
	include('./database.php');

	function check_info(){
		include('./database.php');
		$id_login = $_SESSION['id_login'];
		$type_login = $_SESSION['type_login'];
		if($type_login == 1){
			$sql = "SELECT * FROM thong_tin_tai_khoan WHERE id_tai_khoan='$id_login' " ;
		}
		else{
			$sql = "SELECT * FROM thong_tin_tai_khoan_doctor WHERE id_tai_khoan='$id_login' " ;
		}
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
			return true;
		}
		else{
			return false;
		}
	}

?>

<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
	<div class="container-fluid">
		<a class="navbar-branch" href="index.php">
			<img src="https://upload.wikimedia.org/wikipedia/vi/f/f8/Logo_BV_SaintPaul.jpg" height="50">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" 
			data-target="#navbarResponsive">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link active"  href="index.php">HOME</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="gioithieu.php">GIỚI THIỆU</a>
				</li>
				<li class="nav-item" <?php if(!isset($_SESSION['type_login']) or ($_SESSION['type_login']!=1)){ echo "style=\"display:none\"";} ?>>
					<a class="nav-link" href="Datlichkham.php">ĐẶT KHÁM TRƯỚC</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="tin_tuc.php">TIN TỨC</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">HOẠT ĐỘNG</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">HỎI ĐÁP</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" <?php if(isset($_SESSION['id_login'])){echo"onclick=\"showChat()\"";}?>> LIÊN HỆ</a>
				</li>
				<li class="nav-item" >
					<a href="login.php"><button <?php if(isset($_SESSION['type_login'])){ echo "style=\"display:none\"";} ?> type="button" class="btn btn-info">ĐĂNG NHẬP</button></a>
				</li>
				<div class="btn-group" <?php if(!isset($_SESSION['type_login'])){ echo "style=\"display:none\"";} ?>>
					<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fa fa-user"></i>
					</button>
					<div class="dropdown-menu dropdown-menu-right">
						<div><a href="Thongtin.php" <?php if(!isset($_SESSION['type_login']) or ($_SESSION['type_login']!=1) or !check_info()){ echo "style=\"display:none\"";} ?> > THÔNG TIN CÁ NHÂN </a></div>
						<div><a href="user_view_schedule.php" <?php if(!isset($_SESSION['type_login']) or ($_SESSION['type_login']!=1) or !check_info()){ echo "style=\"display:none\"";} ?> > XEM LỊCH KHÁM </a></div>
						<div><a href="themthongtin.php" <?php if(!isset($_SESSION['type_login']) or ($_SESSION['type_login']!=1) or check_info()){ echo "style=\"display:none\"";} ?> > THÊM THÔNG TIN CÁ NHÂN</a></div>
						<div><a href="viewdoctor.php" <?php if(!isset($_SESSION['type_login']) or ($_SESSION['type_login']!=3) or !check_info()){ echo "style=\"display:none\"";} ?> > THÔNG TIN CÁ NHÂN </a></div>
						<div><a href="doctor_view_schedule.php" <?php if(!isset($_SESSION['type_login']) or ($_SESSION['type_login']!=3) or !check_info()){ echo "style=\"display:none\"";} ?> > XEM LỊCH KHÁM </a></div>
						<div><a href="info_doctor.php" <?php if(!isset($_SESSION['type_login']) or ($_SESSION['type_login']!=3) or check_info()){ echo "style=\"display:none\"";} ?> > THÊM THÔNG TIN CÁ NHÂN </a></div>
						<div><a href="admin.php" <?php if(!isset($_SESSION['type_login']) or ($_SESSION['type_login']!=2)){ echo "style=\"display:none\"";} ?> > QUẢN LÝ </a></div>
						<div><a href="login.php" <?php if(!isset($_SESSION['type_login'])){ echo "style=\"display:none\"";} ?> > ĐĂNG XUẤT </a></div>
					</div>
				</div>
				</li>
			</ul>
		</div>
	</div>
</nav>