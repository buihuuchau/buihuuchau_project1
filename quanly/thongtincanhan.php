<?php include "./myfunction.php"?>
<?php
    $idtv = $_COOKIE['idtv'];
    if(!isset($_COOKIE['idtv'])){
        echo "
            <script>         
                alert('Ban chua dang nhap');
                window.location.href='./dangnhap.html';
            </script>
        ";
    }


    $sql ="SELECT * FROM `thanhvien` WHERE idtv='$idtv'";
    $result = query($sql);

    $row=$result->fetch_array();
    $idquan = $row['idquan'];
    setcookie('idquan', $idquan, time() + 3600);


    $sql2 ="SELECT * FROM `quan` WHERE idquan='$idquan'";
    $result2 = query($sql2);

    $row2=$result2->fetch_array();
    $tenquan = $row2['tenquan'];

    $hoten = $row['hoten'];
    $hinhtv = $row['hinhtv'];
    $namsinh = $row['namsinh'];
    $sex = $row['sex'];
    $diachi = $row['diachi'];
    $ngayvaolam = $row['ngayvaolam'];

    $idchucvu = $row['idchucvu'];
    setcookie('idchucvu', $idchucvu, time() + 3600);

    $sql3 ="SELECT * FROM `chucvu` WHERE idchucvu='$idchucvu'";
    $result3 = query($sql3);

    $row3=$result3->fetch_array();
    $tenchucvu = $row3['tenchucvu'];

    $luong = $row['luong'];
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="thongtincanhan.css">
    <title>Thông Tin Cá Nhân</title>
</head>
<body>
    <div class="than">

        <div class="than1"></div>

        
        <div class="than2">

            <center><h1>Thông Tin Cá Nhân</h1></center>
            <div class="than2-1">

                <div class="hinh"><img src="<?php echo $hinhtv; ?>" width="200px" height="200px"></div>
                <div class="chu">
                    <div class="hang"><label class="nhan1">Nơi làm việc:</label>    <label class="nhan2"><?php echo $tenquan; ?></label></div>
                    <div class="hang"><label class="nhan1">Họ tên:</label>    <label class="nhan2"><?php echo $hoten; ?></label></div>
                    <div class="hang"><label class="nhan1">Năm sinh:</label>    <label class="nhan2"><?php echo $namsinh; ?></label></div>
                    <div class="hang"><label class="nhan1">Giới tính:</label>    <label class="nhan2"><?php echo $sex; ?></label></div>
                    <div class="hang"><label class="nhan1">Địa chỉ:</label>    <label class="nhan2"><?php echo $diachi; ?></label></div>
                    <div class="hang"><label class="nhan1">Ngày vào làm:</label>    <label class="nhan2"><?php echo $ngayvaolam; ?></label></div>
                    <div class="hang"><label class="nhan1">Chức vụ:</label>    <label class="nhan2"><?php echo $tenchucvu; ?></label></div>
                    <div class="hang"><label class="nhan1">Lương:</label>    <label class="nhan2"><?php echo $luong; ?> VNĐ</label></div>
                </div>
                
            </div>
            <div class="button">
                
                <a href='./quanlynhanvien.php' class="nut"><center>QLy nhân viên</center></a>
                <a href="./quanlyban.php" class="nut"><center>Qly bàn</center></a>
                <a href="./quanlymon.php" class="nut"><center>Qly món</center></a>
                <a href="./doanhthu.html" class="nut"><center>Doanh thu</center></a>
                <a href="./quanlyhoadon.html" class="nut"><center>QLy hóa đơn</center></a>
                <a href="./hoadon2.php" class="nut"><center>Hóa đơn 2</center></a>
                <a href="./hoadon.php" class="nut"><center>Hóa đơn</center></a>
                <a href="./phache.php" class="nut"><center>Pha chế</center></a>             
                <a href="./hoadon3.php" class="nut"><center>Hóa đơn 3</center></a>
                <a href="./chucnang1.php" class="nut"><center>Chức năng 1</center></a>
                <a href="./chucnang2.php" class="nut"><center>Chức năng 2</center></a>
                <a href="./xulydangxuat.php" class="nut"><center>Đăng xuất</center></a>

            </div>

        </div>

        <div class="than3"></div>

    </div>
</body>
</html>