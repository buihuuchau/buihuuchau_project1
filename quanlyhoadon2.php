<?php include "./myfunction.php"?>
<?php
    $idtv = $_COOKIE['idtv'];
    $idquan = $_COOKIE['idquan'];// tranh lay thong tin nhan vien quan khac
    $idchucvu = $_COOKIE['idchucvu'];
    kiemtraquyen(1,2,0,0,0);

    $tungay = $_POST['tungay'];
    setcookie('tungay', $tungay, time() + 3600);
    $denngay = $_POST['denngay'];
    setcookie('denngay', $denngay, time() + 3600);
    
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="xemhoadon.css">
    <title>Xem Hóa Đơn Chưa Duyệt</title>
</head>
<body>
    <div class="than">
        <than class="1"></than>
        <div class="than2">
            <div class="tieude"><center>Hóa Đơn Đã Thanh Toán</center></div>
            <?php
                echo"<br><div class='ngay'>Từ ngày: $tungay đến ngày: $denngay</div>";
                if($tungay==null || $denngay==null){
                    $sql = "SELECT * FROM `hoadon` WHERE idquan='$idquan'";
                }
                else{
                    $sql = "SELECT * FROM `hoadon` WHERE idquan='$idquan' AND ngaytao BETWEEN '$tungay' AND '$denngay' AND thanhtien!='0'";
                }
                $result = query($sql);

                $tongthunhap = 0;
                $stthd = 0;
                while($row = $result->fetch_array()){
                    $idhdxem = $row['idhd'];
                    $idtvxem = $row['idtv'];
                    $idbanxem = $row['idban'];
                    $ngaytao = $row['ngaytao'];
                    $giotao = $row['giotao'];
                    $thanhtien = $row['thanhtien'];
                    $stthd = $stthd+1;
                    $tongthunhap = $tongthunhap+$thanhtien;

                        $sql2 = "SELECT * FROM `thanhvien` WHERE idtv='$idtvxem'";
                        $result2 = query($sql2);
                        $row2 = $result2->fetch_array();
                        $hoten = $row2['hoten'];

                        $sql3 = "SELECT * FROM `ban` WHERE idban='$idbanxem'";
                        $result3 = query($sql3);
                        $row3 = $result3->fetch_array();
                        $tenban = $row3['tenban'];
                    echo"
                        <br><br><br><br><br>
                      <table class='bang1'>
                        <tr>
                            <td>STT Hóa Đơn: $stthd</td>
                            <td>Họ Tên: $hoten</td>
                            <td>Tên Bàn: $tenban</td>
                            <td>Ngày Tạo: $ngaytao</td>
                            <td>Giờ Tạo: $giotao</td>
                            <td>Thành Tiền: $thanhtien VNĐ</td>
                        </tr>
                      </table>
                    ";
                    $sql4 = "SELECT * FROM `chitiet` WHERE idhd='$idhdxem'";
                    $result4 = query($sql4);

                    $sttct = 0;
                    while($row4 = $result4->fetch_array()){
                        $idmonxem = $row4['idmon'];
                        $thuchien = $row4['thuchien'];
                        $sttct = $sttct+1;

                        $sql5 = "SELECT * FROM `mon` WHERE idmon='$idmonxem'";
                        $result5 = query($sql5);
                        $row5 = $result5->fetch_array();
                        $tenmon = $row5['tenmon'];
                        $dongia = $row5['dongia'];

                        $sql6 = "SELECT * FROM `thanhvien` WHERE idtv='$thuchien'";
                        $result6 = query($sql6);
                        $row6 = $result6->fetch_array();
                        $hotenthuchien = $row6['hoten'];
                        echo"
                            <table class='bang2'>
                                <tr>
                                    <td>STT Món: $sttct</td>
                                    <td>Tên Món: $tenmon</td>
                                    <td>Đơn giá: $dongia VNĐ</td>
                                    <td>Người thực hiện: $hotenthuchien</td>
                                </tr>
                            </table>
                        ";
                    }
                }
                echo"<br><div class='ket'>Tổng thu nhập cho khoảng thời gian trên là: $tongthunhap VNĐ</div><br>";
            ?>
            <a href="duyethoadon.php" class="nut">Duyệt Hóa Đơn</a>
            <a href="thongtincanhan.php" class="nut">Về trang chính</a>
        </div>
        <div class="than3"></div>
    </div>
</body>
</html>