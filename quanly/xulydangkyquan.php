<?php include "./myfunction.php"?>
<?php
    $accquan = $_POST['accquan'];
    $pwdquan = $_POST['pwdquan'];
    $pwdquan = md5($pwdquan);
    $rpwdquan = $_POST['rpwdquan'];
    $rpwdquan = md5($rpwdquan);
    $tenquan = $_POST['tenquan'];
    $file = $_FILES['hinhquan']['tmp_name'];
    $hinhquan = "./hinh/".$_FILES['hinhquan']['name'];
    move_uploaded_file($file, $hinhquan);
    $diachiquan = $_POST['diachiquan'];
    $ngaythanhlap = $_POST['ngaythanhlap'];

    if($accquan==null || $pwdquan==null || $rpwdquan==null || $tenquan==null || $pwdquan!=$rpwdquan){
        echo "
            <script>         
                alert('Loi! Dang ky quan that bai. Hai mat khau khac nhau hoac bo trong thong tin quan trong!');
                window.location.href='./dangkyquan.html';
            </script>
        ";
    }
    else{
        $sql1 = "SELECT * FROM `quan` WHERE accquan='$accquan' and pwdquan='$pwdquan'";// co the sua phan nay
        $result1 = query($sql1);
        $sohang = $result1->num_rows;
        
        if($sohang > 0){
            echo "
                <script>         
                    alert('Loi! Dang ky quan that bai. Tai khoan da duoc su dung!');
                    window.location.href='./dangkyquan.html';
                </script>
            ";
        }
        else{
            $sql2 = "INSERT INTO `quan`(`accquan`, `pwdquan`, `rpwdquan`, `tenquan`, `hinhquan`, `diachiquan`, `ngaythanhlap`) VALUES ('$accquan','$pwdquan','$rpwdquan','$tenquan','$hinhquan','$diachiquan','$ngaythanhlap')";
            $result2 = query($sql2);
            echo "
                <script>         
                    alert('Dang ky quan thanh cong.');
                    window.location.href='./dangnhapquan.html';
                </script>
            ";       
        }
    }
?>