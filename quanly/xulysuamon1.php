<?php include "./myfunction.php"?>
<?php
    $idtv = $_COOKIE['idtv'];
    $idquan = $_COOKIE['idquan'];// tranh lay thong tin nhan vien quan khac
    $idchucvu = $_COOKIE['idchucvu'];
    kiemtraquyen(1,2,0,0,0);

    $idmonsua = $_GET['idmonsua']; // idtv nhan tu trang truoc // khi nao get du lieu moi can dat ten bien khac nhau
    setcookie('idmonsua', $idmonsua, time() + 3600);

    $sql ="SELECT * FROM `mon` WHERE idmon='$idmonsua' AND idquan='$idquan'";
    $result = query($sql);

    $row=$result->fetch_array();
    $hinhmon = $row['hinhmon'];
    $tenmon = $row['tenmon'];
    $dongia = $row['dongia'];
    $mota = $row['mota'];
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="xulysuamon1.css">
    <title>Sửa Chi Tiết Món</title>
</head>
<body>
    <div class="than">

        <div class="than1"></div>

        <div class="than2">

            <center><h1>Sửa chi tiết món</h1></center>
            <form action="xulysuamon2.php" method="post" enctype="multipart/form-data">
                <center><img src="<?php echo $hinhmon; ?>" width="200px" height="200px"></center>
                <div class="hang"><label for="hinhmon">Hình ảnh món:</label>   <input type="file" name="hinhmon"></div>
                <div class="hang"><label for="tenmon">Tên món:</label>    <input type="text" name="tenmon" id="tenmon" value="<?php echo $tenmon; ?>"></div>
                <div class="hang"><label for="dongia">Đơn giá:</label>   <input type="number" name="dongia" id="dongia" value="<?php echo $dongia; ?>"></div>
                <div class="hang"><label for="mota">Mô tả:</label>   <input type="text" name="mota" id="mota" value="<?php echo $mota; ?>"></div>
                <div class="nut">
                    <input type="submit" value="Cập nhật" class="nut1">
                    <a href='./quanlymon.php' class='nut2'><center>Về trang trước</center></a>
                </div>
            </form>

        </div>

        <div class="than3"></div>

    </div>
</body>
</html>