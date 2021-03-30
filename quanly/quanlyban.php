<?php include "./myfunction.php"?>
<?php
    $idtv = $_COOKIE['idtv'];
    $idquan = $_COOKIE['idquan'];// tranh lay thong tin nhan vien quan khac
    $idchucvu = $_COOKIE['idchucvu'];
    kiemtraquyen(1,2,0,0,0);

    $sql = "SELECT * FROM `ban` WHERE idquan='$idquan'";
    $result = query($sql);

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="quanlyban.css">
    <title>Danh sách bàn</title>
</head>
<body>
    <div class="than">

        <div class="than1"></div>

        
        <div class="than2">

            <center><h1>Danh sách bàn</h1></center>
            <?php
                while($row = $result->fetch_array()){
                    $idban = $row['idban'];
                    $tenban = $row['tenban'];
                    echo"
                        <div class='hang'>
                            <label>$tenban</label>
                            <a href='./xulyxoaban.php?idbanxoa=$idban' class='nut'><center>Xóa bàn</center></a>
                        </div>
                    ";
                    
                }
            ?>
            <div class="nut">
                <a href="./themban.html" class="nut1"><center>Thêm bàn</center></a>
                <a href="./thongtincanhan.php" class="nut1"><center>Về trang chính</center></a>
            </div>
            
        </div>

        <div class="than3"></div>

    </div>
</body>
</html>