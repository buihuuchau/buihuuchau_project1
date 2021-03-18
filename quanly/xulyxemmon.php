<?php include "./myfunction.php"?>
<?php
    $idtv = $_COOKIE['idtv'];
    $idquan = $_COOKIE['idquan'];// tranh lay thong tin nhan vien quan khac
    $idchucvu = $_COOKIE['idchucvu'];
    kiemtraquyen(1,2,3,4,0);

    $idmonxem = $_GET['idmonxem'];

    $sql ="SELECT * FROM `mon` WHERE idmon='$idmonxem' AND idquan='$idquan'";
    $result = query($sql);

    $row=$result->fetch_array();

    $tenmon = $row['tenmon'];
    $dongia = $row['dongia'];
    $mota = $row['mota'];
    $hinhmon = $row['hinhmon'];
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="xulyxemmon.css">
    <title>Chi tiết món</title>
</head>
<body>
    <div class="than">

        <div class="than1"></div>

        <div class="than2">

            <center><h1>Chi tiết món</h1></center>
            <div class="than2-1">

                <div class="hinh"><img src="<?php echo $hinhmon; ?>" width="100px" height="100px"></div>
                <div class="chu">
                    <div class="hang"><label class="nhan1">Tên món:</label>    <label class="nhan2"><?php echo $tenmon; ?></label></div>
                    <div class="hang"><label class="nhan1">Đơn giá:</label>    <label class="nhan2"><?php echo "$dongia VNĐ"; ?></label></div>
                    <div class="hang"><label class="nhan1">Mô tả:</label><br>    <label class="nhan2"><?php echo $mota; ?></label></div>
                </div>
                
            </div>

        </div>

        <div class="than3"></div>

    </div>
</body>
</html>