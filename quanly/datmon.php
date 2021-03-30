<?php include "./myfunction.php"?>
<script type="text/javascript" src="myfunction.js"></script>
<?php
    $idtv = $_COOKIE['idtv'];
    $idquan = $_COOKIE['idquan'];// tranh lay thong tin nhan vien quan khac
    $idchucvu = $_COOKIE['idchucvu'];

    kiemtraquyen(1,2,4,0,0);

    $idhd = $_GET['idhd'];

    $sql3 = "SELECT * FROM `hoadon` WHERE idhd='$idhd'";
    $result3 = query($sql3);
    $hoadon = $result3->fetch_array();
    $idban = $hoadon['idban'];
    
    $sql = "SELECT * FROM `mon` WHERE idquan='$idquan'";
    $result = query($sql);

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="datmon.css">
    <title>Chi Tiết Đặt Món</title>
</head>
<body>
    <div class="than">

        <div class="than1"></div>
        <div class="than2">
            <center>Đặt món</center>
            <form action="xulydatmon.php" method="post">
                <input class="an" type="text" name="idhd" id="idhd" value="<?php echo $idhd ?>">
                <label for="idmon">Món:</label>
                <select name="idmon" id="idmon">
                    <?php
                        while($row = $result->fetch_array()){
                            $idmon = $row['idmon'];
                            $tenmon = $row['tenmon'];
                            $dongia = $row['dongia'];
                            echo"
                                <option value='$idmon'>$tenmon..........$dongia VNĐ</option>
                            ";
                        }
                    ?>  
                </select>
                <label for="soluong">Số lượng:</label>
                <input type="number" name="soluong" id="soluong" value="1">             
                <input type="submit" value="Đặt món">
                <div class="nut1" onclick="chuyentrang('./chucnanghoadon.php?idban=<?php echo $idban ?>')">Quay về</div>
            </form>
        </div>
        <div class="than3"></div>

    </div>
</body>
</html>