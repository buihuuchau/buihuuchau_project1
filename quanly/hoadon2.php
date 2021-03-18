<?php include "./myfunction.php"?>
<script type="text/javascript" src="myfunction.js"></script>
<?php
    $idtv = $_COOKIE['idtv'];
    $idquan = $_COOKIE['idquan'];// tranh lay thong tin nhan vien quan khac
    $idchucvu = $_COOKIE['idchucvu'];
    
    kiemtraquyen(1,2,4,0,0);

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $ngaytao = date('Y-m-d');

    $sql5 = "SELECT * FROM `ban` WHERE idquan='$idquan'";
    $result5 = query($sql5);
?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="hoadon2.css">
        <title>Tùy chọn chức năng hóa đơn</title>
    </head>
    <body>
        <div class="than">
            <div class="than1"></div>

            <div class="than2">
                <center>Tùy Chọn Chức Năng Hóa Đơn</center>
                    <!-- <form action="chucnanghoadon.php" method="post"> -->
                    <form action="chucnanghoadon.php" method="get">
                        <label for="tenban">Chọn bàn:</label>
                        <select name="idban" id="idban">
                            <?php
                                while($ban = $result5->fetch_array()){
                                    $idban = $ban['idban'];
                                    $tenban = $ban['tenban'];
                                    echo"
                                        <option value='$idban'>$tenban</option>
                                    ";
                                }
                            ?>
                        </select>
                        <input type="submit" value="Chọn">
                    </form>
                    <?php
                        echo"
                            <div class='nut'>
                            <a href='thongtincanhan.php' class='nut1'><center>Về trang trước</center></a>
                            </div>
                        ";
                        $sql2 = "SELECT * FROM `hoadon` WHERE idquan='$idquan' AND ngaytao='$ngaytao'";
                        $result2 = query($sql2);
                        while($hoadon = $result2->fetch_array()){
                            
                            $idhd = $hoadon['idhd'];
                            $idban = $hoadon['idban'];
                            $ngaytao = $hoadon['ngaytao'];
                            $giotao = $hoadon['giotao'];
                            $trangthai = $hoadon['trangthai'];

                            $classTTHD = "";
                            $tentrangthai = "";
                            if($trangthai==0){
                                $tentrangthai = "Chưa thanh toán";
                                $classTTHD = "tthoadon1";
                            }else{
                                $classTTHD = "tthoadon2";
                                $tentrangthai = "Đã thu tiền";
                            }

                            $sql = "SELECT * FROM `ban` WHERE idquan='$idquan' AND idban='$idban'";
                            $result = query($sql);
                            $ban = $result->fetch_array();
                            $tenban= $ban['tenban'];

                            echo"<div class='chon' onclick='xulychuyentrang($idban,$idhd,$trangthai);'>";

                            echo"
                            <div class='$classTTHD'>$tenban-----$tentrangthai</div>
                            ";
                            
                            echo"
                                <div class='ttngaygio'>
                                    <div class='tt'>Ngày tạo: $ngaytao</div>
                                    <div class='tt'>Giờ tạo: $giotao</div>
                                </div>
                            ";
                            
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
                                    $tenthuchien="Chưa hoàn thành";
                                }
                                else{
                                    $tenthuchien="Đã xong"; 
                                }
                                    $sql4= "SELECT * FROM `mon` WHERE idquan='$idquan' AND idmon='$idmon'";
                                    $result4 = query($sql4);
                                    $mon = $result4->fetch_array();
                                    $tenmon = $mon['tenmon'];
                                    $dongia = $mon['dongia'];
                                    $thanhtien = $thanhtien + $dongia;
                                if($thuchien=="0"){
                                    echo"
                                    <div class='tt'>
                                        <div class=tt2>$tenmon</div>
                                        <div class=tt2>$dongia VNĐ</div>
                                        <div class=tt2>$tenthuchien</div>
                                        <a class='tt3'></a><br>
                                    </div>
                                    ";
                                }
                                else{
                                    echo"
                                    <div class='tt'>
                                        <div class=tt2>$tenmon</div>
                                        <div class=tt2>$dongia VNĐ</div>
                                        <div class=tt2>$tenthuchien</div>
                                        <a class='tt3'></a><br>
                                    </div>
                                    ";
                                }
                                
                            }
                            echo"<div class='ttthanhtien'>Hóa đơn tạm tính: $thanhtien</div>";

                            echo"</div>";
                        }
                               
                    ?>
                    <div class="nut">
                    <a href="thongtincanhan.php" class="nut1"><center>Về trang chính</center></a>
                    </div>
            </div>

            <div class="than3"></div>
        </div>

        <script>
            function xulychuyentrang($idban,$idhd,$trangthai){
                if($trangthai==0){
                    window.location.href="./chucnanghoadon.php?idban="+$idban;
                }
                else{
                    window.location.href="xulythanhtoan2.php?idhd="+$idhd;
                }
            }
        </script>
    </body>
</html>