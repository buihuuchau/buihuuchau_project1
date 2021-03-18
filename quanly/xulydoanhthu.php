<?php include "./myfunction.php"?>
<?php
    $idtv = $_COOKIE['idtv'];
    $idquan = $_COOKIE['idquan'];// tranh lay thong tin nhan vien quan khac
    $idchucvu = $_COOKIE['idchucvu'];
    kiemtraquyen(1,0,0,0,0);

    $tungay = $_POST['tungay'];
    $nam = $_POST['nam'];
    if($tungay!=null){
        $sql = "SELECT MAX(tongthunhap) FROM `hoadonduyet` WHERE idquan='$idquan' AND tungay='$tungay'";
        $result = query($sql);
        $row = $result->fetch_array();
        $tongthunhap = $row['MAX(tongthunhap)'];
        echo"Doanh thu của tháng $tungay: $tongthunhap VNĐ";
    }
    else{
        if($nam!=null){
            for($i=1;$i<=12;$i++){
                $sql2 = "SELECT MAX(tongthunhap) FROM `hoadonduyet` WHERE idquan='$idquan' AND tungay='$nam-$i-01'";
                $result2 = query($sql2);
                $row2 = $result2->fetch_array();
                $tongthunhap = $row2['MAX(tongthunhap)'];
                echo"Doanh thu của tháng $i-$nam: $tongthunhap VNĐ<br>";
            }
        }
        else{
            echo"
                <script>
                    alert('Không được bỏ trống cả 2 ô');
                    window.location.href='./doanhthu.html';
                </script>
            ";
        }
    }

    // $con = new mysqli("localhost", "root","", "quanly");
    // $con->set_charset("utf8");
    // $sql = "SELECT MAX(tongthunhap) FROM `hoadonduyet` WHERE idquan='$idquan' AND denngay='$denngay'";
    // $result = $con->query($sql);//cau lenh di kem sql //result = true when sql success
    // $con->close();

    // while($row = $result->fetch_array()){
    //     // echo $idhd = $row['idhd'];
    //     // echo $idquan = $row['idquan'];
    //     // echo $hoten = $row['hoten'];
    //     // echo $tenban = $row['tenban'];
    //     // echo $ngaytao = $row['ngaytao'];
    //     // echo $giotao = $row['giotao'];
    //     // echo $thanhtien = $row['thanhtien'];
    //     // echo $tungay = $row['tungay'];
    //     // echo $denngay = $row['denngay'];
    //     echo $tongthunhap = $row['MAX(tongthunhap)'];
    // }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem doanh thu theo tháng</title>
</head>
<body>
    
</body>
</html>