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

	<title>Chỉnh sửa thông tin</title>

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
                url: "XLupdate_doctor.php",
                data: $("#contact-form").serialize(),
                success: function(response){
                    if(response == 1){
                        alert("Đã chỉnh sửa thông tin thành công!")
                        window.location.href='viewdoctor.php';
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
    <?php include("common/header.php")	?>;

    <div class="container">

        <div class="row">

            <div class="col-xl-8 offset-xl-2">

                <h1 style="font-size:50px;">Cập nhật thông tin</h1>
                <?php
                    $id_modify = $_SESSION['id_login'];
                    $sql = " SELECT * FROM thong_tin_tai_khoan_doctor WHERE id_tai_khoan=$id_modify ";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0){
                        $row = mysqli_fetch_array($result);
                        $ho = $row['name'];
                        $ten = $row['sur_name'];
                        $soDienThoai = $row['phone'];
                        $khoa = $row['khoa'];
                        $gmail = $row['gmail'];
                        $kinhNghiem = $row['exper'];
                    }
                ?>


                <form id="contact-form" method="post" action="contact.php" role="form">

                    <div class="messages"></div>

                    <div class="controls">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_name">Họ *</label>
                                    <input id="form_name" type="text" name="name" class="form-control" value=<?php echo "\"$ho\"" ?> required="required"
                                        data-error="Cần nhập họ">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_lastname">Tên *</label>
                                    <input id="form_lastname" type="text" name="surname" class="form-control" value=<?php echo "\"$ten\"" ?> required="required"
                                        data-error="Cần nhập tên">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_email">Email *</label>
                                    <input id="form_email" type="email" name="email" class="form-control" value=<?php echo "\"$gmail\"" ?> required="required"
                                        data-error="Valid email is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_phone">Phone</label>
                                    <input id="form_phone" type="tel" name="phone" class="form-control" value=<?php echo "\"$soDienThoai\"" ?>>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_cmnd">Chuyên Khoa: *</label><br>
                                     <select id="khoa" name="khoa" >
									  <option value="0">--Lựa chọn chuyên khoa --</option>
									  <option value="Khoa thần kinh" <?php if($khoa=="Khoa thần kinh"){ echo "selected"; }?> >Khoa thần kinh</option>
									  <option value="Khoa y học cổ truyền" <?php if($khoa=="Khoa y học cổ truyền"){ echo "selected"; }?>>Khoa y học cổ truyền</option>
									  <option value="Khoa sản" <?php if($khoa=="Khoa sản"){ echo "selected"; }?>>Khoa sản</option>
									  <option value="Khoa nhi" <?php if($khoa=="Khoa nhi"){ echo "selected"; }?>>Khoa nhi</option>
									  <option value="Khoa vật lý trị liệu" <?php if($khoa=="Khoa vật lý trị liệu"){ echo "selected"; }?>>Khoa sản</option>
									</select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_address">Kinh nghiệm làm việc: *</label>
                                    <input id="form_address" type="text" name="exper" class="form-control" value=<?php echo "\"$kinhNghiem\"" ?> required="required"
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

    <?php include("common/footer.php")	?>;
</body>
</html>


