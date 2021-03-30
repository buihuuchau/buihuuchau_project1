<?php include "./myfunction.php"?>
<?php
    $idtv = $_COOKIE['idtv'];
    $idquan = $_COOKIE['idquan'];// tranh lay thong tin nhan vien quan khac
    $idchucvu = $_COOKIE['idchucvu'];
    kiemtraquyen(1,2,3,0,0);
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="phache.css">
    <title>Danh sách món được đặt</title>
</head>
<body>
    <div class="than">

        <div class="than1"></div>

        
        <div class="than2">

            <center><h1>Danh sách món được đặt</h1></center>
            <?php
                
                $sql = "SELECT * FROM `chitiet` WHERE idquan='$idquan' and thuchien='0'";
                $result = query($sql);
            
                while($row = $result->fetch_array()){
                    $idct = $row['idct'];
                    $idmon = $row['idmon'];
                        $sql2 = "SELECT * FROM `mon` WHERE idquan='$idquan' and idmon='$idmon'";
                        $result2 = query($sql2);
                        $row2 = $result2->fetch_array();
                        $tenmon = $row2['tenmon'];
                        $hinhmon = $row2['hinhmon'];
                    
                    echo"
                        <div class='hang'>
                            <div class='hinh'><img src='$hinhmon' width='50px' height='50px'></div>
                            <div class='ttin'>$tenmon</div>
                            <div class='nut'>
                            <a href='./xacnhanphache.php?idct=$idct' class='nut'><center>Xác nhận</center></a>
                            </div>
                        </div>
                    ";  
                }
            ?>
            <div class="nut">
                <a href="./thongtincanhan.php" class="nut1"><center>Về trang chính</center></a>
            </div>
            
        </div>

        <div class="than3"></div>

    </div>
</body>
</html>