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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	
	<!-- <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css"> -->
<!-- <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script> -->
<!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
	<title>Trang chủ</title>
    <link rel="stylesheet" href="./css/index.css">
	
	<style>
		#next{
				text-align:center;
			}
		
	</style>
	<script>
	function dangXuat(){
			window.location.href='login.php';
        }
        function dangKy(){
            $.ajax({
                method:"POST",
                url: "XLthemthongtin.php",
                data: $("#contact-form").serialize(),
                success: function(response){
                    if(response == 1){
                        alert("Đã thêm thông tin thành công!")
                        window.location.href='index.php';
                    }
                    else{
                        document.getElementById("result").innerHTML = response;
                    }
                }
            });
        }
    </script>
</head>

<body>
	<?php include("common/header.php") ?>
<div class="container">

        <div class="row">

            <div class="col-xl-8 offset-xl-2">

                <h1 style="font-size:50px;">Khai báo Thông tin cá nhân</h1>

                <form id="contact-form" method="post" action="contact.php" role="form">

                    <div class="messages"></div>

                    <div class="controls">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_name">Họ *</label>
                                    <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your lastname *" required="required"
                                        data-error="Cần nhập họ">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_lastname">Tên *</label>
                                    <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your firstname *" required="required"
                                        data-error="Cần nhập tên">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_email">Email *</label>
                                    <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required"
                                        data-error="Valid email is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_phone">Phone</label>
                                    <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Please enter your phone">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_cmnd">CMND: *</label>
                                    <input id="form_cmnd" type="text" name="cmnd" class="form-control" placeholder="Please enter your CMND *" required="required"
                                        data-error="cmnd is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_address">Address: *</label>
                                    <input id="form_address" type="text" name="address" class="form-control" placeholder="Please enter your lastname *" required="required"
                                        data-error="address is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="form_message">Message *</label>
                            <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4" required="required"
                                data-error="Please, leave us a message."></textarea>
                            <div class="help-block with-errors"></div>
                        </div>


                        <div class="form-group">
                            <div class="g-recaptcha" data-sitekey="6LfKURIUAAAAAO50vlwWZkyK_G2ywqE52NU7YO0S" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
                            <input class="form-control d-none" data-recaptcha="true" required data-error="Please complete the Captcha">
                            <div class="help-block with-errors"></div>
                        </div>


                        

                        <p class="text-muted">
                            <strong>*</strong> Nếu có gì thắc mắc. xin vui lòng liên hệ
                            <a href="https://bootstrapious.com/p/bootstrap-recaptcha" target="_blank">0974837395</a>.
                        </p>

                    </div>

                </form>

                <div id="result" style="color: red">
                </div>


				<input onclick="dangKy()" type="submit" class="btn btn-success btn-send" value="Submit">
            
            </div>

        </div>

    </div>

<footer>
	<div class="container-fluid padding">	
		<div class="row text-center">
			<div class="col-md-4">
				<img src="https://upload.wikimedia.org/wikipedia/vi/f/f8/Logo_BV_SaintPaul.jpg">
				<hr class="light">
				<p>111-222-3333</p>
				<p>mymail@gmail.com</p>
				<p>Bach Mai street, Hanoi, Vietnam</p>
			</div>
			<div class="col-md-4">				
				<hr class="light">
				<h5>Working hours</h5>
				<hr class="light">
				<p>Monday-Friday: 8am - 5pm</p>
				<p>Weekend: 8am - 12am</p>
			</div>
			<div class="col-md-4">				
				<hr class="light">
				<h5>Services</h5>
				<hr class="light">
				<p>Tai mũi họng</p>
				<p>Y học cổ truyền</p>
				<p>Khoa nội-ngoại</p>
			</div>
			<div class="col-12">
				<hr class="light-100">
				<h5>&copy; Bệnh Viện Xanh Pôn</h5>
			</div>
		</div>
	</div>
</footer>
</body>