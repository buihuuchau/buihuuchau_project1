<?php include "./myfunction.php"?>
<?php
    $idtv = $_COOKIE['idtv'];
    $idquan = $_COOKIE['idquan'];// tranh lay thong tin nhan vien quan khac
    $idchucvu = $_COOKIE['idchucvu'];
    kiemtraquyen(1,2,0,0,0);

    $idmonxoa = $_GET['idmonxoa'];

    $sql = "DELETE FROM `mon` WHERE idmon='$idmonxoa' AND idquan='$idquan'";
    $result = query($sql);

    if($result){
        echo "
            <script>         
                alert('Ban da xoa thanh cong');
                window.location.href='./quanlymon.php';
            </script>
        ";
    }
    else{
        echo "
            <script>         
                alert('Khong xoa duoc mon');
                window.location.href='./quanlymon.php';
            </script>
        ";
    }

?>