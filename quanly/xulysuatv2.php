<?php include "./myfunction.php"?>
<?php
    $idtv = $_COOKIE['idtv'];
    $idquan = $_COOKIE['idquan'];// tranh lay thong tin nhan vien quan khac
    $idchucvu = $_COOKIE['idchucvu'];
    kiemtraquyen(1,2,0,0,0);

    $idtvsua = $_COOKIE['idtvsua'];

    $file = $_FILES['hinhtv']['tmp_name'];
    $hinhtv = "./hinh/".$_FILES['hinhtv']['name'];
    if($hinhtv=="./hinh/"){

        $sql = "SELECT * FROM `thanhvien` WHERE idtv='$idtvsua' AND idquan='$idquan'";
        $result = query($sql);
    
        $row = $result->fetch_array();
        $hinhtv = $row['hinhtv'];
        move_uploaded_file($file, $hinhtv);
    }
    else{
        move_uploaded_file($file, $hinhtv);
    }

    $diachi = $_POST['diachi'];
    $idchucvusua = $_POST['idchucvu'];
    $luong = $_POST['luong'];

    $sql2 = "UPDATE `thanhvien` SET `hinhtv`='$hinhtv',`diachi`='$diachi',`idchucvu`='$idchucvusua',`luong`='$luong' WHERE idtv='$idtvsua' AND idquan='$idquan'";
    $result2 = query($sql2);

    if($result2){
        echo "
            <script>
                window.location.href='./quanlynhanvien.php';    
                alert('Sua thanh cong');
            </script>
        ";
    }
    else{
        echo "
            <script>
                window.location.href='./quanlynhanvien.php';    
                alert('Loi! Sua khong thanh cong.');
            </script>
        ";
    }
?>