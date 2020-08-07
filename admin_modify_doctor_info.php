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
	<title>Trang chủ</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/account_admin.css">
    
	<script>
        function change_info(){
            $.ajax({
                method:"POST",
                url: "process/modify_doctor_info.php",
                data: $("#contact-form").serialize(),
                success: function(response){
                    if(response == 1){
                        alert("Đã chỉnh sửa thông tin thành công!")
                        window.location.href='admin_view_account.php?type=doctor';
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
    <?php include("common/header.php");	?>

    <div class="container">
        <?php include("common/admin_nav.php"); ?>
    </div>

        <?php
            $_SESSION['id_account_modify'] = $_GET['id'];
            $id_modify = $_GET['id'];
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
        <div class="content">

            <div class="col-xl-8 offset-xl-2">

                <h1 class="title">Cập nhật thông tin bác sĩ</h1>


                <form id="contact-form" method="post" action="contact.php" role="form">

                    <div class="messages"></div>

                    <div class="controls">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_name">Họ *</label>
                                    <input id="form_name" type="text" name="name" class="form-control" value=<?php echo "\"$ho\"" ?> required="required"
                                        data-error="Cần nhập Họ">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_lastname">Tên *</label>
                                    <input id="form_lastname" type="text" name="surname" class="form-control" value=<?php echo "\"$ten\"" ?> required="required"
                                        data-error="Cần nhập tên.">
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
                                    <input id="form_phone" type="tel" name="phone" class="form-control" value=<?php echo "\"$soDienThoai\"" ?>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_cmnd">Chuyên Khoa: *</label><br>
                                     <select id="khoa" name="khoa" class="form-control">                      
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
                </form>

                <div id="result" style="color:red">
                </div>

                <input onclick="change_info()" type="submit" class="btn btn-success btn-send" value="Submit">
                <a href="admin_view_account.php?type=doctor"><button type="button" class="btn btn-success" style="margin-left:30px">Trở lại</button></a>
            </div>

        </div>

<?php include("common/footer.php")	?>;
</body>

</html>