<?php include "./myfunction.php"?>
<?php
    $idtv = $_COOKIE['idtv'];
    $idquan = $_COOKIE['idquan'];// tranh lay thong tin nhan vien quan khac
    $idchucvu = $_COOKIE['idchucvu'];
    kiemtraquyen(1,2,4,0,0);

    $sql = "SELECT * FROM `ban` WHERE idquan='$idquan'";
    $result = query($sql);

?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="hoadon.css">
        <title>Tùy chọn hóa đơn</title>
    </head>
    <body>
        <div class="than">
            <div class="than1"></div>

            <div class="than2">
                <center>Tùy Chọn Hóa Đơn</center>
                <!-- <form action="chucnanghoadon.php" method="post"> -->
                <form action="chucnanghoadon.php" method="get">
                    <label for="tenban">Chọn bàn:</label>
                    <select name="idban" id="idban">
                        <?php
                            while($row = $result->fetch_array()){
                                $idban = $row['idban'];
                                $tenban = $row['tenban'];
                                echo"
                                    <option value='$idban'>$tenban</option>
                                ";
                            }
                        ?>
                    </select>
                    <input type="submit" value="Chọn">
                </form>
                <div class="nut">
                    <a href="thongtincanhan.php" class="nut1"><center>Về trang chính</center></a>
                </div>
            </div>

            <div class="than3"></div>
        </div>
    </body>
</html>