<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">       
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="js/chat.js"></script>
	<title>Trang chủ</title>
	<link rel="stylesheet" href="./css/index.css">
	<script>
				function dangXuat(){
					window.location.href='login.php';
				}
				function thongTin(){
					window.location.href='thongTin.php';
				}
	</script>
</head>



<body>
	
	<?php include("common/header.php") ?>

<div id="slides" class="carousel slide" data-ride="carousel">
	<ul class="carousel-indicators">
		<li data-target="#slides" data-slide-to="0" class="active"></li>
		<li data-target="#slides" data-slide-to="1"></li>
		<li data-target="#slides" data-slide-to="2"></li>		
		<li data-target="#slides" data-slide-to="3"></li>
	</ul>
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img src="https://dalieu.vn/wp-content/uploads/2018/12/doingunhanvien-1.png">
			<div class="carousel-caption">
				<h1 class="display-2">ĐĂNG KÍ KHÁM BỆNH</h1>
				<h3>BỆNH VIỆN XANH PÔN</h3>
			</div>
		</div>
		<div class="carousel-item">
			<img src="https://giadinh.mediacdn.vn/thumb_w/640/2020/3/23/photo-1-1584946061906170057663.jpg">
		</div>
		<div class="carousel-item">
			<img src="https://dalieu.vn/wp-content/uploads/2019/12/BS1.jpg">
		</div>
		<div class="carousel-item">
			<img src="https://image.thanhnien.vn/768/uploaded/thuhang/2020_03_30/bvravien_zylm.jpg">
		</div>
	</div>
</div>
<div class="container-fluid padding">
	<div class="row padding">
		<div class="col-md-12 col-lg-6">
			<h2>Các Câu triết lý</h2>
			<p>“Sức khỏe tốt và trí tuệ minh mẫn là hai điêu hạnh phúc nhất của cuộc đời” – Publilius Syrus.</p>
			<p>“Hào quang của y học là nó luôn tiến về phía trước, và luôn luôn có thêm nhiều điều để học. Những bệnh tật của ngày hôm nay không che phủ chân trời của ngày mai, mà thúc đẩy nỗ lực lớn hơn nữa.” – William J. Mayo</p>
			<p>“Thể xác và tinh thần không thể tách rời trong lúc chữa trị, bởi chúng là một và không thể chia tách. Những tâm hồn bệnh tật cũng cần được chữa trị như cơ thể bệnh tật.” – C. Jeff Miller.</p>
			<p>“Mục đích của y học là ngăn chặn bệnh tật và kéo dài cuộc sống, y học lý tưởng là xóa bỏ nhu cầu cần đến bác sỹ.” – William J. Mayo.</p>
			<br>
		</div>
		<div class="col-lg-6">
			<img src="https://png.pngtree.com/png-clipart/20190903/original/pngtree-hand-holding-love-png-image_4447273.jpg" height="50" class="img-fluid">
		</div>
	</div>
</div>
<hr class="my-2">
<button class="fun" data-toggle="collapse" data-target="#emoji">
	Hình ảnh đẹp
</button>
<div id="emoji" class="collapse">
	<div class="container-fluid padding">
		<div class="row text-center">
			<div class="col-sm-6 col-md-3">
				<img class="gif" src="https://baocantho.com.vn/image/fckeditor/upload/2018/20180828/images/benhnhanmatngu.jpg" width="100" height="100">
			</div>
			<div class="col-sm-6 col-md-3">
				<img class="gif" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQ6NCVdT_LkwpmiMCtawzb2jbV6I_yp5tLzi1PStVkMqn1j9hf8&usqp=CAU" width="100" height="100">
			</div>
			<div class="col-sm-6 col-md-3">
				<img class="gif" src="https://media.doisongphapluat.com/448/2016/8/18/tam-than-zing-bb-baaadp1j3Y.jpg" width="100" height="100">
			</div>
			<div class="col-sm-6 col-md-3">
				<img class="gif" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRkR1Jf8DEy8ZroScv3BEdXXxVEQcGbpcFW6tP7TUQGuoVY99Kj&usqp=CAU" width="100" height="100">
			</div>
		</div>
	</div>
</div>
<div class="container-fluid padding">
	<div class="row welcome text-center">
		<div class="col-12">
			<h1 class="display-4">Các Bác Sĩ Nổi Tiếng</h1>
		</div>
	</div>
</div>
<div class="container-fluid padding">
	<div class="row padding">
		<div class="col-md-4">
			<div class="card">
				<img class="card-img-top" src="https://vnn-imgs-f.vgcloud.vn/2019/05/30/21/vo-troi-chong-nho-bao-ve-dan-pho-den-dua-chong-di-nhap-vien.jpg">
				<div class="card-body">
					<h4 class="card-title">Hoàng Thuận</h4>
					<p class="card-text">Hoàng Thuận là bác sĩ với 20 năm kinh nghiệm trong lĩnh vực khoa sản của bệnh viện xanh pôn</p>
					<a href="#" class="btn btn-outline-secondary">See profile</a>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
				<img class="card-img-top" src="https://giadinh.mediacdn.vn/thumb_w/640/2018/8/10/anh-chup-man-hinh-2018-08-10-luc-214459-1533912320330612368978.png">
				<div class="card-body">
					<h4 class="card-title">
						Trần Khiêm	
					</h4>
					<p class="card-text">Trần Khiêm là một bác sĩ dược,anh ấy với 18 năm kinh nghiệm và làm việc trở một trong những đầu tàu quan trọng của bệnh viện</p>
					<a href="#" class="btn btn-outline-secondary">See profile</a>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
				<img class="card-img-top" src="https://lh3.googleusercontent.com/proxy/wzIjEBVbU6wy34hcWRKaIvkmRcSbU7FPPvdjjXd7pphSaxi14ksCBoOl-tyqIRMiWaHoK2ibtg2oksV9BHnNphJ2vZAe5pZKk3AnOnrup9tNrFFe7ybAL6DIAHg">
				<div class="card-body">
					<h4 class="card-title">
						Xuân Vũ 
					</h4>
					<p class="card-text">Xuân Vũ là bác sĩ nhiều năm kinh nghiệm nhất của bệnh viện, đã khám và chữa bệnh cho rất nhiều bệnh nhân. Hiện tại ông kiêm là bác sĩ và tổng giám đốc bệnh viện</p>
					<a href="#" class="btn btn-outline-secondary">See profile</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid padding">	
	<div class="row text-center padding">
		<div class="col-12">
			<h2>Contact us</h2>
		</div>
		<div class="col-12 social padding">
			<a href="#"><i class="fab fa-facebook"></i></a>
			<a href="#"><i class="fab fa-twitter"></i></a>
			<a href="#"><i class="fab fa-google-plus-g"></i></a>
			<a href="#"><i class="fab fa-instagram"></i></a>
			<a href="#"><i class="fab fa-youtube"></i></a>
		</div>
	</div>
</div>
	<?php include("common/chat_box.php"); ?>
	<?php include("common/footer.php"); ?>
</body>
</html>