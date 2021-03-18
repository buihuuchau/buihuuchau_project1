<?php include "./myfunction.php"?>
<?php
    $idtv = $_COOKIE['idtv'];
    $idquan = $_COOKIE['idquan'];// tranh lay thong tin nhan vien quan khac
    $idchucvu = $_COOKIE['idchucvu'];

    kiemtraquyen(1,2,4,0,0);

    $thanhtien = 0;
    $stt=0;
    $idhd = $_GET['idhd'];

    $sql3 = "SELECT * FROM `hoadon` WHERE idhd='$idhd'";
    $result3 = query($sql3);
    $row3 = $result3->fetch_array();
    $idban = $row3['idban'];

    $sql4 = "SELECT * FROM `ban` WHERE idban='$idban'";
    $result4 = query($sql4);
    $row4 = $result4->fetch_array();
    $tenban = $row4['tenban'];
    $ngaytao = $row3['ngaytao'];
    $giotao = $row3['giotao'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="xulythanhtoan2.css">
    <title>Xác nhận thanh toán</title>
</head>
<body>
    <div class="than">
        <div class="tieude"><center><h1>Hóa Đơn Thanh Toán</h1></center></div>
        <div class="tt">
            <div class="tt1"><?php echo "Ngày tạo: $ngaytao"; ?></div>
            <div class="tt1"><?php echo "Giờ tạo: $giotao"; ?></div>
            <div class="tt1"><?php echo "Số bàn: $tenban"; ?></div>
        </div>
        <table class="bang">
            <tr class="hang">
                <th class="cot1">STT</th>
                <th class="cot2">Tên món</th>
                <th class="cot3">Đơn giá</th>
            </tr>
            <?php
                $sql = "SELECT * FROM `chitiet` WHERE idquan='$idquan' AND idhd='$idhd' AND thuchien!='0'";
                $result = query($sql);
                while($row = $result->fetch_array()){
                    $idmon = $row['idmon'];
                        $sql2 = "SELECT * FROM `mon` WHERE idmon='$idmon'";
                        $result2 = query($sql2);
                        $row2 = $result2->fetch_array();
                        $tenmon = $row2['tenmon'];
                        $dongia = $row2['dongia'];
                    $thanhtien=$thanhtien+$dongia;
                    $stt = $stt+1;
                    echo"
                        <tr class='hang'>
                            <td class='cot1'>$stt</td>
                            <td class='cot2'>$tenmon</td>
                            <td class='cot3'>$dongia VNĐ</td>
                        </tr>
                    ";
                }          
            ?>
        </table>
        <?php echo "<div class='ket'><br>Tổng cộng: $thanhtien VNĐ</div>"; ?>
        <a href="" class="nut">In hóa đơn</a>
        <!-- <div class="nut1" onclick="quayve()">Về trang trước</div> -->
        <a href="./hoadon2.php" class="nut">Hóa đơn mới</a>
    </div>
    <!-- <script>
      function quayve(){
          history.back();
      }
    </script> -->
</body>
</html>