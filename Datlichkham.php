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
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

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
                url: "XLdatlich.php",
                data: $("#contact-form").serialize(),
                success: function(response){
                    if(response == 1){
                        alert("Đã đặt lịch khám thành công!")
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
	
	<?php
		include('database.php');
        
        $id_login=$_SESSION['id_login'];
        $type_login=$_SESSION['type_login'];

        $sql= "SELECT * FROM thong_tin_tai_khoan WHERE id_tai_khoan = '$id_login'";
        $result = mysqli_query($conn, $sql);

        if ($type_login == 2){
            echo "
                <script>
                    window.location = \"index.php\";
                </script>
            ";
        }
        else if ($type_login == 3){
            echo "
                <script>
                window.location = \"index.php\";
                </script>
            ";
        }
        else if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)) {
                $name =  $row['name'];
				$surname = $row['sur_name'];
				$phone =$row['phone'];
				$cmnd = $row['cmnd'];
                $gmail = $row['gmail'];
                $dia_chi = $row['dia_chi'];
            }
        }
        else{
            echo "
                <script>
                    alert(\"Bạn cần phải thêm thông tin trước khi đặt khám!\");
                    window.location = \"themthongtin.php\";
                </script>
            ";
        }
?>
<div class="container">

        <div class="row">

            <div class="col-xl-8 offset-xl-2">

                <h1 style="font-size:70px; margin-left:100px;">Đặt lịch khám</h1>

                <form id="contact-form" method="post" action="contact.php" role="form">

                    <div class="messages"></div>

                    <div class="controls">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_name" style="color:blue">Họ Và Tên:</label>
									
                                    <input id="form_name" type="text" name="name" value="<?php echo " $name $surname " ?>" disabled class="form-control" placeholder="Please enter your name *" required="required"
                                        data-error="Cần nhập họ">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_email" style="color:blue">CMND :</label>
                                    <input id="form_email" type="email" name="email" class="form-control"disabled value="<?php echo " $cmnd"?>" placeholder="Please enter your email *" required="required"
                                        data-error="Valid email is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_email" style="color:blue">Email:</label>
                                    <input id="form_email" type="email" name="email" class="form-control"disabled value="<?php echo " $gmail"?>" placeholder="Please enter your email *" required="required"
                                        data-error="Valid email is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_phone" style="color:blue">Phone:</label>
                                    <input id="form_phone" type="tel" name="phone"disabled value="<?php echo " $phone"?>" class="form-control" placeholder="Please enter your phone">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
						
						<div class="row">
							<div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_email" style="color:blue">Địa chỉ: <br><label>
                                    <input style="width:350px;"id="form_email" type="email" name="email" class="form-control"disabled value="<?php echo " $dia_chi"?>" placeholder="Please enter your email *" required="required"
                                        data-error="Valid email is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
						</div>
						
                        <h2> Thông tin lịch hẹn</h2><br>
                        
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label style="color:blue">Ngày Khám: <br><label>
                                                <input type="date"  width="234" name="ngay_dat" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="gio_dat" style="color:blue">Giờ khám: </label><br>
                                                <select id="gio_dat" name="gio_dat" require="required">                      
                                                    <option value="0">--Lựa chọn giờ khám --</option>
                                                    <option value="07:30">07:30</option>
                                                    <option value="08:00">08:00</option>
                                                    <option value="08:30">08:30</option>
                                                    <option value="09:00">09:00</option>
                                                    <option value="09:30">09:30</option>
                                                    <option value="10:00">10:00</option>
                                                    <option value="10:30">10:30</option>
                                                    <option value="11:00">11:00</option>
                                                    <option value="13:30">13:30</option>
                                                    <option value="14:00">14:00</option>
                                                    <option value="14:30">14:30</option>
                                                    <option value="15:00">15:00</option>
                                                    <option value="15:30">15:30</option>
                                                    <option value="16:00">16:00</option>
                                                    <option value="16:30">16:30</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
												
						<div class="form-group">
							<div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_cmnd" style="color:blue">Lựa chọn khoa: </label><br>
                                     <select id="khoa" name="khoa" require="required">                      
									  <option value="0">--Lựa chọn chuyên khoa --</option>
									  <option value="Khoa thần kinh">Khoa thần kinh</option>
									  <option value="Khoa y học cổ truyền">Khoa y học cổ truyền</option>
									  <option value="Khoa sản">Khoa sản</option>
									  <option value="Khoa nhi">Khoa nhi</option>
									  <option value="Khoa vật lý trị liệu">Khoa vật lý trị liệu</option>
									</select>
                                </div>
                            </div>
						</div>
                        <div class="form-group">
						  <label for="comment" style="color:blue">Triệu chứng:</label>
						  <textarea class="form-control" name="comment" rows="5" id="comment"></textarea>
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
                
                <div style="margin-bottom: 10px;">
				    <input onclick="dangKy()" type="submit" class="btn btn-success btn-send" value="Submit">
                </div>

                <div id="result" style="color: red">
                </div>
				
	
            </div>

        </div>

    </div>

    <?php include("common/footer.php"); ?>
</body>