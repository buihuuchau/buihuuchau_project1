<?php include "./myfunction.php"?>
<?php
    $idtv = $_COOKIE['idtv'];
    $idquan = $_COOKIE['idquan'];// tranh lay thong tin nhan vien quan khac
    $idchucvu = $_COOKIE['idchucvu'];
    kiemtraquyen(1,2,3,4,0);

    $sql = "SELECT * FROM `mon` WHERE idquan='$idquan'";
    $result = query($sql);

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="quanlymon.css">
    <title>Danh sách món</title>
</head>
<body>
    <div class="than">

        <div class="than1"></div>

        
        <div class="than2">

            <center><h1>Danh sách món</h1></center>
            <?php
                while($row = $result->fetch_array()){
                    $idmon = $row['idmon'];
                    $tenmon = $row['tenmon'];
                    $dongia = $row['dongia'];
                    $mota = $row['mota'];
                    $hinhmon = $row['hinhmon'];
                    echo"
                        <div class='hang'>
                            <div class='hinh'><img src='$hinhmon' width='50px' height='50px'></div>
                            <div class='ttin'>$tenmon</div>
                            <div class='ttin'>$dongia VNĐ</div>
                            <div class='nut'>
                            <a href='./xulyxemmon.php?idmonxem=$idmon' class='nut'><center>Xem chi tiết</center></a>
                            <a href='./xulysuamon1.php?idmonsua=$idmon' class='nut'><center>Sửa món</center></a>
                            <a href='./xulyxoamon.php?idmonxoa=$idmon' class='nut'><center>Xóa món</center></a>
                            </div>
                        </div>
                    ";  
                }
            ?>
            <div class="nut">
                <a href="./themmon.html" class="nut1"><center>Thêm món</center></a>
                <a href="./thongtincanhan.php" class="nut1"><center>Về trang chính</center></a>
            </div>
            
        </div>

        <div class="than3"></div>

    </div>
</body>
</html>