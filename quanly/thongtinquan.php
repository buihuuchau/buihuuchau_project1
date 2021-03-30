<?php include "./myfunction.php"?>
<?php
    $idquan = $_COOKIE['idquan'];
    if(!isset($_COOKIE['idquan'])){
        echo "
            <script>         
                alert('Ban chua dang nhap quan');
                window.location.href='./dangnhapquan.html';
            </script>
        ";
    }

    $sql ="SELECT * FROM `quan` WHERE idquan='$idquan'";
    $result = query($sql);

    $row=$result->fetch_array();
    $tenquan = $row['tenquan'];
    $hinhquan = $row['hinhquan'];
    $diachiquan = $row['diachiquan'];
    $ngaythanhlap = $row['ngaythanhlap'];
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="thongtinquan.css">
    <title>Thông Tin Quán</title>
</head>
<body>
    <div class="than">

        <div class="than1"></div>

        
        <div class="than2">

            <center><h1>Thông Tin Quán</h1></center>
            <div class="than2-1">

                <div class="hinh"><img src="<?php echo $hinhquan; ?>" width="200px" height="200px"></div>
                <div class="chu">
                    <div class="hang"><label class="nhan1">Tên quán:</label>    <label class="nhan2"><?php echo $tenquan; ?></label></div>
                    <div class="hang"><label class="nhan1">Địa chỉ quán:</label>    <label class="nhan2"><?php echo $diachiquan; ?></label></div>
                    <div class="hang"><label class="nhan1">Ngày thành lập:</label>    <label class="nhan2"><?php echo $ngaythanhlap; ?></label></div>
                </div>
                
            </div>
            <div class="button">
                
                <a href='./dangky.html' class="nut"><center>Đăng ký thành viên quán</center></a>
                <a href="./xulydangxuatquan.php" class="nut"><center>Đăng xuất quán</center></a>

            </div>

        </div>

        <div class="than3"></div>

    </div>
</body>
</html>