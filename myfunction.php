<?php
    function query($sql){
        $con = new mysqli("localhost", "root","", "quanly");
        // $con = new mysqli("localhost", "root","", "quanly");
        $con->set_charset("utf8");
        $result = $con->query($sql);
        $con->close();
        return $result;
    }

    function kiemtraquyen($a1,$a2,$a3,$a4,$a5){
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
            if($idchucvu == $a1 || $idchucvu == $a2 || $idchucvu == $a3 || $idchucvu == $a4 || $idchucvu == $a5){// cap quyen theo chuc vu // SE THAY DOI PHAN NAY
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
    }

    function thongbao($thongbao){
        echo "
            <script>         
                alert('$thongbao');
            </script>
        ";
    }

    function chuyentrang($chuyentrang){
        echo "
            <script>
                window.location.href='$chuyentrang';    
            </script>
        ";
    }

    function quayve(){
        echo "
            <script>
                history.back();   
            </script>
        ";
    }

?>
