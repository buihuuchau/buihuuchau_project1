<?php
    $idtv = $_COOKIE['idtv'];
    $idquan = $_COOKIE['idquan'];// tranh lay thong tin nhan vien quan khac
    $idchucvu = $_COOKIE['idchucvu'];
    if(!isset($_COOKIE['idtv'])){
        echo "
            <script>         
                alert('Ban chua dang nhap');
                window.location.href='./dangnhap.html';
            </script>
        ";
    }
    else{
        if($idchucvu == 1 || $idchucvu == 2){// cap quyen theo chuc vu // SE THAY DOI PHAN NAY
        }
        else{
            echo "
                <script>
                    window.location.href='./thongtincanhan.php';    
                    alert('Ban khong co quyen truy cap trang nay!');
                </script>
            ";
        } 
    }

    $tungay = $_POST['tungay'];
    setcookie('tungay', $tungay, time() + 3600);
    $denngay = $_POST['denngay'];
    setcookie('denngay', $denngay, time() + 3600);
    $tongthunhap = 0;
    $tongxuat = 0;
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
                $con = new mysqli("localhost", "root","", "quanly");
                $con->set_charset("utf8");
                if($tungay==null || $denngay==null){
                    $sql = "SELECT * FROM `hoadon` WHERE idquan='$idquan'";
                }
                else{
                    $sql = "SELECT * FROM `hoadon` WHERE idquan='$idquan' AND ngaytao BETWEEN '$tungay' AND '$denngay' AND thanhtien!='0'";
                }
                $result = $con->query($sql);
                $con->close();

                while($row = $result->fetch_array()){
                    $idhdxem = $row['idhd'];
                    $idtvxem = $row['idtv'];
                    $idbanxem = $row['idban'];
                    $ngaytao = $row['ngaytao'];
                    $giotao = $row['giotao'];
                    $thanhtien = $row['thanhtien'];
                    $tongthunhap = $tongthunhap+$thanhtien;

                        $con2 = new mysqli("localhost", "root","", "quanly");
                        $con2->set_charset("utf8");
                        $sql2 = "SELECT * FROM `thanhvien` WHERE idtv='$idtvxem'";
                        $result2 = $con2->query($sql2);
                        $con2->close();
                        $row2 = $result2->fetch_array();
                        $hoten = $row2['hoten'];

                        $con3 = new mysqli("localhost", "root","", "quanly");
                        $con3->set_charset("utf8");
                        $sql3 = "SELECT * FROM `ban` WHERE idban='$idbanxem'";
                        $result3 = $con3->query($sql3);
                        $con3->close();
                        $row3 = $result3->fetch_array();
                        $tenban = $row3['tenban'];
                    echo"
                        <br><br><br><br><br>
                      <table class='bang1'>
                        <tr>
                            <td>idhd: $idhdxem</td>
                            <td>Họ Tên: $hoten</td>
                            <td>Tên Bàn: $tenban</td>
                            <td>Ngày Tạo: $ngaytao</td>
                            <td>Giờ Tạo: $giotao</td>
                            <td>Thành Tiền: $thanhtien VNĐ</td>
                        </tr>
                      </table>
                    ";
                    $con4 = new mysqli("localhost", "root","", "quanly");
                    $con4->set_charset("utf8");
                    $sql4 = "SELECT * FROM `chitiet` WHERE idhd='$idhdxem'";
                    $result4 = $con4->query($sql4);
                    $con4->close();
                    while($row4 = $result4->fetch_array()){
                        $idmonxem = $row4['idmon'];
                        $soluong = $row4['soluong'];
                        $giamon = $row4['giamon'];
                        $thuchien = $row4['thuchien'];

                        $con5 = new mysqli("localhost", "root","", "quanly");
                        $con5->set_charset("utf8");
                        $sql5 = "SELECT * FROM `mon` WHERE idmon='$idmonxem'";
                        $result5 = $con5->query($sql5);
                        $con5->close();
                        $row5 = $result5->fetch_array();
                        $tenmon = $row5['tenmon'];

                        $con6 = new mysqli("localhost", "root","", "quanly");
                        $con6->set_charset("utf8");
                        $sql6 = "SELECT * FROM `thanhvien` WHERE idtv='$thuchien'";
                        $result6 = $con6->query($sql6);
                        $con6->close();
                        $row6 = $result6->fetch_array();
                        $hotenthuchien = $row6['hoten'];
                        echo"
                            <table class='bang2'>
                                <tr>
                                    <td>idmon: $idmonxem</td>
                                    <td>Tên Món: $tenmon</td>
                                    <td>Số Lượng: $soluong</td>
                                    <td>Giá Món: $giamon VNĐ</td>
                                    <td>Người thực hiện: $hotenthuchien</td>
                                </tr>
                            </table>
                        ";
                    }
                    $con7 = new mysqli("localhost", "root","", "quanly");
                    $con7->set_charset("utf8");
                    $sql7 = "SELECT * FROM `chitiet` WHERE idquan='$idquan' and thuchien!='0' AND idhd='$idhdxem'";
                    $result7 = $con7->query($sql7);
                    $con7->close();
                    while($row7 = $result7->fetch_array()){
                    $idctchitiet = $row7['idct'];
                    $idhdchitiet = $row7['idhd'];
                    $idmonchitiet = $row7['idmon'];
                    $soluongchitiet = $row7['soluong'];
                    $giamonchitiet = $row7['giamon'];
                    $thuchienchitiet = $row7['thuchien'];
                    $tongxuat = $tongxuat+$giamonchitiet;
                    echo"
                        <table class='bang3'>
                            <tr>
                                <td>idct: $idctchitiet</td>
                                <td>idhd: $idhdchitiet</td>
                                <td>idmon: $idmonchitiet</td>
                                <td>soluong: $soluongchitiet</td>
                                <td>Giá Món: $giamon VNĐ</td>
                                <td>idthuchien: $thuchienchitiet</td>
                            </tr>
                        </table>
                        ";
                    }
                }
                echo"<br><div class='ket'>Tổng thu nhập cho khoảng thời gian trên là: $tongthunhap VNĐ</div><br>";
                echo"<br><div class='ket'>Tổng giá trị xuất kho cho khoảng thời gian trên là: $tongxuat VNĐ</div><br>";
            ?>
            <a href="duyethoadon.php" class="nut">Duyệt Hóa Đơn</a>
            <a href="thongtincanhan.php" class="nut">Về trang chính</a>
        </div>
        <div class="than3"></div>
    </div>
</body>
</html>