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
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/poster.css">

</head>

<body>

	<?php include("common/header.php"); ?>

    <div class="content">
        <?php 
            include("database.php");
            $sql = "SELECT * FROM bai_dang ORDER BY thoi_gian";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    $title = $row['tieu_de'];
                    $content = $row['noi_dung'];
                    $time = $row['thoi_gian'];

                    echo    "<div style=\"border-bottom:1px solid black;margin-bottom:20px\">
                                <h4 style=\"color: blue; \">$title</h4>
                                <p style=\"margin-left: 40px;\">$content<p>
                                <p style=\"text-align:right;\">Thời gian: $time </p> 
                            </div>";
                }
            }
        ?>
    </div>

    <?php include("common/footer.php"); ?>


</body>