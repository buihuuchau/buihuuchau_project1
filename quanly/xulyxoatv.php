<?php include "./myfunction.php"?>
<?php
    $idtv = $_COOKIE['idtv'];
    $idquan = $_COOKIE['idquan'];// tranh lay thong tin nhan vien quan khac
    $idchucvu = $_COOKIE['idchucvu'];
    kiemtraquyen(1,2,0,0,0);

    $idtvxoa = $_GET['idtvxoa']; // idtv nhan tu trang truoc

    $sql ="DELETE FROM `thanhvien` WHERE idtv='$idtvxoa' AND idquan='$idquan'";
    $result = query($sql);//cau lenh di kem sql //result = true when sql success

    if($result){
        echo "
            <script>         
                alert('Ban da xoa thanh cong');
                window.location.href='./quanlynhanvien.php';
            </script>
        ";
    }
    else{
        echo "
            <script>         
                alert('Khong xoa duoc thanh vien');
                window.location.href='./quanlynhanvien.php';
            </script>
        ";
    }
?>