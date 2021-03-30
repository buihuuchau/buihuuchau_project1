<?php include "./myfunction.php"?>
<?php
    $idtv = $_COOKIE['idtv'];
    $idquan = $_COOKIE['idquan'];// tranh lay thong tin nhan vien quan khac
    $idchucvu = $_COOKIE['idchucvu'];
    kiemtraquyen(1,2,0,0,0);

    $idtvxem = $_GET['idtvxem']; // idtv nhan tu trang truoc // khi nao get du lieu moi can dat ten bien khac nhau

    $sql ="SELECT * FROM `thanhvien` WHERE idtv='$idtvxem' AND idquan='$idquan'";
    $result = query($sql);

    $row=$result->fetch_array();


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
    $idchucvuxem = $row['idchucvu'];

    $sql3 ="SELECT * FROM `chucvu` WHERE idchucvu='$idchucvuxem'";
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
    <link rel="stylesheet" href="thongtinthanhvien.css">
    <title>Thông Tin Cá Nhân</title>
</head>
<body>
    <div class="than">

        <div class="than1"></div>

        
        <div class="than2">

            <center><h1>Thông Tin Thành Viên</h1></center>
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

        </div>

        <div class="than3"></div>

    </div>
</body>
</html>