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
    <script type="text/javascript">
        function dangXuat(){
			window.location.href='login.php';
        }
    </script>
	<style>
		 .inf-content{
			 margin-top:70px;
			 margin-bottom:100px;
    border:1px solid #DDDDDD;
    -webkit-border-radius:10px;
    -moz-border-radius:10px;
    border-radius:10px;
    box-shadow: 7px 7px 7px rgba(0, 0, 0, 0.3);
}	
	</style>
</head>

<body>
	<?php include("common/header.php"); ?>

<?php
		include('database.php');
        
        $id_login1=$_SESSION['id_login'];

        $sql= "SELECT * FROM thong_tin_tai_khoan WHERE id_tai_khoan = '$id_login1'";
        
        
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
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
            echo "Lấy thông tin thất bại!  ";
        }

?>
<div class="container bootstrap snippet">
<div class="panel-body inf-content">
    <div class="row">
        <div class="col-md-4">
            <img alt="" style="width:600px;" title="" class="img-circle img-thumbnail isTooltip" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRVYAfG_R3P-_7XifPu80ftUcb1G1-GHZKqCg&usqp=CAU" data-original-title="Usuario"> 
            <ul title="Ratings" class="list-inline ratings text-center">
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
            </ul>
        </div>
        <div class="col-md-6">
            <strong>THÔNG TIN TÀI KHOẢN CÁ NHÂN</strong><br>
            <div class="table-responsive">
            <table class="table table-user-information">
                <tbody>
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                Họ và tên :                                               
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo " $name $surname " ?>      
                        </td>
                    </tr>
                    <tr>    
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-user  text-primary"></span>    
                                Gmail 	  :   	                                             
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo " $gmail"?>
                        </td>
                    </tr>
					
					<tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-cloud text-primary"></span>  
                               Phone :                                               
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo "$phone"?>
                        </td>
                    </tr>
					
					<tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-cloud text-primary"></span>  
                               CMND :                                               
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo "$cmnd"?>
                        </td>
                    </tr>
					
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-cloud text-primary"></span>  
                                Địa chỉ:                                               
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo "$dia_chi"?>
                        </td>
                    </tr>

                    <tr>
						<td>
                            <strong>
                                <span class="glyphicon glyphicon-cloud text-primary"></span>  
                                <a href="edit_canhan.php">Chỉnh sửa thông tin</a>                                            
                            </strong>
                        </td>
					</tr>                                
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
</div>   
	<?php include("common/footer.php"); ?>

</body>
</html>