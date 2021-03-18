<?php include "./myfunction.php"?>
<?php
    $accquan = $_POST['accquan'];
    $pwdquan = $_POST['pwdquan'];
    $pwdquan = md5($pwdquan);
    
    $sql = "SELECT * FROM `quan` WHERE accquan='$accquan' and pwdquan='$pwdquan'";
    $result = query($sql);

    $sohang = $result->num_rows;
    if($sohang > 0){
        $row = $result->fetch_array();
        $idquan = $row['idquan'];
        setcookie('idquan', $idquan, time() + 3600);

        echo"
            <script>
                alert('Dang nhap quan thanh cong');
                window.location.href='./thongtinquan.php';
            </script>
        ";   
    }
    else{
        echo"
            <script>
                alert('Dang nhap quan that bai');
                window.location.href='./dangnhapquan.html';
            </script>
        ";
    }
?>