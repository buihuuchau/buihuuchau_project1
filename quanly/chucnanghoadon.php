<?php include "./myfunction.php"?>
<?php
    $idtv = $_COOKIE['idtv'];
    $idquan = $_COOKIE['idquan'];// tranh lay thong tin nhan vien quan khac
    $idchucvu = $_COOKIE['idchucvu'];
    
    kiemtraquyen(1,2,4,0,0);

    // $idban = $_POST['idban'];
    $idban = $_GET['idban'];

    $sql = "SELECT * FROM `ban` WHERE idquan='$idquan' AND idban='$idban'";
    $result = query($sql);
    $ban = $result->fetch_array();
    $tenban= $ban['tenban'];

    $sql2 = "SELECT * FROM `hoadon` WHERE idquan='$idquan' AND idban='$idban' AND trangthai='0'";
    $result2 = query($sql2);
    $hoadon = $result2->fetch_array();
    $idhd = $hoadon['idhd'];
    $ngaytao = $hoadon['ngaytao'];
    $giotao = $hoadon['giotao'];

?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="chucnanghoadon.css">
        <title>Tùy chọn chức năng hóa đơn</title>
    </head>
    <body>
        <div class="than">
            <div class="than1"></div>

            <div class="than2">
                <center>Tùy Chọn Chức Năng Hóa Đơn</center>
                    <p class="ttban">Xử lý chức năng của:<?php echo $tenban; ?></p>
                    <div class="ttngaygio">
                        <div class="tt"><?php echo "Ngày tạo: $ngaytao"; ?></div>
                        <div class="tt"><?php echo "Giờ tạo: $giotao"; ?></div>
                    </div>
                    <?php
                        $sql3 = "SELECT * FROM `chitiet` WHERE idquan='$idquan' AND idhd='$idhd'";
                        $result3 = query($sql3);
                        $thanhtien = 0;
                        echo"
                            <div class='tt'>
                                <div class=tt1>Tên món</div>
                                <div class=tt1>Đơn giá</div>
                                <div class=tt1>Trang thái</div>
                                <div class=tt0></div>
                                <br>
                            </div>
                        ";
                        while($chittiet = $result3->fetch_array()){
                            $idct = $chittiet['idct'];
                            $idmon = $chittiet['idmon'];
                            $thuchien = $chittiet['thuchien'];
                            if($thuchien==0){
                                $thuchien="Chưa hoàn thành";
                            }
                            else{
                                $thuchien="Đã xong"; 
                            }
                                $sql4= "SELECT * FROM `mon` WHERE idquan='$idquan' AND idmon='$idmon'";
                                $result4 = query($sql4);
                                $mon = $result4->fetch_array();
                                $tenmon = $mon['tenmon'];
                                $dongia = $mon['dongia'];
                                $thanhtien = $thanhtien + $dongia;
                            if($thuchien=="Chưa hoàn thành"){
                                echo"
                                <div class='tt'>
                                    <div class=tt2>$tenmon</div>
                                    <div class=tt2>$dongia VNĐ</div>
                                    <div class=tt2>$thuchien</div>
                                    <a href='xoamonhoadon.php?idct=$idct' class='tt3'>Xóa món</a><br>
                                </div>
                                ";
                            }
                            else{
                                echo"
                                <div class='tt'>
                                    <div class=tt2>$tenmon</div>
                                    <div class=tt2>$dongia VNĐ</div>
                                    <div class=tt2>$thuchien</div>
                                    <a class='tt3'></a><br>
                                </div>
                                ";
                            }
                            
                        }
                        echo"<div class='ttthanhtien'>Hóa đơn tạm tính: $thanhtien</div>";        
                    ?>
                <div class="nut">
                    <a href="hoadon3.php" class="nut1"><center>Về trang trước</center></a>
                    <a href="taohoadon.php?idban=<?php echo $idban ?>" class="nut1"><center>Tạo hóa đơn</center></a>
                    <a href="xulydoiban1.php?idban=<?php echo $idban ?>&idhd=<?php echo $idhd ?>" class="nut1"><center>Đổi bàn</center></a>
                    <a href="datmon.php?idhd=<?php echo $idhd ?>" class="nut1"><center>Thêm món HĐ</center></a>
                    <a href="xulythanhtoan1.php?idban=<?php echo $idban ?>&idhd=<?php echo $idhd ?>" class="nut1"><center>Thanh toán</center></a>
                </div>
            </div>

            <div class="than3"></div>
        </div>
    </body>
</html>