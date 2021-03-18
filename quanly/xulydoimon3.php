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
        if($idchucvu == 1 || $idchucvu == 2 || $idchucvu == 4){// cap quyen theo chuc vu // SE THAY DOI PHAN NAY
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

    $idct = $_GET['idct'];
    setcookie('idct', $idct, time() + 3600);

    $con = new mysqli("localhost", "root","", "quanly");
    $con->set_charset("utf8");
    $sql = "SELECT * FROM `chitiet` WHERE idquan='$idquan' AND idct='$idct'";
    $result = $con->query($sql);
    $con->close();

    $row = $result->fetch_array();
    $idmon = $row['idmon'];
    $soluong = $row['soluong'];

    $con2 = new mysqli("localhost", "root","", "quanly");
    $con2->set_charset("utf8");
    $sql2 = "SELECT * FROM `mon` WHERE idquan='$idquan'";
    $result2 = $con2->query($sql2);
    $con2->close();

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="xulydoimon3.css">
    <title>Chi Tiết Đổi Món</title>
</head>
<body>
    <div class="than">
        <div class="than1"></div>
        <div class="than2">
            <center>Chi Tiết Đổi Món</center><br>
                <form action="xulydoimon4.php" method="post">
                    <label for="idmon">Đổi thành món:</label>
                    <select name="idmon" id="idmon">
                        <?php
                            while($row2 = $result2->fetch_array()){
                                $idmon2 = $row2['idmon'];
                                $tenmon2 = $row2['tenmon'];
                                $dongia2 = $row2['dongia'];
                                if($idmon==$idmon2){
                                    echo"
                                        <option value='$idmon2' selected>$tenmon2..........$dongia2</option>
                                    ";
                                }
                                else{
                                    echo"
                                        <option value='$idmon2'>$tenmon2..........$dongia2</option>
                                    ";
                                }
                                
                            }
                        ?>
                    </select>
                    <label for="soluong">Số lượng:</label>
                    <input type="number" name="soluong" id="soluong" value="<?php echo $soluong ?>">
                    <input type="submit" value="Đổi món">
                </form>
            <a href='hoadon.php' class='nut'>Tùy chọn hóa đơn</a>
        </div>
        <div class="than3"></div>
    </div>
</body>
</html>