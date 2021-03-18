<?php
    $idtv = $_COOKIE['idtv'];
    $idquan = $_COOKIE['idquan'];// tranh lay thong tin nhan vien quan khac
    $idchucvu = $_COOKIE['idchucvu'];

    if(!isset($_COOKIE['idtv'])){
        echo "
            <script>         
                alert('Ban chua dang nhap');
                window.location.href='./dangnhap.html';
            </script>
        ";
    }
    else{
        if($idchucvu == 1 || $idchucvu == 2 || $idchucvu == 4){// cap quyen theo chuc vu // SE THAY DOI PHAN NAY
        }
        else{
            echo "
                <script>
                    window.location.href='./thongtincanhan.php';    
                    alert('Ban khong co quyen truy cap trang nay!');
                </script>
            ";
        } 
    }

    // $ngaytao = $_POST['ngaytao'];
    // echo $ngaytao;
    $idban = $_POST['idban'];

    $con = new mysqli("localhost", "root","", "quanly");
    $con->set_charset("utf8");
    $sql = "SELECT * FROM `hoadon` WHERE idquan='$idquan' AND thanhtien='0' AND idban='$idban'";
    $result = $con->query($sql);
    $con->close();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="xulydoimon1.css">
    <title>Đổi Món</title>
</head>
<body>
    <div class="than">
        <div class="than1"></div>
        <div class="than2">
            <center>Thông tin bàn muốn đổi món</center><br>
            <?php
                while($row = $result->fetch_array()){
                    $idhd = $row['idhd'];
                    $ngaytao = $row['ngaytao'];
                    $giotao = $row['giotao'];
                    echo "
                        Mã hóa đơn: $idhd<br>
                        Ngày tạo: $ngaytao<br>
                        Giờ tạo: $giotao&emsp;&emsp;&emsp;<a href='./xulydoimon2.php?idhd=$idhd' class='nut'>Đổi TTin Món</a><br><br>
                    ";
                }
            ?>
            <a href='hoadon.php' class='nut'>Tùy chọn hóa đơn</a>
        </div>
        <div class="than3"></div>
    </div>
</body>
</html>