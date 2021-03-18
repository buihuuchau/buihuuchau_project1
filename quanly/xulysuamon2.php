<?php include "./myfunction.php"?>
<?php
    $idtv = $_COOKIE['idtv'];
    $idquan = $_COOKIE['idquan'];// tranh lay thong tin nhan vien quan khac
    $idchucvu = $_COOKIE['idchucvu'];
    kiemtraquyen(1,2,0,0,0);

    $idmonsua = $_COOKIE['idmonsua'];

    $file = $_FILES['hinhmon']['tmp_name'];
    $hinhmon = "./hinh/".$_FILES['hinhmon']['name'];
    if($hinhmon=="./hinh/"){

        $sql = "SELECT * FROM `mon` WHERE idmon='$idmonsua' AND idquan='$idquan'";
        $result = query($sql);
    
        $row = $result->fetch_array();
        $hinhmon = $row['hinhmon'];
        move_uploaded_file($file, $hinhmon);
    }
    else{
        move_uploaded_file($file, $hinhmon);
    }

    $tenmon = $_POST['tenmon'];
    $dongia = $_POST['dongia'];
    $mota = $_POST['mota'];

    $sql2 = "UPDATE `mon` SET `tenmon`='$tenmon',`dongia`='$dongia',`mota`='$mota',`hinhmon`='$hinhmon' WHERE idmon='$idmonsua' AND idquan='$idquan'";
    $result2 = query($sql2);

    if($result2){
        echo "
            <script>
                window.location.href='./quanlymon.php';    
                alert('Sua thanh cong');
            </script>
        ";
    }
    else{
        echo "
            <script>
                window.location.href='./quanlymon.php';    
                alert('Loi! Sua khong thanh cong.');
            </script>
        ";
    }
?>