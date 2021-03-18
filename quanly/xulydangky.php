<?php include "./myfunction.php"?>
<?php
    $idquan = $_COOKIE['idquan'];
    if(!isset($_COOKIE['idquan'])){
        echo "
            <script>         
                alert('Ban chua dang nhap tai khoan quan');
                window.location.href='./dangnhapquan.html';
            </script>
        ";
    }

    $acc = $_POST['acc'];
    $pwd = $_POST['pwd'];
    $pwd = md5($pwd);
    $rpwd = $_POST['rpwd'];
    $rpwd = md5($rpwd);
    $hoten = $_POST['hoten'];
    $file = $_FILES['hinhtv']['tmp_name'];
    $hinhtv = "./hinh/".$_FILES['hinhtv']['name'];
    move_uploaded_file($file, $hinhtv);
    $namsinh = $_POST['namsinh'];
    $sex = $_POST['sex'];
    $diachi = $_POST['diachi'];
    $ngayvaolam = $_POST['ngayvaolam'];
    $idchucvu = $_POST['idchucvu'];
    $luong = $_POST['luong'];

    if($acc==null || $pwd==null || $rpwd==null || $hoten==null || $namsinh==null || $diachi==null || $ngayvaolam==null || $luong==null || $pwd!=$rpwd){
        echo "
            <script>         
                alert('Loi! Dang ky thanh vien that bai. Hai mat khau khac nhau hoac bo trong thong tin quan trong!');
                window.location.href='./dangky.html';
            </script>
        ";
    }
    else{
        $sql1 = "SELECT * FROM `thanhvien` WHERE acc='$acc' and pwd='$pwd'";// co the sua phan nay
        $result1 = query($sql1);
        $sohang = $result1->num_rows;
        
        if($sohang > 0){
            echo "
                <script>         
                    alert('Loi! Dang ky that bai. Tai khoan da duoc su dung!');
                    window.location.href='./dangky.html';
                </script>
            ";
        }
        else{
            $sql2 = "INSERT INTO `thanhvien`(`idquan`, `acc`, `pwd`, `rpwd`, `hoten`, `hinhtv`, `namsinh`, `sex`, `diachi`, `ngayvaolam`, `idchucvu`, `luong`) VALUES ('$idquan','$acc','$pwd','$rpwd','$hoten','$hinhtv','$namsinh','$sex','$diachi','$ngayvaolam','$idchucvu','$luong')";
            $result2 = query($sql2);
            echo "
                <script>         
                    alert('Dang ky thanh cong.');
                    window.location.href='./dangnhap.html';
                </script>
            ";       
        }
    }
?>